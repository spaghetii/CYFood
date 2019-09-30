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

Route::get('/', "HomeController@index");

Route::get('/loginHomepage', "HomeController@loginHomepage");

Route::get('/restaurantDetail', "HomeController@restaurantDetail");


Route::get('/newOrder',"HomeController@newOrder");
Route::get('/processing',"HomeController@processing");
Route::get('/user',"HomeController@user");

Route::get('/login',"HomeController@login");



Route::get('/restaurant/login',"HomeController@rLogin");
Route::get('/restaurant/register',"HomeController@rRegister");

Route::resource('coupon','CouponController');

Route::resource('member','MemberController');

Route::resource('shop','ShopController');

Route::resource('meal','MealController');

Route::resource('orders','OrdersController');

// Route::get('/sendmail', function() {
//     $data = ['name' => 'Test'];
//     Mail::send('email.welcome', $data, function($message) {
//     $message->to('spaded40686@gmail.com')->subject('CYFood 會員密碼重置');
//     });
//     return 'Your email has been sent successfully!';
//     });

Route::post('/reset',"HomeController@reset");

Route::get('/reset/resetform/{token}',"HomeController@resetForm");

Route::get('/reset/resetpassword/{token}',"HomeController@resetPassword");