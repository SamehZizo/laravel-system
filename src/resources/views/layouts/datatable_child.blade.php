<div {{--class="p-3"--}}>
    <div class="row col-12 m-0 p-0 d-inline-flex">
        <div class="col-md-6 col-xs-12 m-0 p-0"><h2>{{$plural_name}}</h2></div>
        <div class="col-md-6 col-xs-12 m-0 p-0 text-right mb-3">
            @if($show_add_button)
                {{--<a class="btn btn-primary text-white" href="{{route($route_name . '.create')}}" target="_blank">Add {{$singular_name}}</a>--}}
                <li class="list-inline-item"><a href="#" class="form-builder-modal-button btn btn-primary text-white" data-toggle="modal"
                                                data-target="#formBuilderModal"
                                                data-form-route="{{$create_route}}"
                                                data-title="Create {{$singular_name}}"
                                                data-form-type="create"
                                                data-backdrop="static" data-keyboard="false"
                                                data-action="{{$store_route}}">Add {{$singular_name}}</a></li>
            @endif
        </div>
    </div>
    <br>
    <table class="table table-bordered data-table-child data-table-style {{--display hover--}} nowrap" style="width: 100%">
    </table>
</div>

<script type="text/javascript">
    $(function () {
        let columns = {!! json_encode($columns) !!};
        let run_server_side = {!! json_encode($run_server_side) !!};
        let datatable_route = "{{ $datatable_route }}";

        let table = $('.data-table-child')

        initDateTable(table, run_server_side, datatable_route, columns)
    });
</script>

