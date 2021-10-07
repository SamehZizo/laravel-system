@extends('form_builder.layouts.generic_field')
@section('field_content')
    <input class="form-control datepicker" id="{{$field->name}}_{{$field->id}}" type="text" name="{{$field->name}}" placeholder="Enter {{$field->title}}"
           @if($field->is_disable == 1) disabled @endif
           @if($field->is_required == 1) required @endif>
    <input id="{{$field->name}}_{{$field->id}}_default_date" type="hidden" value="@if(isset($record) && isset($record[$field->name])){{$record[$field->name]}}@endif">
@endsection
{{--let defaultDate = '{!! $record[$field->name] !!}';--}}
<script>
    $(document).ready(function () {
        let fieldDateId = '#' + '{!! $field->name !!}' + '_' + '{!! $field->id !!}';
        let defaultDateId = '#' + '{!! $field->name !!}' + '_' + '{!! $field->id !!}' + '_default_date';
        let defaultDate = $(defaultDateId).val();
        //console.log('dateField : ' + fieldDateId + ', defaultDate : ' + defaultDate)
        datepickerSetDefault(fieldDateId, defaultDate)
    });

</script>
