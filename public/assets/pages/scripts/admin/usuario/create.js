$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarUsuarios2').validate({
        rules: {

            password: {
                required: true,
                minlength: 8
            },
        },
        messages: {
            password: {
                required: "Por favor ingrese contraseña",
                minlength: "Ingrese un usuario no menor a 8 caracteres"
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
