$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarRoles').validate({
        rules: {
            rol: {
                required: true,
                minlength: 4
            },
        },
        messages: {

            rol: {
                required: "Por favor ingrese rol del usuario",
                minlength: "Ingrese un rol no menor a 4 caracteres"
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
