@extends('form_builder.layouts.generic_field')
@section('field_content')
    <select class="form-control" id="{{$field->id}}" type="text" name="{{$field->name}}"
            @if($field->is_disable == 1) disabled @endif
            @if($field->is_required == 1) required @endif>
        <option value="">Select {{$field->title}}</option>
        @if(!empty($items))
            @foreach($items as $item)
                <option value="{{$item->id}}" name="{{$item->slug ?? null}}"
                        @if(isset($record[$field->name]) && $record[$field->name] == $item->id) selected @endif>{{$item->title}}</option>
            @endforeach
        @endif
    </select>
@endsection
