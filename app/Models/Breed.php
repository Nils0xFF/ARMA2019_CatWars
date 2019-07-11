<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public static $rules = [
        "name" => "required|min:2",
        "max_hp" => "required|int|gt:0",
        "cuteness" => "required|int|gt:0",
        "fur_thickness" => "required|int|gt:0",
        "claw_sharpness" => "required|int|gt:0",
        "rarity_id" => "required",
        "breedImage" => "required"
    ];

    function rarity(){
        return $this->belongsTo('App\Models\Rarity');
    }

    function cats(){
        return $this->hasMany('App\Models\Cat');
    }

    function packs(){
        return $this->belongsToMany('App\Models\Packs');
    }
}