<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserView;
use Illuminate\Support\Facades\DB;
use Exception;

class PerformerAPIController extends Controller
{
    public function  service(){
       try{
           $categories = DB::table('categories')->get();
           $child_categories= DB::table('categories')->get();
           $users= User::where('role_id',2)->paginate(50);
           $data = ["categories"=>$categories, "child_categories"=>$child_categories,"users"=>$users];
           return response()->json($data);
       }catch (Exception $e) {
           $this->sendError($e->getMessage(), 200);
           return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
       }
    }
    public function performer($id){

        try {
            if(session('view_count') == NULL){

                $def_count = UserView::where('user_id', $id)->first();

                if(isset($def_count)){

                    $ppi = $def_count->count + 1;

                    UserView::where('user_id', $id)->update(['count' => $ppi]);

                }else{

                    UserView::create([
                        'user_id'=> $id,
                        'count'=> 1,
                    ]);

                }
                session()->put('view_count', '1');
            }
            $vcs = UserView::where('user_id', $id)->get();
            $users= User::where('id',$id)->get();
            $categories = DB::table('categories')->get();
            $child_categories = DB::table('categories')->get();
            $data = ['vcs'=>$vcs, 'users'=>$users, 'categories'=>$categories, 'child_categories'=>$child_categories];
            return response()->json($data);
        }catch (Exception $e) {
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }

    }
    public function perf_ajax($cf_id){
        try {
            $categories = DB::table('categories')->get();
            $cur_cat = DB::table('categories')->where('id',$cf_id)->get();
            $child_categories= DB::table('categories')->get();
            $users= User::where('role_id',2)->paginate(50);
            $data = ["categories"=>$categories,"cur_cat"=>$cur_cat,'child_categories'=>$child_categories,'users' => $users];
            return response()->json($data);
        }catch (Exception $e) {
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }

    }
}
