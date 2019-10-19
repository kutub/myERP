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
            {{ Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) }}
              <div class="modal-header" style="background: #3c8dbc; color: #fff">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Categories</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                  <!--Input name -->
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        {{Form::text('category', $category->Category, ['class' => 'form-control input-lg', 'placeholder' => 'Add Category'])}}
                        
                    </div>
                  </div>
      
                </div>
              </div>
              <div class="modal-footer">
                {{Form::hidden('_method', 'PUT')}}
                <a href="/categories" class="btn btn-default pull-left">Close</a>
                {{Form::submit('Save Category', ['class' => 'btn btn-primary'])}}
                {{-- <button type="submit" class="btn btn-primary">Save Category</button> --}}
              </div>
            {{ Form::close() }}
          </div>
      
        </div>
      </div>
      
      <!--====  End of module add Categories  ====-->
@endsection
