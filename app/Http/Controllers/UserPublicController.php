<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Libs\Multilevel;
use App\Models\KycType;
use App\Models\LegacyBalance;
use App\Models\LegacyPaymentRequest;
use App\Models\Membership;
use App\Models\System;
use App\Models\TaskDetail;
use App\Models\Product;
use App\Models\UserBalance;
use App\Models\UserComunication;
use App\Models\UserContactInformation;
use App\Models\UserMembership;
use App\Models\UserPaymentRequest;
use App\Models\UserProduct;
use App\Models\UserTask;
use App\Models\UserTransfer;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Payment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Toolbox;
use PragmaRX\Google2FA\Google2FA;
use RealRashid\SweetAlert\Facades\Alert;

class UserPublicController extends Controller
{
    public function tasks()
    {
        $tasks = Toolbox::taskDay();

        $taskHistory = UserTask::where('users_id', Auth::id())->get();
        $userProduct = UserProduct::where('users_id', Auth::id())->first();

        $available_time = Carbon::now();

        return view('user.tasks', compact('tasks', 'available_time', 'userProduct', 'taskHistory'));
    }

    public function taskLink(TaskDetail $taskDetail)
    {
        $product = UserProduct::where('users_id', Auth::id())->first()->product;
        $taskPerformance = count(Auth::user()->taskPerfomanceByDay());
        //Verificamos que el click no supere la cantidad de clicks disponibles segun el producto
        if (($taskPerformance + 1) <= $product->clicks) {
            $userTask = new UserTask();
            $userTask->users_id = Auth::id();
            $userTask->task_details_id = $taskDetail->id;
            $userTask->duration = 0; //TODO: si a futuro se desea controlar el tiempo de las tareas
            if ($userTask->save()) {
                //Si alcanzamos la cantida maxima de clicks se genera la comision
                if (($taskPerformance + 1) == $product->clicks) {
                    $balance = new UserBalance();
                    $balance->amount = $product->commission;
                    $balance->users_id = Auth::id();
                    $balance->type = "task";
                    $balance->created_user = Auth::id();
                    $balance->save();
                }
                return redirect()->to($taskDetail->link);
            }
        } else {
            echo "<script type='text/javascript'>window.close();</script>";
        }
    }

    public function kyc()
    {
        $types = KycType::all();
        return view('user.kyc', compact('types'));
    }

    public function wallet(Request $request)
    {
        $balances = UserBalance::where('users_id', Auth::id())->orderByDesc('created_at')->paginate(4);
        $fee = System::where('parameter', 'transfer_percentage')->first();
        $feeValue = $fee->value;
        $type = $request->type;
        $date = $request->date;

        if ($type) {
            $balances = UserBalance::where([
                ['users_id', Auth::id()],
                ['type', 'like', '%' . $request->type . '%']
            ])->orderByDesc('id')->paginate(1);
        }
        if ($date != null) {
            $balances = UserBalance::where('users_id', Auth::id())->whereDate('created_at', $request->date)->orderByDesc('id')->paginate(4);
        }

        return view('user.wallet', compact('balances', 'feeValue', 'type', 'date'));
    }

    public function settings()
    {
        $login = new LoginController();
        $tokenLogin = (new Google2FA)->generateSecretKey();
        $user = User::find(Auth::id());
        $user->token_login = $tokenLogin;
        $urlQR = $login->createUserUrlQR($user);
        return view('user.settings', compact('urlQR', 'tokenLogin'));
    }

    public function activateA2fa(Request $request)
    {
        $user = Auth::user();
        if (isset($request->tokenLogin)) {
            $user->token_login = $request->tokenLogin;
        } else {
            $user->token_login = null;
        }
        if ($user->save()) {
            if ($user->token_login) {
                Alert::success(__('Autenticación de doble factor'), 'Deberá ingresar la clave dinámica en cada login o opción donde se le solicite');
            } else {
                Alert::success(__('Autenticación de doble factor'), 'Se ha desactivado esta opción ');
            }
        }
        return redirect()->back();
    }

    public function payment()
    {
        //$payment = UserPaymentRequest::where('users_id', Auth::id());

        $payments = new \stdClass();
        $payments->pendings = UserPaymentRequest::where('users_id', Auth::id())->Pending()->paginate(15);
        $payments->refuses = UserPaymentRequest::where('users_id', Auth::id())->Refuse()->paginate(15);
        $payments->approves = UserPaymentRequest::where('users_id', Auth::id())->Approve()->paginate(15);


        $legacyPayments = new \stdClass();
        $legacyPayments->pendings = LegacyPaymentRequest::where('users_id', Auth::id())->Pending()->paginate(15);
        $legacyPayments->refuses = LegacyPaymentRequest::where('users_id', Auth::id())->Refuse()->paginate(15);
        $legacyPayments->approves = LegacyPaymentRequest::where('users_id', Auth::id())->Approve()->paginate(15);

        return view('user.payment', compact('payments', 'legacyPayments'));
    }


    public function savePaymentRequest(Request $request)
    {

        $balance = \Auth::user()->balanceTotal();

        // Se agrega 1 dia para coincidencia de las opciones

        if ($request->wallet_source == "legacy") {
            if ($this->validateLegacyWithdraws($request->amount_remove)) {
                $validatePayment = LegacyPaymentRequest::where('users_id', \Auth::id())->Pending()->first();
            } else {
                return redirect()->route('user.payment');
            }
        } else {
            $validatePayment = UserPaymentRequest::where('users_id', \Auth::id())->Pending()->first();
        }

        if ($validatePayment != null) {
            \Alert::warning('', __('Ya hay una solicitud de retiro vigente'));
        } elseif ($request->amount_remove > $balance) {
            \Alert::warning('', __('La cantidad solicitada es superiror al monto actual: $' . $balance));
        } else {
            if ($request->wallet_source == "legacy") {
                $payment = new LegacyPaymentRequest();
            } else {
                $payment = new UserPaymentRequest();
            }

            $payment->fill($request->all());
            $payment->users_id = \Auth::id();
            $payment->status = 0; // Pendiente
            if ($payment->save()) {
                Alert::success('', __('Solicitud de pago registrada'));
            }
        }
        return redirect()->route('user.payment');//TODO: se deja redirect route y no el back, ya que el back es el middleware 2FA
    }

    public function validateLegacyWithdraws($amount)
    {
        $legacy_start_request = System::where("parameter", "legacy_start_request")->first();
        $start = new \DateTime($legacy_start_request->value);
        $end = new \DateTime(date('Y-m-d', strtotime("this week +7 days")));
        $interval = $start->diff($end);
        $weeks = floor(($interval->format('%a') / 7));

        $legacy_limit_request = System::where("parameter", "legacy_limit_request")->first();

        $totalLimit = ($legacy_limit_request->value * $weeks);

        $requestAmount = LegacyBalance::where("users_id", Auth::id())->where("amount", "<", 0)->get()->sum("amount");
        $realLimit = $totalLimit + $requestAmount;
        if ($realLimit < $amount) {
            Alert::warning("El monto supera el limite acumulado de $realLimit");
            return false;
        }

        return true;
    }

    public function transfer(Request $request)
    {
        $userTransfer = User::where('username', $request->name)->first();
        $feeValue = System::where('parameter', 'transfer_percentage')->first();
        $amount_user = new User();
        $total_amount = $amount_user->balanceTotal();

        $fee = $feeValue->value / 100;
        $totalFee = $request->amount_transfer * $fee;
        $discount = $request->amount_transfer + $totalFee;

        if ($userTransfer) {

            if ($discount > $total_amount) {
                Alert::error('', 'El monto a transferir no de be superar el monto actual');
            } else {
                if ($userTransfer->id != Auth::id()) {
                    $originBalances = new UserBalance();
                    $originBalances->users_id = $userTransfer->id;
                    $originBalances->amount = $request->amount_transfer;
                    $originBalances->type = 'transfer';
                    $originBalances->created_user = Auth::id();
                    $originBalances->save();
                }

                $destinedBalances = new UserBalance();
                $destinedBalances->users_id = Auth::id();
                $destinedBalances->amount = $discount * -1;
                $destinedBalances->type = 'transfer';
                $destinedBalances->created_user = Auth::id();
                if ($destinedBalances->save()) {
                    $transfer = new UserTransfer();
                    $transfer->from_users_id = Auth::id();
                    $transfer->from_balance_id = $destinedBalances->id;
                    $transfer->to_users_id = $userTransfer->id;
                    $transfer->to_balance_id = $originBalances->id;
                    $transfer->comment = $request->comment;
                    $transfer->save();

                    Alert::success('', 'Se realizo la transacción con exito');
                } else {
                    Alert::error('', 'Error al momento de guardar la transacción');
                }
            }

        } else {
            Alert::error('', 'El usuario no se encuentra registrado');
        }

        return redirect()->back();

    }

    /**
     * @param $membership
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payWallet($membership)
    {

        $pay = UserMembership::where('id', $membership)->first();
        $amount_user = new User();
        $total_amount = $amount_user->balanceTotal();

        if ($pay->price > $total_amount) {
            Alert::error('El monto de la suscripcion supera el monto en su wallet');
            return redirect()->back();
        } else {
            $walletBalances = new UserBalance();
            $walletBalances->users_id = Auth::id();
            $walletBalances->amount = $pay->price * -1;
            $walletBalances->type = 'Pay Membership';
            $walletBalances->created_user = Auth::id();
            if ($walletBalances->save()) {
                $pay->status = 'A';
                if ($pay->save()) {
                    Alert::success('', 'Se realizo el pago de la membresia con exito');
                    return redirect()->back();
                }
            } else {
                Alert::error('', 'Error al momento de hacer el pago de la menbresia');
                return redirect()->back();
            }
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function reply($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('user.reply', compact('user'));
        }
        return redirect()->route('login');
    }

    function multilevel()
    {
        $user = Auth::user();
        $multilevel = new Multilevel($user);

        return view('user.multilevel', compact("multilevel"));
    }

    public function addUserReferenced()
    {
        return view('user.add_user_reference');

    }

    public function createUserReferenced(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
            'username'     => ['required', 'string', 'min:8', ''],
            'countries_id' => ['required'],
            'sponsor'      => ['required', 'exists:users,username'],
        ]);
        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $sponsor = User::where('username', $request['sponsor'])->first();
        $user = User::create([
            'name'         => $request['name'],
            'email'        => $request['email'],
            'password'     => Hash::make($request['password']),
            'username'     => $request['username'],
            'countries_id' => $request['countries_id'],
            'sponsor_id'   => $sponsor->id,
        ]);

        if ($user) {
            $membership = Membership::find($request["memberships_id"]);
            $userMembership = new UserMembership();
            $userMembership->users_id = $user->id;
            $userMembership->memberships_id = $membership->id;
            $userMembership->price = $membership->amount;
            $userMembership->save();
        }

        Alert::success('', __('Usuario creado correctamente'));

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listEmail()
    {

        $users = User::all()->pluck('name', 'id');
        $listEmailTo = UserComunication::where('to_users_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $listEmailForm = UserComunication::where('from_users_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('user.email', compact('users', 'listEmailTo', 'listEmailForm'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request)
    {
        $userToEmail = User::where('id', $request->users_id)->first();

        if ($userToEmail) {
            $sendEmail = new UserComunication();
            $sendEmail->subject = $request->subject;
            $sendEmail->message = $request->message;
            $sendEmail->from_users_id = Auth::id();
            $sendEmail->to_users_id = $userToEmail->id;
            if ($sendEmail->save()) {
                Alert::success('', 'Email enviado con exito');
            } else {
                Alert::error('', 'No se pudo enviar el Email');
            }
        }

        return redirect()->back();
    }
}
