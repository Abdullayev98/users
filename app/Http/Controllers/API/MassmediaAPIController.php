<?php

namespace App\Http\Controllers\API;

use App\Models\Massmedia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MassmediaAPIController extends Controller
{
    public function index()
    {
        $medias = Massmedia::paginate(20);

        if($medias){
            return response()->json($medias);
        }
        return response()->json('Малумот йок');
        
    }
}
