@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->

      <!--=====================================
=            module add Categories            =
======================================-->

<!-- Modal -->
<div id="addCategories">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            {{ Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) }}
              <div class="modal-header" style="background: #3c8dbc; color: #fff">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Categories</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                  <!--Input name -->
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        {{Form::text('category', '', ['class' => 'form-control input-lg', 'placeholder' => 'Add Category'])}}
                        
                    </div>
                  </div>
      
                </div>
              </div>
              <div class="modal-footer">
                
                <a href="/categories" class="btn btn-default pull-left">Close</a>
                {{Form::submit('Save Category', ['class' => 'btn btn-primary'])}}

              </div>
            {{ Form::close() }}
          </div>
      
        </div>
      </div>
      
      <!--====  End of module add Categories  ====-->
@endsection
