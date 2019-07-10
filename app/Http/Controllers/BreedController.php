<?php
namespace App\Http\Controllers;

use App\Models\Breed;
use Validator;
use Request;

class BreedController extends Controller
{
    public function getIndex()
    {
        return view('breeds.index')->with('breeds',Breed::all());
    }

    public function getNew()
    {
        return view('breeds.new');
    }

    public function postNew()
    {
        $validator = Validator::make(Request::all(), Breed::$rules);

        if ($validator->passes())
        {
            $breed = new Breed();
            $breed->name = Request::input('name');
            $breed->fur_thickness = Request::input('fur_thickness');
            $breed->claw_sharpness = Request::input('claw_sharpness');
            $breed->cuteness = Request::input('cuteness');
            $breed->rarity_id = Request::input('rarity_id');
            $breed->fur_thickness = Request::input('fur_thickness');
            $breed->max_hp = Request::input('max_hp');
            $breed->save(); 
            return redirect('breeds');
        }
        else
        {
            return redirect('breeds/new')->withErrors($validator)->withInput();
            // edit: return redirect('breeds/edit/'.$breed->id)->with('breed', $breed)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            return view('breeds.show')->with('breed', $breed);
        }
        return redirect('breeds');
    }
    
    public function getEdit($id = null)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            return view('breeds.edit')->with('breed', $breed);
        }
        return redirect('breeds');
    }
    
    public function postEdit($id = null)
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
            $breed->max_hp = Request::input('max_hp');
            $breed->save(); 
        }
        return redirect('breeds');
    }
    
    public function postDelete($id = null)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            $breed->delete();
        }
        return redirect('breeds');
    }
}