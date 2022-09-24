$(document).ready(function() {
    $.validator.setDefaults({});
    $('#EditarCursos').validate({
        rules: {
            curso: {
                required: true,
                minlength: 1
            },

        },
        messages: {
            curso: {
                required: "Por favor ingrese un Curso para ser editado",
                minlength: "Ingrese Curso no menor a 1 caracter"
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
