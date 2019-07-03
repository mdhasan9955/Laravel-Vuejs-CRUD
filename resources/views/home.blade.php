@extends('welcome')
@section('title')
Home | Blogs List
@endsection()
 
@section('content')  
@if($posts) 
@foreach ($posts as $post)  
<div class="card">
  <h2> <a href="{{ route('details', $post->id) }}">{{$post->title}}</a></h2>
  <h5>Title description, Dec 7, 2017</h5>
  <div class="fakeimg" style="height:200px;">Image</div>
  <p>{{$post->content}}.</p> 
  <hr>
  @php
  $count = \DB::table('comments')->where('post_id', $post->id)->count()
  @endphp
  <div class="pull-left">	{{$count}} Comments </div>
</div>
@endforeach
 
@endif  
@endsection()


