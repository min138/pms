//date-picker
$(document).ready(function () {

    if (jQuery().datepicker) {
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
        $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
    }
    // $(".alert-success").hide(3000);


//pagination
    $('#holiday').dataTable({
        "columns": [{
                "orderable": true
            },
            {
                "orderable": true
            },
            {
                "orderable": true
            },
            {
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
});

//radio button
$('#s1').click(function () {
    $('#vacation').hide('fast');
    $('#single').show('fast');
});
$('#v1').click(function () {
    $('#single').hide('fast');
    $('#vacation').show('fast');
});





$(document).on("click", ".status", function (e) {
    var current_object = $(this);
    var holiday_id = current_object.data("holiday_id");
    var status = current_object.data("status");
    $.ajax({
        type: "POST",
        url: BASE_URL + "holiday_master/change_status",
        data: {
            holiday_id: holiday_id,
            status: status
        },
        success: function (data) {
            console.log(data);
            current_object.text(data);
            current_object.data("status", data);
            var class_name = (data == "active") ? "label label-sm label-success status" : "label label-sm label-danger status";
            current_object.removeClass();
            current_object.addClass(class_name);
        }
    });
});

    