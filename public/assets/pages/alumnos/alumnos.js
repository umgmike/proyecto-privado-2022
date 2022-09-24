$(document).ready(function() {
    $.validator.setDefaults({});
    $("#GuardarAlumnos").validate({
        rules: {
            nombres: {
                required: true,
            },

            apellidos: {
                required: true,
            },

            telefono: {
                required: true,
            },

            edad: {
                required: true,
                number: true,
            },

            direccion: {
                required: true,
            },
        },
        messages: {
        	nombres: {
                required: "Por favor ingrese nombres para el alumno.",
            },

            apellidos: {
                required: "Por favor ingrese apellidos para el alumno.",
            },

            telefono: {
                required: "Por favor ingrese teléfono para el alumno.",
            },

            edad: {
                required: "Por favor ingrese edad para el alumno.",
                number: "Por favor ingrese solo numeros",
            },

            direccion: {
                required: "Por favor ingrese dirección para el alumno.",
            },
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });
});