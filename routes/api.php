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

Route::get('/coupon', 'BackEnd@couponAll');
Route::post('/coupon', 'BackEnd@couponInsert');

Route::get('/member', 'BackEnd@memberAll');

Route::get('/shop', 'BackEnd@shopAll');

Route::get('/meal/{id}', function($id) {
    return response()->json(App\Meal::where('ShopID', $id)->get(), 200);
 
});

Route::get('/shop/{id}', function($id) {
    return response()->json(Shop::where('ShopID', $id)->first(), 200);
     
});

Route::post('/coupon', 'BackEnd@couponInsert');

Route::put('/coupon/{id}', 'BackEnd@couponUpdate');

// 測試用
Route::get('/coupon/{id}', function($id) {
    return response()->json(App\Coupon::find($id), 200);
});

// Route::post('/test/', function(Request $request) {
//     $post = new Coupon;
//     $post->title = $request->input('title', '沒有標題');
//     $post->body = $request->input('body', '沒有內文。');
//     $ok = $post->save();

//     return response()->json(['ok' => $ok], 200);
// });

Route::delete('/coupon/{id}', "BackEnd@couponDelete");




?>