@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>User Edit</h1>
    <button class="goBack" onclick="goBack()">Go Back</button>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Add</a></li> 
    </ol>
</section>
@endsection()
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary"> 
                <div class="box-body">
                    <div class="col-lg-6 custom-error-msg">
                        {!! Form::open(['route' => 'admin.profile.edit']) !!}   
                        <div class="form-group">
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
                                </div> 
                            @endif
                            {{ Form::hidden('adminid',$data->id) }}
                            {{ Form::label('admin type', 'Admin type')}} 
                            <b><span>*</span></b>                             
                            {{ Form::select('type', ['Super Admin' => 'Super Admin', 'Modarator' => 'Modarator','User' => 'User'], $data->type, ['placeholder' => 'Admin Type','class' => 'form-control','readonly'])}}
                            @if ($errors->has('department'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('department') }} </p>       
                                </div> 
                            @endif
                        </div>  
                        <div class="form-group"> 
                            {{ Form::label('name', 'Full Name')}}
                            <b><span>*</span></b> 
                            {{ Form::text('name',$data->name,['class' => 'form-control','required'=>'required']) }} 
                            @if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('name') }} </p>       
                                </div> 
                            @endif
                        </div> 
                        <div class="form-group">
                            {{ Form::label('phone_no', 'Phone Number')}} 
                            <b><span>*</span></b>
                            {{ Form::text('phone_no',$data->phone_no,['class' => 'form-control' ]) }}
                            @if ($errors->has('phone_no'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('phone_no') }} </p>       
                                </div> 
                            @endif  
                        </div> 
                        <div class="form-group">
                            {{ Form::label('email', 'Email')}} 
                            <b><span>*</span></b>
                            {{ Form::text('email',$data->email,['class' => 'form-control','required'=>'required','readonly']) }} 
                            @if ($errors->has('email'))
                                <div class="alert alert-danger alert-dismissable"> 
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('email') }} </p>       
                                </div> 
                            @endif 
                        </div> 
                        <div class="form-group">                             
                            {{ Form::label('password', 'Password')}}  
                            {{ Form::password('password', ['class' => 'form-control' ]) }} 
                            @if ($errors->has('password'))
                                <div class="alert alert-danger alert-dismissable"> 
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('password') }} </p>       
                                </div> 
                            @endif
                        </div>
                        <div class="form-group">                            
                            {{ Form::label('confirmed', 'Confirm Password')}}  
                            {{ Form::password('confirmed', ['class' => 'form-control' ]) }} 
                            @if ($errors->has('confirmed'))
                                <div class="alert alert-danger alert-dismissable"> 
                                    <h4><i class="icon fa fa-ban"></i>{{ $errors->first('confirmed') }} </h4>       
                                </div> 
                            @endif
                        </div>
                        <div class="form-group">
                            {{ Form::label('status', 'Status')}}  
                            {{ Form::select('status', array('1' => 'Active', '0' => 'Inactive'),$data->status,['class' => 'form-control tip select2' ]) }}  
                        </div> 
                        <div class="form-group">
                            {{ Form::submit('Edit User', ['class' => 'btn btn-primary' ]) }} 
                        </div>
                        {!! Form::close() !!}                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()