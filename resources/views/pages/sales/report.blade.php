@extends('layouts.app')

@section('content')
  <section class="content-header">
    <h1>Sales Report</h1>
    
    <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
    
  </section>
    
  <section class="content">
    <div class="box">
        
      <div class="box-header with-border">
            <h4>Total Sale: {{$total_sale}}</h4>
            <h4>Total Cash: {{$total_cash}}</h2>
            <h4>Total Due: {{$total_due}}</h4>
      </div>
    
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
           
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Sales Id</th>
              <th>Customer Id</th>
              <th>Total</th>
              <th>Cash</th>
              <th>Due</th>
              <th>Pay By</th>
              <th>Time</th>
              <th>Invoice</th>
            </tr> 
          </thead>
    
          <tbody>
            @if (count($sales) > 0)
                @foreach ($sales as $sale)
                  <tr>
                    <td></td>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->customer_id}}</td>
                    <td>{{$sale->total}}</td>
                    <td>{{$sale->cash}}</td>
                    <td>{{$sale->due}}</td>
                    <td>{{$sale->pay_by}}</td>
                    <td>{{$sale->created_at}}</td>
                  <td><a href="/invoice/{{$sale->invoice}}">{{$sale->invoice}}</a></td>
                  </tr>
                @endforeach
            @endif 
          </tbody>
    
        </table>
    
      </div>
    </div>
  </section>
@endsection
