<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    public static $rules = [
        "name" => "required|min:2",
        "chance" => "required|float"
    ];

    function breeds(){
        return $this->hasMany('App\Models\Breeds');
    }
}