$(document).ready(function () {

    $("#department_id").submit(function (e) {


        e.preventDefault();
        dataString = $("#department_id").serialize();

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
                $('#department_list').dataTable().fnAddData([
                      data.department_data.department_name,
                        "Edit"]);

                }
            }

        });
        //alert(BASE_URL +"department/add_department");
    });


    $('#department_list').dataTable({
        "columns": [{
                "orderable": true
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



