<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $table = "shops";
    protected $primaryKey ="ShopID";
    public $timestamps = false;

    public function meal(){
        return $this->hasMany(Meal::class, 'ShopID');
    }
}
