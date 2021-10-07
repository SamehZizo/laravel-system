@extends('form_builder.layouts.generic_field')
@section('field_content')
    <input class="form-control" id="{{$field->name}}_{{$field->id}}" type="text" name="{{$field->name}}" placeholder="Enter {{$field->title}}"
           @if($field->is_disable == 1) disabled @endif
           @if($field->is_required == 1) required @endif
           value="{{$record[$field->name] ?? ''}}">
@endsection
