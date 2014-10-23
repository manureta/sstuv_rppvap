/*
 * Delegate functions
 */
function InicializaConsistencia(){
    $(document).delegate("[name='b9_d31_o_1']", 'change', function() {
        consistencia9_5();
    });
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia9_5();
}

/*
 * Consistencias
 */
consistencia9_5 = function() { //PASADO
    if ( $('input[name=b9_d31_o_1]:checked').val() == "2" ) {
        $("#b9_d32_n_1").attr('disabled', 'disabled');
    } else {
        $("#b9_d32_n_1").attr('disabled', false);
    }
};
