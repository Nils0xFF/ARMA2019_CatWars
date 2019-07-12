<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public static $create_rules = [
        "user_id" => "required",
        "breed_id" => "required",
    ];
    public static $edit_rules = [
        "user_id" => "required",
        "breed_id" => "required",
        "current_hp" => "required|gte:0"
    ];

    function breed(){
        return $this->belongsTo('App\Models\Breed');
    }

    function user(){
        return $this->belongsTo('App\Models\User');
    }
}