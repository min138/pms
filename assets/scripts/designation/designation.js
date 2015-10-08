$(document).ready(function () {
    var t = $('#designation_view').dataTable({
        "columns": [{
                "orderable": true
            }, {
                "orderable": true
            },
            {
                "orderable": false
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

    // Automatically add a first row of data


    $("#designation_form").submit(function (e) {
        e.preventDefault();
        dataString = $("#designation_form").serialize();

        $.ajax({
            type: "POST",
            url: BASE_URL + "designation/add_designation",
            data: dataString,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#error_response").html(data.response);
              
                if (data.status == "true") {
                     $("#add_designation").modal('hide');
                    $('#designation_view').dataTable().fnAddData([
                        data.designation_data.department_id,
                        
                        data.designation_data.designation_name,
                        
                        data.designation_data.designation_id,
                        "Active"]);
                    $("#designation_form")[0].reset();
                    $('#department_name').select2('data', "");

                }

//                $(".save-changes").on("click", function (e) {
//                    $("#add_designation").modal('hide');
//                });
            }

        });
    });




    //var table = $('#designation_view');

    // begin first table
    // it is use for data table 

    // abhay Suchak

    $("#department_name").select2({
        placeholder: 'Select a Department',
        ajax: {
            url: BASE_URL + "Select2/get_department_list",
            dataType: 'json',
            type: "POST",
            quietMillis: 50,
            data: function (term) {
                return {
                    term: term
                };
            },
            results: function (data) {
                return {
                    results: data.items
                };
            }
        }
    });


    // Staus 


    $(".status").on("click", function (e) {
        var current_object = $(this);
        var designation_id = current_object.data("designation_id");
        var status = current_object.data("status");
        $.ajax({
            type: "POST",
            url: BASE_URL + "designation/change_status",
            data: {
                designation_id: designation_id,
                status: status
            },
            success: function (data) {
                current_object.text(data);
                current_object.data("status", data);
                var class_name = (data == "active") ? "label label-sm label-success status" : "label label-sm label-danger status";
                current_object.removeClass();
                current_object.addClass(class_name);
            }
        });
    });

    $(".update-designation").on("click", function (e) {
        var current_object = $(this);
        var designation_id = current_object.data("designation_id");
        $("#update_designation_form")[0].reset();
        $('#update_department_name').select2('data', "");
        $.ajax({
            type: "POST",
            url: BASE_URL + "designation/designation_data",
            dataType: "json",
            data: {
                designation_id: designation_id,
            },
            success: function (data) {
                $('#update_department_name').select2('data', data.department_name);
                $("#update_designation_name").val(data.dname);
                $("#update_designation_id_hidden").val(data.update_designation_id_hidden);
            }
        });
    });


    $("#update_department_name").select2({
        placeholder: 'Select a Department',
        ajax: {
            url: BASE_URL + "Select2/get_department_list",
            dataType: 'json',
            type: "POST",
            quietMillis: 50,
            data: function (term) {
                return {
                    term: term
                };
            },
            results: function (data) {
                return {
                    results: data.items
                };
            }
        }
    });
    $(".save-changes").on("click", function (e) {
        //$("#myModal").modal('hide');
    });


// Update designation form

// Automatically add a first row of data


    $("#update_designation_form").submit(function (e) {

        e.preventDefault();
//        var current_object = $(this);
//        var designation_id = current_object.data("designation_id");
        dataString = $("#update_designation_form").serialize();
        $.ajax({
            type: "POST",
            url: BASE_URL + "designation/designation_update",
            data: dataString,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#error_update").html(data.response_update);
               if (data.status == "true") {
                   $("#myModal").modal('hide');
                    $("#designation_form")[0].reset();
                    $('#department_name').select2('data', "");

                }
            }

        });
    });
});