<div class="col-md-{{$field->col}} form-group" @if($field->is_hidden == 1) hidden @endif>
    <label for="{{$field->name}}_{{$field->id}}">{{$field->title}}
        @if($field->is_required == 1) <span class="text-primary">*</span> @endif</label>
    @yield('field_content')
</div>

