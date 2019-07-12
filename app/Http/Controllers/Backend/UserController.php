<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\User;
use Validator;
use Request;

class UserController extends Controller
{
    public function getIndex()
    {
        $users = User::paginate(8);
        return view('backend.users.index')->with('users',$users);
    }
    
    public function getDetail($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('backend.users.detail')->with('user', $user);
        }
        return back();
    }
    
    public function getEdit($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('backend.users.edit')->with('user', $user);
        }
        return back();
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
                return back()->withErrors($validator)->withInput()->with('user',$user);
            }
        }
        return view('backend.users.index');
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