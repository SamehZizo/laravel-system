@if(isset($row))<input type="hidden" name="id" value="{{$row['id']}}">@endif
<div class="col-md-4 col-12 ml-auto">
    <label for="form_title">Form Title *</label>
    <input id="form_title" class="col-12 form-builder-field p-1" type="text" placeholder="Form Title" name="title" required
           @if(isset($row)) value="{{$row['title']}}" @endif>
</div>
<div class="col-md-4 col-12 mr-auto">
    <label for="form_code">Form Code *</label>
    <input id="form_code" class="col-12 form-builder-field p-1" type="text" placeholder="Form Code" name="code" required
           @if(isset($row)) value="{{$row['code']}}" @endif>
</div>
