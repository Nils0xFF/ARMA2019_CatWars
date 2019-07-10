<?php
namespace App\Http\Controllers;

use App\Models\Quest;

class QuestController extends Controller
{
    public function getIndex()
    {
        return view('quests.index')->with('quests',Quest::all());
    }

    public function create()
    {
        
    }
}