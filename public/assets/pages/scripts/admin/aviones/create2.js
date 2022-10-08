$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarAviones2').validate({
        rules: {
            nombre_avion: {
                required: true,
            },

            capacidad: {
                required: true,
            },
        },
        messages: {
            nombre_avion: {
                required: "Por favor ingrese nombre del Avión",
            },

            capacidad: {
                required: "Por favor ingrese capacidad del avión",
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
