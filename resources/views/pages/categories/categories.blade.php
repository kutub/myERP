@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
          Categories management
        </h1>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content">
  
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <a class="btn btn-primary" href="/categories/create">Add Categories</a>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tables" width="100%">
           
              <thead>
               
               <tr>
                 
                 <th style="width:10px">#</th>
                 <th>Category</th>
                 <th>Actions</th>
  
               </tr> 
  
              </thead>
  
              <tbody>
                @if(count($categories) > 0)
                  @foreach ($categories as $category)
                  <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->Category}}</td>
                      <td>
      
                        <div class="btn-group">
                          <a href="/categories/{{$category->id}}/edit" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                          {!! Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                          {!! Form::close() !!}
                        </div>  
      
                      </td>
      
                    </tr>
                  @endforeach
                @endif
                               
              </tbody>
  
            </table>
  
  
  
          </div>
        
        </div>
        <!-- /.box -->
  
      </section>
      <!-- /.content -->


@endsection
