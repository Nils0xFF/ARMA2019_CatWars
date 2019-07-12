<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Cat;
use Validator;
use Request;
use Image;
use File;

class CatApiController extends Controller
{
    public function index()
    {
        return response()->json(Cat::all());
    }
    
    public function show($id)
    {
        $cat = Cat::find($id);
        if($cat)
        {
            return response()->json($cat);
        }
        else return response()->json(['error' => 'Not Found'],404);
    }

    public function store(){
        return response()->json(['error'=>'Function Not Supported Yet.']);
    }

    public function update($id){
        return response()->json(['error'=>'Function Not Supported Yet.']);
    }

    public function destroy($id){
        return response()->json(['error'=>'Function Not Supported Yet.']);
    }
     
}