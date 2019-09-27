<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use Storage;

class MealController extends Controller
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
        return view("test.meal");
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
        $meal = New Meal();
        $meal->MealName = $request->mname;
        $meal->MealDesc = $request->mdesc;
        $meal->MealPrice = $request->mprice;
        $meal->MealType = $request->mtype;
        $meal->MealDetails = $request->mdetails;
        $meal->MealQuantity = $request->mquantity;
        $meal->ShopID = $request->sID;

        $avatar = $request->file('mimage');
        if ($avatar->isValid()) {
            $path = Storage::putFile('public/uploads/meals', $avatar);
            $meal->MealImage = Storage::url($path);
            
        }
        $meal->save();
        return redirect("/meal/create");
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
