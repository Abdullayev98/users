<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{

    public function update(Request $request, $id)
    {
        dd($request->all());
    }


}
