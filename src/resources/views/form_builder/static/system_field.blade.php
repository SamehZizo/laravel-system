@if(isset($row))<input type="hidden" name="id" value="{{$row['id']}}">@endif
<div class="col-md-4 col-12 ml-auto">
    <label for="field_title">Field Title *</label>
    <input id="field_title" class="col-12 form-builder-field p-1" type="text" placeholder="Field Title" name="title" required
           @if(isset($row)) value="{{$row['title']}}" @endif>
</div>
<div class="col-md-4 col-12 mr-auto">
    <label for="field_name">Field Name *</label>
    <input id="field_name" class="col-12 form-builder-field p-1" type="text" placeholder="Field Name" name="name" required
           @if(isset($row)) value="{{$row['name']}}" @endif>
</div>
