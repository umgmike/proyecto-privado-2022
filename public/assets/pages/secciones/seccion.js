$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarSeccion').validate({
        rules: {
            seccion: {
                required: true,
                minlength: 1,
                maxlength: 1
            },

        },
        messages: {
            seccion: {
                required: "Por favor ingrese una sección",
                minlength: "Ingrese sección no menor a 1 caracter",
                maxlength: "Ingrese sección no mayor a 2 caracteres",
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

