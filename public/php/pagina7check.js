/*
 * Delegate functions
 */
function InicializaConsistencia(){
    //No tiene sentido
    $(document).delegate('[name="b7_d27_o_1"]', 'change', function() {
        consistencia7_1();
    });
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia7_1();
}

/*
 * Consistencias
 */
consistencia7_1 = function() {
    if ($('input[name=b7_d27_o_1]:checked').val()=="1") {
        $('#estudio-central-master').show();
    } else {
        $('#estudio-central-master').hide();
    }
};

