@extends('layouts.app')

@section('content')
<!--=====================================
=            module add Product            =
======================================-->

<!-- Modal -->
    <div id="addProduct" class="" >
        <div class="modal-dialog">
          <div class="modal-content">
      
            {{ Form::open(['action' => ['StocksController@update', $stock->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}  
      
              <!--=====================================
              HEADER
              ======================================-->
              <div class="modal-header" style="background: #3c8dbc; color: #fff">
                <a href="/stocks" type="button" class="close" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Add Product</h4>
              </div>
      
              <!--=====================================
              BODY
              ======================================-->
      
              <div class="modal-body">
                <div class="box-body">
      
                  <!-- input category -->
                  <div class="form-group">
                    <div class="input-group">
      
                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      {{Form::select('category', [$stock->category => $stock->category], 'Customer', ['class' => 'form-control input-lg'])}}
      
                    </div>
                  </div>
      
                  <!--Input Code -->
                  <div class="form-group">
                    <div class="input-group">
      
                      <span class="input-group-addon"><i class="fa fa-code"></i></span>
                      {{Form::text('code', $stock->code, ['class' => 'form-control input-lg', 'placeholder' => 'Add Code'])}}
      
                    </div>
                  </div>
      
                  <!-- input description -->
                  <div class="form-group">
                    <div class="input-group">
      
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                      {{Form::text('description', $stock->description, ['class' => 'form-control input-lg', 'placeholder' => 'Add Description'])}}
      
                    </div>
                  </div>
      
                   <!-- input Stock -->
                  <div class="form-group">
                    <div class="input-group">
      
                      <span class="input-group-addon"><i class="fa fa-check"></i></span>
                      {{Form::text('stock', $stock->stock, ['class' => 'form-control input-lg', 'placeholder' => 'Add Stock'])}}
      
                    </div>
                  </div>
      
                  <!-- INPUT BUYING PRICE -->
                    <div class="form-group row">
                        
                        <div class="col-xs-12 col-sm-6">
                        <div class="input-group"> 
        
                            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                            {{Form::text('buying_price', $stock->buying_price, ['class' => 'form-control input-lg', 'placeholder' => 'Buying Price'])}}
        
                        </div>
                        </div>
        
                        <!-- INPUT SELLING PRICE -->
                        <div class="col-xs-12 col-sm-6">  
                        <div class="input-group"> 
        
                            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                            {{Form::text('selling_price', $stock->selling_price, ['class' => 'form-control input-lg', 'placeholder' => 'Selling Price'])}}
        
                        </div> 
                        </div>
        
                    </div>
      
                  <!-- input image -->
                  <div class="form-group">
                    <div class="panel">Upload image</div>
      
                    {{Form::file('image', ['class' => ''])}}
                    <p class="help-block">Maximum size 2Mb</p>
                    <img src="/storage/product_image/{{$stock->image}}" class="img-thumbnail preview" alt="" width="100px">
      
                  </div> 
                </div>
      
            </div>
      
              <!--=====================================
              FOOTER
              ======================================-->
      
              <div class="modal-footer">
                {{Form::hidden('_method', 'PUT')}}

                <a href="/stocks" type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</a>
                {{Form::submit('Update Product', ['class' => 'btn btn-primary'])}}
      
              </div>
      
              {{ Form::close() }}
      
            </div>
      
        </div>

      </div>
      
      <!--====  End of module add Product  ====-->

@endsection
