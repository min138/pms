$(document).ready(function () {
    alert("test");
    $("#myForm").submit(function (e) {
        e.preventDefault();
        dataString = $("#designation_form").serialize();

        $.ajax({
            type: "POST",
            url: BASE_URL + "employee/add_employee",
            data: dataString,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#ajax-respose").html(data.response);
            }

        });
    });

});