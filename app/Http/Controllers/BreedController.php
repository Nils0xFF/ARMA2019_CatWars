<?php
namespace App\Http\Controllers;

use App\Models\Breed;

class BreedController extends Controller
{
    public function getIndex()
    {
        $breed = new Breed();
        $breed->name = 'Norwegian Forest Cat';
        $breed->max_hp = 560;
        $breed->fur_thickness = 9000;
        $breed->claw_sharpness = 10;
        $breed->cuteness = 100;
        $breed->save();

        return response()->json(Breed::all());
    }
}