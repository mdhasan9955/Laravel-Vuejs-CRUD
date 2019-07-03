<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Admin;  
use File;
use Auth;
use Redirect; 
use Validator ; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Session;
use DB;

class HomeController extends Controller
{ 
    public function index(){
        $posts = DB::table('posts')->get();
        return view('home',compact('posts'));
    } 
    public function category($cat_id){ 
        $posts =DB::table('posts') 
            ->where('category_id', $cat_id)
            ->get();   
        return view('home',compact('posts'));
    }
    public function details($id){
        $posts = DB::table('posts')->where('id', $id)->first();
        $comment = DB::table('comments')->where('post_id', $id)->get();            
        return view('details',compact('posts','comment'));
    }
    public function addComment(Request $request){
        $id = DB::table('comments')->insert(
            [
            'users_id' => Auth::user()->id, 
            'post_id' => $request->post_id,
            'comment' => $request->comment]
        );
        return redirect($_SERVER["HTTP_REFERER"]);
    }  
}
