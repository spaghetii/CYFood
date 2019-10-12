<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Orders;
use App\Member;
use App\Shop;
use App\Meal;
use Session;

class BackEnd extends Controller
{
    function loginIndex(){
        return view("BackEnd.login");
    }

    function bLogincheck(Request $request){
        $adminName = $request->adminName;
        $adminPassword = $request->adminPassword;

        if($adminName == "AI0101cyfood"){
            if($adminPassword == "admincyfood0101"){
                Session::put('adminname', $adminName);
                return redirect("/BackEnd/order");
            }else{
                return redirect("/BackEnd/login");
            }
        }else{
                return redirect("/BackEnd/login");
        }
    }

    ////////////////   index   ////////////////

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
    
    ////////////////   get all data   ////////////////

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

    ////////////////   delete by id   ////////////////

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

    function shopDelete($id) {
        $rows = Shop::destroy($id);
        $ok = ($rows > 0);
        return response()->json(['ok' => $ok], 200);
    }

    ////////////////   insert new data   ////////////////

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

    function shopInsert(Request $request) {
        $shop = new Shop;
        $member->MemberName = $request->MemberName;
        $member->MemberEmail = $request->MemberEmail;
        $member->MemberPhone = $request->MemberPhone;
        $member->MemberPassword = $request->MemberPassword;
        $ok = $member->save();
        return response()->json(['ok' => $ok], 200);
    }

    function orderInsert(Request $request) {
        //產生流水號
        $order = Orders::max('OrdersNum');
        $date = date('Ymd');
        $subdate = substr($order, -11, -3);
        $suborder = substr($order, 2);
        // echo $order."<br>";
        // echo substr($order, -11, -3)."<br>"; 
        
        //判定日期
        if($date !== $subdate){
            $OrdersNum = "CY".$date."001";
            // echo $OrdersNum;
        }else{
            $suborder += 1;
            $OrdersNum ="CY".$suborder;
            // echo $OrdersNum;
        }

        $order = new Orders;
        $order->OrdersNum = $OrdersNum;
        $order->OrdersDetails = $request->OrdersDetails;
        $order->OrdersStatus = $request->OrdersStatus;
        // $order->OrdersCreate = $request->OrdersCreate;
        // $order->OrdersUpdate = $request->OrdersUpdate;
        $order->MemberID = $request->MemberID;
        $order->ShopID = $request->ShopID;
        $ok = $order->save();
        return response()->json(['ok' => $ok], 200);
    }
    
    ////////////////   update data   ////////////////

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
            $order->OrdersStatus = $request->OrdersStatus;
            $order->OrdersRemark = $request->OrdersRemark;
            $ok = $order->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    function shopUpdate(Request $request, $id) {
        $ok='';
        $msg = "";
        $order = Shop::find($id);
        if ($order) {
            $order->OrdersStatus = $request->OrdersStatus;
            $order->OrdersRemark = $request->OrdersRemark;
            $ok = $order->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    function mealUpdate(Request $request, $id) {
        $ok='';
        $msg = "";
        $order = Meal::find($id);
        if ($order) {
            $order->OrdersStatus = $request->OrdersStatus;
            $order->OrdersRemark = $request->OrdersRemark;
            $ok = $order->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    function memberUpdate(Request $request, $id) {
        $ok='';
        $msg = "";
        $member = Member::find($id);
        if ($member) {
            $member->MemberName = $request->MemberName;
            $member->MemberEmail = $request->MemberEmail;
            $member->MemberPhone = $request->MemberPhone;
            $member->MemberPassword = $request->MemberPassword;
            $member->MemberPermission = $request->MemberPermission;
            $ok = $member->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    function ordertest(){
        //產生流水號
        $order = Orders::max('OrdersNum');
        $date = date('Ymd');
        $subdate = substr($order, -11, -3);
        $suborder = substr($order, 2);
        echo $order."<br>";
        echo substr($order, -11, -3)."<br>"; 
        
        //判定日期
        if($date !== $subdate){
            $OrdersNum = "CY".$date."001";
            // echo $OrdersNum;
        }else{
            $suborder += 1;
            $OrdersNum ="CY".$suborder;
            echo $OrdersNum;
        }
    }
    
}
