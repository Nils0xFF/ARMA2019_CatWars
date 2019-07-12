<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Cat;
use App\Models\Breed;
use Validator;
use Request;

class CatController extends Controller
{
    public function getIndex()
    {
        $cats = Cat::orderBy('user_id','desc')->paginate(8);
        return view('backend.cats.index')->with('cats',$cats);
    }

    public function getNew()
    {
        return view('backend.cats.new');
    }

    public function postNew()
    {
        $validator = Validator::make(Request::all(), Cat::$create_rules);

        if ($validator->passes())
        {
            $cat = new Cat();
            $cat->breed_id = Request::input('breed_id');
            $cat->user_id = Request::input('user_id');
            $maxHp = (Breed::find($cat->breed_id))->max_hp;
            $cat->current_hp = $maxHp;
            $cat->save(); 
            return redirect('admin/cats');
        }
        else
        {
            return back()->withErrors($validator)->withInput();
            // edit: return redirect('admin/cats/edit/'.$cat->id)->with('cat', $cat)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $cat = Cat::find($id);
        if ($cat)
        {
            return view('backend.cats.detail')->with('cat', $cat);
        }
        return back();
    }
    
    public function getEdit($id = null)
    {
        $cat = Cat::find($id);
        if ($cat)
        {
            return view('backend.cats.edit')->with('cat', $cat);
        }
        return back();
    }
    
    public function postEdit($id = null)
    {
        $cat = Cat::find($id);
        if ($cat)
        {
            $validator = Validator::make(Request::all(), Cat::$edit_rules);

            if ($validator->passes())
            {
                $cat->breed_id = Request::input('breed_id');
                $cat->current_hp = Request::input('current_hp');
                if($cat->current_hp > $cat->breed->max_hp){
                    $cat->current_hp = $cat->breed->max_hp;
                }
                $cat->save();
            }
            else
            {
                return back()->withErrors($validator)->withInput()->with('cat',$cat);
            }
        }
        return redirect('admin/cats');
    }
    
    public function postDelete($id = null)
    {
        $cat = Cat::find($id);
        if ($cat)
        {
            $cat->delete();
        }
        return back();
    }
}
