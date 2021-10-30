@extends('laravel-system::layouts.app')
@section('content')
    <div class="row col-12 mt-2">
        <div class="col-6">
            <h1 class="m-0">{{$record->getSingularName()}} : {{$record->title}}</h1>
        </div>
        <div class="col-6">
            <h1 class="m-0 pull-right">{{$record->title_ar}}</h1>
        </div>
    </div>
    <hr class="row col-12">
    {{--Above open to view toolbar--}}
    <div class="row {{--col-12--}}">
        <div class="col-md-2 col-xs-12 mb-3 {{--p-0--}} view-nav">
            <ul class="nav flex-column view-tabs">
<!--                <li class="col-12 nav-item tab-name-main bg-primary selected-view-tab"><a class="nav-link text-white" href="#">Main</a></li>-->
                @yield('tabs_section')
            </ul>
        </div>
<!--        <div class="vertical-line"></div>-->
        <div class="col-md-10 col-xs-12 view-view border-left" style="min-height: 300px">
            {{--@include('layouts.modules.tabs.main', [
                'class_name' => 'tab-name-main',
                'record' => $record,
            ])--}}
            @yield('data_section')
        </div>
    </div>
@endsection
