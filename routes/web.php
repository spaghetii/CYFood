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
//===========客戶端====================
Route::get('/', "HomeController@index")->middleware('check');

Route::get('/login',"HomeController@login");

Route::get('/logout',"HomeController@logout");

Route::post('/login/check',"HomeController@logincheck");

Route::post('/login/checkRe',"HomeController@checkRegister");

Route::post('/login/checkReID',"HomeController@checkRegisterID");

Route::get('/loginHomepage', "HomeController@loginHomepage")->middleware('check');

Route::get('/restaurant/{id}', "HomeController@restaurantDetail");

Route::get('/orderDetail', "HomeController@orderDetail");

Route::get('/userOrderDetail', "HomeController@userOrderDetail");

Route::get('/userProfile', "HomeController@userProfile");

Route::get('/trackingOrder', "HomeController@trackingOrder");

Route::get('/session',"HomeController@checkMemberSession" );



//===============店家端======================
Route::get('/shop/login',"ShopController@rLogin");
Route::post('/shop/login/check',"ShopController@rLogincheck");
Route::get('/shop/register',"ShopController@rRegister");
Route::get('/shop/newOrder/{id}',"ShopController@newOrder");
Route::get('/shop/processing/{id}',"ShopController@processing");
Route::get('/shop/takeout/{id}',"ShopController@takeout");
Route::get('/shop/user/{id}',"ShopController@user");


//===============後端=================
Route::get('/BackEnd/login','BackEnd@loginIndex');
Route::post('/BackEnd/login/check','BackEnd@bLogincheck');
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

//======boardcast test=======
Route::post('/socket/clientsend',"HomeController@clientSend");

Route::post('/socket/shopsend',"HomeController@shopSend");