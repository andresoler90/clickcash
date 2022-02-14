<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
//Authentication

Route::get('/login', 'AuthenticationController@login')->name('login');
Route::post('/googleLogin/{user}', 'Auth\LoginController@googleLogin')->name('googleLogin');
Route::get('/registration', 'AuthenticationController@registration')->name('registration');
Route::get('/recover-password', 'AuthenticationController@recoverPassword')->name('recover-password');
Route::get('/confirm-email', 'AuthenticationController@confirmEmail')->name('confirm-email');
Route::get('/lock-screen', 'AuthenticationController@lockScreen')->name('lock-screen');
Route::get('/authenticator', 'AuthenticationController@authenticatorView')->name('authenticator.view');
Route::get('/reply/{id}', 'UserPublicController@reply')->name('reply.view');

//Dashboard Routes
Route::middleware('auth')->group(function () {

    Route::prefix('crud')->middleware('role:Administrador')->group(function () {
        Route::resource('user', Admin\UserController::class);
        Route::post('/user/add/balance', 'Admin\UserController@addBalance')->name('user.add.balance');
        Route::post('/user/create/payment', 'PaymentController@createPayment')->name('create.payment');
        Route::post('/user/search/payment', 'SearchPaymentController@get_tx_ids')->name('search.payment');
        Route::post('/user/wallet/payment/{membership}', 'UserPublicController@payWallet')->name('wallet.payment');
        Route::post('/product/user', 'Admin\UserController@productByUser')->name('user.product.assign');
        Route::resource('menu', Admin\MenuController::class);
        Route::resource('kyc', Admin\KycController::class);
        Route::get('/kyc/status/{kyc}/{status}/{comment?}', 'Admin\KycController@updateApprovedState')->name('kyc.status.update');
        Route::get('/kyc/download/{kycDocument}', 'Admin\KycController@downloadDocument')->name('admin.kyc.download');
        Route::post('kyc/search', 'Admin\KycController@searchByFilter')->name('kyc.search.filters');

        Route::resource('task', Admin\TaskController::class);

        Route::resource('detail', Admin\TaskDetailController::class);
        Route::resource('roles', Admin\RolesController::class);
        Route::resource('product', Admin\ProductController::class);
        Route::resource('payment', Admin\PaymentController::class);
        Route::post('payment/search', 'Admin\PaymentController@searchByFilter')->name('payment.search.filters');
        Route::post('payment/action', 'Admin\PaymentController@actionForm')->name('payment.action');
        Route::post('payment/legacy/action', 'Admin\PaymentController@actionForm')->name('legacy.payment.action');

    });

    Route::middleware('role:Administrador|Usuario|Asistente')->group(function () {

        Route::get('/tasks', 'UserPublicController@tasks')->name('user.tasks');
        Route::get('/email', 'UserPublicController@listEmail')->name('user.email');
        Route::post('/send/email', 'UserPublicController@sendEmail')->name('send.email');
        Route::get('/tasks/link/{taskDetail}', 'UserPublicController@taskLink')->name('user.tasks.link');
        Route::get('/kyc', 'UserPublicController@kyc')->name('user.kyc');
        Route::get('/kyc/download/{kycDocument}/{type?}', 'Admin\KycController@download')->name('user.kyc.download');
        Route::get('/wallet', 'UserPublicController@wallet')->name('user.wallet');
        Route::get('/settings', 'UserPublicController@settings')->name('user.settings');
        Route::post('/activate/a2fa', 'UserPublicController@activateA2fa')->name('user.active.a2fa');
        Route::resource('profile', UserProfileController::class);
        Route::put('/profile/user/changedPassword/{user}', 'UserProfileController@userChangedPassword')->name('profile.user.changedPassWord');
        Route::get('/payment', 'UserPublicController@payment')->name('user.payment');
        Route::post('/payment/request', 'UserPublicController@savePaymentRequest')->name('user.save.payment')->middleware('a2faGoogle');
        Route::post('/transfer', 'UserPublicController@transfer')->name('user.transfer');
        Route::get('/multilevel', 'UserPublicController@multilevel')->name('user.multilevel');
        Route::get('/add/user/reference', 'UserPublicController@addUserReferenced')->name('user.add.reference');
        Route::post('/create/user/reference', 'UserPublicController@createUserReferenced')->name('user.create.reference');
    });
});


Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');





