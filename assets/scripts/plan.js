$(document).ready(function () {
    var table = $('#recipes-list');

    // begin first table
    table.dataTable({
        "columns": [{
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": true
            }],
        "lengthMenu": [
            [5, 15, 20, -1],
            [5, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 20,
        "pagingType": "bootstrap_full_number",
        "language": {
            "lengthMenu": "  _MENU_ records",
            "paginate": {
                "previous": "Prev",
                "next": "Next",
                "last": "Last",
                "first": "First"
            }
        },
        "columnDefs": [{// set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
        "order": [
            [0, "asc"]
        ] // set first column as a default sort by asc
    });
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });
});