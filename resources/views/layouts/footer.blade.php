<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade login-model">
                <div class="modal-dialog">  
                    <div class="modal-content"> 
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle close" aria-hidden="true" data-dismiss="modal"></i></button>
                            <!-- <h4 class="modal-title"> Login </h4> -->
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                        <div class="modal-body"> 

                        	<p class="login-icon">
	                            <i class="far fa-user"></i>
	                            <b>Welcome,</b> Login to your account.
	                        </p>

                            @csrf
                            <div class="form-group row"> 

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Your email address">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"> 

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Your password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 forget_link"> 
                                    @if (Route::has('password.request'))
                                        <a class="forget-pass" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group">
                            	<button class="btn btn-primary button" type="submit"> Login </button> 
                            </div>                              
                        </div>
                        <!-- <div class="modal-footer"> 
                            <div class="register_sec">
                                <span>Don't you have an account? </span>
                                <a href="#" data-dismiss="modal" class="text-danger" data-toggle="modal" data-target="#registerModal"> Register now </a>
                            </div>
                        </div> --> 
                        </form>
                    </div> 
                </div>
            </div>
            <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" 
            id="registerModal" class="modal fade login-model">
                <div class="modal-dialog">  
                    <div class="modal-content"> 
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle close" aria-hidden="true" data-dismiss="modal"></i></button> 
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                        <div class="modal-body">                                
                              
                            <p class="login-icon">
                                <i class="far fa-user"></i>
                                <b>Welcome,</b> New Here!!
                            </p>

                            @csrf
                            <div class="form-group row"> 

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Your name">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"> 

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Your email address">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row"> 

                                <div class="col-md-12">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required placeholder="Your phone number">

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"> 

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"> 
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Password Confirm">
                                </div>

                                
                            </div>
                            <div class="form-group">
                            	<button class="btn btn-primary button" type="submit"> Register </button>
                            </div>                               
                        </div>
                        <div class="modal-footer"> 
                            <div class="register_sec">
                                <span>Already Member? </span>
                                <a href="#" data-dismiss="modal" class="text-danger" data-toggle="modal" data-target="#myModal"> Login</a>
                            </div>
                        </div> 
                        </form>
                    </div> 
                </div>
            </div> -->
        </div>
        <script src="{{asset('public/admin-asset/plugins/jQuery/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin-asset/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin-asset/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
        <script>
            $(function () {
                if ($('#email').val())
                    $('#password').focus();
                else
                    $('#email').focus();
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>
