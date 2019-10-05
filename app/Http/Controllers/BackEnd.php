<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Orders;
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

    function orderAll() {
        return response()->json(Orders::all(), 200);
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

    function orderDelete($id) {
        $rows = Orders::destroy($id);
        $ok = ($rows > 0);
        return response()->json(['ok' => $ok], 200);
    }

    function couponInsert(Request $request) {
        $coupon = new Coupon;
        $coupon->CouponCode = $request->CouponCode;
        $coupon->CouponType = $request->CouponType;
        $coupon->CouponDiscount = $request->CouponDiscount;
        $coupon->CouponStart = $request->CouponStart;
        $coupon->CouponDeadline = $request->CouponDeadline;
        $ok = $coupon->save();
        return response()->json(['ok' => $ok], 200);
    }
    
    function memberInsert(Request $request) {
        $member = new Member;
        $member->MemberName = $request->MemberName;
        $member->MemberEmail = $request->MemberEmail;
        $member->MemberPhone = $request->MemberPhone;
        $member->MemberPassword = $request->MemberPassword;
        $ok = $member->save();
        return response()->json(['ok' => $ok], 200);
    }

    function couponUpdate(Request $request, $id) {
        $ok='';
        $msg = "";
        $coupon = Coupon::find($id);
        if ($coupon) {
            $coupon->CouponCode = $request->CouponCode;
            $coupon->CouponType = $request->CouponType;
            $coupon->CouponDiscount = $request->CouponDiscount;
            $coupon->CouponStart = $request->CouponStart;
            $coupon->CouponDeadline = $request->CouponDeadline;
            $ok = $coupon->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    function orderUpdate(Request $request, $id) {
        $ok='';
        $msg = "";
        $order = Orders::find($id);
        if ($order) {
            $order->OrdersFinish = $request->OrdersFinish;
            $ok = $order->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }
    
}
