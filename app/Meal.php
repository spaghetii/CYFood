<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    //
    protected $table = "meals";
    protected $primaryKey = "MealID";
    public $timestamps = false;

    public function shop(){
       return  $this->hasOne(Shop::class , "ShopID");
    }

    public function orders(){
        return $this->hasMany(Orders::class , "MealID");
    }
}
