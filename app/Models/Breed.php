<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public static $rules = [
        "name" => "required|min:2",
        "max_hp" => "required|int",
        "cuteness" => "required|int",
        "fur_thickness" => "required|int",
        "claw_sharpness" => "required|int",
        "rarity_id" => "required"
    ];

    function cats(){
        $this->hasMany('Cats');
    }
}