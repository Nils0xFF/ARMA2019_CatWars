<?php
namespace App\Http\Controllers;

use App\Models\Breed;

class BreedController extends Controller
{
    public function getIndex()
    {
        return view('breeds.index')->with('breeds',Breed::all());
    }
}