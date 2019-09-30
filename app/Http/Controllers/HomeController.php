<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('home.index');
    }

    function loginHomepage() {
        return view('home.loginHomepage');
    }

   function newOrder(){
       return view('Client.newOrder');
   }
   function processing(){
       return view('Client.processing');
   }
   function user(){
       return view('Client.user');
   }

   function rLogin(){
       return view("restaurant.login");
   }

   function rRegister(){
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

}
