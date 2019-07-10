<?php
namespace App\Http\Controllers;

use App\Models\Quest;

class QuestController extends Controller
{
    public function getIndex()
    {
        return view('quest.index')->with('quest',Quest::all());
    }

    public function create()
    {
        
    }
}