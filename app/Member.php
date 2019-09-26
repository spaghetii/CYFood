<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = "members";
    protected $primaryKey = "MemberID";
    public $timestamps = false;

    public function orders(){
        return $this->hasMany(Orders::class , "MealID");
    }
}
