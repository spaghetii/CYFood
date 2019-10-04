<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Crypt;
use Mail;
use Session;
use App\Member;

class HomeController extends Controller
{
    function index() {
        return view('home.index');
    }

    function loginHomepage() {
        return view('home.loginHomepage');
    }

    function restaurantDetail($id) {
        return view('home.restaurantDetail',compact("id"));
    }

    function orderDetail() {
        return view('home.orderDetail');
    }

    function userOrderDetail() {
        return view('home.userOrderDetail');
    }

    function userProfile() {
        return view('home.userProfile');
    }

    function trackingOrder() {
        return view('home.trackingOrder');
    }

   function newOrder(){
       return view('Client.newOrder');
   }
   function processing(){
       return view('Client.processing');
   }
   function takeout(){
       return view('Client.takeout');
   }
   function user(){
       return view('Client.user');
   }
   

    function rLogin(){
        return view("restaurant.login");
    }

    public function rRegister(){
        return view("restaurant.register");
    }

    function sayHello(Request $request) {
        // return view("home.hello", 
        //     [ "who" => $request->userName ]);    //較常用
        return view("home.hello")->withwho($request->userName); //不建議用
    }

    function login(){
        return view("home.login");
    }

    function logincheck(Request $request){
        $member = DB::table("members")->where("MemberEmail",$request->loginEmail)->first();
        if($member){
            Session::put('userName', $member->MemberName);
            if(Hash::check($request->loginPassword, $member->MemberPassword)){
                return response()->json(['ok' => true], 200);
            }else{
                return response()->json(['ok' => false], 200);
            }
        }else{
            return response()->json(['ok' => false], 200);
        }
    }

    function reset(Request $request){
        
        $member = DB::table("members")->where("MemberEmail",$request->email)->first();
        if($member){
            $memberName =$member->MemberName;
            $memberID =$member->MemberID;
            $memberEmail =$member->MemberEmail;
            $encryptID = Crypt::encrypt($memberID);
            
            $to = ['email'=>$memberEmail];
            

            $data = ['name' => $memberName , 'token' => $encryptID ];
            // Mail::send('email.welcome', $data, function($message) use($memberEmail) {
            // $message->to($memberEmail)->subject('CYFood 會員密碼重置');
            // });
            return response()->json(['ok' => true], 200);
            
        }else{
            echo "請輸入正確的電子信箱";
        }

    }

    function resetForm($token){
        return view("home.resetform",compact('token'));
    }

    function resetPassword(Request $request){
        $decryptID = Crypt::decrypt($request->token);
        $member = Member::find($decryptID);
        $password = $request->newPassword;
        $hashed = Hash::make($password);
        $member->MemberPassword = $hashed;
        if($member->save()){
            return response()->json(['ok' => true], 200);
        }
        
    }
}
