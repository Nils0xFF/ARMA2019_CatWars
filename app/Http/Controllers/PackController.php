<?php
namespace App\Http\Controllers;

use App\Models\Pack;

class PackController extends Controller
{
    public function getIndex()
    {
        return view('packs.index')->with('packs',Pack::all());
    }
}