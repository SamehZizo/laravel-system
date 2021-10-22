@extends('laravel-system::form_builder.layouts.generic_field')
@section('field_content')
    <input type="hidden" name="{{$field->name}}" value="0">
    <input class="col-2 ff-text-input p-1" id="{{$field->id}}" type="checkbox" name="{{$field->name}}"
           @if($field->is_disable == 1) disabled @endif value="1"
           @if(isset($record[$field->name]) && $record[$field->name] == 1) checked @endif>
@endsection
