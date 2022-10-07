$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarBoletos').validate({
        rules: {
            cantidad: {
                required: true,
                number: true
            },

            motivo: {
                required: true,
                minlength: 4
            },

            total: {
                required: true,
            },
        },
        messages: {

            cantidad: {
                required: "Por favor ingrese una cantidad de boletos a comprar",
                number: "Unicamente numeros"
            },

            motivo: {
                required: "Ingrese un motivo para su vuelo",
                minlength: "Ingrese un motivo no menor a 4 caracteres"
            },

            total: {
                required: "Debe seleccionar una clase e ingresar una cantidad para generar su total...",
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
