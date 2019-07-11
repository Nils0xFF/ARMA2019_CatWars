<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Quest;
use Validator;
use Request;
use Image;
use Auth;

class QuestController extends Controller
{
    function getIndex(){
        return view('frontend.quests.index')->with('user_quests', Auth::user()->quests());
    }

    function startQuest($id){
        if(!in_array($id, Auth::user()->quests->pluck('id')->toArray())){
            Auth::user()->quests()->attach(Quest::find($id));
        };
        return redirect('quests');
    }

    function completeQuest($id){
        if(in_array($id, Auth::user()->quests->pluck('id')->toArray())){
            Auth::user()->quests()->detach(Quest::find($id));
            // chek if user is allowed to complete (time has passed)
            Auth::user()->coins += Quest::find($id)->reward;
            Auth::user()->save();
        };
        return redirect('quests');
    }
}