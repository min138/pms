$(document).ready(function () {
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
                $("#ajax-respose").html(data.response);
            }

        });
    });

});