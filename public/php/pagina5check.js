/*
 * Delegate functions
 */
function InicializaConsistencia(){
    $(document).delegate('#b5_d24_o_1', 'change', function() {
        consistencia5_1();
    });
    $(document).delegate('#b5_d25_o_1', 'change', function() {
        consistencia5_2();
    });
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia5_1();
    consistencia5_2();
}

/*
 * Consistencias
 */
consistencia5_1 = function() {
    if ($("#b5_d24_o_1").val() > 1) {
        $("#primarioasiste").show();
    } else {
        $("#primarioasiste").hide();
    }
    if ($("#b5_d24_o_1").val() == 2) {
        $("#primarioasistio").show();
    }else
        $("#primarioasistio").hide();
};

consistencia5_2 = function() {
    if ($("#b5_d25_o_1").val() > 1) {
        $("#secundarioasiste").show();
    } else {
        $("#secundarioasiste").hide();
    }
    if ($("#b5_d25_o_1").val() == 2) {
        $("#secundarioasistio").show();
    }else
        $("#secundarioasistio").hide();
};
