/*
 * Delegate functions
 */
function InicializaConsistencia(){
    $(document).delegate("[name='b2_d13_o_1']", 'change', function() {
        consistencia2_1();
    });
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia2_1();
}

/*
 * Consistencias
 */
consistencia2_1 = function() {
    if ($('input[name=b2_d13_o_1]:checked').val()=="2") {
        $("#novivesolo").show();
    } else {
        $("#novivesolo").hide();
    }
};