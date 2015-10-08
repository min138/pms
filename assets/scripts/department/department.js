$(document).ready(function () {

    $("#department_add_from").submit(function (e) {

        e.preventDefault();
        dataString = $("#department_add_from").serialize();

        $.ajax({
            type: "POST",
            url: BASE_URL + "department/add_department",
            data: dataString,
            dataType: "json",
            success: function (data) {

                console.log(data);
                $("#ajax-respose").html(data.response);

                if (data.status == "true")
                {
                       $("#ajax-respose").html("");
                    $("#add_department").modal('hide');
                    $('#department_list').dataTable().fnAddData([
                        data.department_data.department_name,
                        data.department_data.department_id,
                        data.department_data.status]
                        );
                    $("#department_add_from")[0].reset();

                }
            }

        });
        //alert(BASE_URL +"department/add_department");
    });


    $('#department_list').dataTable({
        "columns": [{
                "orderable": true
            },
            {
                "orderable": false
            }, {
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

});

$(document).on("click", ".status", function (e) {
    var current_object = $(this);
    var department_id = current_object.data("department_id");
    var status = current_object.data("status");
    $.ajax({
        type: "POST",
        url: BASE_URL + "department/change_status",
        data: {
            department_id: department_id,
            status: status
        },
        success: function (data) {
            console.log(data);
            current_object.text(data);
            current_object.data("status", data);
            var class_name = (data == "active") ? "label label-sm label-success status" : "label label-sm label-danger status";
            current_object.removeClass();
            current_object.addClass(class_name);
        }
    });
});




    $(document).on("click", ".update-department", function (e) {

    var current_object = $(this);
    var department_id = current_object.data("department_id");


    $.ajax({
        type: "POST",
        url: BASE_URL + "department/department_data",
        dataType: "json",
        data: {
            department_id: department_id,
        },
        success: function (data) {
            $("#error_update").html("");
            $("#update_department_name").val(data.dname);
            $("#update_department_id_hidden").val(data.update_department_id_hidden);
        }
    });
});





// Update designation form

// Automatically add a first row of data


$("#update_department_form").submit(function (e) {

    e.preventDefault();

    dataString = $("#update_department_form").serialize();
    $.ajax({
        type: "POST",
        url: BASE_URL + "department/department_update",
        data: dataString,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#error_update").html(data.response_update);

            if (data.status == "true") {
                $("#myModal").modal('hide');
                $("#department_form")[0].reset();

            }
        }

    });
});








