$(document).ready(function () {
    
    var table = $('#employee_view');

    var oTable = table.dataTable({
        "lengthMenu": [
            [5, 15, 20, -1],
            [5, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 10,
        "language": {
            "lengthMenu": " _MENU_ records"
        },
        "columnDefs": [{// set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
        "order": [
            [0, "asc"]
        ] // set first column as a default sort by asc
    });
    $(".alert-success").delay(5000).fadeOut();
    $(".status").on("click", function (e) {
        var current_object = $(this);
        var employee_id = current_object.data("employee_id");
        var status = current_object.data("status");

        $.ajax({
            type: "POST",
            url: BASE_URL + "employee/change_status",
            data: {
                employee_id: employee_id,
                status: status
            },
            success: function (data) {
                current_object.text(data);
                current_object.data("status", data);
                var class_name = (data == "active") ? "label label-sm label-success status" : "label label-sm label-danger status";
                current_object.removeClass();
                current_object.addClass(class_name);
                
                $("#alert_msg").html('<div class="alert alert-success"><strong>Success!</strong>  Successfully Change Status</div>').delay(5000).fadeOut();
            }
        });
    }); 
});
