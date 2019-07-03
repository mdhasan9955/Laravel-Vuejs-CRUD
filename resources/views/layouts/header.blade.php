<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RightClick</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
          <link href="{{asset('public/admin-asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('public/admin-asset/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('public/admin-asset/plugins/iCheck/square/green.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('public/css/custom-style.css')}}" rel="stylesheet" type="text/css" />

          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- Styles --> 
        <style type="text/css">
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url("{{asset('public/admin-asset/images/abstract-background-blur-255379.jpg')}}");
                background-size: cover;
                background-position: center;
                padding: 0 !important;
            }
            .leftcolumn {
              float: left;
              width: 75%;
            }

            /* Right column */
            .rightcolumn {
              float: left;
              width: 25%;
              padding-left: 20px;
            }

            /* Fake image */
            .fakeimg {
              background-color: #aaa;
              width: 100%;
              padding: 20px;
            }

            /* Add a card effect for articles */
            .card {
              background-color: white;
              padding: 20px;
              margin-top: 20px;
            }

            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
        	<div class="header_sec">
        		<div class="container clearfix">
	        		<div class="logo_container"> 
                        <router-link :to="{ name: 'home' }" class="btn "><img src="{{asset('public/admin-asset/images/Logo.png')}}"/></router-link> 
	        		</div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger error-message">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-check"></i>{{ Session::get('error') }}</p>       
                        </div>
                    @endif
		            @if (Route::has('login'))
		                <div class="top-right links">
		                    @auth
		                        <a href="{{ url('/ticket') }}">Home</a>
		                    @else 
		                        <a href="#" class="text-danger" data-toggle="modal" data-target="#myModal"> Login </a> 

		                        @if (Route::has('register')) 
		                        @endif
		                    @endauth
		                </div>
		            @endif
		        </div>
	        </div>