<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BlogNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class NewsAPIController extends Controller
{
    public function index(){
        try {
            $news = BlogNew::all();
            $last2 = DB::table('blog_new')->orderBy('id', 'DESC')->first();
            $data = ['news'=> $news, 'last2'=>$last2];
            return response()->json($data);
        }catch (Exception $e){
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }
    }
    public function create(Request $request)
    {
        try {
            $news = new BlogNew();
            $image = $request->image;

            $imagename = "posts\December2021"."\/". $image->getClientOriginalExtension();
            $request->image->move('storage\posts\December2021', $imagename);
            $news->img = $imagename;
            $news->title = $request->title;
            $news->text = $request->title;
            $news->save();
            return response()->json(['status'=>'true','message'=>'created successfully']);
        }catch (Exception $e){
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }
    }
    public function show($id){
        try {
            $blog = DB::table('blog_new')->where('id',$id)->get();
            $last3 = DB::table('blog_new')->orderBy('id', 'asc')->take(3)->get();
            $data = ['blog'=>$blog,'last3'=>$last3];
            return response()->json($data);
        }catch (Exception $e){
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }
    }
}
