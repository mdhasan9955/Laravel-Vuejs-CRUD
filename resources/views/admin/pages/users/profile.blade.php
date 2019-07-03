@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>Profile</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Profile</a></li> 
    </ol>
</section>
@endsection()
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary"> 
                <div class="box-body">
                    <div class="col-lg-6">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
                            </div> 
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-error alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
                            </div> 
                        @endif
                        {!! Form::open(['route' => 'admin.profile.update','files' => true]) !!}   
                        <div class="form-group"> 
                            {{ Form::label('name', 'Full Name')}} 
                            {{ Form::text('name',$data->name,['class' => 'form-control']) }} 
                            @if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('name') }} </p>       
                                </div> 
                            @endif
                        </div> 
                        <div class="form-group"> 
                            {{ Form::label('email', 'Email')}} 
                            {{ Form::text('email',$data->email,['class' => 'form-control','readonly']) }} 
                            @if ($errors->has('email'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('email') }} </p>       
                                </div> 
                            @endif
                        </div> 
                        <div class="form-group">
                            {{ Form::label('phone_no', 'Phone Number')}} 
                            {{ Form::text('phone_no',$data->phone_no,['class' => 'form-control' ]) }}
                            @if ($errors->has('phone_no'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('phone_no') }} </p>       
                                </div> 
                            @endif  
                        </div>  
                        <div class="form-group">
                            {{ Form::label('Profile Image', 'Profile Image')}} 
                            {{ Form::file('attachment', $attributes = ['class' => 'form-control']) }} 
                            @if ($errors->has('attachment'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('attachment') }} </p>       
                                </div> 
                            @endif  
                        </div>  
                        <div class="form-group">                             
                            {{ Form::label('oldpadd', 'Old Password')}}  
                            {{ Form::password('olpassword', ['class' => 'form-control']) }} 
                            @if ($errors->has('olpassword'))
                                <div class="alert alert-danger alert-dismissable"> 
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('olpassword') }} </p>       
                                </div> 
                            @endif
                        </div>
                        <div class="form-group">                             
                            {{ Form::label('password', 'Password')}}  
                            {{ Form::password('password', ['class' => 'form-control']) }} 
                            @if ($errors->has('password'))
                                <div class="alert alert-danger alert-dismissable"> 
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('password') }} </p>       
                                </div> 
                            @endif
                        </div>
                        <div class="form-group">                            
                            {{ Form::label('confirmed', 'Confirm Password')}}  
                            {{ Form::password('confirmed', ['class' => 'form-control']) }} 
                            @if ($errors->has('confirmed'))
                                <div class="alert alert-danger alert-dismissable"> 
                                    <h4><i class="icon fa fa-ban"></i>{{ $errors->first('confirmed') }} </h4>       
                                </div> 
                            @endif
                        </div> 
                        <div class="form-group">
                            {{ Form::submit('Update', ['class' => 'btn btn-primary' ]) }} 
                        </div>
                        {!! Form::close() !!}                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()