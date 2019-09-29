<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class BackEnd extends Controller
{
    function couponIndex(){
        return view("BackEnd.coupon");
    }

    function couponAll() {
        return response()->json(Coupon::all(), 200);
    }

    function couponDelete($id) {
        $rows = Coupon::destroy($id);
        $ok = ($rows > 0);
        return response()->json(['ok' => $ok], 200);
    }
}
