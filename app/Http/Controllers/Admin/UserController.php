<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycType;
use App\Models\Product;
use App\Models\Role;
use App\Models\UserBalance;
use App\Models\UserProduct;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('cruds.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('cruds.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "name"  => "required|min:3|string",
            "email" => "required|email|unique:users,email"
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt('123456');
        $user->created_user = Auth::id();
        if ($user->save()) {
            Alert::success('', 'Registro exitoso');
        }

        return redirect()->route('user.edit', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('cruds.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $listProduct = UserProduct::where('users_id', $user->id)->first();
        $products = Product::all()->pluck('name', 'id');
        $typesKyc = KycType::all();
        return view('cruds.users.edit', compact('user', 'roles', 'listProduct', 'products', 'typesKyc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $this->validate($request, [
            "name"     => "required|min:3|string",
            "email"    => "required|email|unique:users,email",
            "password" => "required|min:6"
        ]);

        $user->update($validated);

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'item deleted successfully');
    }

    public function productByUser(Request $request)
    {
        $validated = $this->validate($request, [
            "products_id" => "required"
        ]);

        $carbon = new Carbon();
        $product = Product::find($request->products_id);
        $userProduct = new UserProduct();
        $userProduct->users_id = $request->users_id;
        $userProduct->products_id = $product->id;
        $userProduct->price = $product->price;
        $userProduct->created_user = Auth::id();
        $userProduct->expiration_date = $carbon->addDays($product->expiration_days);
        $userProduct->save();
        if ($userProduct->save()) {
            Alert::success('', 'Registro exitoso');
        }

        return redirect()->route('user.edit', $request->users_id);
    }

    public function addBalance(Request $request)
    {
        $newBalance = new UserBalance();
        $newBalance->users_id = $request->users_id;
        $newBalance->amount = $request->amount;
        $newBalance->type = "payment";
        $newBalance->created_user = Auth::id();
        if ($newBalance->save()) {
            Alert::success('', __('Saldo actualizado'));
        }
        return redirect()->back();
    }
}
