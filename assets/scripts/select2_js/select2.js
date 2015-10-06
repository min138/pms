$(document).ready(function () {

    $("#Keywords").select2({
        placeholder: 'Select a Department',
        multiple: true,
        ajax: {
            url: BASE_URL + "Select2/get_department_list",
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

});