$(document).ready(function () {
    if (jQuery().datepicker) {
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
        $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
    }

    $("#employee_leave_type").select2({
        placeholder: 'Select a Employee Leave',
        multiple: false,
        ajax: {
            url: BASE_URL + "leave/get_employee_leave_type",
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

    $.validator.addMethod("greaterThan",
            function (value, element, params) {
                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) > new Date($(params).val());
                }
            }, 'Must be greater than {0}.');
    var form1 = $('#apply_leave');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            employee_leave_type: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
                required: function () {
                    if ($('#employee_leave').val() == "Range")//return value based on textbox1 status
                        return true;
                    else
                        return false;
                },
                greaterThan: "#start_date"
            },
            employee_leave: {
                required: true
            },
            msg: {
                required: true
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
function show_end_date(val) {
    if (val == "Range") {
        $("#end_date").val('');
        document.getElementById('edate').style.display = '';
    } else {
        $("#end_date").val('');
        document.getElementById('edate').style.display = 'none';
    }
}