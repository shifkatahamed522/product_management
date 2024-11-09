<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products Management</title>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap@5.0.2_dist_css_bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    
    <script src="{{asset('assets/js/code.jquery.com_jquery-3.7.0.min.js')}}"></script>

    <!-- bootstrap js -->
    <script src="{{asset('assets/js/bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js')}}"></script>
  </head>
  <body>
    @yield('content')
    
    
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    
  </body>
</html>