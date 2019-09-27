<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = "orders";
    protected $primaryKey = "OrdersID";
    public $timestamps = false;

    public function member(){
        return $this->hasOne(Member::class, 'MemberID');
    }

    public function meal(){
        return $this->hasOne(Meal::class, 'MealID');
    }
}
