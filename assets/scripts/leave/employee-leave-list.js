$(document).ready(function () {

    var table = $('#employee_leave_view');

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
    $(".alert-success").hide(3000);


});

$(document).on("click", ".view-leave", function (e) {

    var current_object = $(this);
    var leave_id = current_object.data("leave_id");
    
    $("#emp_name").text("");
    $("#emp_leave_type").text("");
    $("#emp_leave_date").text("");
    $("#emp_leave").text("");
    $("#emp_leave_reason").text("");
    $("#emp_status").html("");

    $.ajax({
        type: "POST",
        url: BASE_URL + "leave/employee_leave_data",
        dataType: "json",
        data: {
            leave_id: leave_id,
        },
        success: function (data) {
            $("#error_update").html("");
            $("#emp_name").text(data.employee_name);
            $("#emp_leave_type").text(data.leave_type);
            $("#emp_leave_date").text(data.leave_date);
            $("#emp_leave").text(data.leave);
            $("#emp_leave_reason").text(data.leave_reason);
            if (data.leave_status == "approved") {
                $("#emp_status").html("<input type='radio' name='status' id='status' value='approved' checked>&nbsp;approved&nbsp;<input type='radio' name='status' id='status' value='disapproved'>&nbsp;disapproved&nbsp;<input type='radio' name='status' id='status' value='on_hold'>&nbsp;on_hold");
            } else if (data.leave_status == "disapproved") {
                $("#emp_status").html("<input type='radio' name='status' id='status' value='approved'>&nbsp;approved&nbsp;<input type='radio' name='status' id='status' value='disapproved' checked>&nbsp;disapproved&nbsp;<input type='radio' name='status' id='status' value='on_hold'>&nbsp;on_hold");
            } else {
                $("#emp_status").html("<input type='radio' name='status' id='status' value='approved'>&nbsp;approved&nbsp;<input type='radio' name='status' id='status' value='disapproved'>&nbsp;disapproved&nbsp;<input type='radio' name='status' id='status' value='on_hold' checked>&nbsp;on_hold");
            }


            $("#update_employee_leave_id").val(data.update_employee_leave_id_hidden);
        }
    });
});

$("#update_employee_leave_form").submit(function (e) {

    e.preventDefault();

    dataString = $("#update_employee_leave_form").serialize();
    $.ajax({
        type: "POST",
        url: BASE_URL + "leave/leave_update_employee_data",
        data: dataString,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#error_update").html(data.response_update);

            if (data.status == "true") {
                $("#myModal").modal('hide');
                $("#update_employee_leave_form")[0].reset();
                if(data.leave_data.leave_status == "approved"){
                    $("#col6_" + data.leave_data.leave_id).html("<span class='label label-sm label-success status' style='cursor: pointer;' data-leave_id='"+data.leave_data.leave_id+"' data-status='"+data.leave_data.leave_status+"'>"+data.leave_data.leave_status+"</span>");
                }else if(data.leave_data.leave_status == "disapproved"){
                    $("#col6_" + data.leave_data.leave_id).html("<span class='label label-sm label-danger status' style='cursor: pointer;' data-leave_id='"+data.leave_data.leave_id+"' data-status='"+data.leave_data.leave_status+"'>"+data.leave_data.leave_status+"</span>");
                }else{
                    $("#col6_" + data.leave_data.leave_id).html("<span class='label label-sm label-warning status' style='cursor: pointer;' data-leave_id='"+data.leave_data.leave_id+"' data-status='"+data.leave_data.leave_status+"'>"+data.leave_data.leave_status+"</span>");
                }
                
                $("#alert_msg").html('<div class="alert alert-success"><strong>Success!</strong>  Successfully Updated Status</div>');
                $(".alert-success").hide(3000);
            }

        }

    });
});

