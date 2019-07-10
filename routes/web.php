<?php

Route::get('/order-approve',function(){
    return view('/admin/order/aproval');
});

Route::get('/costumer-history', function () {
    return view('/customer-views/order-history');
});

Route::get('/courier',function(){
    return view('/admin/courier/index');
});

Route::get('/add-courier',function(){
    return view('/admin/courier/add');
});

Route::get('/edit-courier',function(){
    return view('/admin/courier/edit');
});

Route::get('/add-offices',function(){
    return view('/admin/offices/add');
});

Route::get('/edit-offices',function(){
    return view('/admin/offices/edit');
});

Route::get('/users',function(){
    return view('/admin/users/index');
});

Route::get('/add-users',function(){
    return view('/admin/users/add');
});

Route::resource('office','OfficeController');
Route::get('/verif-topup','VerifikasiTopUp@verifIndex')->name('list_pembayar');
Route::put('/verifikasi-bayar/{id}','VerifikasiTopUp@verifikasiBayar')->name('verifikasiBayar');
/**
 * Login Route(s)
 */
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// /**
//  * Register Route(s)
//  */
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// /**
//  * Password Reset Route(S)
//  */
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// /**
//  * Email Verification Route(s)
//  */
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// // Login & Register for Customers
// Route::get('/login/customer', 'Auth\LoginController@showCustomerLoginForm');
// Route::get('/register/customer', 'Auth\RegisterController@showCustomerRegisterForm');

// Route::post('/login/customer', 'Auth\LoginController@customerLogin');
// Route::post('/register/customer', 'Auth\RegisterController@createCustomer');

Route::get('/', function() {
    return redirect('login');
});

// Login Admin & Operator
Route::get('/login/{user}', 'Auth\LoginController@showAdmin_OperatorLoginForm');
Route::get('/register/{user}', 'Auth\RegisterController@showAdmin_OperatorRegisterForm');

Route::post('/login/{user}', 'Auth\LoginController@admin_operatorLogin');
Route::post('/register/{user}', 'Auth\RegisterController@createAdmin_Operator');

// Route Customer
Route::group(['middleware' => 'checkCustomer'], function () {


    Route::get('/home', 'CustomerController@indexCostumer');
    //Route::get('/home', 'OrdersController@show_order');
    Route::post('order/store', 'OrdersController@order_store')->name('order');
    Route::get('/costumer-order','CustomerController@CustomerOrder');
    Route::get('/order-history', 'OrdersController@order_history');
    Route::get('/costumer-topup','TopUpController@topUpindex')->name('topUpCustomer');
    Route::post('/topup','TopUpController@topup');
});

// Route Operator
Route::group(['middleware' => 'checkOperator'], function () {
    Route::get('order', 'OrdersController@approval')->name('approval');
    Route::put('order/{id}', 'OrdersController@update');
    Route::put('set_courier/{id}','CourierController@setCourier')->name('set_courier');

});

Route::get('getCity/{id}','CustomerController@getCity');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
