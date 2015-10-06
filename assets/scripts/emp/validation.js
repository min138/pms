//$(document).ready(function () {
//    $("#myForm").submit(function (e) {
//        e.preventDefault();
//        dataString = $("#myForm").serialize();
//
//        $.ajax({
//            type: "POST",
//            url: BASE_URL + "employee_master/add_employee",
//            data: dataString,
//            dataType: "json",
//            success: function (data) {
//                console.log(data);
//                $("#ajax-respose").html(data.response);
//            }
//
//        });
//    });
//
//});