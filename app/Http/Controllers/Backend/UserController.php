<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use DB;

use App\Models\User;
use Validator;
use Request;

class UserController extends Controller
{
    public function getIndex()
    {
        $users = User::paginate(8);
        $uid_cats = array();
        foreach(DB::select('SELECT u.id, count(c.breed_id) as catnumber FROM users u JOIN cats c ON c.user_id = u.id GROUP BY u.id') as $entry){
            $uid_cats[$entry->id]  = $entry->catnumber;
        }
        return view('backend.users.index')->with('users',$users)->with('uid_cats',$uid_cats);
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