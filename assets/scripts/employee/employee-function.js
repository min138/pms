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