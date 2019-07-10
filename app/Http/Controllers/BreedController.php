<?php
namespace App\Http\Controllers;

use App\Models\Breed;

class BreedController extends Controller
{
    public function getIndex()
    {
        return view('breeds.index')->with('breeds',Breed::all());
    }

    public function getNew()
    {
        //
    }

    public function postNew()
    {
        //
    }
    
    public function getDetail($id)
    {
        
    }
    
    public function getEdit($id)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            return view('breeds.edit')->with('breed', $breed);
        }
        return redirect('breeds.index');
    }
    
    public function postEdit($id)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            $breed->name = Request::input('name');
            $breed->fur_thickness = Request::input('fur_thickness');
            $breed->claw_sharpness = Request::input('claw_sharpness');
            $breed->cuteness = Request::input('cuteness');
            $breed->rarity_id = Request::input('rarity_id');
            $breed->fur_thickness = Request::input('fur_thickness');
            $breed->save(); 
        }
        return redirect('breeds');
    }
    
    public function postDelete($id)
    {
        //
    }
}