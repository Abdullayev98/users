<?php

namespace App\Http\Controllers;

use App\Models\BlogNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function home()
    {
        $news = BlogNew::all();
        $last2 = DB::table('blog_new')->orderBy('id', 'DESC')->first();
        return view("Site.news",compact("news", "last2"));
    }
    public function upload(Request $request)
    {
        $news = new BlogNew();
        $image = $request->image;

        $imagename = "posts\December2021"."\/". $image->getClientOriginalExtension();
        $request->image->move('storage\posts\December2021', $imagename);
        $news->img = $imagename;
        $news->title = $request->title;
        $news->text = $request->text;
        $news->save();
        return redirect()->back();
    }
    public function get($id)
    {
          $blog = DB::table('blog_new')->where('id',$id)->get();
          $last3 = DB::table('blog_new')->orderBy('id', 'asc')->take(3)->get();
          return view('Site/blog',compact('blog','last3'));
    }
}
