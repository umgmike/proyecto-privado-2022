var titulo_app = "Indicadores";

var optionsError = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "6000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"};

var optionsErrorList = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "8000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"};

var optionsSuccess = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "6000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"};



function toastrError(mensaje,titulo){
    if(!titulo)titulo = titulo_app;
    toastr.options = optionsError;    
    toastr['error']('\n'+mensaje, titulo);
};

function toastrErrorList(mensaje){
    var errors = mensaje; 
    errorsHtml = '<ul>';
    $.each( errors , function( key, value ) {
        errorsHtml += '<li>' + value[0] + '</li></br>'; 
    });
    errorsHtml += '</ul>';

    toastr.options = optionsErrorList;    
    toastr['error'](errorsHtml, titulo_app);
};

function toastrWarningList(mensaje){
    var errors = mensaje; 
    errorsHtml = '<ul>';
    $.each( errors , function( key, value ) {
        errorsHtml += '<li style="padding-top : 10px!important">' + value[0] + '</li>'; 
    });
    errorsHtml += '</ul>';

    toastr.options = optionsErrorList;    
    toastr['warning'](errorsHtml, titulo_app);
};




function toastrSuccess(mensaje){
    toastr.options = optionsSuccess;
    toastr['success']('\n'+mensaje, titulo_app);
};

function bootboxErorr(mensaje){
    var errors = mensaje; 
    errorsHtml = '<div style ="color: #c9302c;"><ul>';
    $.each( errors , function( key, value ) {
        errorsHtml += '<li>' + value[0] + '</li> </br>'; 
    });
    errorsHtml += '</ul></div>';

    bootbox.alert({ 
        size: "small",
        animate: true,
        title: '<h4 style="color:#ac2925;" class="modal-title"><i class="fa fa-spin fa-spinner"></i> Errores</h4>',
        message: errorsHtml,
        buttons: {
            ok: {
                label: 'Corregir',
                className: "btn btn-danger",
            }
        },
        callback: function (result) {
            
        }
    });
};


