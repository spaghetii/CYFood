<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Member;
use App\Shop;

class BackEnd extends Controller
{
    function couponIndex(){
        return view("BackEnd.coupon");
    }
    
    function memberIndex(){
        return view("BackEnd.member");
    }
    
    function orderIndex(){
        return view("BackEnd.order");
    }
    
    function restaurantIndex(){
        return view("BackEnd.restaurant");
    }
    
    function couponAll() {
        return response()->json(Coupon::all(), 200);
    }

    function memberAll() {
        return response()->json(Member::all(), 200);
    }

    function shopAll() {
        return response()->json(Shop::all(), 200);
    }

    function couponSelect($id) {
        return response()->json(Coupon::find($id), 200);
    }

    function couponDelete($id) {
        $rows = Coupon::destroy($id);
        $ok = ($rows > 0);
        return response()->json(['ok' => $ok], 200);
    }
}
