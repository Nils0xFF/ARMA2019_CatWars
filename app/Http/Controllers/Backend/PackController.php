<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Pack;
use App\Models\Breed;
use Validator;
use Request;

class PackController extends Controller
{
    public function getIndex()
    {
        $packs = Pack::orderBy('price','asc')->paginate(8);
        return view('backend.packs.index')->with('packs',$packs);
    }

    public function getNew()
    {
        return view('backend.packs.new');
    }

    public function postNew()
    {
        $validator = Validator::make(Request::all(), Pack::$rules);

        if ($validator->passes())
        {
            $pack = new Pack();
            $pack->name = Request::input('name');
            $pack->price = Request::input('price');
            $pack->save(); 
            return redirect('admin/packs');
        }
        else
        {
            return redirect('admin/packs/new')->withErrors($validator)->withInput();
            // edit: return redirect('packs/edit/'.$pack->id)->with('pack', $pack)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $pack = Pack::find($id);
        $pack_breedIDs = $pack->breeds->pluck('id');
        $selectableBreeds = Breed::whereNotIn('id', $pack_breedIDs)->pluck('name', 'id');
        if ($pack)
        {
            return view('backend.packs.detail')->with('pack', $pack)->with('selectableBreeds', $selectableBreeds);
        }
        return redirect('admin/packs');
    }
    
    public function getEdit($id = null)
    {
        $pack = Pack::find($id);
        if ($pack)
        {
            return view('backend.packs.edit')->with('pack', $pack);
        }
        return redirect('admin/packs');
    }
    
    public function postEdit($id = null)
    {
        $pack = Pack::find($id);
        if ($pack)
        {
            $validator = Validator::make(Request::all(), Pack::$rules);

            if ($validator->passes())
            {
                $pack->name = Request::input('name');
                $pack->price = Request::input('price');
                $pack->save();
            }
            else
            {
                return redirect('admin/packs/edit/'.$id)->withErrors($validator)->withInput()->with('pack',$pack);
            }
        }
        return redirect('admin/packs/detail/'.$id);
    }
    
    public function postDelete($id = null)
    {
        $pack = Pack::find($id);
        if ($pack)
        {
            $pack->delete();
        }
        return redirect('admin/packs');
    }

    public function postAddBreed($id = null){
    
        $pack = Pack::find($id);
        if($pack){
            $breed_id = Request::input('breed_id');
            if(!$pack->breeds->pluck('id')->contains($breed_id)){
                $pack->breeds()->attach($breed_id);
            }
        } 
        return redirect('admin/packs/detail/'.$id);
    }

    public function getRemoveBreed($pack_id = null, $breed_id = null)
    {
        if($breed_id){
            $pack = Pack::find($pack_id);
            if($pack){
                if($pack->breeds->pluck('id')->contains($breed_id)){
                    $pack->breeds()->detach($breed_id);
                }
            }
        }
        return redirect('admin/packs/detail/'.$pack_id);
    }
}