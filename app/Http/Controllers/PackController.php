<?php
namespace App\Http\Controllers;

use App\Models\Pack;

use Validator;
use Request;

class PackController extends Controller
{
    public function getIndex()
    {
        return view('packs.index')->with('packs',Pack::all());
    }

    public function getNew()
    {
        return view('packs.new');
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
            return redirect('packs');
        }
        else
        {
            return redirect('packs/new')->withErrors($validator)->withInput();
            // edit: return redirect('packs/edit/'.$pack->id)->with('pack', $pack)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $pack = Pack::find($id);
        if ($pack)
        {
            return view('packs.show')->with('pack', $pack);
        }
        return redirect('packs');
    }
    
    public function getEdit($id = null)
    {
        $pack = Pack::find($id);
        if ($pack)
        {
            return view('packs.edit')->with('pack', $pack);
        }
        return redirect('packs');
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
                return redirect('packs/edit/'.$id)->withErrors($validator)->withInput()->with('pack',$pack);
            }
        }
        return redirect('packs');
    }
    
    public function postDelete($id = null)
    {
        $pack = Pack::find($id);
        if ($pack)
        {
            $pack->delete();
        }
        return redirect('packs');
    }
}