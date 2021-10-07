@extends('layouts.modules.tabs.tab_layout')
@section('model_view_content')
    <div class="row">
        <div class="col-12">
            @if(empty($record->opened_at))
                <a class="btn btn-primary text-white" id="start_period">Start Period</a>
            @elseif(empty($record->closed_at))
                <a class="btn btn-success text-white" id="close_period">Close Period</a>
            @endif
            @if(!empty($record->opened_at))
                <a class="btn btn-warning" id="reset_period">Reset Period</a>
            @endif
        </div>
        <div class="col-md-6 col-xs-12">
            @include('layouts.modules.items.item', ['title' => 'Start Date', 'data' => $record->start_date])
            @include('layouts.modules.items.item', ['title' => 'End Date', 'data' => $record->end_date])
        </div>
        <div class="col-md-6 col-xs-12">
            @include('layouts.modules.items.item', ['title' => 'Open Balance', 'data' => $record->open_balance_formatted])
            @include('layouts.modules.items.item', ['title' => 'Close Balance', 'data' => $record->close_balance_formatted])
        </div>
    </div>
@endsection

<script>
    $(document).ready(function () {
        $('#start_period').click(function () {
            if (confirm("Are you sure you want to start this period ?")) {
                let route = '{!! route('open_period',['id' => $record->id]) !!}';
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
        $('#close_period').click(function () {
            let button = $(this)
            let closeBalance = prompt("Please enter close balance", '0');
            if (closeBalance != null && closeBalance !== '' && closeBalance !== '0') {
                if (confirm("Are you sure you want to close this period with " + closeBalance + " ?")) {
                    let route = '{!! route('close_period',['id' => $record->id, 'close_balance' => ':close_balance']) !!}';
                    route = route.replace(':close_balance', parseFloat(closeBalance));
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
            }
        });
        $('#reset_period').click(function () {
            if (confirm("Are you sure you want to reset this period ?")) {
                let route = '{!! route('reset_period',['id' => $record->id]) !!}';
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
