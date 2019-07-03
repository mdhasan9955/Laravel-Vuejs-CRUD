<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;

use App\Models\Admin;   
use App\Models\User; 
use App\Models\Category;   

class CategoryController extends Controller
{
    public function store(Request $request)
    {
      /*$imageName = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('images'), $imageName);*/

      $post = new Category([
        'title' => $request->get('title'), 
        'status'  => $request->get('status')         
      ]);

      $post->save();

      return response()->json();
    }
    public function index()
    {
      return new PostCollection(Category::all());
    }

    public function edit($id)
    {
      $post = Category::find($id);
      return response()->json($post);
    }

    public function update($id, Request $request)
    {
      $post = Category::find($id);

      $post->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $post = Category::find($id);

      $post->delete();

      return response()->json('successfully deleted');
    }
}
