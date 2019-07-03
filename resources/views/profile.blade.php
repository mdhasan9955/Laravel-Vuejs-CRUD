@extends('layouts.app') 
@section('content')
<div class="col-md-10 dashboard_section">
    <div class="card">
        <div class="card-header">Profiles</div>
            <div class="card-body"> 
                <div class="card-body">
                    <div class="form-group row">                       
                    @if(Session::has('success')) 
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
                        </div>  
                    @endif
                    @if(Session::has('error')) 
                        <div class="alert alert-error alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-check"></i>{{ Session::get('error') }}</p>       
                        </div>   
                    @endif 
                    @if ($errors->has('name'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ $errors->first('name') }} </p>       
                        </div> 
                    @endif
                    @if ($errors->has('email'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ $errors->first('email') }} </p>       
                        </div> 
                    @endif
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ $errors->first('phone') }} </p>       
                        </div> 
                    @endif
                    @if ($errors->has('attachment'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ $errors->first('attachment') }} </p>       
                        </div> 
                    @endif 
                    @if ($errors->has('olpassword'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ $errors->first('olpassword') }} </p>       
                        </div>  
                    @endif
                    @if ($errors->has('password'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ $errors->first('password') }} </p>       
                        </div>  
                    @endif
                    @if ($errors->has('confirmed'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ $errors->first('confirmed') }} </p>       
                        </div>   
                    @endif
                    </div> 
                    {!! Form::open(['route' => 'profile.update','files' => true]) !!}  
                    <div class="form-group row"> 
                        {{ Form::label('company_name', 'Company Name',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('company_name',$data->company_name,['class' => 'form-control col-md-6']) }}  
                    </div> 
                    <div class="form-group row"> 
                        {{ Form::label('address', 'Address',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('address',$data->address,['class' => 'form-control col-md-6']) }}  
                    </div> 
                    <div class="form-group row">
                        {{ Form::label('phone_no', 'Company Phone Number',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('phone_no',$data->phone_no,['class' => 'form-control col-md-6' ]) }} 
                    </div>  
                    <div class="form-group row">
                        {{ Form::label('mobile_no', 'Company Mobile Number',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('mobile_no',$data->mobile_no,['class' => 'form-control col-md-6' ]) }} 
                    </div>  
                    <div class="form-group row">
                        {{ Form::label('url', 'Web URL',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('url',$data->url,['class' => 'form-control col-md-6' ]) }} 
                    </div>  
                    <div class="form-group row"> 
                        {{ Form::label('name', 'Full Name',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('name',$data->name,['class' => 'form-control col-md-6']) }}  
                    </div>
                    <div class="form-group row"> 
                        {{ Form::label('designation', 'Designation',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('designation',$data->designation,['class' => 'form-control col-md-6']) }}  
                    </div> 
                    <div class="form-group row"> 
                        {{ Form::label('email', 'Email',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('email',$data->email,['class' => 'form-control col-md-6','readonly']) }}  
                    </div> 
                    <div class="form-group row">
                        {{ Form::label('contact_no', 'Contact Number',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::text('contact_no',$data->contact_no,['class' => 'form-control col-md-6' ]) }} 
                    </div>  
                    <div class="form-group row">
                        {{ Form::label('Profile Image', 'Profile Image',array('class' => 'col-md-4 col-form-label text-md-right'))}} 
                        {{ Form::file('attachment', $attributes = ['class' => 'form-control col-md-6']) }}  
                    </div>  
                    <div class="form-group row">                             
                        {{ Form::label('oldpadd', 'Old Password',array('class' => 'col-md-4 col-form-label text-md-right'))}}  
                        {{ Form::password('olpassword', ['class' => 'form-control col-md-6']) }}  
                    </div>
                    <div class="form-group row">                             
                        {{ Form::label('password', 'Password',array('class' => 'col-md-4 col-form-label text-md-right'))}}  
                        {{ Form::password('password', ['class' => 'form-control col-md-6']) }}  
                    </div>
                    <div class="form-group row">                            
                        {{ Form::label('confirmed', 'Confirm Password',array('class' => 'col-md-4 col-form-label text-md-right'))}}  
                        {{ Form::password('confirmed', ['class' => 'form-control col-md-6']) }}  
                    </div> 
                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Update', ['class' => 'btn btn-primary' ]) }}  
                            </div>
                        </div> 
                    {!! Form::close() !!}                  
                </div> 
            </div> 
        </div>        
    </div>
</div> 
@endsection()