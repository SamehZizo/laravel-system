// on document ready
$(document).ready(function () {
    datepickerInit()
});

// show and hide form builder form
$(document).on('shown.bs.modal', '#formBuilderModal', function (e) {
    $(this).find('.modal-title').html($(e.relatedTarget).data('title'));
    $(this).find('#formBuilderModalForm').attr('action', $(e.relatedTarget).data('action'));
    $(this).find('#form-route').attr('value', $(e.relatedTarget).data('form-route'));
    $(this).find('#form-type').attr('value', $(e.relatedTarget).data('form-type'));

    let form_route = $(this).find('#form-route').val()
    let modalBody = $(this).find('.modal-body')
    let submitButton = $(this).find('.submit')
    let action_route = $(this).find('#formBuilderModalForm').attr('action')

    $.ajax({
        url: form_route,
        method: 'GET',
        beforeSend: function () {
            modalBody.html(getHtmlLoaderView())
        },
        success: function (response) {
            modalBody.html(response)
            if (response.indexOf('No form added yet') === -1 && response.indexOf('No fields added yet') === -1) {
                if (action_route) {
                    submitButton.prop('hidden', false)
                }
                datepickerInit()
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxError(jqXHR, textStatus, errorThrown)
            modalBody.html()
        },
        complete: function () {
        },
    })
}).on('hidden.bs.modal', function () {
    $(this).find('.modal-body').html('')
    $(this).find('.submit').prop('disabled', false)
    $(this).find('.submit').prop('hidden', true)
    $(this).find('#formBuilderModalForm').attr('action', '')
});

// submit form builder modal form
$(document).on('submit', '#formBuilderModalForm', function (e) {
    e.preventDefault()
    let form = $(this)

    let submitButton = form.find('.submit')
    submitButton.prop('disabled', true)

    let route = form.attr('action')
    let modalType = $(this).find('#form-type').val()

    let type = '';
    if (modalType === 'create') {
        type = 'POST'
    } else if (modalType === 'edit') {
        type = 'PUT'
    }

    $.ajax({
        url: route,
        type: type,
        data: new FormData($(this)),
        success: function (response) {
            showSuccessToast(response)
            refreshDatatable()
            closeModalAutomatic(form)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxError(jqXHR, textStatus, errorThrown)
            submitButton.prop('disabled', false)
        },
        complete: function () {
            //submitButton.prop('disabled', false)
        },
    });
});

// show and hide delete form
$(document).on('shown.bs.modal', '#deleteModal', function (e) {
    $(this).find('#delete-form').attr('action', $(e.relatedTarget).data('action'))
    $(this).find('.modal-body')
        .html('Are you sure you want to delete <spanclass="font-weight-bold text-danger">'
            + $(e.relatedTarget).data('title') + '</span> ?')
    $(this).find('#item-id').attr('value', $(e.relatedTarget).data('id'))
    $(this).find('.modal-title').html('Delete ' + $(e.relatedTarget).data('model-title'))
}).on('hidden.bs.modal', function () {
    $(this).find('#delete-form').attr('action', '')
    $(this).find('.modal-body').html('')
    $(this).find('#item-id').attr('value', '')
    $(this).find('.modal-title').html('')
    $(this).find('.delete').prop('disabled', false)
});

// submit delete form
$(document).on('submit', '#delete-form', function (e) {
    e.preventDefault()
    let form = $(this)

    let deleteButton = form.find('.delete')
    deleteButton.prop('disabled', true)

    let route = form.attr('action')

    $.ajax({
        url: route,
        type: 'DELETE',
        data: $(this).serialize(),
        success: function (response) {
            showSuccessToast(response)
            refreshDatatable()
            closeModalAutomatic(form)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxError(jqXHR, textStatus, errorThrown)
            deleteButton.prop('disabled', false)
        },
        complete: function () {
        },
    });
});

// system form  field
$(document).on('change', '#field_type_id', function (e) {
    checkIfModelSelected()
});

// show and hide form builder form
$(document).on('shown.bs.modal', '#viewModal', function (e) {
    $(this).find('.modal-title').html($(e.relatedTarget).data('title'));
    //$(this).find('#viewModalForm').attr('action', $(e.relatedTarget).data('action'));
    $(this).find('#form-route').attr('value', $(e.relatedTarget).data('form-route'));
    //$(this).find('#form-type').attr('value', $(e.relatedTarget).data('form-type'));

    let form_route = $(this).find('#form-route').val()
    let modalBody = $(this).find('.modal-body')
    //let submitButton = $(this).find('.submit')
    //let action_route = $(this).find('#viewModalForm').attr('action')

    $.ajax({
        url: form_route,
        method: 'GET',
        beforeSend: function () {
            modalBody.html(getHtmlLoaderView())
        },
        success: function (response) {
            modalBody.html(response)
            tabsInit()
            /*if (response.indexOf('No form added yet') === -1 && response.indexOf('No fields added yet') === -1) {
                if (action_route) {
                    submitButton.prop('hidden', false)
                }
                datepickerInit()
            }*/
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ajaxError(jqXHR, textStatus, errorThrown)
            modalBody.html()
        },
        complete: function () {
        },
    })
}).on('hidden.bs.modal', function () {
    $(this).find('.modal-body').html('')
    /*$(this).find('.submit').prop('disabled', false)
    $(this).find('.submit').prop('hidden', true)*/
    $(this).find('#viewModalForm').attr('action', '')
});
