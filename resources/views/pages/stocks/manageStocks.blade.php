@extends('layouts.app')

@section('content')
    <div id="app">
        <manage-stock></manage-stock>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection
