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
      {{ Form::open(['action' => 'CustomersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}          
        <!--=====================================
        HEADER
        ======================================-->
        <div class="modal-header" style="background: #3c8dbc; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Customer</h4>
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
                {{Form::text('name', '', ['class' => 'form-control input-lg', 'placeholder' => 'Add Name'])}}
                
              </div>
            </div>

            <!--Input Phone -->
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                {{Form::number('phone', '', ['class' => 'form-control input-lg', 'placeholder' => 'Add Phone'])}}
                
              </div>
            </div>

            <!--Select Status -->
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                {{Form::select('status', ['Customer' => 'Customer', 'Dealer' => 'Dealer', 'Retailer' => 'Retailer'], 'Customer', ['class' => 'form-control input-lg'])}}
                
              </div>
            </div>

            <!--Select Status -->
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                {{Form::text('area', '', ['class' => 'form-control input-lg', 'placeholder' => 'Add Area'])}}
                
              </div>
            </div>

             <!-- input image -->
            <div class="form-group">
              <div class="panel">Upload image</div>

                {{Form::file('image', ['class' => ''])}}
                <p class="help-block">Maximum size 2Mb</p>
                <img src="{{asset('img/customers/default/anonymous.png')}}" alt="" width="100px">

              </div>
            </div>

          </div>
            <div class="modal-footer">

                <a href="/customers" class="btn btn-default pull-left">Close</a>
                {{Form::submit('Save Customer', ['class' => 'btn btn-primary'])}}
        
            </div>
        </div>

      {{ Form::close() }}
    </div>
  </div>
</div>

<!--====  End of module add Customer  ====-->

@endsection
