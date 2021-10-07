@extends('layouts.app')
@section('content')
    <div class="p-3">
        <div class="col-12 mb-4 p-0 d-inline-flex">
            <div class="col-12 m-0 p-0 text-center"><h2>Create {{$singular_name}}</h2></div>
        </div>
        @yield('default_content')
    </div>
@endsection
