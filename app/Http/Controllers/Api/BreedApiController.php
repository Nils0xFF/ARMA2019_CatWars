<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Breed;
use Validator;
use Request;
use Image;
use File;

class BreedApiController extends Controller
{
    public function index()
    {
        return response()->json(Breed::all());
    }
    
    public function show($id)
    {
        $breed = Breed::find($id);
        if($breed)
        {
            return response()->json(['info' => $breed, 'imagePath' => $breed->imagePath()]);
        }
        else return response()->json(['error' => 'Not Found'],404);
    }

    public function store(){
        
        $validator = Validator::make(Request::all(), Breed::$rules);

        if ($validator->passes())
        {
            $breed = new Breed();

            $breed->name = Request::input('name');
            $breed->fur_thickness = Request::input('fur_thickness');
            $breed->claw_sharpness = Request::input('claw_sharpness');
            $breed->cuteness = Request::input('cuteness');
            $breed->rarity_id = Request::input('rarity_id');
            $breed->max_hp = Request::input('max_hp');
            $breed->save();
            
            $this->storeImage(Request::input('breedImage'),$breed->id); //your base64 encoded

            return redirect('api/breeds/'.$breed->id);
        }
        // else return response()->json(['error' => 'could not store'],400);
        else return response()->json(['error' => $validator->errors()],400);

    }

    public function update($id){

        $breed = Breed::find($id);
        if ($breed)
        {
            $validator = Validator::make(Request::all(), Breed::$rules);

            if ($validator->passes())
            {
                $breed->name = Request::input('name');
                $breed->fur_thickness = Request::input('fur_thickness');
                $breed->claw_sharpness = Request::input('claw_sharpness');
                $breed->cuteness = Request::input('cuteness');
                $breed->rarity_id = Request::input('rarity_id');
                $breed->max_hp = Request::input('max_hp');
                $breed->save();
                
                $this->storeImage(Request::input('breedImage'),$breed->id); //your base64 encoded

                return redirect('api/breeds/'.$breed->id);
            }
            // else return response()->json(['error' => 'could not store'],400);
            else return response()->json(['error' => $validator->errors()],400);
        }
        return redirect('api/breeds/'.$id);
    }

    private function storeImage($imageStr, $id){

        $imageStr = str_replace('data:image/png;base64,', '', $imageStr);
        $imageStr = str_replace(' ', '+', $imageStr);
        $imageName = $id.'.'.'png';

        $file = File::put(public_path('img/breeds'. '/' . $imageName), base64_decode($imageStr));
        $image = Image::make(public_path('img/breeds'. '/' . $imageName))->resize(600,600, function($c) {
            $c->aspectRatio();
        });
        $image->save(public_path('img/breeds'. '/' . $imageName));
    }

    public function destroy($id){
        $breed = Breed::find($id);
        if ($breed)
        {
            $breed->delete();
            return response()->json(['success' => 'breed with id:'.$id.'deleted'],200);
        }
        else return response()->json(['error' => 'breed with id:'.$id.'does not exist'],400);
    }
     
}