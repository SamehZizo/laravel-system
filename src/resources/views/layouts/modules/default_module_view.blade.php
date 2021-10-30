@extends('laravel-system::layouts.modules.view')
@section('tabs_section')
    @include(config('laravel_system.module_tab_default'))
@endsection
@section('data_section')
    @include(config('laravel_system.module_section_main'), [
                'class_name' => 'tab-name-main',
                'record' => $record,
            ])
@endsection
