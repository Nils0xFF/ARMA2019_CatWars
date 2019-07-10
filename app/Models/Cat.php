<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public static $rules = [
        "user_id" => "required",
        "breed_id" => "required",
        "fur_thickness" => "required|int|gt:0",
    ];

    function breed(){
        return $this->belongsTo('App\Models\Breed');
    }
}