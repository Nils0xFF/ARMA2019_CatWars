<?php
namespace App\Http\Controllers;

use Validator;
use Request;
use App\Models\Quest;

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
            return redirect('quests');
        }
        else
        {
            return redirect('quests/new')->withErrors($validator)->withInput();
            // edit: return redirect('quests/edit/'.$quest->id)->with('quest', $quest)->withErrors($validator)->withInput();
        }

    }
    
    public function getDetail($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            return view('quests.show')->with('quest', $quest);
        }
        return redirect('quests');
    }
    
    public function getEdit($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            return view('quests.edit')->with('quest', $quest);
        }
        return redirect('quests');
    }
    
    public function postEdit($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            $quest->name = Request::input('name');
            $quest->description = Request::input('description');
            $quest->duration = Request::input('duration');
            $quest->reward = Request::input('reward');
            $quest->save();
        }
        return redirect('quests');
    }
    
    public function postDelete($id = null)
    {
        $quest = Quest::find($id);
        if ($quest)
        {
            $quest->delete();
        }
        return redirect('quests');
    }
}