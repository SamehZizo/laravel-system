@extends('laravel-system::layouts.modules.view')
@section('tabs_section')
    <li class="col-12 nav-item tab-name-main bg-primary selected-view-tab"><a class="nav-link text-white" href="#">Main</a></li>
@endsection
@section('data_section')
    @include('laravel-system::layouts.modules.tabs.main', [
                'class_name' => 'tab-name-main',
                'record' => $record,
            ])
@endsection
