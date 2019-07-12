<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Quest;
use Validator;
use Request;
use Image;
use File;

class QuestApiController extends Controller
{
    public function index()
    {
        return response()->json(Quest::all());
    }
    
    public function show($id)
    {
        $quest = Quest::find($id);
        if($quest)
        {
            return response()->json($quest);
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