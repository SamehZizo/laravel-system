function initDateTable(element, run_server_side, datatable_route, columns) {
    //element.DataTable().clear().destroy();
    /*if ($.fn.DataTable.isDataTable(element)) {
        element.DataTable.destroy();
    }*/

    var cols = ''
    columns.forEach(function (column, index) {
        if (column.type === 'image') {
            cols += '<th><img src="' + column.name + '" alt="' + column.name + '"></th>'
            columns[index].render = function (data) {
                let width = column.width != null ? column.width : 80
                return "<img src='" + data + "' alt='" + column.name + "' width='" + width + "px'>";
            }
        } else {
            cols += '<th>' + column.name + '</th>'
        }
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
