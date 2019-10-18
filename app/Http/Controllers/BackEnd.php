<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Storage;
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

        if($adminName == "admin"){
            if($adminPassword == "admin"){
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
        $adminName = Session::get("adminname" , "Guest");
        if($adminName == "Guest"){
            return redirect("/BackEnd/login");
        }
        return view("BackEnd.coupon");
    }
    
    function memberIndex(){
        $adminName = Session::get("adminname" , "Guest");
        if($adminName == "Guest"){
            return redirect("/BackEnd/login");
        }
        return view("BackEnd.member");
    }
    
    function orderIndex(){
        $adminName = Session::get("adminname" , "Guest");
        if($adminName == "Guest"){
            return redirect("/BackEnd/login");
        }
        return view("BackEnd.order");
    }
    
    function restaurantIndex(){
        $adminName = Session::get("adminname" , "Guest");
        if($adminName == "Guest"){
            return redirect("/BackEnd/login");
        }
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

    function mealDelete($id) {
        $rows = Meal::destroy($id);
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

    function shopInsert(Request $request){
        $shop = new Shop;
        $shop->ShopName = $request->ShopName;
        $shop->ShopType = $request->ShopType;
        // $shop->ShipTime = $request->stime;
        $shop->ShopAddress = $request->ShopAddress;
        $shop->ShopEmail = $request->ShopEmail;
        $shop->ShopPhone = $request->ShopPhone;
        

        $password = $request->ShopPassword;
        $hashed = Hash::make($password);
        $shop->ShopPassword = $hashed;

        if ($request->hasFile('ShopImage')) {
            //
            $avatar = $request->file('ShopImage');
            
            if ($avatar->isValid()) {
                $path = Storage::putFile('public/uploads/shops', $avatar);
                $shop->ShopImage = Storage::url($path); 
            }

        }
        
        if($shop->save()){
            return response()->json(['ok' => true], 200);
        }
    }

    function mealInsert(Request $request, $id) {

        foreach ($request->meals as $key => $value) {
            $meal = new Meal;
            $meal->MealName = $value["MealName"];
            $meal->MealDesc = $value["MealDesc"];
            $meal->MealPrice = $value["MealPrice"];
            $meal->MealType = $value["MealType"];
            $meal->MealDetails = $value["MealDetails"];
            $meal->MealQuantity = $value["MealQuantity"];
            $meal->ShopID = $id;
            $ok = $meal->save();
        }
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

        $OrdersDetails = json_decode($request->OrdersDetails,true);
        
        if ($OrdersDetails["coupon"]) {
            $coupon = Coupon::where('CouponCode', $OrdersDetails["coupon"])->first();
            if($coupon){
                $coupon->CouponStatus = false;
                $coupon->save();
            }
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
        return response()->json(['ok' => $ok , 'OrdersNum' => $OrdersNum], 200);
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
        $shop = Shop::find($id);
        if ($shop) {
            $shop->ShopName = $request->ShopName;
            $shop->ShopType = $request->ShopType;
            $shop->ShopAddress = $request->ShopAddress;
            $shop->ShopEmail = $request->ShopEmail;
            $shop->ShopPhone = $request->ShopPhone;
            $ok = $shop->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    function mealUpdate(Request $request, $id) {
        $ok='';
        $log = "";
        $meal = Meal::find($request->meals[0]["MealID"]);
        if ($meal) {
            foreach ($request->meals as $key => $value) {
                $meal = Meal::find($value["MealID"]);
                if ($id == $meal->ShopID){                  // 檢查shopid防止修改錯誤
                    $meal->MealName = $value["MealName"];
                    $meal->MealDesc = $value["MealDesc"];
                    $meal->MealPrice = $value["MealPrice"];
                    $meal->MealType = $value["MealType"];
                    $meal->MealDetails = $value["MealDetails"];
                    $meal->MealQuantity = $value["MealQuantity"];
                    $ok = $meal->save();
                }
                if (!$ok) $log = 'Error';
            }
        } else {
            $log = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'log' => $log], 200);
    }

    function memberUpdate(Request $request, $id) {
        $ok='';
        $msg = "";
        $member = Member::find($id);
        if ($member) {
            $member->MemberName = $request->MemberName;
            $member->MemberEmail = $request->MemberEmail;
            $member->MemberPhone = $request->MemberPhone;
            $member->MemberPassword = Hash::make($request->MemberPassword);
            $member->MemberPermission = $request->MemberPermission;
            $ok = $member->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }

    ////////////////   餐廳端修改密碼相關   ////////////////

    function checkPassword(Request $request,$id){
        $shop = Shop::find($id);
        if(!Hash::check($request->ShopPassword, $shop->ShopPassword)){
            
            return response()->json(['passwordError' => true], 200);
        }
    }

    function changeShopPwd(Request $request, $id) {
        $ok='';
        $msg = "";
        $shop = Shop::find($id);
        if ($shop) {
            $shop->ShopPassword = Hash::make($request->ShopPassword);
            $ok = $shop->save();
            if (!$ok) $msg = 'Error';
            else $msg = "suessfull";
        } else {
            $msg = ' cant find anything';
        }
        return response()->json(['ok' => $ok, 'msg' => $msg], 200);
    }
    
    ////////////////   檢查優惠券   ////////////////
    
    function couponCheck(Request $request){
        $coupon = DB::table('coupons')->where('CouponCode', $request->CouponCode)->first();

        if($coupon){
            if($coupon->CouponStatus == false){
                return response()->json(['ok' => false], 200); 
            }
                return response()->json(['ok' => true], 200);
        }
        return response()->json(['ok' => false], 200);
        
    }
}
