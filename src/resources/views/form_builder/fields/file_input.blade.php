@extends('laravel-system::form_builder.layouts.generic_field')
@section('field_content')
    <input class="form-control" id="{{$field->name}}_{{$field->id}}" type="file" name="{{$field->name}}" placeholder="Add {{$field->title}} File"
           @if($field->is_disable == 1) disabled @endif
           @if($field->is_required == 1 && empty($record)) required @endif
           value="{{$record[$field->name] ?? ''}}">
@endsection
