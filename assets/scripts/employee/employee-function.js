$(document).ready(function () {
    if (jQuery().datepicker) {
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
        $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
    }
    $("#department_id").select2({
        placeholder: 'Select a Department',
        multiple: false,
        ajax: {
            url: BASE_URL + "Employee/get_department_list",
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
            }
        });
    });

    $(".alert-danger").hide(3000);

    $("#myForm").validate({
        rules: {
            employee_first_name: {
                required: true,
                lettersonly: true
            },
            employee_middle_name: {
                required: true,
                lettersonly: true
            },
            employee_last_name: {
                required: true,
                lettersonly: true
            },
            birth_date: "required",
            mobile_number: {
                required: true,
                digits: true
            },
            employee_gender: {
                required: true,
            },
            department_id: "required",
            designation_id: "required",
            join_date: "required",
            email_id: {
                required: true,
                email: true
            },
            login: "required",
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            employee_first_name: {
                required: "Enter a Employee First Name",
                lettersonly:"Enter only characters"
            },
            employee_middle_name: {
                required: "Enter a Employee Middle Name",
                lettersonly:"Enter only characters"
            },
            employee_last_name: {
                required: "Enter a Employee Last Name",
                lettersonly:"Enter only characters"
            },
            birth_date: "Enter a Employee Birth Date",
            mobile_number: {
                required: "Enter a Employee Mobile Number",
                digits:"Enter only digit"
            },
            employee_gender: {
                required: "Gender is Required",
            },
            department_id: "Choose Department",
            designation_id: "Choose Designation",
            join_date: "Enter a Employee Joining Date",
            email_id: "Enter a valid email address",
            login: "Enter a username",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },
        errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.radio-list') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         },
        submitHandler: function () {
            //document.Location.href = 'register_process.php';
            //alert("Data submitted!");
        },
    });
});
function designation_list(id) {
    $("#designation_id").select2({
        placeholder: 'Select a Designation',
        multiple: false,
        ajax: {
            url: BASE_URL + "Employee/get_designation_list/" + id,
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
}