<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Auth;


class InitController extends Controller
{
    public function createRoles()
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);

        return redirect('home');
    }

    public function makeMeAdmin()
    {
        if(Auth::user()){
            Auth::user()->assignRole('admin');
        }

        return redirect('home');
    }

}
