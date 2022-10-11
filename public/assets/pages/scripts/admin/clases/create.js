$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarClases').validate({
        rules: {
            clase: {
                required: true,
                minlength: 4
            },
        },
        messages: {

            clase: {
                required: "Por favor ingrese clase de vuelo",
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
