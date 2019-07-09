<?php
namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Breed;

class CatController extends Controller
{
    public function getIndex()
    {
        return view('cats.index')->with('cats',Cat::all())->with('breeds',Breed::all());
    }
}