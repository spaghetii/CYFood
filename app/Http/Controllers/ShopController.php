<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Shop;
use Storage;
use Session;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{
    function newOrder($id){
        $shopName = Session::get("shopName" , "Guest");
        if($shopName == "Guest"){
            return view("errors.404");
        }
        return view('Client.newOrder',compact("id"));
    }
    function processing($id){
        $shopName = Session::get("shopName" , "Guest");
        if($shopName == "Guest"){
            return view("errors.404");
        }
        return view('Client.processing',compact("id"));
    }
    function takeout($id){
        $shopName = Session::get("shopName" , "Guest");
        if($shopName == "Guest"){
            return view("errors.404");
        }
        return view('Client.takeout',compact("id"));
    }
    function user($id){
        $shopName = Session::get("shopName" , "Guest");
        if($shopName == "Guest"){
            return view("errors.404");
        }
        return view('Client.user',compact("id"));
    }
    function rLogin(){
        return view("shop.login");
    }
    function rRegister(){
        return view("shop.register");
    }

    function rLogincheck(Request $request){
        $shop = DB::table("shops")->where("ShopEmail",$request->loginEmail)->first();
        if($shop){
            if(Hash::check($request->loginPassword, $shop->ShopPassword)){
                Session::put('shopName', $shop->ShopName);
                
                return response()->json(['ok' => true , 'id' => $shop->ShopID], 200);
            }else{
                return response()->json(['ok' => false], 200);
            }
        }else{
            return response()->json(['ok' => false], 200);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("test.shop");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $shop = new Shop();
        $shop->ShopName = $request->sname;
        $shop->ShopType = $request->stype;
        $shop->ShipTime = $request->stime;
        $shop->ShopAddress = $request->saddress;
        $shop->ShopEmail = $request->semail;
        $shop->ShopPhone = $request->sphone;
        
        
        $password = $request->spassword;
        $hashed = Hash::make($password);
        $shop->ShopPassword = $hashed;

        $avatar = $request->file('simage');
        if ($avatar->isValid()) {
            $path = Storage::putFile('public/uploads/shops', $avatar);
            $shop->ShopImage = Storage::url($path);
            
        }
        $shop->save();
        return redirect("/shop/create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
