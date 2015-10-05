$(document).ready(function () {
    
    $("#department_id").submit(function (e) {
        
   //  Var department_name" = $("#department_name").val(); 
        
        e.preventDefault();
        dataString = $("#department_id").serialize();

        $.ajax({
            type: "POST",
            url: BASE_URL +"department/add_department",
            data: dataString,
            dataType: "json",
            
            success: function (data) {
                console.log(data);
                $("#ajax-respose").html(data.response);
                $("#name_error").html(data.department_name);
            }

        });
         //alert(BASE_URL +"department/add_department");
    });

});