<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Cat;
use Validator;
use Request;
use Image;
use Auth;

class CollectionController extends Controller
{
    function getIndex(){
        return view('frontend.collection.index')->with('cats', Auth::user()->cats()->paginate(9));
    }

    function postStartQuest(){
        return redirect('quests');
    }

    function postStart(){
        return redirect('quests');
    }
}