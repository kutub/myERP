@extends('layouts.app')

@section('content')

  <section class="content-header">
      <h1>Create Sales</h1>
  
      <ol class="breadcrumb">
        
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      
      </ol>

  </section>

  <section class="container-fluid">
    <div class="box">
      <div class="box-body">

        <div id="app">
          <create-order></create-order>
       </div>

      </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
  </section>
  
@endsection

