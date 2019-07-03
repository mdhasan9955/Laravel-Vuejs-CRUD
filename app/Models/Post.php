<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'status', 'category_id', 'content','thumbnail'];

    public function category(){
    	//return $this->belongsTo(Category::class);
    	return $this->hasOne('App\Models\Category','id','category_id');
    }
    public function allPost(){
    	return DB::table('posts') 
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id') 
            ->select('posts.*', 'categories.title as ctitle')
            ->get(); 

    }


}
