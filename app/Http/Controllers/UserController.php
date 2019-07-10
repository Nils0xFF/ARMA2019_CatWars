<?php
namespace App\Http\Controllers;

use Validator;
use App\Models\User;

class UserController extends Controller
{
    public function getIndex()
    {
        return view('users.index')->with('users',User::all());
    }
    
    public function getEdit($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('users.edit')->with('user', $user);
        }
        return redirect('users');
    }
    
    public function postEdit($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->name = Request::input('name');
            $user->coins = Request::input('coins');
            $user->save(); 
        }
        return redirect('users');
    }
}