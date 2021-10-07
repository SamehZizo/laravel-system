@extends('layouts.modules.view')
@section('tabs_section')
    <li class="col-12 nav-item tab-name-main bg-primary selected-view-tab"><a class="nav-link text-white" href="#">Main</a></li>
    <li class="col-12 nav-item tab-name-transactions"><a class="nav-link text-dark" href="#">Transactions</a></li>
@endsection
@section('data_section')
    {{--@include('layouts.modules.tabs.main', [
                'class_name' => 'tab-name-main',
                'record' => $record,
            ])--}}
    @include('modules.clients.tabs.main', [
                'class_name' => 'tab-name-main',
                'record' => $record,
            ])
    @include('layouts.modules.tabs.child', [
        'class_name' => 'tab-name-transactions',
        'child_name' => 'transactions',
        'record' => $record,
    ])
@endsection
