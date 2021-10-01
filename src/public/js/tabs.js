$(document).ready(function () {
    tabsInit()
});

function tabsInit() {
    $('.view-tabs').find('li').on('click', function () {
        let selected = $('.selected-view-tab')
        selected.removeClass('bg-primary').removeClass('selected-view-tab')
        selected.find('a').removeClass('text-white').addClass('text-dark')
        let selectedClassName = /*'tab-view-name-' + */getTabClassName(selected)

        let clicked = $(this)
        clicked.addClass('bg-primary').addClass('selected-view-tab')
        clicked.find('a').addClass('text-white').removeClass('text-dark')
        let clickedClassName = /*'tab-view-name-' + */getTabClassName(clicked)

        //console.log('1', selectedClassName , clickedClassName)

        if (selectedClassName != null && clickedClassName != null) {
            //console.log('2', selectedClassName , clickedClassName)
            let viewSection = $('.view-view')
            viewSection.find('.' + selectedClassName).hide()

            let clickedSection = viewSection.find('.' + clickedClassName)
            clickedSection.show()
            let route = clickedSection.find('#route').val()
            if (route) {
                loadTabDate(route, clickedSection)
            }
        }
    })
    $('.selected-view-tab').click()
}

function loadTabDate(route, clickedSection) {
    //console.log('loadTabDate')
    $.ajax({
        url: route,
        method: 'GET',
        beforeSend: function () {
            var table = clickedSection.find('#content').find('.data-table')
            /*console.log(table)
            console.log(table.DataTable().destroy())*/
            /*if ( $.fn.DataTable.isDataTable(table) ) {
                table.DataTable().clear().destroy();
            }*/
            /*table.find('tbody').empty();
            table.find('thead').empty();*/

            clickedSection.find('#content').html(getHtmlLoaderView())
        },
        success: function (response) {
            //console.log(response)
            clickedSection.find('#content').html(response)
        },
    });
}

function getTabClassName(element) {
    let elementClasses = element.attr('class').split(' ');
    let elementClass = null
    elementClasses.forEach(function (item, index) {
        if (item.startsWith('tab-name-')) {
            elementClass = item
        }
    })
    return elementClass
}
