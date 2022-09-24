$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarGrado').validate({
        rules: {
            grado_academico: {
                required: true,
                minlength: 1
            },

        },
        messages: {
            grado_academico: {
                required: "Por favor ingrese un grado académico",
                minlength: "Ingrese grado académico no menor a 1 caracter"
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

