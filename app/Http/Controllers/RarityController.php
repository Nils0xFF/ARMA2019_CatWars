<?php
namespace App\Http\Controllers;

use App\Models\Rarity;

class RarityController extends Controller
{
    public function getIndex()
    {
        return view('rarities.index')->with('rarities',Rarity::all());
    }

    public function create()
    {
        
    }
}