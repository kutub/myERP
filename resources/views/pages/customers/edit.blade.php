@extends('layouts.app')

@section('content')

<!--=====================================
=            module add Customer            =
======================================-->
<!-- Modal -->
<div id="addCustomer" class="">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      {{ Form::open(['action' => ['CustomersController@update', $customer->id], 'method' => 'POST']) }}          
        <!--=====================================
        HEADER
        ======================================-->
        <div class="modal-header" style="background: #3c8dbc; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Customer</h4>
        </div>

        <!--=====================================
        BODY
        ======================================-->
        <div class="modal-body">
          <div class="box-body">

            <!--Input Name -->
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                {{Form::text('name', $customer->name, ['class' => 'form-control input-lg', 'placeholder' => 'Add Name'])}}
                
              </div>
            </div>

            <!--Input Phone -->
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                {{Form::number('phone', $customer->phone, ['class' => 'form-control input-lg', 'placeholder' => 'Add Phone'])}}
                
              </div>
            </div>

            <!--Select Status -->
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                {{Form::text('status', $customer->status, ['class' => 'form-control input-lg'])}}
                
              </div>
            </div>

            <!--Select Status -->
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                {{Form::text('area', $customer->area, ['class' => 'form-control input-lg', 'placeholder' => 'Add Area'])}}
                
              </div>
            </div>

             <!-- input image -->
             <div class="form-group">
              <div class="panel">Upload image</div>

                {{Form::file('image', ['class' => ''])}}
                <p class="help-block">Maximum size 2Mb</p>
                <img src="uploads/customer_images/{{$customer->image}}" class="img-thumbnail" width="40px">
              </div>
            </div>


          </div>
            <div class="modal-footer">
                {{Form::hidden('_method', 'PUT')}}

                <a href="/customers" class="btn btn-default pull-left">Close</a>
                {{Form::submit('Update Customer', ['class' => 'btn btn-primary'])}}
        
            </div>
        </div>

      {{ Form::close() }}
    </div>
  </div>
</div>

<!--====  End of module add Customer  ====-->

@endsection
