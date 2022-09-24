$(document).ready(function() {
    $.validator.setDefaults({});
    $('#editBloques').validate({
        rules: {
            bloque: {
                required: true,
                minlength: 1
            },

        },
        messages: {
            bloque: {
                required: "Por favor ingrese un Un bloque para el ejercicio actual para ser editada",
                minlength: "Ingrese un bloque no menor a 1 caracter"
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


