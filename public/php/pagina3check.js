/*
 * Delegate functions
 */
function InicializaConsistencia(){
    $(document).delegate("[name='b3_d154_c_1']", 'change', function() {
        consistencia3_1();
    });
    $(document).delegate("[name='b3_d151_o_1']", 'change', function() {
        consistencia3_2($(this));
    });
    $(document).delegate("[name='b3_d152_o_1']", 'change', function() {
        consistencia3_2($(this));
    });
    $(document).delegate("[name='b3_d153_o_1']", 'change', function() {
        consistencia3_2($(this));
    });
}

/*
 * Consistencias de ejecución una vez cargado el document.
 */
function ProcessInicialConsistencia(){
    consistencia3_1();
}

/*
 * Consistencias
 */
consistencia3_1 = function() {
    
    if (!$("#b3_d154_c_1").is(":checked")) {
        $("#tienecomputadora").hide();
    } else {
        $("#tienecomputadora").show();
    }
};

consistencia3_2 = function(obj) {
    var intCuantas = $("#b3_d151_o_1").find(":selected").val();
    intCuantas=(intCuantas==-1?0:parseInt(intCuantas));
    var intNac = $("#b3_d152_o_1").find(":selected").val();
    intNac=(intNac==-1?0:parseInt(intNac));
    var intProv = $("#b3_d153_o_1").find(":selected").val();
    intProv=(intProv==-1?0:parseInt(intProv));
    if( ( intNac + intProv ) > intCuantas ){
        $.gritter.add({text: "La suma de computadoras otorgadas por el gobierno nacional y provincial no puede ser mayor a las otorgadas.",class_name: "gritter-error",time:4000});
        obj.val(-1);
        obj.focus();
    }
};
