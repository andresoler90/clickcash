<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Product;
use App\Models\UserBalance;
use App\Models\UserMembership;
use App\Models\UserProduct;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
            'username'     => ['required', 'string', 'min:8', ''],
            'countries_id' => ['required'],
            'sponsor'      => ['required', 'exists:users,username'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $sponsor = User::where('username', $data['sponsor'])->first();
        $user = User::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
            'username'     => $data['username'],
            'countries_id' => $data['countries_id'],
            'sponsor_id'   => $sponsor->id,
        ]);

        if ($user) {
            $membership = Membership::find($data["memberships_id"]);
            $userMembership = new UserMembership();
            $userMembership->users_id = $user->id;
            $userMembership->memberships_id = $membership->id;
            $userMembership->price = $membership->amount;
            $userMembership->save();
        }

        return $user;
    }

    /**
     * Agregamos la comision al usuario que refirio a este nuevo usuario
     * @param $id
     */
    public function addSponsorCommissions($sponsor_id, $referred_id)
    {
        $userProduct = UserProduct::where('users_id', $sponsor_id)->first();
        if ($userProduct) {
            $userBalance = new UserBalance();
            $userBalance->type = "referreds";
            $userBalance->created_user = $referred_id;
            $userBalance->users_id = $sponsor_id;
            $userBalance->amount = $userProduct->product->commission_referred;
            $userBalance->save();
        }
    }
}
