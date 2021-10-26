@extends('laravel-system::layouts.modules.view')
@section('tabs_section')
    @include(config('laravel_system.tab_default'))
@endsection
@section('data_section')
    @include('laravel-system::layouts.modules.sections.main', [
                'class_name' => 'tab-name-main',
                'record' => $record,
            ])
@endsection
