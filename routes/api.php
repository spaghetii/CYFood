<?php

use Illuminate\Http\Request;
use App\Shop;

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

// shop
// 顯示全部
Route::get('/shop', 'BackEnd@shopAll');



// 測試用
Route::get('/coupon/{id}', function($id) {
    return response()->json(App\Coupon::find($id), 200);
});

Route::get('/shop/{id}', function($id) {
    return response()->json(Shop::where('ShopID', $id)->first(), 200);     
});

Route::get('/member/{name}', function($name) {
    return response()->json(App\Member::where('MemberName', $name)->first(), 200);     
});

Route::get('/meal/{id}', function($id) {
    return response()->json(App\Meal::where('ShopID', $id)->get(), 200);
});

?>