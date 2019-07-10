<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    public static $rules = [
        "name" => "required|min:2",
        "price" => "required|int|gte:0",
    ];

    function breeds(){
        return $this->hasMany('Breed');
    }
}