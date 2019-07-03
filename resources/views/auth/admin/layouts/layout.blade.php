<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link href="{{asset('public/admin-asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('public/admin-asset/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('public/admin-asset/plugins/iCheck/square/green.css')}}" rel="stylesheet" type="text/css" />
</head>
<body class="login-page"> 
    @yield('content')
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