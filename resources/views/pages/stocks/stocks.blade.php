@extends('layouts.app')

@section('content')
  <section class="content-header">
    <h1>Product management</h1>
    
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
    
  </section>
    
  <section class="content">
    <div class="box">

      <div class="box-header with-border">
        <a href="/stocks/create" class="btn btn-primary">Add Product</a>
      </div>
    
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
           
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Image</th>
              <th>Code</th>
              <th>Description</th>
              <th>Category</th>
              <th>Stock</th>
              <th>Buying price</th>
              <th>Selling Price</th>
              <th>Date added</th>
              <th>Actions</th>
            </tr> 
          </thead>
    
          <tbody>
            @if (count($stocks) > 0)
                @foreach ($stocks as $stock)
                  <tr>
                    <td>{{$stock->id}}</td>
                    <td><img src="/uploads/product_images/{{$stock->image}}" class="img-thumbnail" width="40px"></td>
                    <td>{{$stock->code}}</td>
                    <td>{{$stock->description}}</td>
                    <td>{{$stock->category}}</td>
                    <td>{{$stock->stock}}</td>
                    <td>{{$stock->buying_price}}</td>
                    <td>{{$stock->selling_price}}</td>
                    <td>{{$stock->created_at}}</td>
                    <td>
                      <div class="btn-group">
                          
                      <a href="stocks/{{$stock->id}}/edit" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                      {!! Form::open(['action' => ['StocksController@destroy', $stock->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
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
  </section>
@endsection
