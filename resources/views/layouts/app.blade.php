<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{url('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <link rel="icon" href="{{asset('img/template/icono-negro.png')}}">

    <title>{{ config('app.name', 'Inventory System') }}</title>
    

       <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
  
    <!--=================================
    =            Plugins CSS            =
    ==================================-->
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}"> 
  
        <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
    <!-- iCheck for checkboxes and radio inputs -->
    {{-- <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}"> --}}
    
    <!--====  End of Plugins CSS  ====-->
    
    <!--========================================
    =            plugins javascript            =
    =========================================-->
    <!-- jQuery 3 -->
    {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
  
    <!-- Bootstrap 3.3.7 -->
    <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  
    <!-- FastClick -->
    <script type="text/javascript" src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
  
    <!-- AdminLTE App -->
    <script type="text/javascript" src="{{asset('dist/js/adminlte.min.js')}}"></script>
  
     <!-- DataTables -->
    {{-- <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script> --}}
  
    <!-- sweet alert -->
    {{-- <script src="/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="/plugins/jquery-tabledit/jquery.tabledit.min.js"></script> --}}
  
  
    <!-- iCheck 1.0.1 -->
    {{-- <script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script> --}}
    

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
    @yield('login')
    @yield('print-page')
    
    @if(Auth::check())
        @include('inc.header')
        @include('inc.sidebar')
        <div class="content-wrapper" >
            @include('inc.messages')
            @yield('content')
        </div>
    @endif
    
 
    
</body>
</html>
