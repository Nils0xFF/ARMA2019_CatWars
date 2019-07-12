<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Quest;
use Validator;
use Request;
use Image;
use Auth;
use DateTime;

class QuestController extends Controller
{
    function getIndex(){
        return view('frontend.quests.index')->with('quests', Quest::paginate(6))->with('user_quests', Auth::user()->quests());
    }

    function startQuest($id){
        if(!in_array($id, Auth::user()->quests->pluck('id')->toArray())){
            Auth::user()->quests()->attach(Quest::find($id));
        };
        return back();
    }

    function completeQuest($id){
        $quest = Quest::find($id); 
        if(in_array($id, Auth::user()->quests->pluck('id')->toArray())){
            // chek if user is allowed to complete (time has passed)
            $endDate = new DateTime();
            $endDate->setTimestamp(strtotime(Auth::user()->quests->find($quest->id)->pivot->created_at) + $quest->duration);
            if(new DateTime() >= $endDate){
                Auth::user()->quests()->detach($quest);
                Auth::user()->coins += $quest->reward;
                Auth::user()->save();
            } 
        };
        return back();
    }
}