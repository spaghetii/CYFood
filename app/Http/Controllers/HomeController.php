<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Crypt;
use Mail;
use Session;
use App\Member;
use App\Coupon;
use App\Events\OrdersEvent;

class HomeController extends Controller
{
    function index() {
        // $lastpage = Session::get('lastPage',"/loginHomepage");
        // dd($lastpage);
        return view('home.index');
    }

    function loginHomepage() {
        return view('home.loginHomepage');
    }

    function restaurantDetail($id,Request $request) {
        // $url = "/restaurant"."/".$request->route('id');
        // dd($id);
        $test = $id;
        
        // dd($url);
        
        return view('home.restaurantDetail',compact("id"));      
    }

    function orderDetail() {
        return view('home.orderDetail');
    }

    function userOrderDetail() {
        $userName = Session::get("userName" , "Guest");
        
        if($userName == "Guest"){
            return redirect("/login");
        }else{
            return view('home.userOrderDetail');
        }
        
    }

    function userProfile() {
        $userName = Session::get("userName" , "Guest");
        
        // dd($userName);
        if($userName == "Guest"){
            return redirect("/login");
        }else{
            return view('home.userProfile');
        }
        
    }

    function trackingOrder() {
        return view('home.trackingOrder');
    }


    function login(){
        return view("home.login");
    }

    function logincheck(Request $request){
        $member = DB::table("members")->where("MemberEmail",$request->loginEmail)->first();
        if($member){
            if(Hash::check($request->loginPassword, $member->MemberPassword)){
                Session::put('userName', $member->MemberName);
                
                return response()->json(['ok' => true , 'id' => $member->MemberID 
                , 'name' => $member->MemberName], 200);
            }else{
                return response()->json(['ok' => false], 200);
            }
        }else{
            return response()->json(['ok' => false], 200);
        }
    }

    function logout(){
        Session::forget('userName');
        return response()->json(['ok' => true], 200);
    }

    function reset(Request $request){
        $member = DB::table("members")->where("MemberEmail",$request->email)->first();
        if($member){
            $memberName =$member->MemberName;
            $memberID =$member->MemberID;
            $memberEmail =$member->MemberEmail;
            $encryptID = Crypt::encrypt($memberID);
            
            $me = Member::find($memberID);
            
            $me->token = $encryptID;
            $me->save();
            
            $to = ['email'=>$memberEmail];
            $data = ['name' => $memberName , 'token' => $encryptID ];

            Mail::send('email.welcome', $data, function($message) use($memberEmail) {
            $message->to($memberEmail)->subject('CYFood 會員密碼重置');
            });
            return response()->json(['ok' => true], 200);
            
        }else{
            echo "請輸入正確的電子信箱";
        }
    }

    function resetForm($token){
        $decryptID = Crypt::decrypt($token);
        $member = Member::find($decryptID);

        if($token == $member->token){
            return view("home.resetform");
        }else{
            return redirect("/");
        }
    }

    function resetPassword(Request $request){
        $decryptID = Crypt::decrypt($request->token);
        $member = Member::find($decryptID);
        $password = $request->newPassword;
        $hashed = Hash::make($password);
        $member->MemberPassword = $hashed;
        $member->token = "";
        if($member->save()){
            return response()->json(['ok' => true], 200);
        }
        
    }

    function checkRegister(Request $request) {
        $register = DB::table("members")->where("MemberEmail",$request->registerEmail)->first();
        //
        if($register){
            return response()->json(['ok' => false], 200);
        }
        else{
            


            //註冊
            $me =new Member();
            $me->MemberName = $request->registerName;
            $me->MemberEmail = $request->registerEmail;
            $me->MemberPhone = $request->registerPhone;
            $password = $request->registerPassword;
            $hashed = Hash::make($password);
            $me->MemberPassword = $hashed;
            $me->save();

            //生成隨機優惠券代碼並存入資料庫
            $code = "0123456789abcdefghijklmnopqrstuvwxyz";
            $n = 10;
            $new ="";
            $len = strlen($code)-1;
            for($i=0 ; $i<$n; $i++){
            $new .= $code[rand(0,$len)];
            }
            
            $coupon =new Coupon();
            $coupon->CouponCode = $new;
            $coupon->CouponType = "freeship";
            $coupon->CouponStart = "2019-10-09";
            $coupon->CouponDeadline = "2019-10-30";
            $coupon->save();
            return response()->json(['ok' => true , 'coupon' => $new], 200);
        }
    }

    function checkRegisterID(Request $request){
        $checkID = DB::table("members")->where("MemberEmail",$request->registerEmail)->first();

        if($checkID){
            return response()->json(['ok' => false], 200);
        }else{
            return response()->json(['ok' => true], 200);
        }
    }

    public function checkMemberSession(){
        $userName = Session::get("userName" , "Guest");
        return response()->json(['name' => $userName], 200);        
    }

    //=================websocket↓======================

    function clientSend(Request $request){
        $header = $request->header;
        $id = $request->id;
        broadcast (new OrdersEvent($header,$id))->toOthers();
        
    }

    function shopSend(Request $request){
        $header = $request->header;
        $id = $request->id;
        $type =$request->type;
        $message = $request->message;
        broadcast (new OrdersEvent($header,$id,$type,$message))->toOthers();
        
    }

}
