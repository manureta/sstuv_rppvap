/*
 * Delegate functions
 */
function InicializaConsistencia(){
    //Designacion central
    $(document).delegate('[id^=b10_d35_o_1]', 'change', function() {
        consistencia10_2($(this));
    });
    $(document).delegate('[id^=b10_d34_o_1]', 'change', function() {
        consistencia10_3($(this));
    });
    $(document).delegate('[id^=b10_d32_n_1]', 'change', function() {
        consistencia10_4($(this));
    });
    $(document).delegate('[id^=b10_d2_o_1]', 'change', function() {
        consistencia10_5($(this));
    });
    $(document).delegate('[id^=b10_d41_o_1]', 'change', function() {
        consistencia10_6($(this));
    });
    $(document).delegate('[id^=b10_d33_n_1]', 'change', function() { //año
        consistencia10_11($(this));
    });
          
    $(document).delegate('[id^=b10_d5_n_1]', 'change', function() { //cant 1 a 60
        consistencia10_7($(this));
    });
    $(document).delegate('[id^=b10_d26_n_1]', 'change', function() { //cant 1 a 60
        consistencia10_8($(this));
    });
    $(document).delegate('[id^=b10_d6_n_1]', 'change', function() { //año
        consistencia10_9($(this));
    });
    $(document).delegate('[id^=b10_d27_n_1]', 'change', function() { //año
        consistencia10_10($(this));
    });
    $(document).delegate('[id^=b10_d25_o_1]', 'change', function() {
        consistencia10_12($(this));
    });
    $(document).delegate('[id^=b10_d7_o_1]', 'change', function() {
        consistencia10_13($(this));
    });
            
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia10_1();
    
    //Por cada nivel central cargado.
    $("#accordion_designacioncentral__rows [id^=designacioncentral_line]").each(function(){ //Si es carga_designacioncentral es false, nunca va a encontrar nada.
        var index = $(this).attr("data-index");
        $(this).find("[id=designacioncentral_panel_"+index+"]").each(function(){
            var obj=$(this).find("[id=panel] [id^=b10_d35_o_1]");
            consistencia10_2(obj);
            obj=$(this).find("[id=panel] [id^=b10_d34_o_1]");
            consistencia10_3(obj);
        });
    });
}

/*
 * Consistencias
 * Si bien el obj es trivial y no se usa o se podria usar, queda mas legible.
*/

consistencia10_1= function() {
    if(carga_designacioncentral==true){
        f2();
    }
};

consistencia10_2 = function(obj) {
    var objPanel=obj.parents("#panel");
    if ( objPanel.find("[id^=b10_d35_o_1]").val() == 0 || objPanel.find("[id^=b10_d35_o_1]").val() == "") {
        objPanel.find("[id^=b10_d35_o_1_eq_1]").hide();
        objPanel.find("[id^=b10_d35_o_1_neq_1]").hide();
    }else if ( objPanel.find("[id^=b10_d35_o_1]").val() == 1 ) {
        objPanel.find("[id^=b10_d35_o_1_eq_1]").show();
        objPanel.find("[id^=b10_d35_o_1_neq_1]").hide();
    } else {
        objPanel.find("[id^=b10_d35_o_1_eq_1]").hide();
        objPanel.find("[id^=b10_d35_o_1_neq_1]").show();
    }
    consistencia10_3(obj);
};

consistencia10_3 = function(obj) {
    var objPanel=obj.parents("#panel");
    if ( objPanel.find("[id^=b10_d35_o_1]").val() != 1 ) {
        if(objPanel.find("[id^=b10_d34_o_1]").val()==2){
            objPanel.find("[id^=b10_d34_o_1_eq_2]").show();
        }else{
            objPanel.find("[id^=b10_d34_o_1_eq_2]").hide();
        }
    }
};

consistencia10_4 = function(obj) {
    validaRangoNros(obj,1,60);
};

consistencia10_11 = function(obj) {
    esAnio(obj,2014,"Desde que año está designado en este cargo");
};

/*
 * SECTOR FORMULARIO DINAMICO X CUE
 */
    
/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistenciaDinamica(){
    //CUE ACTIVO - Designaciones
    $("#accordion_designacion__rows [id^=designacion_line]").each(function(){ //Si es carga_designacioncentral es false, nunca va a encontrar nada.
        var index = $(this).attr("data-index");
        $(this).find("[id=designacioncentral_panel_"+index+"]").each(function(){
            var obj=$(this).find("[id=panel] [id^=b10_d2_o_1]");
            consistencia10_4(obj);
            obj=$(this).find("[id=panel] [id^=b10_d25_o_1]");
            consistencia10_12(obj);
            obj=$(this).find("[id=panel] [id^=b10_d7_o_1]");
            consistencia10_13(obj);
        });
    });
    //CUE ACTIVO - Funciones
    $("#accordion_funcion__rows [id^=funcion_line]").each(function(){ //Si es carga_designacioncentral es false, nunca va a encontrar nada.
        var index = $(this).attr("data-index");
        $(this).find("[id=designacioncentral_panel_"+index+"]").each(function(){
            var obj=$(this).find("[id=panel] [id^=b10_d41_o_1]");
            consistencia10_5(obj);
        });
    });
}


consistencia10_5 = function(obj) {
    var objPanel=obj.parents("#panel");
    if (    
            objPanel.find("[id^=b10_d2_o_1]").val() == 1003 || //ComunSecundario
            objPanel.find("[id^=b10_d2_o_1]").val() == 1004 || //ComunSuperior
            objPanel.find("[id^=b10_d2_o_1]").val() == 2003 || //EspecialSecundario
            objPanel.find("[id^=b10_d2_o_1]").val() == 3003  //AdultosSecundario
        ) {
        objPanel.find("[id^=completa_cuadro_designacion_1]").show();
        objPanel.find("[id^=completa_cuadro_designacion_2]").show();
    }else{
//        objPanel.find("[id^=completa_cuadro_designacion_1]").hide();
//        objPanel.find("[id^=completa_cuadro_designacion_2]").hide();
    }
};

consistencia10_6 = function(obj) {
    var objPanel=obj.parents("#panel");
    if (    
            objPanel.find("[id^=b10_d41_o_1]").val() == 1003 || //ComunSecundario
            objPanel.find("[id^=b10_d41_o_1]").val() == 1004 || //ComunSuperior
            objPanel.find("[id^=b10_d41_o_1]").val() == 2003 || //EspecialSecundario
            objPanel.find("[id^=b10_d41_o_1]").val() == 3003  //AdultosSecundario
        ) {
        objPanel.find("[id^=completa_cuadro_funcion_1]").show();
        objPanel.find("[id^=completa_cuadro_funcion_2]").show();
    }else{
//        objPanel.find("[id^=completa_cuadro_funcion_1]").hide();
//        objPanel.find("[id^=completa_cuadro_funcion_2]").hide();
    }
};

consistencia10_7 = function(obj) {
    validaRangoNros(obj,1,60);
};

consistencia10_8 = function(obj) {
    validaRangoNros(obj,1,60);
};

consistencia10_9 = function(obj) {
    esAnio(obj,2014,"Desde que año está designado en este cargo");
};

consistencia10_10 = function(obj) {
    esAnio(obj,2014,"Desde que año realiza esta función");
};

consistencia10_12 = function(obj) {
    var objPanel=obj.parents("#panel");
    if ( objPanel.find("[id^=b10_d25_o_1]").val() == 0 || objPanel.find("[id^=b10_d25_o_1]").val() == "") {
        objPanel.find("[id^=b10_d25_o_1_eq_1]").hide();
        objPanel.find("[id^=b10_d25_o_1_neq_1]").hide();
    }else if ( objPanel.find("[id^=b10_d25_o_1]").val() == 1 ) {
        objPanel.find("[id^=b10_d25_o_1_eq_1]").show();
        objPanel.find("[id^=b10_d25_o_1_neq_1]").hide();
    } else {
        objPanel.find("[id^=b10_d25_o_1_eq_1]").hide();
        objPanel.find("[id^=b10_d25_o_1_neq_1]").show();
    }
    consistencia10_13(obj);
};

consistencia10_13 = function(obj) {
    var objPanel=obj.parents("#panel");
    if ( objPanel.find("[id^=b10_d25_o_1]").val() != 1 ) {
        if(objPanel.find("[id^=b10_d7_o_1]").val()==2){
            objPanel.find("[id^=b10_d7_o_1_eq_2]").show();
        }else{
            objPanel.find("[id^=b10_d7_o_1_eq_2]").hide();
        }
    }
};