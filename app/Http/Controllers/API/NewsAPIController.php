<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BlogNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsAPIController extends Controller
{
    public function index(){
        $news = BlogNew::all();
        $last2 = DB::table('blog_new')->orderBy('id', 'DESC')->first();
        $data = [$news,$last2];
        return response()->json($data);
    }
    public function create(Request $request)
    {
        $news = new BlogNew();
        $image = $request->image;

        $imagename = "posts\December2021"."\/". $image->getClientOriginalExtension();
        $request->image->move('storage\posts\December2021', $imagename);
        $news->img = $imagename;
        $news->title = $request->title;
        $news->text = $request->title;
        $news->save();
        return response()->json(['status'=>'true','message'=>'created successfully']);
    }
}
