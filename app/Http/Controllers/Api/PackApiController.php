<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Pack;
use Validator;
use Request;
use Image;
use File;

class PackApiController extends Controller
{
    public function index()
    {
        return response()->json(Pack::all());
    }
    
    public function show($id)
    {
        $pack = Pack::find($id);
        if($pack)
        {
            return response()->json($pack);
        }
        else return response()->json(['error' => 'Not Found'],404);
    }
     
}