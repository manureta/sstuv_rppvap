/*
 * Delegate functions
 */
function InicializaConsistencia(){
    $(document).delegate("[name='b4_d20_o_1']", 'change', function() {
        consistencia4_1();
    });
    
    $(document).delegate("[name='b4_d21_o_1']", 'change', function() {
        consistencia4_2();
    });
    
    $(document).delegate("[name='b4_d23_o_1']", 'change', function() {
        consistencia4_3();
    });
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia4_1();
    consistencia4_2();
    consistencia4_3();
}

/*
 * Consistencias
 */
consistencia4_1 = function() {
    if ($('input[name=b4_d20_o_1]:checked').val()=="2") { //radio
        $("#escucharadio").hide();
    } else {
        $("#escucharadio").show();
    }
};


consistencia4_2 = function() {
    if ($('input[name=b4_d21_o_1]:checked').val()=="2") { //radio
        $("#miratv").hide();
    } else {
        $("#miratv").show();
    }
};

consistencia4_3 = function() {
    if ($('input[name=b4_d23_o_1]:checked').val()=="2") { //radio
        $("#leediario").hide();
    } else {
        $("#leediario").show();
    }
};

