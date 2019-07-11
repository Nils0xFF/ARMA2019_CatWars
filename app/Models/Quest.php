<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public static $rules = [
        "name" => "required|min:2",
        "duration" => "required|int|gt:0",
        "reward" => "required|int|gt:0",
    ];

    function users() {
        return $this->belongsToMany('App\Model\User')->withTimestamps();
    }
}