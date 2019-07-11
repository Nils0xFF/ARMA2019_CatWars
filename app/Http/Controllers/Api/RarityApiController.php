<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Rarity;
use Validator;
use Request;
use Image;
use File;

class RarityApiController extends Controller
{
    public function index()
    {
        return response()->json(Rarity::all());
    }
    
    public function show($id)
    {
        $rarity = Rarity::find($id);
        if($rarity)
        {
            return response()->json($rarity);
        }
        else return response()->json(['error' => 'Not Found'],404);
    }
     
}