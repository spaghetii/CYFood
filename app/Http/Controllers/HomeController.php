<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('home.index');
    }

   function newOrder(){
       return view('Client.newOrder');
   }
   function processing(){
       return view('Client.processing');
   }

    function sayHello(Request $request) {
        // return view("home.hello", 
        //     [ "who" => $request->userName ]);    //較常用
        return view("home.hello")->withwho($request->userName); //不建議用
    }

}
