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

//===========會員端====================
Route::get('/', "HomeController@index")->middleware('check');                       // 未登入主頁

Route::get('/login',"HomeController@login");                                        // 會員登入

Route::get('/logout',"HomeController@logout");                                      // 會員登出

Route::post('/login/check',"HomeController@logincheck");                            // 會員登入驗證

Route::post('/login/checkRe',"HomeController@checkRegister");                       // 會員註冊驗證

Route::post('/login/checkReID',"HomeController@checkRegisterID");                   // 會員註冊檢查電子郵件是否重複

Route::get('/loginHomepage', "HomeController@loginHomepage")->middleware('check');  // 會員登入主頁

Route::get('/restaurant/{id}', "HomeController@restaurantDetail");                  // 餐廳、餐點頁面

Route::get('/orderDetail', "HomeController@orderDetail");                           // 訂單細項頁面

Route::get('/userOrderDetail/{id}', "HomeController@userOrderDetail");                   // 會員的目前、歷史訂單

Route::get('/userProfile/{id}', "HomeController@userProfile");                           // 會員個人資料頁

Route::get('/trackingOrder', "HomeController@trackingOrder");                       // 安排訂單後的頁面

Route::get('/session',"HomeController@checkMemberSession" );                        // 檢查會員session

Route::get('/QA',"HomeController@QandApage");                                        // 會員登入

Route::get('/about',"HomeController@aboutPage");                                        // 會員登入



//===============店家端======================
Route::get('/shop/login',"ShopController@rLogin");              // 店家登入

Route::post('/shop/login/check',"ShopController@rLogincheck");  // 店家登入驗證

Route::get('/shop/register',"ShopController@rRegister");        // 店家註冊

Route::post('/shop/register/check',"ShopController@rRegistercheck");        // 店家註冊驗證

Route::get('/shop/newOrder/{id}',"ShopController@newOrder");    // 店家畫面--新訂單

Route::get('/shop/processing/{id}',"ShopController@processing");// 店家畫面--處理中

Route::get('/shop/takeout/{id}',"ShopController@takeout");      // 店家畫面--待取餐

Route::get('/shop/user/{id}',"ShopController@user");            // 店家畫面--店家資訊


//===============後端=================
Route::get('/BackEnd/login','BackEnd@loginIndex');              // 管理端登入畫面

Route::post('/BackEnd/login/check','BackEnd@bLogincheck');      // 管理端登入驗證

Route::get('/BackEnd/coupon','BackEnd@couponIndex');            // 管理端畫面--優惠券

Route::get('/BackEnd/member','BackEnd@memberIndex');            // 管理端畫面--會員

Route::get('/BackEnd/order','BackEnd@orderIndex');              // 管理端畫面--訂單

Route::get('/BackEnd/restaurant','BackEnd@restaurantIndex');    // 管理端畫面--餐廳

// 待移除

Route::resource('coupon','CouponController');

Route::resource('member','MemberController');

Route::resource('shop','ShopController');

Route::resource('meal','MealController');

Route::resource('orders','OrdersController');

// =======會員忘記密碼=======

Route::post('/reset',"HomeController@reset");

Route::get('/reset/resetform/{token}',"HomeController@resetForm");

Route::post('/reset/resetpassword',"HomeController@resetPassword");

//======web-socket=======
Route::post('/socket/clientsend',"HomeController@clientSend");

Route::post('/socket/shopsend',"HomeController@shopSend");

