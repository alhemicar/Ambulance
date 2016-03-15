(function() {
    $("form").validate({
        rules: {
            diagnose: {
                required: false,
                maxlength: 2000,
            }
        },
        highlight: function (element) {
            $(element)
                .closest('.form-group').addClass('has-error');
        },

        unhighlight: function (element) {
            $(element)
                .closest('.form-group').removeClass('has-error');
        }
    });
})();