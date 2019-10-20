<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// coupon
// 顯示全部優惠券
Route::get('/coupon', 'BackEnd@couponAll');
// 新增優惠券
Route::post('/coupon', 'BackEnd@couponInsert');
// 修改優惠券資訊
Route::put('/coupon/{id}', 'BackEnd@couponUpdate');
// 刪除優惠
Route::delete('/coupon/{id}', "BackEnd@couponDelete");
// orderdetail checkcoupon
Route::post('/coupon/check',"BackEnd@couponCheck");

// order
// 顯示全部訂單
Route::get('/order', 'BackEnd@orderAll');
// 根據orderNum抓到資料
Route::get('/order/{ordernum}', function($ordernum){
    return response()->json(App\Orders::where('OrdersNum', $ordernum)->first(), 200);
});
// 根據shopID抓到資料
Route::get('/order/shop/{id}', function($id){
    return response()->json(App\Orders::where('ShopID', $id)->get(), 200);
});
// 根據memberID抓到資料
Route::get('/order/member/{id}', function($id){
    return response()->json(App\Orders::where('MemberID', $id)->get(), 200);
});
// 新增資料
Route::post('/order', 'BackEnd@orderInsert');
// 修改訂單資訊
Route::put('/order/{id}', 'BackEnd@orderUpdate');
// 刪除訂單
Route::delete('/order/{id}', "BackEnd@orderDelete");


// member
// 顯示全部會員
Route::get('/member', 'BackEnd@memberAll');
// 新增會員
Route::post('/member', 'BackEnd@memberInsert');
// 修改會員資訊
Route::put('/member/{id}', 'BackEnd@memberUpdate');
// 驗證會員密碼
Route::post('/member/checkpwd/{id}',"BackEnd@checkMemberPwd");
// 修改會員密碼
Route::put('/member/changepwd/{id}',"BackEnd@changeMemberPwd");
// 修改會員信用卡
Route::put('/member/changecredit/{id}',"BackEnd@changeMemberCredit");

// shop
// 顯示全部店家
Route::get('/shop', 'BackEnd@shopAll');
// 抓取單項商店資料
Route::get('/shop/{id}', function($id) {
    return response()->json(App\Shop::where('ShopID', $id)->first(), 200);     
});
//新增資料
Route::post('/shop','BackEnd@shopInsert');
// 修改店家資訊
Route::put('/shop/{id}', 'BackEnd@shopUpdate');
// 刪除店家
Route::delete('/shop/{id}', "BackEnd@shopDelete");
// 驗證店家密碼
Route::post('/shop/checkpwd/{id}',"BackEnd@checkShopPwd");
// 修改店家密碼
Route::put('/shop/changepwd/{id}',"BackEnd@changeShopPwd");

//meal
// 根據店家編號顯示餐點
Route::get('/meal/{id}', function($id) {
    return response()->json(App\Meal::where('ShopID', $id)->get(), 200);
});
// 新增店家餐點
Route::post('/meal/{id}','BackEnd@mealInsert');
// 修改店家的餐點資訊
Route::put('/meal/{id}', 'BackEnd@mealUpdate');
// 刪除餐點
Route::delete('/meal/{id}', "BackEnd@mealDelete");



// 測試用
Route::get('/coupon/{id}', function($id) {
    return response()->json(App\Coupon::find($id), 200);
});

Route::get('/member/{id}', function($id) {
    return response()->json(App\Member::find($id), 200);     
});

Route::get('/testorder',"BackEnd@ordertest")

?>