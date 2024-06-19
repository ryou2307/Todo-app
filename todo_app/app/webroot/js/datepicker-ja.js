$(function() {
    $.datepicker.setDefaults($.datepicker.regional['ja']);
    $("#TaskDueDate").datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
