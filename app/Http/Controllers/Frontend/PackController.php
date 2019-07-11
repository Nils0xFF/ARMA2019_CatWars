<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Pack;
use App\Models\Cat;
use App\Models\Rarity;
use App\Models\Breed;
use Validator;
use Request;
use Image;
use Auth;

class PackController extends Controller
{
    function getIndex(){
        return view('frontend.packs.index')->with('packs', Pack::paginate(12));
    }

    function getOpen($pack_id = null){
        if($pack_id){
            $pack = Pack::find($pack_id);
            if($pack && Auth::user()->coins >= $pack->price ){
                Auth::user()->coins -= $pack->price;
                Auth::user()->save();
                return view('frontend.packs.content')->with('cats', $this->generatePackContent($pack_id));
            }

        }

        return redirect('packs');
    }

    function generatePackContent($id){
        // content of the pack
        $cats = [];

        // array to be filled with rarities bases on chance attribute
        $chanceArray = [];
        $rarities = Rarity::all();
        // fill array with rarities
        // eg. rarity with chance 20 will be in the array 20x
        // rarity with chance 10 will be in the array 10 times
        // therefore a rarity with chance 20 is twice as likely to be chosen
        foreach($rarities as $rarity){
            for($i = 0; $i < $rarity->chance; $i++){
                array_push($chanceArray, $rarity);
            }
        }

        while(count($cats) < 3){
            // select a random rariy
            $breed_ids = Pack::find($id)->breeds->where('rarity_id', $chanceArray[rand(0, count($chanceArray) - 1 )]->id)->pluck('id');
            if(count($breed_ids) > 0){
                $cat = new Cat();
                $cat->breed_id = $breed_ids[rand(0, count($breed_ids) - 1 )];
                $cat->user_id = Auth::user()->id;
                $cat->current_hp = $cat->breed->max_hp;
                $cat->save();
                array_push($cats, $cat);
            }


        }
        return $cats;
    }
}