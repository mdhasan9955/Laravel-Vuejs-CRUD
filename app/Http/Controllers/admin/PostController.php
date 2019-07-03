<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request; 
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;

use App\Models\Admin; 
use App\Models\User;  
use Illuminate\Support\Facades\Input;
use Hash;
use Auth; 
use File;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Mail; 
use DB;

class PostController extends Controller
{
    public function store(Request $request)
    {
      $imageName = 'image.jpeg';
      /*$imageName = time().'.'.$request->thumbnail->getClientOriginalExtension();
      $request->thumbnail->move(public_path('images'), $imageName); */
      if ($request->Input('thumbnail')) {
            $image = $request->Input('thumbnail'); 
            $imageName = strtotime(date('Y-m-d H:i:s')); 
            $fileExtension = $image->getClientOriginalExtension();
            $imgName = $imageName.'.'.$fileExtension;
            $uploadPath = 'images/';
            $image->move($uploadPath,$imgName);
            $imageName = $imgName;   
        } 
      $post = new Post([
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'category_id' => $request->get('category_id'),
        'thumbnail' => $imageName,
        'status'  => $request->get('status')         
      ]);

      $post->save();
      return response()->json();
    }
    public function index()
    {
      /*$posts = DB::table('posts')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id') 
            ->select('posts.*', 'categories.title as ctitle')
            ->get();*/        
      return new PostCollection(Post::all());
    }

    public function edit($id)
    {
      $post = Post::find($id);
      return response()->json($post);
    }

    public function update($id, Request $request)
    {
      $post = Post::find($id);

      $post->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $post = Post::find($id);

      $post->delete();

      return response()->json('successfully deleted');
    }
}
