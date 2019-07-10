<?php
namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getIndex()
    {
        return view('users.index')->with('users',User::all());
    }

    public function create()
    {
        
    }
}