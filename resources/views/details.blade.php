@extends('welcome')
@section('title')
Home | Blogs List
@endsection()
 
@section('content')  
@if($posts)   
<div class="card">
  <h2> <a href="{{ route('details', $posts->id) }}">{{$posts->title}}</a></h2>
  <h5>Title description, Dec 7, 2017</h5>
  <div class="fakeimg" style="height:200px;">Image</div>
  <p>{{$posts->content}}.</p>

  
  	@if($comment)
  	@foreach($comment as $comm )
  	<div class="user-commet">
  	<div class="autor-thum">
  		<div style="height:90px; background-color: #aaa; width: 90px;padding: 20px; border-radius: 43px;">Image</div>
  	</div>
  	<div class="comment-name">
  		@php
  		$users = DB::table('users')->where('id', $comm->users_id)->first() 
  		@endphp
  		<h3>{{$users->name}}</h3>
  		<p>{{$comm->comment}}</p>
  	</div> 
  	</div>
  	@endforeach
  	@endif
  
@auth 
	<br>
  <div class="commet-from row">

  	{!! Form::open(['route' => 'comment.add','files' => true]) !!}
  	<div class="form-group"> 
	    <input type="hidden" name="post_id" value="{{$posts->id}}">
	    <textarea name="comment" rows="3" cols="100"> 
		</textarea>   
	</div>
	<div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary pull-left' ]) }} 
    </div>
    {!! Form::close() !!} 
  </div>
@else  
@endauth 
</div>
@endif  
@endsection()


