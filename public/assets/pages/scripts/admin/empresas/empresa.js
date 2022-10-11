$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarEmpresas').validate({
        rules: {
            empresa: {
                required: true,
                minlength: 4
            },
        },
        messages: {

            empresa: {
                required: "Por favor ingrese empresa del usuario",
                minlength: "Ingrese un empresa no menor a 4 caracteres"
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
