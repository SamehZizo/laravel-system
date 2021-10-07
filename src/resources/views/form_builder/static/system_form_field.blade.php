@if(!empty($extra_form_data))
    @foreach($extra_form_data as $key => $value)
        <input name="{{$key}}" value="{{$value}}" hidden>
    @endforeach
@endif
<div class="col-4 form-group">
    <label for="field_id">Select Field *</label>
    <select id="field_id" class="form-control" name="field_id" required>
        <option value="">Select Field</option>
        @foreach($system_fields as $system_field)
            <option value="{{$system_field->id}}"
                    @if(isset($row) && $row->field_id == $system_field->id) selected @endif>
                {{$system_field->title}} - {{$system_field->name}}</option>
        @endforeach
        @if(isset($row)) <script> checkIfModelSelected('{!! $row !!}') </script> @endif
    </select>
</div>
<div class="col-4 form-group">
    <label for="field_type_id">Select Field Type *</label>
    <select id="field_type_id" class="form-control" name="field_type_id" required>
        <option value="">Select Field Type</option>
        @foreach($system_fields_types as $system_fields_type)
            <option value="{{$system_fields_type->id}}"
                    @if(isset($row) && $row->field_type_id == $system_fields_type->id) selected @endif>
                {{$system_fields_type->title}}</option>
        @endforeach
    </select>
</div>
<div class="col-4 form-group">
    <label for="col">Select Field Columns *</label>
    <select id="col" class="form-control" name="col" required>
        <option value="">Select Field Columns</option>
        @for($i = 1 ; $i <= 12 ; $i++)
            <option value="{{$i}}"
                    @if(isset($row) && $row->col == $i) selected @endif>
                {{$i}}</option>
        @endfor
    </select>
</div>
<div class="col-2 form-group">
    <input type="hidden" name="is_hidden" value="0">
    <input class="m-1" id="is_hidden" type="checkbox" name="is_hidden" value="1"
           @if(isset($row) && $row->is_hidden == 1) checked @endif><label for="is_hidden"> Hidden </label><br>

    <input type="hidden" name="is_disable" value="0">
    <input class="m-1" id="is_disable" type="checkbox" name="is_disable" value="1"
           @if(isset($row) && $row->is_disable == 1) checked @endif><label for="is_disable"> Disable </label>
</div>
<div class="col-2 form-group">
    <input type="hidden" name="is_required" value="0">
    <input class="m-1" id="is_required" type="checkbox" name="is_required" value="1"
           @if(isset($row) && $row->is_required == 1) checked @endif><label for="is_required"> Required </label><br>
</div>
<div class="col-4 form-group" id="model-dropdown-div">
</div>


