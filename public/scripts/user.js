/**
 * Created by Minja on 15.3.2016..
 */
(function() {
    var userRole = $('#user_role_id');
    userRole.on('change', function() {
        var value = $(this).val();
        var doctorType = $('#doctor_type_id');

        if(value != 2){
            doctorType.parent().addClass('hidden')
            doctorType.prop('disabled', true);
        }
        else{
            doctorType.parent().removeClass('hidden')
            doctorType.prop('disabled', false);
        }
    });

    $("form").validate({
        rules: {
            username: {
                required: true,
                maxlength: 32,
                minlength: 3
            },
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
            email: {
                required: true,
                email: true
            }
        },
        highlight: function (element) {
            $(element)
                .closest('.form-group').addClass('has-error');
        },

        unhighlight: function (element) {
            $(element)
                .closest('.form-group').removeClass('has-error');
        },
    });

    userRole.trigger('change')

})();