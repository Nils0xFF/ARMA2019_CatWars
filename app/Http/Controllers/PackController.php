<?php
namespace App\Http\Controllers;

use App\Models\Pack;

class PackController extends Controller
{
    public function getIndex()
    {
        $pack = new Pack();
        $pack->name = "Test Pack";
        $pack->save();

        return view('packs.index')->with('packs',Pack::all());
    }
}