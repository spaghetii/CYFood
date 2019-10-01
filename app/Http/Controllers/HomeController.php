<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;
use Mail;
use App\Member;

class HomeController extends Controller
{
    function index() {
        return view('home.index');
    }

    function loginHomepage() {
        return view('home.loginHomepage');
    }

    function restaurantDetail() {
        return view('home.restaurantDetail');
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
        $member->MemberPassword = $request->newPassword;
        if($member->save()){
            return response()->json(['ok' => true], 200);
        }
        
    }
}
