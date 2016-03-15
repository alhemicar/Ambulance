(function() {
    $("form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 100,
                minlength: 3
            },
            last_name: {
                required: true,
                maxlength: 100,
                minlength: 3
            },
            umsn: {
                required: true,
                maxlength: 13,
                minlength: 13,
                number: true
            },
            details: {
                maxlength: 1000,
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