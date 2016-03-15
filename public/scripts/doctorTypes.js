(function() {
    $("form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 100,
                minlength: 3
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