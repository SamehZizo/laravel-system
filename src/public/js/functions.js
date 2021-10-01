function showSuccessToast(msg) {
    let toast = $('.toast-success')
    toast.find('.toast-body').html(msg)
    toast.toast({delay: 5000,})
    toast.toast('show')
}

function showDangerToast(msg) {
    let toast = $('.toast-danger')
    toast.find('.toast-body').html(msg)
    toast.toast({delay: 5000,})
    toast.toast('show')
}

function refreshDatatable() {
    $('.data-table').DataTable().ajax.reload(null, false)
}

function closeModalAutomatic(closeModal) {
    setTimeout(function () {
        closeModal.find('.close').click()
    }, 2000)
}

function ajaxError(jqXHR, textStatus, errorThrown) {
    var msg = '';
    if (jqXHR.status === 0) {
        msg = 'Not connect.<br> Verify Network.';
    } else if (jqXHR.status === 404) {
        msg = 'Requested page not found. [404]';
    } else if (jqXHR.status === 500) {
        msg = 'Internal Server Error [500].';
    } else if (textStatus === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (textStatus === 'timeout') {
        msg = 'Time out error.';
    } else if (textStatus === 'abort') {
        msg = 'Ajax request aborted.';
    } else if (jqXHR.status === 422) {
        msg = 'Validation Error.';
        let responses = JSON.parse(jqXHR.responseText)
        for (let [key, response] of Object.entries(responses)) {
            msg += '<br>' + response
        }
    } else {
        msg = 'Uncaught Error.<br>' + jqXHR.responseText;
    }


    showDangerToast(msg);
}

// form builder functions
function checkIfModelSelected(row) {
    let fieldType = $('#field_type_id')
    let selectedValue = fieldType.val()
    if (selectedValue === '3') {
        setupModelDropdown(row, true)
    } else {
        setupModelDropdown(row, false)
    }
}

function setupModelDropdown(row, show) {
    let url = '/get_system_models'
    let dropdownDiv = $('#model-dropdown-div')
    if (show) {
        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                let text = '<label for="system_model_id">Select Model *</label>' +
                    '<select id="system_model_id" class="form-control" name="system_model_id" required>' +
                    '<option value="">Select Model</option>';

                $.each(response, function (index, value) {
                    if (row != null && JSON.parse(row).system_model_id === value.id) {
                        text += '<option value="' + value.id + '" selected>' + value.title + '</option>'
                    } else {
                        text += '<option value="' + value.id + '">' + value.title + '</option>'
                    }
                })

                text += '</select>';

                dropdownDiv.html(text);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                ajaxError(jqXHR, textStatus, errorThrown)
            },
        });
    } else {
        dropdownDiv.html('')
    }
}

function datepickerInit() {
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
    });
}

function datepickerSetDefault(dateField, defaultDate) {
    $(dateField).datepicker('setDate', new Date(formatTimeStampToMMDDYYYY(defaultDate))).datepicker('update');
    //$('.datepicker').datepicker('setDate', new Date(formatTimeStampToMMDDYYYY(defaultDate))).datepicker('update');
}

function formatTimeStampToMMDDYYYY(date) {
    let datePart = date.split(" ")[0].split("-");
    let MMDDYYYY = [datePart[1], datePart[2], datePart[0]].join('/');
    return MMDDYYYY
}

function refreshPage() {
    location.reload(true);
}
