@extends('auth.admin.layouts.layout')
@section('title')
Admin panel | Admin login panel
@endsection()
@section('content')
<div class="login-box"> 
    <div class="login-box-body">
      <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf 
        @if ($errors->has('email'))                
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <strong>{{ $errors->first('email') }}</strong>               
        </div>
        @endif 
        @if (Session::has('error'))
          <div class="alert alert-danger">
            <p>{{ Session::get('error') }}</p>
          </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
        </div> 
        @endif
         
        <p class="login-box-msg"><strong> Please login to your account</strong></p>  
        <div class="form-group has-feedback">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control " placeholder="Email" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password " />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="glyphicon glyphicon-log-in"></i> Sign in </button> 
      </form>
        <div class="">
            <p>&nbsp;</p>
            <p><span class="text-danger"> Forgot your password </span><br>
                 Don't worry <a href="#" class="text-danger" data-toggle="modal" data-target="#myModal"> Click here </a> To reset  </p>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
    class="modal fade">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf 
        @if ($errors->has('email'))                
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <strong>{{ $errors->first('email') }}</strong>               
        </div>
        @endif 
        @if (Session::has('error'))
          <div class="alert alert-danger">
            <p>{{ Session::get('error') }}</p>
          </div>
        @endif 
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</i></button>
                <h4 class="modal-title"> Forgot password </h4>
            </div>
            <div class="modal-body">
                <p> Forgot password heading </p>
                <input type="email" name="email" placeholder="Email" autocomplete="off"
                class="form-control placeholder-no-fix">
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default pull-left" type="button">close</button>
                <button class="btn btn-primary" type="submit"> submit </button>
            </div> 
        </div>
        </form>
    </div>
</div>
@endsection
