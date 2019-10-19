@extends('layouts.app')

@section('content')
<div id="app">
  <customer-list></customer-list>
</div>
<script src="{{asset('js/app.js')}}"></script>
     
@endsection
