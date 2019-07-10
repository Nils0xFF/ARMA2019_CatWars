<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Breed;

class CatController extends Controller
{
    public function getIndex()
    {
        $cats = Cat::all(); //orderBy('current_hp','desc')->get();
        $breeds = Breed::all();
        return view('cats.index')->with('cats',$cats)->with('breeds',$breeds);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
