$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarPasajeros').validate({

        rules: {
            nombre: {
                required: true,
                minlength: 3
            },

            apellido: {
                required: true,
                minlength: 3
            },

            telefono: {
                required: true
            },

            dpi: {
                required: true
            },

            edad: {
                required: true
            },

        },
        messages: {
            nombre: {
                required: "Por favor ingrese un nombre para el pasajero",
                minlength: "EL nombre debe contener almenos 3 caracteres"
            },

            apellido: {
                required: "Por favor ingrese apellidos para el pasajero",
                minlength: "EL apellido debe contener almenos 3 caracteres"
            },

            telefono: {
                required: "Por favor ingrese telefono del pasajero",
            },

            dpi: {
                required: "Por favor ingrese dpi del pasajero",
            },

            edad: {
                required: "Por favor ingrese edad del pasajero",
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
