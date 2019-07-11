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
        return view('frontend.quest')->with('quests', Quest::all())->with('runningQuests');
    }

    function postStartQuest(){
        return redirect('quests');
    }

    function postStart(){
        return redirect('quests');
    }
}