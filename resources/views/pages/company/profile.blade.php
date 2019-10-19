@extends('layouts.app')

@section('content')
    <div class="container-fuild">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding:15px 30px;">
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
        <div class="row content">
            <div class="col-sm-3"><!--left col-->

                 <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        {{-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}
            
                        <h3 class="profile-username text-center">{{$company->name}}</h3>
            
                        <p class="text-muted text-center">{{$company->detail}}</p>
            
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                            <b>Mobile:</b> <a class="pull-right">{{$company->phone}}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Account No:</b> <a class="pull-right">{{$company->account_no}}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Email:</b> <a class="pull-right">{{$company->email}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
        
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
            
                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>
            
                        <hr>
            
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
            
                        <p class="text-muted">Malibu, California</p>
            
                        <hr>
            
                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            
                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>
            
                        <hr>
            
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
            
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
              <!-- /.box -->



                
            </div>
          <!--/col-3-->
          <div class="col-sm-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                  <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>

                <div id="app">
                    <company-profile></company-profile>
                </div>
            </div>
                
            <script src="{{asset('../js/app.js')}}"></script>
          </div><!--/col-9-->
        </div><!--/row-->

@endsection
