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

Route::get('/loginHomepage', "HomeController@loginHomepage")->middleware('check');

Route::get('/restaurantDetail', "HomeController@restaurantDetail");

Route::get('/orderDetail', "HomeController@orderDetail");

Route::get('/userOrderDetail', "HomeController@userOrderDetail");


Route::get('/newOrder',"HomeController@newOrder");
Route::get('/processing',"HomeController@processing");
Route::get('/takeout',"HomeController@takeout");
Route::get('/user',"HomeController@user");

Route::get('/login',"HomeController@login");

Route::post('/login/check',"HomeController@logincheck");



Route::get('/restaurant/login',"HomeController@rLogin");
Route::get('/restaurant/register',"HomeController@rRegister");

Route::get('/BackEnd/coupon','BackEnd@couponIndex');
Route::get('/BackEnd/member','BackEnd@memberIndex');
Route::get('/BackEnd/order','BackEnd@orderIndex');
Route::get('/BackEnd/restaurant','BackEnd@restaurantIndex');




Route::resource('coupon','CouponController');

Route::resource('member','MemberController');

Route::resource('shop','ShopController');

Route::resource('meal','MealController');

Route::resource('orders','OrdersController');

// =======會員忘記密碼=======

Route::post('/reset',"HomeController@reset");

Route::get('/reset/resetform/{token}',"HomeController@resetForm");

Route::post('/reset/resetpassword',"HomeController@resetPassword");