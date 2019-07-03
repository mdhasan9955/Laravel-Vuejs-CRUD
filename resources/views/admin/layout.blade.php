<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <meta name="csrf-token" value="{{ csrf_token() }}" />



    <link rel="shortcut icon" href=""/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{asset('public/admin-asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/plugins/iCheck/square/green.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/plugins/redactor/redactor.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/dist/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin-asset/dist/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('public/admin-asset/plugins/jQuery/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
</head>
<body class="skin-blue fixed sidebar-mini">
<div class="wrapper">    
    <!-- header header  -->
    @include('admin.include.header')        
    <!-- End header header -->
    
    <!-- Left Sidebar  -->
    @include('admin.include.leftbar-sidebar') 
    
    @yield('breadcrumb')
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    @yield('content')
    <!-- End Page wrapper  -->
    <!-- Ajax Page load -->
    <div id="ajaxload"></div>
        <!-- Ajax Page load -->
</div> 
<div class="modal" data-easein="flipYIn" id="posModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="popUpView"></div>
<footer class="main-footer"> 
    <a href=" ">Copyright &copy; @php echo date('Y'); @endphp  Blogs. All rights reserved.</a>
</footer>
</div>
<div id="ajaxCall"><i class="fa fa-spinner fa-pulse"></i></div>


<script src="{{asset('public/admin-asset/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/redactor/redactor.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/formvalidation/js/formValidation.popular.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/plugins/formvalidation/js/framework/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/dist/js/common-libs.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/dist/js/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/dist/js/custom.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin-asset/dist/js/pages/all.js')}}" type="text/javascript"></script>
  
<script type="text/javascript"> 
    function popUp(url) {
        $("#popUpView").load(url);
    } 
    function hide() {
        $( ".posModal" ).hide();
    } 
    function goBack() {
      window.history.back();
    }  
</script>
</body>
</html> 