/*
 * Delegate functions
 */
function InicializaConsistencia(){
    //No tiene sentido
    $(document).delegate('[name="b6_d26_o_1"]', 'change', function() {
        consistencia6_1();
    });
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia6_1();
}

/*
 * Consistencias
 */
consistencia6_1 = function() {
    if ($('input[name=b6_d26_o_1]:checked').val()=="1") {
        $('#estudio-central-master').show();
    } else {
        $('#estudio-central-master').hide();
    }
};

