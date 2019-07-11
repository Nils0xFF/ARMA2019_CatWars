<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\User;
use Validator;
use Request;
use Image;
use File;

class UserApiController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }
    
    public function show($id)
    {
        $user = User::find($id);
        if($user)
        {
            return response()->json($user);
        }
        else return response()->json(['error' => 'Not Found'],404);
    }
     
}