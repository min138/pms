
$(document).ready(function () {

    $("#add_leave_type_form").submit(function (e) {

        e.preventDefault();
        dataString = $("#add_leave_type_form").serialize();

        $.ajax({
            type: "POST",
            url: BASE_URL + "leave/add_leave",
            data: dataString,
            dataType: "json",
            success: function (data) {

                console.log(data);
                $("#ajax-respose").html(data.response);

                if (data.status == "true")
                {
                    $("#ajax-respose").html("");
                    $("#add_leave_type").modal('hide');
                    $('#leave_type_list').dataTable().fnAddData([
                        data.leave_data.leave_name,
                        data.leave_data.leave_category_id]
                            );
                    $("#add_leave_type_form")[0].reset();

                }
            }

        });
        //alert(BASE_URL +"department/add_department");
    });


    $('#leave_type_list').dataTable({
        "columns": [{
                "orderable": true
            },
            {
                "orderable": false
            }],
        "lengthMenu": [
            [5, 10, 20, -1],
            [5, 10, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 10,
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
        "order": [
            [0, "asc"]
        ] // set first column as a default sort by asc
    });
    
     $(".alert-success").hide(3000);

});

$(document).on("click", ".update-leave", function (e) {

    var current_object = $(this);
    var leave_category_id = current_object.data("leave_category_id");
    $("#update_leave_name").val('');
    $("#update_leave_id_hidden").val('');
    $.ajax({
        type: "POST",
        url: BASE_URL + "leave/leave_data",
        dataType: "json",
        data: {
            leave_category_id: leave_category_id,
        },
        success: function (data) {
            $("#error_update").html("");
            $("#update_leave_name").val(data.lname);
            $("#update_leave_id_hidden").val(data.update_leave_id_hidden);
        }
    });
});





// Update designation form

// Automatically add a first row of data


$("#update_leave_form").submit(function (e) {

    e.preventDefault();

    dataString = $("#update_leave_form").serialize();
    $.ajax({
        type: "POST",
        url: BASE_URL + "leave/leave_update",
        data: dataString,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#error_update").html(data.response_update);

            if (data.status == "true") {
                $("#myModal").modal('hide');
                $("#update_leave_form")[0].reset();
                $("#"+data.leave_data.leave_category_id).html(data.leave_data.leave_name);
            }
            
        }

    });
});
