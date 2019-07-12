<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Rarity;
use Validator;
use Request;

class RarityController extends Controller
{
    public function getIndex()
    {
        $rarities = Rarity::orderBy('chance','desc')->paginate(8);
        return view('backend.rarities.index')->with('rarities',$rarities);
    }

    public function getNew()
    {
        return view('backend.rarities.new');
    }

    public function postNew()
    {
        $validator = Validator::make(Request::all(), Rarity::$rules);

        if ($validator->passes())
        {
            $rarity = new Rarity;
            $rarity->name = Request::input('name');
            $rarity->chance = Request::input('chance');
            $rarity->save(); 
            return redirect('admin/rarities');
        }
        else
        {
            return back()->withErrors($validator)->withInput();
            // edit: return redirect('rarities/edit/'.$rarity->id)->with('rarity', $rarity)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            return view('backend.rarities.detail')->with('rarity', $rarity);
        }
        return back();
    }
    
    public function getEdit($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            return view('backend.rarities.edit')->with('rarity', $rarity);
        }
        return back();
    }
    
    public function postEdit($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            $validator = Validator::make(Request::all(), Rarity::$rules);

            if ($validator->passes())
            {
                $rarity->name = Request::input('name');
                $rarity->chance = Request::input('chance');
                $rarity->save(); 
            }
            else
            {
                return back()->withErrors($validator)->withInput()->with('rarity',$rarity);
            }
        }
        return redirect('admin/rarities');
    }
    
    public function postDelete($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            $rarity->delete();
        }
        return redirect('admin/rarities');
    }
}