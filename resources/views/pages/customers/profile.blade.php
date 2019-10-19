@extends('layouts.app')

@section('content')

    <div class="container bootstrap snippet">
        <div class="row">
          <div class="col-sm-10"><h3>{{$customer->name}}</h3></div>
          <div class="col-sm-2">
            <a href="/customers" class="pull-right">
              <img title="profile image" style="width:100px;height:100px;" class="img-circle img-responsive" src="/uploads/customer_images/{{$customer->image}}" alt="profile image">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"><!--left col-->
                
            <ul class="list-group">
              <li class="list-group-item text-muted">Profile</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Phone :</strong></span>{{$customer->phone}}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Area :</strong></span>{{$customer->area}}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Status :</strong></span>{{$customer->status}}</li>
              
            </ul> 
                  
            <div class="panel panel-default">
              <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
              <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
            </div>
            
            
            <ul class="list-group">
              <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Total Purchase :</strong></span> 125</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Total Pay :</strong></span> 13</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Total Due :</strong></span> 37</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Total Balance :</strong></span> 78</li>
            </ul> 
                
          </div><!--/col-3-->
          <div class="col-sm-9">
            
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
              <li><a href="#credited" data-toggle="tab">Credited</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
                
            <div id="app">
              <customer-buying></customer-buying>
            </div>
            <script src="{{asset('../js/app.js')}}"></script>
          </div><!--/col-9-->
        </div><!--/row-->

@endsection
