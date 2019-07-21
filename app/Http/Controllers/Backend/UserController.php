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
        $users = User::withCount('cats')->paginate(8);
        $breeds_user = countBreedsForUser();
        return view('backend.users.index')->with('users',$users)->with('breeds_user',$breeds_user);
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
        return redirect('admin/users');
    }
    
    public function postDelete($id = null)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->delete();
        }
        return back();
    }
}


function countBreedsForUser(){
    $users = User::with('cats')->get();
    $arr = array();
    foreach ($users as $user) $arr[$user->id] = $user->cats->pluck('id','breed_id')->count();
    return $arr;
}