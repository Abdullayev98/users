<?php

namespace App\Http\Controllers;

use App\Models\Massmedia;
use Illuminate\Http\Request;

class MassmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Massmedia::paginate(20);
        return view('reviews.CMI',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Massmedia  $massmedia
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Massmedia $massmedia)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Massmedia  $massmedia
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Massmedia $massmedia)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Massmedia  $massmedia
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Massmedia $massmedia)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Massmedia  $massmedia
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Massmedia $massmedia)
    // {
    //     //
    // }
}
