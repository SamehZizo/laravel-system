@extends('layouts.modules.view')
@section('tabs_section')
    <li class="col-12 nav-item tab-name-main bg-primary selected-view-tab"><a class="nav-link text-white" href="#">Main</a></li>
    <li class="col-12 nav-item tab-name-periods_clients"><a class="nav-link text-dark" href="#">Clients</a></li>
@endsection
@section('data_section')
    @include('modules.periods.tabs.main', ['class_name' => 'tab-name-main','record' => $record,])
    @include('layouts.modules.tabs.child', [
        'class_name' => 'tab-name-periods_clients',
        'child_name' => 'periods_clients',
        'record' => $record,
    ])
@endsection
