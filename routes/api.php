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
// 顯示全部
Route::get('/coupon', 'BackEnd@couponAll');
// 新增資料
Route::post('/coupon', 'BackEnd@couponInsert');
// 修改優惠
Route::put('/coupon/{id}', 'BackEnd@couponUpdate');
// 刪除
Route::delete('/coupon/{id}', "BackEnd@couponDelete");

//order
// 顯示全部
Route::get('/order', 'BackEnd@orderAll');
// 根據shopID抓到資料
Route::get('/order/{id}', function($id){
    return response()->json(App\Orders::where('ShopID', $id)->get(), 200);
});
// 新增資料
Route::post('/order', 'BackEnd@orderInsert');
// 修改訂單
Route::put('/order/{id}', 'BackEnd@orderUpdate');
// 刪除
Route::delete('/order/{id}', "BackEnd@orderDelete");


// member
// 顯示全部
Route::get('/member', 'BackEnd@memberAll');
// 新增資料
Route::post('/member', 'BackEnd@memberInsert');
// 修改會員資料
Route::put('/member/{id}', 'BackEnd@memberUpdate');

// shop
// 顯示全部
Route::get('/shop', 'BackEnd@shopAll');
// 抓取單項商店資料
Route::get('/shop/{id}', function($id) {
    return response()->json(App\Shop::where('ShopID', $id)->first(), 200);     
});
//新增資料
Route::post('/shop','BackEnd@shopInsert');

Route::put('/shop/{id}', 'BackEnd@shopUpdate');

Route::delete('/shop/{id}', "BackEnd@shopDelete");

//meal
//顯示
Route::get('/meal/{id}', function($id) {
    return response()->json(App\Meal::where('ShopID', $id)->get(), 200);
});

Route::put('/meal/{id}', 'BackEnd@mealUpdate');


// 測試用
Route::get('/coupon/{id}', function($id) {
    return response()->json(App\Coupon::find($id), 200);
});

Route::get('/member/{name}', function($name) {
    return response()->json(App\Member::where('MemberName', $name)->first(), 200);     
});

Route::get('/testorder',"BackEnd@ordertest")

?>