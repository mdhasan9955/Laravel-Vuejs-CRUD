@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>Customer Edit</h1>
    <button class="goBack" onclick="goBack()">Go Back</button> 
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Edit</a></li> 
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
                        {!! Form::open(['route' => 'admin.customer.update','files' => true]) !!}   
                        <div class="form-group">
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
                                </div> 
                            @endif 
                        </div>  
                        <div class="form-group"> 
                            {{ Form::hidden('customer_id',$user->id) }}
                            {{ Form::label('company_name', 'Company name')}} 
                            <b><span>*</span></b> 
                            
                            {{ Form::text('company_name',$user->company_name,['class' => 'form-control','required'=>'required']) }} 
                            @if ($errors->has('company_name'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('company_name') }} </p>      
                                </div> 
                            @endif
                        </div>
                        <div class="form-group"> 
                            {{ Form::label('attachment', 'Logo')}}
                            {{ Form::file('attachment') }} 
                            @if($errors->has('attachment'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('attachment') }} </p>
                                </div> 
                            @endif
                        </div> 
                        <div class="form-group"> 
                            {{ Form::label('address', 'Address')}} 
                            {{ Form::text('address',$user->address,['class' => 'form-control']) }} 
                            @if ($errors->has('address'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('address') }} </p>       
                                </div> 
                            @endif
                        </div> 
                        <div class="form-group">
                            {{ Form::label('phone_no', 'Phone Number')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('phone_no',$user->phone_no,['class' => 'form-control','required'=>'required' ]) }}
                            @if ($errors->has('phone_no'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('phone_no') }} </p>       
                                </div> 
                            @endif  
                        </div> 
                        <div class="form-group">
                            {{ Form::label('mobile_no', 'Mobile Number')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('mobile_no',$user->mobile_no,['class' => 'form-control','required'=>'required' ]) }}
                            @if ($errors->has('mobile_no'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('mobile_no') }} </p>       
                                </div> 
                            @endif  
                        </div> 
                        <div class="form-group">
                            {{ Form::label('url', 'URL')}} 
                            {{ Form::text('url',$user->url,['class' => 'form-control']) }}
                            @if ($errors->has('url'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('url') }} </p>       
                                </div> 
                            @endif  
                        </div> 
                        <div class="form-group">
                            {{ Form::label('product_used', 'Product used')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('product_used',$user->product_used,['class' => 'form-control','required'=>'required']) }}
                            @if ($errors->has('product_used'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('product_used') }} </p> 
                                </div> 
                            @endif  
                        </div> 
                        <div class="form-group">
                            {{ Form::label('Contact person', 'Contact Person',['class' => 'hrclass' ])}} 
                        </div> 
                        <div class="form-group">
                            {{ Form::label('Name', 'Name')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('name',$user->name,['class' => 'form-control','required'=>'required']) }}
                            @if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('name') }} </p>       
                                </div> 
                            @endif  
                        </div>  
                        <div class="form-group">
                            {{ Form::label('designation', 'Designation')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('designation',$user->designation,['class' => 'form-control','required'=>'required']) }}
                            @if ($errors->has('designation'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('designation') }} </p>       
                                </div> 
                            @endif  
                        </div> 
                        <div class="form-group">
                            {{ Form::label('contact_no', 'Contact Number')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('contact_no',$user->contact_no,['class' => 'form-control','required'=>'required']) }}
                            @if ($errors->has('contact_no'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('contact_no') }} </p>       
                                </div> 
                            @endif  
                        </div> 
                        <div class="form-group">
                            {{ Form::label('Login Information', 'Login Information',['class' => 'hrclass' ])}}  
                        </div>
                        <div class="form-group">
                            {{ Form::label('expiry_date', 'Expiry Date')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('expiry_date',$user->expiry_date,['class' => 'form-control datepicker ','required'=>'required']) }} 
                            @if ($errors->has('expiry_date'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('expiry_date') }} </p>       
                                </div> 
                            @endif 
                        </div> 
                        <div class="form-group">
                            {{ Form::label('email', 'Email')}} 
                            <b><span>*</span></b> 
                            {{ Form::text('email',$user->email,['class' => 'form-control','readonly']) }} 
                            @if ($errors->has('email'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('email') }} </p>       
                                </div> 
                            @endif 
                        </div> 
                        <div class="form-group">                             
                            {{ Form::label('password', 'Password')}}  
                            <b><span>*</span></b> 
                            {{ Form::password('password', ['class' => 'form-control']) }} 
                            @if ($errors->has('password'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('password') }} </p>       
                                </div> 
                            @endif  
                        </div>
                        <div class="form-group">                            
                            {{ Form::label('confirmed', 'Confirm Password')}}  
                            <b><span>*</span></b> 
                            {{ Form::password('confirmed', ['class' => 'form-control']) }} 
                            @if ($errors->has('confirmed'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <p><i class="icon fa fa-ban"></i>{{ $errors->first('confirmed') }} </p>       
                                </div> 
                            @endif  
                        </div>
                        <div class="form-group">
                            {{ Form::label('status', 'Status')}}  
                            <b><span>*</span></b> 
                            {{ Form::select('status', array('1' => 'Active', '0' => 'Inactive'),$user->status,['class' => 'form-control tip select2' ]) }}  
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
<script src="{{asset('public/admin-asset/plugins/bootstrap-datetimepicker/js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>
@endsection()