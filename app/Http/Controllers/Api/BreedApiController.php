<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Breed;
use Validator;
use Request;

class BreedApiController extends Controller
{
    public function index()
    {
        return response()->json(Breed::all());
    }
}