$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarPasajeros').validate({
        rules: {
            nombre: {
                required: true,
                minlength: 4
            },

            apellido: {
                required: true,
                minlength: 4
            },

            telefono: {
                required: true,
            },

            dpi: {
                required: true
            },

            edad: {
                required: true,
                minlength: 2,
                maxlength: 2,
            },
        },
        messages: {

            nombre: {
                required: "Por favor ingrese nombre del pasajero",
                minlength: "Ingrese un nombre no menor a 4 caracteres"
            },

            apellido: {
                required: "Por favor ingrese apellido del pasajero",
                minlength: "Ingrese un apellido no menor a 4 caracteres"
            },

            telefono: {
                required: "Por favor ingrese número de telefono del pasajero",
            },

            dpi: {
                required: "Por favor ingrese DPI del pasajero"
            },

            edad: {
                required: "Por favor ingrese edad del pasajero",
                minlength: "Edad no válida",
                maxlength: "Edad no válida",
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
