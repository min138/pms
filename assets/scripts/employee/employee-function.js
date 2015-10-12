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

    $(".alert-danger").delay(5000).fadeOut();

    $.validator.addMethod("lettersOnly", function (value, element) {
        return this.optional(element) || /^[A-Za-z\s]+$/.test(value)
        // just ascii letters
    }, "Alpha only");
    
    var form1 = $('#employee_form');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            employee_code: {
                required: true
            },
            employee_first_name: {
                required: true,
                lettersOnly: "[a-zA-Z\s]+"
            },
            employee_middle_name: {
                required: true,
                lettersOnly: "[a-zA-Z\s]+"
            },
            employee_last_name: {
                required: true,
                lettersOnly: "[a-zA-Z\s]+"
            },
            birth_date: {
                required: true
            },
            mobile_number: {
                required: true,
                digits: true
            },
            employee_gender: {
                required: true
            },
            department_id: {
                required: true
            },
            designation_id: {
                required: true
            },
            join_date: {
                required: true
            },
            email_id: {
                required: true,
                email: true
            },
            login: {
                required: true
            },
            password: {
                required: true
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") == "radio") {
                error.insertAfter($(element).parents('span').prev($('.radio')));
            } else {
                error.insertAfter(element);
            }

        },
        invalidHandler: function (event, validator) { //display error alert on form submit              
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        }
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