$(function() {
    $(".select2").each(function(i, element) {
        if (!$(element).hasClass('select2-hidden-accessible')) 
            $(element).select2({
                containerCssClass: "form-control custom-select select2-override",
                dropdownCssClass: "select2-option-override",
            });
    });
});