<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Breed;
use App\Models\Cat;
use App\Models\User;
use App\Models\Pack;
use App\Models\Quest;
use App\Models\Rarity;

class StatisticController extends Controller
{
    public function getIndex(){
        $data = array(
            'models' => array(
                'Breeds' => Breed::all(),
                'Cats' => Cat::all(),
                'Users' =>  User::all(),
                'Packs' => Pack::all(),
                'Quests' => Quest::all(),
                'Rarities' => Rarity::all()
            ),
            'total' => array(
                'Breeds' => Breed::count(),
                'Cats' => Cat::count(),
                'Users' =>  User::count(),
                'Packs' => Pack::count(),
                'Quests' => Quest::count(),
                'Rarities' => Rarity::count()
            ),
            'users' => array(
                'Cats' => countCatsFor(User::withCount('cats')->get()->pluck('cats_count','name')),
                'Breeds' => countBreedsForUser()
            ),
            'breeds' => array(
                'Cats' => countCatsFor(Breed::withCount('cats')->get()->pluck('cats_count','name'))
            )
        );
        return view('backend.statistics.index')->with('data', $data);        
    }
}

function countCatsFor($cat_number){
    $avg = floor($cat_number->avg());
    $max = $cat_number->max();
    $min = $cat_number->min();
    $maxName = array_search($max,$cat_number->toArray());
    $minName = array_search($min,$cat_number->toArray());
    return [$avg, [$max, $maxName], [$min, $minName]];
}

function countBreedsForUser(){
    $users = User::with('cats')->get();
    $arr = array();
    foreach ($users as $user) $arr[$user->name] = $user->cats->pluck('id','breed_id')->count();
    $max = max($arr);
    $min = min($arr);
    $maxName = array_keys($arr,$max)[0];
    $minName = array_keys($arr,$min)[0];
    $avg = floor(array_sum($arr)/count($arr));
    return [$avg, [$max, $maxName], [$min, $minName]];
}

//for every user counts numer of each breed
function countBreedsFor2(){
    $users = User::with('cats')->get();

    foreach ($users as $user) {
        if($user->name === 'Ulla'){
            $arr = array();
            $arr['Name'] = $user->name;
            $arr['Breeds'] = $user->cats->pluck('breed_id');
            $breed_count = array();
            foreach($arr['Breeds'] as $breed_id){
                $breed_count[$breed_id] = 0;
            }
            foreach($arr['Breeds'] as $breed_id){
                $breed_count[$breed_id]++;
            }
            var_dump($arr);
            var_dump($breed_count);
        }
        //echo ('Name:'.$user->name.' - '.);
    }
    return;
}

