@extends('layouts.app')

@section('content')
    
    <div class="container-fuild">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding:15px 30px 0; ">
            <h1>
              User Profile
            </h1>
            <ol class="breadcrumb" style="right:30px">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Examples</a></li>
              <li class="active">User profile</li>
            </ol>
        </section>

        <!--Body Section -->
        <div class="content" id="app">
            <company-list></company-list>
        </div>               
        <script src="{{asset('../js/app.js')}}"></script>
    </div><!--/row-->

@endsection
