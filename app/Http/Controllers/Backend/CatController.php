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
        $cats = Cat::orderBy('user_id','desc')->get();
        return view('cats.index')->with('cats',$cats);
    }

    public function getNew()
    {
        return view('cats.new');
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
            return redirect('admin/cats/new')->withErrors($validator)->withInput();
            // edit: return redirect('admin/cats/edit/'.$cat->id)->with('cat', $cat)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $cat = Cat::find($id);
        if ($cat)
        {
            return view('cats.detail')->with('cat', $cat);
        }
        return redirect('admin/cats');
    }
    
    public function getEdit($id = null)
    {
        $cat = Cat::find($id);
        if ($cat)
        {
            return view('cats.edit')->with('cat', $cat);
        }
        return redirect('admin/cats');
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
                return redirect('admin/cats/edit/'.$id)->withErrors($validator)->withInput()->with('cat',$cat);
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
        return redirect('admin/cats');
    }
}
