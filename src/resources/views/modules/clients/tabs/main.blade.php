@extends('layouts.modules.tabs.tab_layout')
@section('model_view_content')
    <div class="row">
        <div class="col-12">
            @if($record->is_active)
                <button id="inactive_client" class="btn btn-danger">Inactive Client</button>
            @else
                <button id="active_client" class="btn btn-success">Active Client</button>
            @endif
        </div>
        <div class="col-md-6 col-xs-12">
            @include('layouts.modules.items.item', ['title' => 'Name', 'data' => $record->name])
            @include('layouts.modules.items.item', ['title' => 'Email', 'data' => $record->email])
            @include('layouts.modules.items.item', ['title' => 'Gender', 'data' => $record->gender->title])
        </div>
        <div class="col-md-6 col-xs-12">
            @include('layouts.modules.items.item', ['title' => 'Birth Date', 'data' => $record->birth_date])
            @include('layouts.modules.items.item', ['title' => 'Active', 'data' => $record->is_active])
            @include('layouts.modules.items.item', ['title' => 'Source', 'data' => !empty($record->source) ? $record->source->name : ''])
        </div>
    </div>
@endsection
<script>
    $(document).ready(function () {
        $('#active_client').click(function () {
            if (confirm("Are you sure that you want to active this client ?")) {
                let route = '{!! route('active_client',['id' => $record->id]) !!}';
                let button = $(this)
                button.addClass('disabled')
                $.ajax({
                    url: route,
                    method: 'GET',
                    beforeSend: function () {
                    },
                    success: function (response) {
                        showSuccessToast(response)
                        refreshPage()
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        ajaxError(jqXHR, textStatus, errorThrown)
                        button.removeClass('disabled')
                    },
                    complete: function () {
                    },
                });
            }
        });
        $('#inactive_client').click(function () {
            if (confirm("Are you sure that you want to inactive this client ?")) {
                let route = '{!! route('inactive_client',['id' => $record->id]) !!}';
                let button = $(this)
                button.addClass('disabled')
                $.ajax({
                    url: route,
                    method: 'GET',
                    beforeSend: function () {
                    },
                    success: function (response) {
                        showSuccessToast(response)
                        refreshPage()
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        ajaxError(jqXHR, textStatus, errorThrown)
                        button.removeClass('disabled')
                    },
                    complete: function () {
                    },
                });
            }
        });
    });
</script>
