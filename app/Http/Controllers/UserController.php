<?php
namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Request;

class UserController extends Controller
{
    public function getIndex()
    {
        return view('users.index')->with('users',User::all());
    }
    
    public function getDetail($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('users.detail')->with('user', $user);
        }
        return redirect('admin/users');
    }
    
    public function getEdit($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('users.edit')->with('user', $user);
        }
        return redirect('admin/users');
    }
    
    public function postEdit($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            $validator = Validator::make(Request::all(), User::$rules);

            if ($validator->passes())
            { 
                $user->name = Request::input('name');
                $user->coins = Request::input('coins');
                $user->save(); 
            }
            else
            {
                return redirect('admin/users/edit/'.$id)->withErrors($validator)->withInput()->with('user',$user);
            }
        }
        return redirect('admin/users');
    }
    
    public function postDelete($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->delete();
        }
        return redirect('admin/users');
    }
}