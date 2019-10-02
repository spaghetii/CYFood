<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use Storage;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{
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
