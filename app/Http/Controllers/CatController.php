<?php
namespace App\Http\Controllers;

use App\Models\Cat;

class CatController extends Controller
{
    public function getIndex()
    {
        return view('cats.index')->with('cats',Cat::all());
    }
}