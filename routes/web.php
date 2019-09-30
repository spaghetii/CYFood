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

Route::get('/newOrder',"HomeController@newOrder");
Route::get('/processing',"HomeController@processing");

Route::get('/login',"HomeController@login");

Route::get('/BackEnd/coupon','BackEnd@couponIndex');
Route::get('/BackEnd/member','BackEnd@memberIndex');
Route::get('/BackEnd/order','BackEnd@orderIndex');
Route::get('/BackEnd/restaurant','BackEnd@restaurantIndex');




Route::resource('coupon','CouponController');

Route::resource('member','MemberController');

Route::resource('shop','ShopController');

Route::resource('meal','MealController');

Route::resource('orders','OrdersController');