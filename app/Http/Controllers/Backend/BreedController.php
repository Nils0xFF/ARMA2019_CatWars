<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Breed;
use Validator;
use Request;
use Image;

class BreedController extends Controller
{
    public function getIndex()
    {
        $breeds = Breed::orderBy('max_hp','desc')->get();
        return view('backend.breeds.index')->with('breeds',$breeds);
    }

    public function getNew()
    {
        return view('backend.breeds.new');
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

            // file->move(public_path('img/breeds/'. $breed->id.'.'.$file->getClientOriginalExtension()));
            
            $file = Request::file('breedImage');
            $image = Image::make(Request::file('breedImage')->getRealPath())
            ->resize(600,600, function($c) {
                $c->aspectRatio();
            });
            $image->save(public_path('img/breeds/'. $breed->id.'.'.$file->getClientOriginalExtension()));

            return redirect('admin/breeds');
        }
        else
        {
            return redirect('admin/breeds/new')->withErrors($validator)->withInput();
            // edit: return redirect('admin/breeds/edit/'.$breed->id)->with('breed', $breed)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            return view('backend.breeds.detail')->with('breed', $breed);
        }
        return redirect('admin/breeds');
    }
    
    public function getEdit($id = null)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            return view('backend.breeds.edit')->with('breed', $breed);
        }
        return redirect('admin/breeds');
    }
    
    public function postEdit($id = null)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            $validator = Validator::make(Request::all(), Breed::$rules);

            if ($validator->passes())
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
            else
            {
                return redirect('admin/breeds/edit/'.$id)->withErrors($validator)->withInput()->with('breed',$breed);
            }
        }
        return redirect('admin/breeds');
    }
    
    public function postDelete($id = null)
    {
        $breed = Breed::find($id);
        if ($breed)
        {
            $breed->delete();
        }
        return redirect('admin/breeds');
    }
}