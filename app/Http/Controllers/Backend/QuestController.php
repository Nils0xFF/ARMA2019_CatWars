<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Quest;
use Validator;
use Request;

class QuestController extends Controller
{
    public function getIndex()
    {
        return view('quests.index')->with('quests',Quest::all());
    }

    public function getNew()
    {
        return view('quests.new');
    }

    public function postNew()
    {
        $validator = Validator::make(Request::all(), Quest::$rules);

        if ($validator->passes())
        {
            $quest = new Quest();
            $quest->name = Request::input('name');
            $quest->description = Request::input('description');
            $quest->duration = Request::input('duration');
            $quest->reward = Request::input('reward');
            $quest->save(); 
            return redirect('admin/quests');
        }
        else
        {
            return redirect('admin/quests/new')->withErrors($validator)->withInput();
            // edit: return redirect('quests/edit/'.$quest->id)->with('quest', $quest)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            return view('quests.detail')->with('quest', $quest);
        }
        return redirect('admin/quests');
    }
    
    public function getEdit($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            return view('quests.edit')->with('quest', $quest);
        }
        return redirect('admin/quests');
    }
    
    public function postEdit($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            $validator = Validator::make(Request::all(), Quest::$edit_rules);

            if ($validator->passes())
            {
                $quest->name = Request::input('name');
                $quest->description = Request::input('description');
                $quest->duration = Request::input('duration');
                $quest->reward = Request::input('reward');
                $quest->save();
            }
            else
            {
                return redirect('admin/quests/edit/'.$id)->withErrors($validator)->withInput()->with('quest',$quest);
            }
        }
        return redirect('admin/quests');
    }
    
    public function postDelete($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            $quest->delete();
        }
        return redirect('admin/quests');
    }
}