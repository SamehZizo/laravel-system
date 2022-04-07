function initDateTable(element, run_server_side, datatable_route, columns) {
    //element.DataTable().clear().destroy();
    /*if ($.fn.DataTable.isDataTable(element)) {
        element.DataTable.destroy();
    }*/

    var cols = ''
    columns.forEach(function (column, index) {
        cols += '<th>' + column.name + '</th>'
    })
    element.html('<thead><tr>' + cols + '</tr></thead>')
    element.DataTable({
        processing: true,
        searching: true,
        ordering: true,
        destroy: true,
        sProcessing: getHtmlLoaderView(),
        serverSide: run_server_side,
        ajax: datatable_route,
        columns: columns,
        /*rowReorder: {
            selector: 'td:nth-child(2)'
        },*/
        responsive: true,
    });
}

function getHtmlLoaderView() {
    return '<div class="text-center col-12"><div class="spinner-border text-primary" role="status"></div></div>';
}
