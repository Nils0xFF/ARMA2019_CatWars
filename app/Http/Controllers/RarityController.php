<?php
namespace App\Http\Controllers;

use Validator;
use App\Models\Rarity;

class RarityController extends Controller
{
    public function getIndex()
    {
        return view('rarities.index')->with('rarities',Rarity::all());
    }

    public function getNew()
    {
        return view('rarities.new');
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
            return redirect('rarities');
        }
        else
        {
            return redirect('rarities/new')->withErrors($validator)->withInput();
            // edit: return redirect('rarities/edit/'.$rarity->id)->with('rarity', $rarity)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            return view('rarities.show')->with('rarity', $rarity);
        }
        return redirect('rarities');
    }
    
    public function getEdit($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            return view('rarities.edit')->with('rarity', $rarity);
        }
        return redirect('rarities');
    }
    
    public function postEdit($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            $rarity->name = Request::input('name');
            $rarity->chance = Request::input('chance');
            $rarity->save(); 
        }
        return redirect('rarities');
    }
    
    public function postDelete($id = null)
    {
        $rarity = Rarity::find($id);
        if ($rarity)
        {
            $rarity->delete();
        }
        return redirect('rarities');
    }
}