@extends('form_builder.layouts.generic_field')
@section('field_content')
    <input type="hidden" name="{{$field->name}}[]" value="0">
    <select class="col-12 ff-text-input p-1 multi-model-dropdown" id="{{$field->id}}" type="text" name="{{$field->name}}[]"
            @if($field->is_disable == 1) disabled @endif multiple
            @if($field->is_required == 1) required @endif>
        {{--<option value="">Select {{$field->title}}</option>--}}
        @if(!empty($items))
            @foreach($items as $item)
                <option value="{{$item->id}}" @if(in_array($item->id, $selected)) selected @endif>{{$item->title}}</option>
            @endforeach
        @endif
    </select>
@endsection
