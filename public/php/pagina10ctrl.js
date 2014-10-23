/*
 * Variables Globales
 * 
 */

var objForm = null; //Obj con variables de formularios dinamicos
var intActiveIndex = null; //Apunta siempre a un indice que se necesita residente. En este caso el objJson[index] = CUE trabajando.
var strBloque10ctrl_CleanForm = null; //Formulario limpio.
var blnFormAceptado=true; //Establece si se acepto o no el formulario dinamico, para evitar que se olvide de guardar los cambios
var intCantHsDesignaciones=0;
var intCantHsFunciones=0;

//-------------------------

/*
 * 
 * Funciones de Carga de Datos
 */

function loadPageGlobals(){
    var index_hidden = strGlobalPageKey; //Guardadas en BD
    //Formulario Global a pagina
    $('#page_globals').append("<input type='hidden' id='"+index_hidden+"' name='"+index_hidden+"' value='"+GetLoadedPostValue(index_hidden)+"' />"); //Ojo... comillas simple obligatorias!
    objGlobal = decodeFormFrom($('#'+index_hidden));
    
    $.each( objJson, function( key, objEst ) {
        if(key==0) return;
        var index_hidden = strGlobalPageKey+'_'+objEst.IdEstablecimiento; //Guardadas en BD
        $('#page_globals').append("<input type='hidden' id='"+index_hidden+"' name='"+index_hidden+"' value='"+GetLoadedPostValue(index_hidden)+"' />"); //Ojo... comillas simple obligatorias!
        //Contadores de Horas
        index_hidden = strGlobalFormKey+'_'+objEst.IdEstablecimiento; 
        $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_designacion_hs_cant" name="'+index_hidden+'_designacion_hs_cant" value="'+GetLoadedGlobalValue(index_hidden+'_designacion_hs_cant','0')+'" />');
        $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_funcion_hs_cant" name="'+index_hidden+'_funcion_hs_cant" value="'+GetLoadedGlobalValue(index_hidden+'_funcion_hs_cant','0')+'" />');
    });
   
    var index_hidden = strGlobalFormKey;
    $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_designacioncentral_cant" name="'+index_hidden+'_designacioncentral_cant" value="'+GetLoadedGlobalValue(index_hidden+'_designacioncentral_cant','0')+'" />');
    $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_designacioncentral_json_cant" name="'+index_hidden+'_designacioncentral_json_cant" value="'+GetLoadedGlobalValue(index_hidden+'_designacioncentral_json_cant')+'" />');
}

function loadFormGlobals(objEst){
    objForm = decodeFormFrom($('#'+strGlobalPageKey+'_'+objEst.IdEstablecimiento));
    var index_hidden = strGlobalFormKey+'_'+objEst.IdEstablecimiento;
    //Control de funciones y designaciones
    $('#form_globals').append('<input type="hidden" id="'+index_hidden+'_designacion_cant" name="'+index_hidden+'_designacion_cant" value="'+GetLoadedFormValue(index_hidden+'_designacion_cant','0')+'" />');
    $('#form_globals').append('<input type="hidden" id="'+index_hidden+'_funcion_cant" name="'+index_hidden+'_funcion_cant" value="'+GetLoadedFormValue(index_hidden+'_funcion_cant','0')+'" />');
    $('#form_globals').append('<input type="hidden" id="'+index_hidden+'_designacion_json_cant" name="'+index_hidden+'_designacion_json_cant" value="'+GetLoadedFormValue(index_hidden+'_designacion_json_cant')+'" />');
    $('#form_globals').append('<input type="hidden" id="'+index_hidden+'_funcion_json_cant" name="'+index_hidden+'_funcion_json_cant" value="'+GetLoadedFormValue(index_hidden+'_funcion_json_cant')+'" />');
}


/*
 * Inicio del formulario
 * 
 */

function bloqueCtrl (){
    InicializaForm();
    InicializaConsistencia();
    ProcessInicialConsistencia();
}

function InicializaForm(){
    //0.Guardo el form y cargo globales generales de la 
    f0();
    //1. Generacion de los rows iniciales
    f1();
    //2. Carga de Designacion Central
    //f2(); en check.js
}

function f0(){
    loadPageGlobals();
    if(strBloque10ctrl_CleanForm==null) strBloque10ctrl_CleanForm = $("#cue-panel-master_row_template").html();
    $("#cue-panel-master_row_template").remove();
}

//F1 Generacion de los rows iniciales
function f1(){
    intActiveIndex=null;
    $.each( objJson, function( key, objEst ) {
        if(key==0) return;
        f1_appendRow(key,objEst);
    });
   
}

function f1_appendRow(key,objEst){
    var objRow = $("#b10_table_header_row_template tr").clone();
    var index_hidden = strGlobalFormKey+'_'+objEst.IdEstablecimiento;
    var str_row_id = objEst.IdEstablecimiento;
    
    objRow.each(function() {
        var columna=0;
        $.each(this.cells, function(){
            if(columna==0) {
                var a = $(this).find("a");
                a.html(objEst.strCue);
                a.click(function(){showCuePanel(key)});
            }
            if(columna==1) {
                $(this).html(objEst.strNombre);
            }
            if(columna==2) {
                $(this).html(objEst.strDomicilio);
            }
            if(columna==3) {
                $(this).attr("id",index_hidden+'_designacion_hs_cant_td');
                $(this).text(GetLoadedGlobalValue(index_hidden+'_designacion_hs_cant','0'));
            }
            if(columna==4) {
                $(this).attr("id",index_hidden+'_funcion_hs_cant_td');
                $(this).text(GetLoadedGlobalValue(index_hidden+'_funcion_hs_cant','0'));
            }
            if(columna==5) {
                var c = $(this).find("input");
                c.attr("id",c.attr("id")+"_"+str_row_id);
                c.attr("name",c.attr("name")+"_"+str_row_id);
            }
            columna++;
        });

    });
    $( "#establecimiento-table-master tbody" ).append( objRow );
    objRow.find("[type=checkbox]").each(function(){
        processInputCheckBox($(this),true);
    });
}

//2. Carga de Designacion Central
function f2(){
    loadAccordionRows('designacioncentral',procesarObjDesignacionCentral);
    $('#designacioncentral_button_add').click(function(){
        addAccordionRow('designacioncentral',procesarObjDesignacionCentral);
    });
    $('#designacion-central-master').show();
}

function showCuePanel(key){
    //1=Uso de Bootbox para los formularios por CUE
    //2=Se muestra formulario en pantalla sin Bootbox
    switch(1){
        case 1:
            blnFormAceptado=false;
            intActiveIndex = key;
            objEst=objJson[intActiveIndex];
            var strTitle = objEst.strCue +' - '+ objEst.strNombre;
            //Uso de bootbox
            $(document.body).append('<div id="dinamic_form" style="display: none"><div id="cue-panel-master_row" class="row"></div></div>');
            $("#cue-panel-master_row").html(strBloque10ctrl_CleanForm); 
            loadFormGlobals(objEst); 
            $('#cue-panel-master_NOMBRE').html(strTitle);
            parseActiveForm();
            ProcessInicialConsistenciaDinamica();
            var height = String((window.innerHeight - 300))+'px';
            var myBootbox = bootbox.dialog({
              message: $('#dinamic_form'),
              title: '<h4 class="blue"><i class="icon-ok bigger-110"></i>Designaciones y Funciones</h4>',
              closeButton: false,
              buttons: {
                success: {
                  label: "Aceptar",
                  className: "btn-success",
                  callback: function() {
                    AceptarFormulario();
                  }
                },
                main: {
                  label: "Cancelar",
                  className: "btn-primary",
                  callback: function() {
                    var y = confirm("Desea cancelar? Cualquier cambio se perderá.");
                    return y;
                  }
                }
              }
            });
            myBootbox.id = "bootbox_" + objEst['IdEstablecimiento'];
            $('#dinamic_form').css("max-height", height);
            $('#dinamic_form').css("overflow-y","scroll");
            $('#dinamic_form').css("overflow-x","hidden");
            $('#dinamic_form').show();
            window.onresize = function(){
                var height = String((window.innerHeight - 300))+'px';
                $('#dinamic_form').css("max-height",height);
            }
            break;
        default:
            //No usar
            if(key==intActiveIndex) return;
            if(blnFormAceptado==false) {
                var y = confirm("No guardo. Desea trabajar con otro cue? Si hubo algún cambio perderá los datos consignados?");
                if(y){
                    blnFormAceptado=true;
                }else return;
            }
            blnFormAceptado=false;
            intActiveIndex = key;
            objEst=objJson[intActiveIndex];
            var strTitle = objEst.strCue +' - '+ objEst.strNombre;
            //Uso en pantalla
            if($("#dinamic_form").length == 0){
                $("#_dinamic_form_").attr("id","dinamic_form");
                $("#_cue-panel-master_row_").attr("id","cue-panel-master_row");
            }
            $("#cue-panel-master_row").html(strBloque10ctrl_CleanForm);
            $('#dinamic_form').hide();
            loadFormGlobals(objEst); 
            $('#cue-panel-master_NOMBRE').html( strTitle );
            parseActiveForm();
            $('#cue-panel-master').show();
            $('#cue-panel-master').append('<input type="button" onclick="AceptarFormulario();" value="Aceptar">');
            $('#dinamic_form').show();
            break;
    }
}

function parseActiveForm(){
    objEst=objJson[intActiveIndex];
    if(carga_designacion) { 
        loadAccordionRows('designacion',procesarObjDesignacion,objEst,"IdEstablecimiento"); 
        $('#designacion_button_add').click(function(){
            objEst=objJson[intActiveIndex];
            addAccordionRow('designacion',procesarObjDesignacion,objEst,"IdEstablecimiento");
        });
    }
    if(carga_funcion) {
        loadAccordionRows('funcion',procesarObjFuncion,objEst,"IdEstablecimiento");
        $('#funcion_button_add').click(function(){
            objEst=objJson[intActiveIndex];
            addAccordionRow('funcion',procesarObjFuncion,objEst,"IdEstablecimiento");
        });
    }
}


function procesarObjDesignacionCentral(str_row_id,has_delete){
    procesarObj("designacioncentral",str_row_id,has_delete,1); //m1
    //Cambio de Nombres
    $("#designacioncentral_line_"+str_row_id).find("[id^=b10_d44_a_1_text]").change();
    
}

function procesarObjDesignacion(str_row_id,has_delete){
    procesarObj("designacion",str_row_id,has_delete,2,true);
    $("#designacion_line_"+str_row_id).find("[id^=b10_d3_a_1_text]").change();
}

function procesarObjFuncion(str_row_id,has_delete){
    procesarObj("funcion",str_row_id,has_delete,2,true);
}

function saveAll(){
    if(intActiveIndex){
        var objEst=objJson[intActiveIndex];
        if(objEst)encodeFormTo( $("#cue-panel-master_row"), $('#'+strGlobalPageKey+'_'+objEst.IdEstablecimiento) );
    }
    encodeGlobalTo( $("#global-panel-master_row"), $('#'+strGlobalPageKey) );
    $("#cue-panel-master_row").html(strBloque10ctrl_CleanForm); 
    $("#dinamic_form").hide();
    intActiveIndex=null;
    blnFormAceptado=true;
}

function AceptarFormulario(){
    if(intActiveIndex){
        var objEst=objJson[intActiveIndex];
        reloadCounters(objEst);
    }
    saveAll();
}

function reloadCounters(objEst){
    if(!objEst)return;
    intCantHsFunciones = 0;
    intCantHsDesignaciones = 0;
    //Cantidad de horas semanales (1 a 60) b10_d5_n_1
    $("#cue-panel-master_row [name^=b10_d5_n_1]").each(function(){
        var tag = strGlobalFormKey+'_'+objEst.IdEstablecimiento;
        var n=parseInt($(this).val());
        intCantHsDesignaciones=intCantHsDesignaciones+(isNaN(n)?0:n);
        //Hacemos esto aca, por un tema de sincronizacion de funciones.
        $("#"+tag+'_designacion_hs_cant_td').text(intCantHsDesignaciones);
        setHiddenValue(tag+'_designacion_hs_cant',intCantHsDesignaciones)
    });
    $("#cue-panel-master_row [name^=b10_d26_n_1]").each(function(){
        var tag = strGlobalFormKey+'_'+objEst.IdEstablecimiento;
        var n=parseInt($(this).val());
        intCantHsFunciones=intCantHsFunciones+(isNaN(n)?0:n);
        //Hacemos esto aca, por un tema de sincronizacion de funciones.
        $("#"+tag+'_funcion_hs_cant_td').text(intCantHsFunciones);
        setHiddenValue(tag+'_funcion_hs_cant',intCantHsFunciones)
    });
}

/*
 * Tablas Interngas
 */
//El uso de blnNoConfirm, y no blnConfirm se debe al desarrollo incremental.
function borrarTablaRow(obj,str_row_id,strTabla,strNroTabla,blnNoConfirm){
    if(!blnNoConfirm==true){
        var y = confirm("¿Desea eliminar la fila?");
        if (!y) return;
    }
    var objParent = obj.parent().parent();
    var arrRows = decodeValueFrom($("#"+strGlobalFormKey+"_tabla_"+strTabla+"_"+strNroTabla+"_json_count_"+str_row_id));
    if(arrRows==null || !$.isArray(arrRows)) {
        console.log("error 4");
    }else{
        var index = objParent.attr("data-index");
        arrRows[index]=null;
        encodeValueTo(arrRows,$("#"+strGlobalFormKey+"_tabla_"+strTabla+"_"+strNroTabla+"_json_count_"+str_row_id));
        objParent.remove();//Con solo remover los datos no son consignados al grabar.
    }
}

function configurarTablaRow(objRow,strTabla,strNroTabla,str_row_id_index){
    objRow.find("[id^=b10_d]").each(function(){
        $(this).attr("id",$(this).attr("id")+"_"+str_row_id_index);
        $(this).attr("name",$(this).attr("name")+"_"+str_row_id_index);
    });
    //TODO cambiar el processInputSelect por un each(this)
    if(strTabla=="designacion" && strNroTabla=="1"){
        var objParent=objRow.parents("[id^=designacion_line_]");
        var a = objParent.find("[id^=b10_d2_o_1]").find(":selected");
        if( !(a.length != 0 && a.val() != 0) ){
            alert("Debe especificar una oferta.");
            return false;
        }
        processInputSelect(objRow.find("[id^=b10_d13_o_1]"),"",false,objParent);
        processInputText(objRow.find("[id^=b10_d23_a_1]"));
        processInputSelect(objRow.find("[id^=b10_d14_o_1]"));
        processInputSelect(objRow.find("[id^=b10_d15_o_1]"));
    }else if(strTabla=="designacion" && strNroTabla=="2"){
        processInputSelect(objRow.find("[id^=b10_d16_o_1]"));
        processInputSelect(objRow.find("[id^=b10_d17_o_1]"));
    }else if(strTabla=="funcion" && strNroTabla=="1"){
        var objParent=objRow.parents("[id^=funcion_line_]");
        var a = objParent.find("[id^=b10_d41_o_1]").find(":selected");
        if( !(a.length != 0 && a.val() != 0) ){
            alert("Debe especificar una oferta.");
            return false;
        }
        processInputSelect(objRow.find("[id^=b10_d18_o_1]"),"",false,objParent);
        processInputText(objRow.find("[id^=b10_d24_a_1]"));
        processInputSelect(objRow.find("[id^=b10_d19_o_1]"));
        processInputSelect(objRow.find("[id^=b10_d20_o_1]"));
    }else if(strTabla=="funcion" && strNroTabla=="2"){
        processInputSelect(objRow.find("[id^=b10_d21_o_1]"));
        processInputSelect(objRow.find("[id^=b10_d22_o_1]"));
    }
    return true;
}

function agregarTablaRow(str_row_id,strTabla,strNroTabla){ 
    var objTable = $("#tabla_"+strTabla+"_"+strNroTabla+"_"+str_row_id);
    var index = getHiddenValue(strGlobalFormKey+"_tabla_"+strTabla+"_"+strNroTabla+"_count_"+str_row_id);
    var arrRows = decodeValueFrom($("#"+strGlobalFormKey+"_tabla_"+strTabla+"_"+strNroTabla+"_json_count_"+str_row_id));
    if(arrRows==null || !$.isArray(arrRows)) { arrRows=Array(); }
    arrRows[ index ]=true;
    var objRow = $("#b"+nro_pagina+"_table_tabla_"+strTabla+"_"+strNroTabla+"_row_template tr").clone();
    objTable.append(objRow);
    objRow.attr("data-index",index);
    objRow.attr("data-table",strNroTabla);
    objRow.attr("id","tr_"+strTabla+"_"+strNroTabla+"_"+str_row_id+"_"+index);
    objRow.find("button").attr("data-index",str_row_id);
    objRow.find("button").click( function(){ 
            var objParent = $(this).parent().parent();
            var strNroTabla = objParent.attr("data-table");
            borrarTablaRow($(this),str_row_id,strTabla,strNroTabla);
        } 
    );
    cont = configurarTablaRow(objRow,strTabla,strNroTabla,str_row_id+"_"+index);
    if(!cont) {
        objRow.remove();
        return;
    }
    setHiddenValue(strGlobalFormKey+"_tabla_"+strTabla+"_"+strNroTabla+"_count_"+str_row_id,IncrementHidden(strGlobalFormKey+"_tabla_"+strTabla+"_"+strNroTabla+"_count_"+str_row_id,index));
    encodeValueTo(arrRows,$("#"+strGlobalFormKey+"_tabla_"+strTabla+"_"+strNroTabla+"_json_count_"+str_row_id));
    objRow.show();
}

function LoadInternalTablas(str_row_id,strTabla,intCantTablas){
    for(var it=1; it <= intCantTablas; it++){
        var intNroTabla = it;
        //Tablas personalizadas
        if(strTabla=="designacioncentral" && intNroTabla == 1){
            var objTable = $("#tabla_"+strTabla+"_"+intNroTabla+"_"+str_row_id);
            var arrRows = objJson[0]["designacion_central_CAN"];
            if(arrRows==null || !$.isArray(arrRows) || arrRows.count == 0) {
                return;
            }
            for(var it2=0;it2<arrRows.length;it2++){
                if(arrRows[it2]){
                    var obj = arrRows[it2];
                    var objRow = $("#b"+nro_pagina+"_table_tabla_"+strTabla+"_"+intNroTabla+"_row_template tr").clone();
                    objTable.append(objRow);
                    objRow.attr("data-index",it2);
                    objRow.attr("id","tr_"+strTabla+"_"+intNroTabla+"_"+str_row_id+"_"+it2);
                    //Configuracion del row
                    objRow.find("[id=b"+nro_pagina+"_d43_anexo]").text(arrRows[it2].strCueAnexo);
                    objRow.find("[id=b"+nro_pagina+"_d43_nombre]").text(objJson[obj.JSONIndexCueInformation].strNombre);
                    objRow.find("[id=b"+nro_pagina+"_d43_domicilio]").text(objJson[obj.JSONIndexCueInformation].strDomicilio);
                    objRow.find("[id=b"+nro_pagina+"_d43_oferta]").text(obj.strOferta);
                    objRow.find("[id^=b"+nro_pagina+"_d]").each(function(){
                        $(this).attr("id",$(this).attr("id")+"_"+str_row_id);
                        $(this).attr("name",$(this).attr("name")+"_"+str_row_id);
                    });
                    objRow.find("[id^=b"+nro_pagina+"_d43_o_1]").each(function(){
                        $(this).attr("id",$(this).attr("id")+"_"+obj.IdPersonalEstablecimientoUnidadServicio);
                        $(this).attr("name",$(this).attr("name")+"_"+obj.IdPersonalEstablecimientoUnidadServicio);
                    });
                    processInputCheckBox(objRow.find("[id^=b"+nro_pagina+"_d43_o_1]"),true);
                    objRow.show();
                }
            }
        }else{
            $('#form_globals').append('<input type="hidden" id="'+strGlobalFormKey+'_tabla_'+strTabla+'_'+intNroTabla+'_count_'+str_row_id+'" name="'+strGlobalFormKey+'_tabla_'+strTabla+'_'+intNroTabla+'_count_'+str_row_id+'" value="'+GetLoadedFormValue(''+strGlobalFormKey+'_tabla_'+strTabla+'_'+intNroTabla+'_count_'+str_row_id,'0')+'" />');
            $('#form_globals').append('<input type="hidden" id="'+strGlobalFormKey+'_tabla_'+strTabla+'_'+intNroTabla+'_json_count_'+str_row_id+'" name="'+strGlobalFormKey+'_tabla_'+strTabla+'_'+intNroTabla+'_json_count_'+str_row_id+'" value="'+GetLoadedFormValue(''+strGlobalFormKey+'_tabla_'+strTabla+'_'+intNroTabla+'_json_count_'+str_row_id)+'" />');
            //Tablas Genericas
            var arrRows = decodeValueFrom($("#"+strGlobalFormKey+"_tabla_"+strTabla+"_"+intNroTabla+"_json_count_"+str_row_id));
            if(!(arrRows==null || !$.isArray(arrRows) || arrRows.count == 0)) {
                var objTable = $("#tabla_"+strTabla+"_"+intNroTabla+"_"+str_row_id);
                for(var it2=0;it2<arrRows.length;it2++){
                    if(arrRows[it2]==true){
                        var objRow = $("#b"+nro_pagina+"_table_tabla_"+strTabla+"_"+intNroTabla+"_row_template tr").clone();
                        objTable.append(objRow);
                        objRow.attr("data-index",it2);
                        objRow.attr("data-table",intNroTabla);
                        objRow.attr("id","tr_"+strTabla+"_"+intNroTabla+"_"+str_row_id+"_"+it2);
                        objRow.find("button").attr("data-index",str_row_id);
                        objRow.find("button").click( function(){ 
                                var objParent = $(this).parent().parent();
                                var strNroTabla = objParent.attr("data-table");
                                borrarTablaRow($(this),str_row_id,strTabla,strNroTabla);
                            } 
                        );
                        configurarTablaRow(objRow,strTabla,intNroTabla,str_row_id+"_"+it2);
                        objRow.show();
                    }
                }
            }
        }
    }
}

function loadOfertas(objFrom,objTarget,blnLoadFromSaved){
    objTarget.find("option").remove(); //Designacion - Oferta
    addSelectOption(objTarget,'0','');
    objTarget.val(0);
    objTarget.change();
    if(blnLoadFromSaved==null && objFrom.val()==0) {
        return;
    }
    if(blnLoadFromSaved!=null) {
        //permite cargar valores, si alguno esta seteado los cargo.
        if(GetLoadedFormValue(objFrom.attr("name"),0)==0) return;
        objFrom.val(GetLoadedFormValue(objFrom.attr("name"),0));
    }
    var indexLoc = objFrom.find(":selected").attr("data-index");
    objUnidadServicioArray=objJson[intActiveIndex].LocalizacionArray[ indexLoc ].UnidadServicioArray;
    if(objUnidadServicioArray){
        $.each( objUnidadServicioArray, function( indexUs, _obj_ ) {
            addSelectOption(objTarget,_obj_.IdUnidadServicio,_obj_.strDescripcion,indexLoc,indexUs);
        });
    }
}

function removeInternalTableRows(objInternalTable,strTabla,strNroTabla){
    objInternalTable.find("[id^=tr]").each(function(){
        var objButton = $(this).find("button");
        borrarTablaRow(objButton,objButton.attr("data-index"),strTabla,strNroTabla,true);
    });
}


function setAutoCompleteTextBox(obj,objText){
    var strInputName =  obj.attr('name');
    if( strInputName.indexOf("b10_d23_a_1") == 0  ){ //Espacios Curriculares designacion
        ConfigureAutoCompleteTextBox(objText);
    }else if( strInputName.indexOf("b10_d24_a_1") == 0  ){ //Espacios Curriculares funcion
        ConfigureAutoCompleteTextBox(objText);
    }else if( strInputName.indexOf("b10_d44_a_1") == 0  ){ //Nombre Designacion central
        ConfigureAutoCompleteTextBox(objText);
        objText.change(
            function(){ 
                var t = $(this).val();
                if(t=="") t="Nueva Designación Central";
                objParent=$(this).parents("[id^=designacioncentral_line_]");
                objParent.find(".panel-heading #accordion_designacioncentral_row__name").text(t);
            }
        );
    }else if( strInputName.indexOf("b10_d3_a_1") == 0  ){ //Nombre Designacion x cue
        ConfigureAutoCompleteTextBox(objText);
        objText.change(
            function(){ 
                var t = $(this).val();
                if(t=="") t="Nueva Designación";
                objParent=$(this).parents("[id^=designacion_line_]");
                objParent.find(".panel-heading #accordion_designacion_row__name").text(t);
            }
        );
    }
}

//Se redefine.
function getAutoCompleteData(objIdTag){
    if( objIdTag.indexOf("b10_d23_a_1") == 0  ){ //Espacios Curriculares designacion
        return {
            cat: "espaciocurricular"
        };
    }else if( objIdTag.indexOf("b10_d24_a_1") == 0  ){ //Espacios Curriculares funcion
        return {
            cat: "espaciocurricular"
        };
    }else if( objIdTag.indexOf("b10_d44_a_1") == 0  ){ //Nombre Designacion central
        return {
            cat: "designacion_cargo"
        };
    }else if( objIdTag.indexOf("b10_d3_a_1") == 0  ){ //Nombre Designacion x cue
        return {
            cat: "designacion_cargo"
        };
    }
    return {};
}


var lastSel = [];
function loadSelectValues(obj,str_row_panel,objPanel){
    var strSelectName =  obj.attr('name');
    //DESIGNACION
    if( strSelectName.indexOf("b10_d1_o_1") == 0  ){ //Designacion - Cue Anexo
        var objLocalizaciones=objJson[intActiveIndex].LocalizacionArray;
        addSelectOption(obj,'0','');
        if(objLocalizaciones){
            $.each( objLocalizaciones, function( key, _obj_ ) {
                addSelectOption(obj,_obj_.IdLocalizacion,(_obj_.strCueAnexo+" "+_obj_.strNombre+" "+_obj_.strLocalidad),key);
            });
        }
        obj.attr("data-index",str_row_panel);
        loadOfertas(obj,$("#"+str_row_panel+" [id^=b10_d2_o_1]"),true);
        obj.change(
            function(){
                str_row_panel=obj.attr("data-index");
                loadOfertas($(this),$("#"+str_row_panel+" [id^=b10_d2_o_1]"));
            }
        );
        return false;
    }else if( strSelectName.indexOf("b10_d2_o_1") == 0  ){ //Designacion - Oferta
        obj.attr("data-index",str_row_panel);
        obj.change(
            function(){
                str_row_panel=obj.attr("data-index");
                if($("#"+str_row_panel+" [id^=tabla_designacion_1]").find("tr").length > 1 ){
                    var y = confirm("Cambiar la oferta implica eliminar todas las filas de la tabla \"Si es profesor de espacios curriculares\".¿Desea continuar?");
                    if(y) removeInternalTableRows($("#"+str_row_panel+" [id^=tabla_designacion_1]"),"designacion","1");
                    else $(this).val(lastSel[$(this).attr("id")]);
                }
            }
        );
        obj.click(function(){
            lastSel[$(this).attr("id")] = $(this).find(":selected").val();
        });
    }else if( strSelectName.indexOf("b10_d4_o_1") == 0  ){ //Designacion - Tipo Designacion
        obj.append(getSelect_TipoDesignacion());
    }else if( strSelectName.indexOf("b10_d7_o_1") == 0  ){ //Designacion - Situacion Revista
        obj.append(getSelect_SituacionRevista());
    }else if( strSelectName.indexOf("b10_d25_o_1") == 0  ){ //Designacion - Situacion Revista
        obj.append(getSelect_CondicionActividad());
    }else if( strSelectName.indexOf("b10_d11_o_1") == 0  ) { //Designacion - Motivo Licencia
        obj.append(getSelect_MotivoLicencia());
    }else if( strSelectName.indexOf("b10_d13_o_1") == 0  ){ //Planes de Estudio Designacion Tabla 1  (Campo1)
        //Necesitamos el valor de oferta
        var intIndexLoc = objPanel.find("[id^=b10_d2_o_1]").find(":selected").attr("data-index");
        var intIndexUS = objPanel.find("[id^=b10_d2_o_1]").find(":selected").attr("data-index2");
        obj.append(getSelect_PlanEstudio(intIndexLoc,intIndexUS));
    }else if( strSelectName.indexOf("b10_d18_o_1") == 0 ){ //Planes de Estudio Funcion Tabla 1 (Campo1)
        //Necesitamos el valor de oferta
        var intIndexLoc = objPanel.find("[id^=b10_d41_o_1]").find(":selected").attr("data-index");
        var intIndexUS = objPanel.find("[id^=b10_d41_o_1]").find(":selected").attr("data-index2");
        obj.append(getSelect_PlanEstudio(intIndexLoc,intIndexUS));
    }else if( strSelectName.indexOf("b10_d14_o_1") == 0  ){ //Tabla 1 - Campo 3
        obj.append(getSelect_AnioEstudio());
    }else if( strSelectName.indexOf("b10_d15_o_1") == 0  ){ //Tabla 2 - Campo 4
        obj.append(getSelect_Cantidad(10));
    }else if( strSelectName.indexOf("b10_d16_o_1") == 0  ){ //Tabla 2 - Campo 1
        obj.append(getSelect_AnioEstudio());
    }else if( strSelectName.indexOf("b10_d17_o_1") == 0  ){ //Tabla 2 - Campo 2
        obj.append(getSelect_Cantidad(10));
    }
    //FUNCION
    if( strSelectName.indexOf("b10_d40_o_1") == 0  ){ //Funcion - Cue Anexo
        objLocalizaciones=objJson[intActiveIndex].LocalizacionArray;
        addSelectOption(obj,'0','');
        if(objLocalizaciones){
            $.each( objLocalizaciones, function( key, _obj_ ) {
                addSelectOption(obj,_obj_.IdLocalizacion,(_obj_.strCueAnexo+" "+_obj_.strNombre+" "+_obj_.strLocalidad),key);
            });
        }
        
        obj.attr("data-index",str_row_panel);
        loadOfertas(obj,$("#"+str_row_panel+" [id^=b10_d41_o_1]"),true);
        obj.change(
            function(){
                str_row_panel=obj.attr("data-index");
                loadOfertas($(this),$("#"+str_row_panel+" [id^=b10_d41_o_1]"));
            }
        );
        return false;
    }else if( strSelectName.indexOf("b10_d41_o_1") == 0  ){ //funcion - Oferta
        obj.attr("data-index",str_row_panel);
        obj.change(
            function(){
                str_row_panel=obj.attr("data-index");
                if($("#"+str_row_panel+" [id^=tabla_funcion_1]").find("tr").length > 1 ){
                    var y = confirm("Cambiar la oferta implica eliminar todas las filas de la tabla \"Si es profesor de espacios curriculares\".¿Desea continuar?");
                    if(y) removeInternalTableRows($("#"+str_row_panel+" [id^=tabla_funcion_1]"),"funcion","1");
                    else $(this).val(lastSel[$(this).attr("id")]);
                }
            }
        );
        obj.click(function(){
            lastSel[$(this).attr("id")] = $(this).find(":selected").val();
        });
    }else if( strSelectName.indexOf("b10_d27_o_1") == 0  ){ //Cuál es su relación con el establecimiento
        obj.append(getSelect_RelacionEstablecimiento());
    }else if( strSelectName.indexOf("b10_d28_o_1") == 0  ){ //Función que realiza
        obj.append(getSelect_Funciones());
        obj.change(
            function(){ 
                var t = $(this).find(":selected").text();
                if(t=="") t="Nueva Función";
                objParent=$(this).parents("[id^=funcion_line_]");
                objParent.find(".panel-heading #accordion_funcion_row__name").text(t);
            }
        );
    }else if( strSelectName.indexOf("b10_d19_o_1") == 0  ){ //Tabla 1 - Campo 3
        obj.append(getSelect_AnioEstudio());
    }else if( strSelectName.indexOf("b10_d20_o_1") == 0  ){ //Tabla 2 - Campo 4
        obj.append(getSelect_Cantidad(10));
    }else if( strSelectName.indexOf("b10_d21_o_1") == 0  ){ //Tabla 2 - Campo 1
        obj.append(getSelect_AnioEstudio());
    }else if( strSelectName.indexOf("b10_d22_o_1") == 0  ){ //Tabla 2 - Campo 2
        obj.append(getSelect_Cantidad(10));
    }
    
    //DESIGNACIONES CENTRALES
    else if( strSelectName.indexOf("b10_d29_o_1") == 0  ){ //Relación Laboral
        obj.append(getSelect_RelacionLaboral());
    }else if( strSelectName.indexOf("b10_d30_o_1") == 0  ){ //Nombre del Programa/Plan
        obj.append(getSelect_NombreDelPrograma());
    }else if( strSelectName.indexOf("b10_d31_o_1") == 0  ){ //Tipo de Designación
        obj.append(getSelect_TipoDesignacion());
    }else if( strSelectName.indexOf("b10_d34_o_1") == 0  ){ //Situación de revista
        obj.append(getSelect_SituacionRevista());
    }else if( strSelectName.indexOf("b10_d35_o_1") == 0  ){ //Condición de Actividadag
        obj.append(getSelect_CondicionActividad());
    }else if( strSelectName.indexOf("b10_d39_o_1") == 0  ){ //Motivo de la licencia
        obj.append(getSelect_MotivoLicencia());
    }else if( strSelectName.indexOf("b10_d45_o_1") == 0  ){ //Motivo de la licencia
        obj.append(getSelect_TipoHora());
    }
    
    return true;
}

function getSelect_PlanEstudio(intIndexLoc,intIndexUS){
    var str = '<option value="0"></option>';
    if( intIndexLoc && intIndexUS) {
        var objPlanEstudioArray=objJson[intActiveIndex].LocalizacionArray[intIndexLoc].UnidadServicioArray[intIndexUS].PlanEstudioArray;
        if(objPlanEstudioArray){
             for(var it=0; it<objPlanEstudioArray.length; it++){
                 objPlanEstudio = objPlanEstudioArray[it];
                 str = str + '<option value="'+objPlanEstudio.IdPlanEstudio+'">'+objPlanEstudio.strDescripcion+'</option>';
             }
        }
    }
    return str;
}

function getSelect_SituacionRevista(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Titular</option>';
    str = str+ '<option value="2">Interino/Provisional</option>';
    str = str+ '<option value="3">Suplente</option>';
    return str;
}

function getSelect_CondicionActividad(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Activo</option>';
    str = str+ '<option value="2">En licencia</option>';
    str = str+ '<option value="3">En comisión de servicios</option>';
    str = str+ '<option value="4">Retiro</option>';
    str = str+ '<option value="5">Tareas pasivas</option>';
    return str;
 }

function getSelect_MotivoLicencia(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Enfermedad o accidente de trabajo</option>';
    str = str+ '<option value="2">Embarazo/maternidad</option>';
    str = str+ '<option value="3">Atención de familiar enfermo</option>';
    str = str+ '<option value="4">Examen/estudio</option>';
    str = str+ '<option value="5">Causa particular</option>';
    str = str+ '<option value="6">Actividad de interés público o del Estado/desempeño de cargos electivos o representación política</option>';
    str = str+ '<option value="7">Desempeño de cargos de mayor jerarquía en el sistema educativo</option>';
    str = str+ '<option value="8">Otros</option>';
    return str;
}

function getSelect_AnioEstudio(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">1er Año</option>';
    str = str+ '<option value="2">2do Año</option>';
    str = str+ '<option value="3">3er Año</option>';
    str = str+ '<option value="4">4to Año</option>';
    str = str+ '<option value="5">5to Año</option>';
    str = str+ '<option value="6">6to Año</option>';
    str = str+ '<option value="7">7mo Año</option>';
    str = str+ '<option value="8">Multigrado</option>';
    str = str+ '<option value="9">No Graduado/Modular</option>';
    return str;
}


function getSelect_TipoHora(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Hora Reloj</option>';
    str = str+ '<option value="2">Hora Cátedra</option>';
    return str;
}

function getSelect_RelacionLaboral(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Es de la Planta de este Establecimiento</option>';
    str = str+ '<option value="2">Es de la Planta de otro Establecimiento</option>';
    str = str+ '<option value="3">Es del nivel central</option>';
    str = str+ '<option value="4">Está contratado por este establecimiento</option>';
    str = str+ '<option value="5">Está contratado por la cooperadora</option>';
    str = str+ '<option value="6">Está contratado por una empresa/ organización</option>';
    str = str+ '<option value="7">Pertenece a planes sociales/ Municipio</option>';
    str = str+ '<option value="8">Realiza trabajo voluntario</option>';
    return str;
}

function getSelect_NombreDelPrograma(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Ajedrez</option>';
    str = str+ '<option value="2">CAI</option>';
    str = str+ '<option value="3">CAJ</option>';
    str = str+ '<option value="4">Coros y Orquestas</option>';
    str = str+ '<option value="5">Educación Solidaria</option>';
    str = str+ '<option value="6">Parlamento Juvenil MERCOSUR</option>';
    str = str+ '<option value="7">Fimes</option>';
    str = str+ '<option value="8">Plan de Mejora del Nivel Secundario</option>';
    str = str+ '<option value="9">Conectar Igualdad</option>';
    return str;
}

function getSelect_RelacionEstablecimiento(){
    var str = '<option value="0"></option>';
    //str = str+ '<option value="1">Es de la POF de otro establecimiento</option>';
    str = str+ '<option value="2">Es del nivel central</option>';
    str = str+ '<option value="3">Está contratado por este establecimiento</option>';
    str = str+ '<option value="4">Está contratado por la cooperadora</option>';
    str = str+ '<option value="5">Está contratado por una empresa/ organización</option>';
    str = str+ '<option value="6">Pertenece a planes sociales/ Municipio</option>';
    str = str+ '<option value="7">Realiza trabajo voluntario</option>';
    return str;
}

function getSelect_Funciones(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Tareas de gestión</option>';
    str = str+ '<option value="2">Tareas Administrativas</option>';
    str = str+ '<option value="3">Profesor/Maestro de espacios curriculars</option>';
    str = str+ '<option value="4">Maestro de Grado</option>';
    str = str+ '<option value="5">Maestro de Sala</option>';
    str = str+ '<option value="6">Maestro de Ciclo</option>';
    str = str+ '<option value="7">Maestro Alfabetizador</option>';
    str = str+ '<option value="8">Maestro de Taller extracurricular</option>';
    str = str+ '<option value="9">Arreglos Generales</option>';
    str = str+ '<option value="10">Colabora en Cocina/Comedor</option>';
    str = str+ '<option value="11">Colabora en biblioteca</option>';
    str = str+ '<option value="12">Otra función docente</option>';
    str = str+ '<option value="13">Otra función No docente</option>';

    return str;
}

function getSelect_TipoDesignacion(){
    var str = '<option value="0"></option>';
    str = str + '<option value="1" >Horas Cátedra </option>';
    str = str + '<option value="2" >Módulos</option>';
    str = str + '<option value="3" >Cargos por hora cátedra </option>';
    str = str + '<option value="4" >Cargo por hora reloj </option>';
    return str;

}

function getSelect_NombreDesignacion(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Administrador</option>';
    str = str+ '<option value="2">Administrador de Redes</option>';
    str = str+ '<option value="3">Administrativo</option>';
    str = str+ '<option value="4">Analista</option>';
    str = str+ '<option value="5">Analista Auxiliar</option>';
    str = str+ '<option value="6">Analista Auxiliar Técnico Docente</option>';
    str = str+ '<option value="7">Analista Mator</option>';
    str = str+ '<option value="8">Analista Mayor Técnico Docente</option>';
    str = str+ '<option value="9">Analista Principal</option>';
    str = str+ '<option value="10">Analista Principal Técnico Docente</option>';
    str = str+ '<option value="11">Analista Técnico</option>';
    str = str+ '<option value="12">Analista Técnico Docente</option>';
    str = str+ '<option value="13">Animador de Capacitación A Distancia</option>';
    str = str+ '<option value="14">Asesor</option>';
    str = str+ '<option value="15">Asesor de Psicología Educativa</option>';
    str = str+ '<option value="16">Asesor Docente</option>';
    str = str+ '<option value="17">Asesor Edificación Escolar</option>';
    str = str+ '<option value="18">Asesor Especializado Por Area de Gabinete</option>';
    str = str+ '<option value="19">Asesor Pedagógico</option>';
    str = str+ '<option value="20">Asesor Psicomédico</option>';
    str = str+ '<option value="21">Asesor Técnico</option>';
    str = str+ '<option value="22">Asesor Técnico Docente</option>';
    str = str+ '<option value="23">Asistente</option>';
    str = str+ '<option value="24">Asistente Celador</option>';
    str = str+ '<option value="25">Asistente de Comedor</option>';
    str = str+ '<option value="26">Asistente Educaciónal</option>';
    str = str+ '<option value="27">Asistente Escolar</option>';
    str = str+ '<option value="28">Asistente Lengua Extranjera</option>';
    str = str+ '<option value="29">Asistente Médico</option>';
    str = str+ '<option value="30">Asistente Social</option>';
    str = str+ '<option value="31">Asistente Social Interdisciplinario</option>';
    str = str+ '<option value="32">Asistente Técnico</option>';
    str = str+ '<option value="33">Asistente Técnico de Conectar Igualdad</option>';
    str = str+ '<option value="34">Asistente Técnico de Nodo de Supervisión</option>';
    str = str+ '<option value="35">Asistente Técnico de Plan de Mejora</option>';
    str = str+ '<option value="36">Asistente Técnico de Proyectos</option>';
    str = str+ '<option value="37">Asistente Técnico Especializado</option>';
    str = str+ '<option value="38">Asistente Técnico Pedagógico de PIIE</option>';
    str = str+ '<option value="39">Auxiliar</option>';
    str = str+ '<option value="40">Auxiliar Administrativo</option>';
    str = str+ '<option value="41">Auxiliar Administrativo Docente</option>';
    str = str+ '<option value="42">Auxiliar Area Contable</option>';
    str = str+ '<option value="43">Auxiliar Asesor Pedagógico</option>';
    str = str+ '<option value="44">Auxiliar Clases Prácticas de Laboratorio</option>';
    str = str+ '<option value="45">Auxiliar de Acciones No Formales</option>';
    str = str+ '<option value="46">Auxiliar de Biblioteca</option>';
    str = str+ '<option value="47">Auxiliar de Dirección</option>';
    str = str+ '<option value="48">Auxiliar de Enseñanza Practica</option>';
    str = str+ '<option value="49">Auxiliar de Internados</option>';
    str = str+ '<option value="50">Auxiliar de Investigaciónn</option>';
    str = str+ '<option value="51">Auxiliar de Laboratorio</option>';
    str = str+ '<option value="52">Auxiliar de Portería</option>';
    str = str+ '<option value="53">Auxiliar de Regencia</option>';
    str = str+ '<option value="54">Auxiliar de Secretaría</option>';
    str = str+ '<option value="55">Auxiliar de Taller</option>';
    str = str+ '<option value="56">Auxiliar Docente</option>';
    str = str+ '<option value="57">Auxiliar Docente</option>';
    str = str+ '<option value="58">Auxiliar Docente Aborigen</option>';
    str = str+ '<option value="59">Auxiliar Docente Con Tareas Pedagógicas</option>';
    str = str+ '<option value="60">Auxiliar Docente Conservatorio</option>';
    str = str+ '<option value="61">Auxiliar Docente de Lengua y/o Cultura Indígena</option>';
    str = str+ '<option value="62">Auxiliar Docente de Secretaria</option>';
    str = str+ '<option value="63">Auxiliar Docente Principal</option>';
    str = str+ '<option value="64">Auxiliar Jardín de Infantes</option>';
    str = str+ '<option value="65">Auxiliar Psicotécnico</option>';
    str = str+ '<option value="66">Auxiliar Técnico Docente</option>';
    str = str+ '<option value="67">Auxiliar Técnico Multiplicador</option>';
    str = str+ '<option value="68">Auxiliar Trabajos Prácticos</option>';
    str = str+ '<option value="69">Ayudante</option>';
    str = str+ '<option value="70">Ayudante de Secretaría</option>';
    str = str+ '<option value="71">Ayudante de Catedra</option>';
    str = str+ '<option value="72">Ayudante de Cátedra Para Acompañamiento Musical</option>';
    str = str+ '<option value="73">Ayudante de Clases Practicas</option>';
    str = str+ '<option value="74">Ayudante de Coordinación</option>';
    str = str+ '<option value="75">Ayudante de Departamento de Orientación</option>';
    str = str+ '<option value="76">Ayudante de Enseñanza Práctica</option>';
    str = str+ '<option value="77">Ayudante de Gabinete</option>';
    str = str+ '<option value="78">Ayudante de Laboratorio</option>';
    str = str+ '<option value="79">Ayudante de Medios</option>';
    str = str+ '<option value="80">Ayudante de Orientación</option>';
    str = str+ '<option value="81">Ayudante de Produccioón</option>';
    str = str+ '<option value="82">Ayudante de Secretaría</option>';
    str = str+ '<option value="83">Ayudante de Taller</option>';
    str = str+ '<option value="84">Ayudante de Trabajos Manuales</option>';
    str = str+ '<option value="85">Ayudante de Trabajos Prácticos</option>';
    str = str+ '<option value="86">Ayudante Docente</option>';
    str = str+ '<option value="87">Ayudante Gabinete Psicológico</option>';
    str = str+ '<option value="88">Ayudante Prácticas Agropecuarias</option>';
    str = str+ '<option value="89">Ayudante Práctico Agrimensor</option>';
    str = str+ '<option value="90">Ayudante Secretario</option>';
    str = str+ '<option value="91">Ayudante Técnico</option>';
    str = str+ '<option value="92">Ayudante Técnico de Laboratorio</option>';
    str = str+ '<option value="93">Ayudante Técnico de Trabajos Practicos</option>';
    str = str+ '<option value="94">Ayudante Técnico de Trabajos Practicos</option>';
    str = str+ '<option value="95">Ayudante Técnico Docente</option>';
    str = str+ '<option value="96">Bedel</option>';
    str = str+ '<option value="97">Bibliotecario</option>';
    str = str+ '<option value="98">Bibliotecario Auxiliar</option>';
    str = str+ '<option value="99">Bibliotecario Centro de Documentación</option>';
    str = str+ '<option value="100">Bibliotecario de Planeamiento</option>';
    str = str+ '<option value="101">Bibliotecario Jefe</option>';
    str = str+ '<option value="102">Bibliotecario Pedagógico</option>';
    str = str+ '<option value="103">Capacitador</option>';
    str = str+ '<option value="104">Capacitador de Centros Laborales</option>';
    str = str+ '<option value="105">Capacitador Laboral de Programa Federal</option>';
    str = str+ '<option value="106">Capacitador Plan Federal de Alfabetizacion</option>';
    str = str+ '<option value="107">Cargo de Capacitación</option>';
    str = str+ '<option value="108">Cargo de Extensión a la Comunidad</option>';
    str = str+ '<option value="109">Cargo de Investigacion</option>';
    str = str+ '<option value="110">Cargo en Proyectos/Programas Institucionales</option>';
    str = str+ '<option value="111">Cargo IUPA</option>';
    str = str+ '<option value="112">Casero</option>';
    str = str+ '<option value="113">Celador</option>';
    str = str+ '<option value="114">Celador de Internados</option>';
    str = str+ '<option value="115">Celador General Actividades Prácticas</option>';
    str = str+ '<option value="116">Codirector</option>';
    str = str+ '<option value="117">Codirector de Coro y Orquesta de Niños</option>';
    str = str+ '<option value="118">Consejero</option>';
    str = str+ '<option value="119">Consejero Docente</option>';
    str = str+ '<option value="120">Contramaestre</option>';
    str = str+ '<option value="121">Contramaestre de Taller</option>';
    str = str+ '<option value="122">Coordinador</option>';
    str = str+ '<option value="123">Coordinador</option>';
    str = str+ '<option value="124">Coordinador de Acciones No Formales</option>';
    str = str+ '<option value="125">Coordinador de Albergue</option>';
    str = str+ '<option value="126">Coordinador de Apoyo Rural</option>';
    str = str+ '<option value="127">Coordinador de Area</option>';
    str = str+ '<option value="128">Coordinador de Area</option>';
    str = str+ '<option value="129">Coordinador de Area de Profesores</option>';
    str = str+ '<option value="130">Coordinador de Areas y Núcleos</option>';
    str = str+ '<option value="131">Coordinador de Aula Va Al Mar</option>';
    str = str+ '<option value="132">Coordinador de CAI (Centro de Actividades Infantiles)</option>';
    str = str+ '<option value="133">Coordinador de CAJ (Centro de Actividades Juveniles)</option>';
    str = str+ '<option value="134">Coordinador de Campamento Educaciónal</option>';
    str = str+ '<option value="135">Coordinador de Capacitación</option>';
    str = str+ '<option value="136">Coordinador de Centro</option>';
    str = str+ '<option value="137">Coordinador de Centro Comunitario</option>';
    str = str+ '<option value="138">Coordinador de Centro Educativo</option>';
    str = str+ '<option value="139">Coordinador de Centro Laboral</option>';
    str = str+ '<option value="140">Coordinador de Centro Multidisciplinario de Ciencias</option>';
    str = str+ '<option value="141">Coordinador de Centros de Adultos</option>';
    str = str+ '<option value="142">Coordinador de Ciclo Básico</option>';
    str = str+ '<option value="143">Coordinador de Colegio Con Microemprendimientos</option>';
    str = str+ '<option value="144">Coordinador de Curso</option>';
    str = str+ '<option value="145">Coordinador de Departamento</option>';
    str = str+ '<option value="146">Coordinador de Enseñanza Agropecuaria</option>';
    str = str+ '<option value="147">Coordinador de Estudios</option>';
    str = str+ '<option value="148">Coordinador de Formación Laboral Y Profesional</option>';
    str = str+ '<option value="149">Coordinador de Fundamentación Básica</option>';
    str = str+ '<option value="150">Coordinador de Itinerario Formativo</option>';
    str = str+ '<option value="151">Coordinador de Nivel</option>';
    str = str+ '<option value="152">Coordinador de Programa Federal Alfabetización.</option>';
    str = str+ '<option value="153">Coordinador de Proyectos</option>';
    str = str+ '<option value="154">Coordinador de Residencia</option>';
    str = str+ '<option value="155">Coordinador de Sector de Nivel Superior</option>';
    str = str+ '<option value="156">Coordinador de Secundario Rural</option>';
    str = str+ '<option value="157">Coordinador de TAP(Trayecto Artistico Profesional)</option>';
    str = str+ '<option value="158">Coordinador de TTP(Trayecto Técnico Profesional)</option>';
    str = str+ '<option value="159">Coordinador de Zona</option>';
    str = str+ '<option value="160">Coordinador EVE</option>';
    str = str+ '<option value="161">Coordinador General</option>';
    str = str+ '<option value="162">Coordinador General Area</option>';
    str = str+ '<option value="163">Coordinador Inter-Areas</option>';
    str = str+ '<option value="164">Coordinador Operativo / Regional</option>';
    str = str+ '<option value="165">Coordinador Pedagógico</option>';
    str = str+ '<option value="166">Coordinador Pedagógico Interinstitucional</option>';
    str = str+ '<option value="167">Coordinador Puesto Capacitación</option>';
    str = str+ '<option value="168">Coordinador Regional</option>';
    str = str+ '<option value="169">Coordinador Regional Educación Física</option>';
    str = str+ '<option value="170">Coordinador Técnico Docente</option>';
    str = str+ '<option value="171">Coordinador General Actividades Practicas</option>';
    str = str+ '<option value="172">Copista</option>';
    str = str+ '<option value="173">Correo</option>';
    str = str+ '<option value="174">Delegado</option>';
    str = str+ '<option value="175">Delegado Zonal</option>';
    str = str+ '<option value="176">Director</option>';
    str = str+ '<option value="177">Director de Area</option>';
    str = str+ '<option value="178">Director de Educación Física</option>';
    str = str+ '<option value="179">Director del Servicio De Asistencia Terapéutica</option>';
    str = str+ '<option value="180">Director Académico</option>';
    str = str+ '<option value="181">Director Administrativo</option>';
    str = str+ '<option value="182">Director Biblioteca Pedagógica</option>';
    str = str+ '<option value="183">Director Bibliotecario Central</option>';
    str = str+ '<option value="184">Director Centro De Educación Física</option>';
    str = str+ '<option value="185">Director Centro Deportivo</option>';
    str = str+ '<option value="186">Director Centro Nuclearizado De Jardín De Infantes</option>';
    str = str+ '<option value="187">Director Conservatorio</option>';
    str = str+ '<option value="188">Director Cooperativismo Escolar</option>';
    str = str+ '<option value="189">Director Coro y/o Orquestas</option>';
    str = str+ '<option value="190">Director Cultura Rural y Domestica</option>';
    str = str+ '<option value="191">Director de Educación Permanente</option>';
    str = str+ '<option value="192">Director de Educación Técnica</option>';
    str = str+ '<option value="193">Director de Anexo Albergue</option>';
    str = str+ '<option value="194">Director de Area</option>';
    str = str+ '<option value="195">Director de Area De Educación Inicial</option>';
    str = str+ '<option value="196">Director de Area Educación del Adulto Y Adolescente</option>';
    str = str+ '<option value="197">Director de Area Pedagógica</option>';
    str = str+ '<option value="198">Director de Base De Campamento</option>';
    str = str+ '<option value="199">Director de Base De Colonia</option>';
    str = str+ '<option value="200">Director de Biblioteca</option>';
    str = str+ '<option value="201">Director de C.I.E.</option>';
    str = str+ '<option value="202">Director de Carrera</option>';
    str = str+ '<option value="203">Director de Centro Comunitario</option>';
    str = str+ '<option value="204">Director de Conjunto Instrumental</option>';
    str = str+ '<option value="205">Director de Coro</option>';
    str = str+ '<option value="206">Director de Departamento de Aplicación</option>';
    str = str+ '<option value="207">Director de Edificacion Escolar</option>';
    str = str+ '<option value="208">Director de Elenco Estable</option>';
    str = str+ '<option value="209">Director de Escuela Albergue</option>';
    str = str+ '<option value="210">Director de Escuela De Personal Unico</option>';
    str = str+ '<option value="211">Director de Escuela Fábrica</option>';
    str = str+ '<option value="212">Director de Escuela Hogar</option>';
    str = str+ '<option value="213">Director de Escuela Hogar</option>';
    str = str+ '<option value="214">Director de Escuela Rural</option>';
    str = str+ '<option value="215">Director de Estudios</option>';
    str = str+ '<option value="216">Director de Extension</option>';
    str = str+ '<option value="217">Director de Extension Cultural</option>';
    str = str+ '<option value="218">Director de Gabinete</option>';
    str = str+ '<option value="219">Director de Gabinete De Psicometíia</option>';
    str = str+ '<option value="220">Director de Instituto De Menores</option>';
    str = str+ '<option value="221">Director de Planta de Campamentos Educativos</option>';
    str = str+ '<option value="222">Director de Psicología Educativa</option>';
    str = str+ '<option value="223">Director de Residencia</option>';
    str = str+ '<option value="224">Director de Servicio Especial y Capacitación Para El Trabajo</option>';
    str = str+ '<option value="225">Director de Servicios Técnicos Educativos</option>';
    str = str+ '<option value="226">Director de Taller</option>';
    str = str+ '<option value="227">Director de Turismo Escolar</option>';
    str = str+ '<option value="228">Director Departamental De Biblioteca</option>';
    str = str+ '<option value="229">Director Departamental De Bibliotecas</option>';
    str = str+ '<option value="230">Director General</option>';
    str = str+ '<option value="231">Director General de Desarrollo Profesional</option>';
    str = str+ '<option value="232">Director General de Evaluación de la Calidad Educativa</option>';
    str = str+ '<option value="233">Director Institucional</option>';
    str = str+ '<option value="234">Director Libre</option>';
    str = str+ '<option value="235">Director Maestro (Personal Unico)</option>';
    str = str+ '<option value="236">Director Maestro Con Clase Anexa</option>';
    str = str+ '<option value="237">Director Personal Unico</option>';
    str = str+ '<option value="238">Director Rector</option>';
    str = str+ '<option value="239">Director Regional</option>';
    str = str+ '<option value="240">Docente</option>';
    str = str+ '<option value="241">Docente Auxiliar</option>';
    str = str+ '<option value="242">Educador</option>';
    str = str+ '<option value="243">Educador Comunitaio</option>';
    str = str+ '<option value="244">Educador del Programa Federal De Alfabetización</option>';
    str = str+ '<option value="245">Encargado</option>';
    str = str+ '<option value="246">Encargado Contable</option>';
    str = str+ '<option value="247">Encargado de Sección</option>';
    str = str+ '<option value="248">Encargado de Biblioteca</option>';
    str = str+ '<option value="249">Encargado de Ciclo</option>';
    str = str+ '<option value="250">Encargado de Departamento Campus Virtual</option>';
    str = str+ '<option value="251">Encargado de Gabinete</option>';
    str = str+ '<option value="252">Encargado de Medios de Apoyo Técnico-Pedagógico</option>';
    str = str+ '<option value="253">Encargado de Personal</option>';
    str = str+ '<option value="254">Encargado de Sector Alumnos</option>';
    str = str+ '<option value="255">Encargado de Sector Gabinete Psicológico</option>';
    str = str+ '<option value="256">Encargado de Taller</option>';
    str = str+ '<option value="257">Encargado General De Control</option>';
    str = str+ '<option value="258">Enfermera</option>';
    str = str+ '<option value="259">Enfermera Instructora</option>';
    str = str+ '<option value="260">Equipo Técnico</option>';
    str = str+ '<option value="261">Fonoaudiólogo</option>';
    str = str+ '<option value="262">Gabinetista</option>';
    str = str+ '<option value="263">Gabinetista Psicotécnico</option>';
    str = str+ '<option value="264">Guía de Turismo Escolar</option>';
    str = str+ '<option value="265">Guía Docente</option>';
    str = str+ '<option value="266">Inspector</option>';
    str = str+ '<option value="267">Inspector General</option>';
    str = str+ '<option value="268">Inspector Jefe</option>';
    str = str+ '<option value="269">Inspector Médico</option>';
    str = str+ '<option value="270">Inspector Presumariante</option>';
    str = str+ '<option value="271">Inspector Sumariante</option>';
    str = str+ '<option value="272">Inspector Técnico</option>';
    str = str+ '<option value="273">Inspector Técnico de Zona</option>';
    str = str+ '<option value="274">Inspector Técnico Materias Especiales</option>';
    str = str+ '<option value="275">Inspector Técnico Regional</option>';
    str = str+ '<option value="276">Inspector Técnico Seccional</option>';
    str = str+ '<option value="277">Instructor</option>';
    str = str+ '<option value="278">Instructor de Coordinación</option>';
    str = str+ '<option value="279">Instructor de Enfermería</option>';
    str = str+ '<option value="280">Instructor Jefe de Enfermería</option>';
    str = str+ '<option value="281">Instructor Técnico</option>';
    str = str+ '<option value="282">Integrante de Centro de Apoyo Al Aprendizaje</option>';
    str = str+ '<option value="283">Intérprete</option>';
    str = str+ '<option value="284">Intérprete de Lengua de Señas Argentinas</option>';
    str = str+ '<option value="285">Jefe</option>';
    str = str+ '<option value="286">Jefe Agropecuario</option>';
    str = str+ '<option value="287">Jefe Bibiliotecario</option>';
    str = str+ '<option value="288">Jefe de Apoyo Pedagógico</option>';
    str = str+ '<option value="289">Jefe de Area</option>';
    str = str+ '<option value="290">Jefe de Auxiliares Docentes</option>';
    str = str+ '<option value="291">Jefe de Bedeles</option>';
    str = str+ '<option value="292">Jefe de Centro Estadistica Educativa</option>';
    str = str+ '<option value="293">Jefe de Centro Provincial de Información Educativa</option>';
    str = str+ '<option value="294">Jefe de Coordinacóon de Servicio Medico Asistencial</option>';
    str = str+ '<option value="295">Jefe de Curso</option>';
    str = str+ '<option value="296">Jefe de Departamento</option>';
    str = str+ '<option value="297">Jefe de Departamento</option>';
    str = str+ '<option value="298">Jefe de Departamento Alumnos</option>';
    str = str+ '<option value="299">Jefe de Division</option>';
    str = str+ '<option value="300">Jefe de Enseñanza Práctica</option>';
    str = str+ '<option value="301">Jefe de Enseñanza Práctica General</option>';
    str = str+ '<option value="302">Jefe de Equipo Cooperativo</option>';
    str = str+ '<option value="303">Jefe de Extensión</option>';
    str = str+ '<option value="304">Jefe de Gabinete Psicopedagógico</option>';
    str = str+ '<option value="305">Jefe de Gabinete Psicotécnico</option>';
    str = str+ '<option value="306">Jefe de Grado</option>';
    str = str+ '<option value="307">Jefe de Industria Para Tareas Técnicas</option>';
    str = str+ '<option value="308">Jefe de Internado</option>';
    str = str+ '<option value="309">Jefe de Investigación</option>';
    str = str+ '<option value="310">Jefe de Laboratorio</option>';
    str = str+ '<option value="311">Jefe de Laboratorio Audiovisual</option>';
    str = str+ '<option value="312">Jefe de Laboratorio Computacion</option>';
    str = str+ '<option value="313">Jefe de Laboratorio y Gabinete</option>';
    str = str+ '<option value="314">Jefe de Medios de Apoyo Técnico-Pedagógico</option>';
    str = str+ '<option value="315">Jefe de Normatizacion</option>';
    str = str+ '<option value="316">Jefe de Oficina de Titulacion Y Equivalencias</option>';
    str = str+ '<option value="317">Jefe de Práctica Y Produccion Artistica</option>';
    str = str+ '<option value="318">Jefe de Preceptores</option>';
    str = str+ '<option value="319">Jefe de Pretaller</option>';
    str = str+ '<option value="320">Jefe de Producción</option>';
    str = str+ '<option value="321">Jefe de Promoción Y Fomento Cooperativo</option>';
    str = str+ '<option value="322">Jefe de Proyectos</option>';
    str = str+ '<option value="323">Jefe de Registro Y Control Cooperativo</option>';
    str = str+ '<option value="324">Jefe de Sección</option>';
    str = str+ '<option value="325">Jefe de Servicio</option>';
    str = str+ '<option value="326">Jefe de Servicios Sociales</option>';
    str = str+ '<option value="327">Jefe de Supervisores</option>';
    str = str+ '<option value="328">Jefe de Taller</option>';
    str = str+ '<option value="329">Jefe de Taller de Adaptación Y Capacitación Laboral</option>';
    str = str+ '<option value="330">Jefe de Taller E Instrucción</option>';
    str = str+ '<option value="331">Jefe de Trabajos Practicos</option>';
    str = str+ '<option value="332">Jefe General de Contabilidad Productiva</option>';
    str = str+ '<option value="333">Jefe General de Educación Práctica</option>';
    str = str+ '<option value="334">Jefe General de Enseñanza Práctica</option>';
    str = str+ '<option value="335">Jefe General de Proyectos Productivos</option>';
    str = str+ '<option value="336">Jefe General de Taller</option>';
    str = str+ '<option value="337">Jefe Instructor Y Contralor Productivo</option>';
    str = str+ '<option value="338">Jefe Práctico</option>';
    str = str+ '<option value="339">Jefe Sectorial</option>';
    str = str+ '<option value="340">Kinesiologo</option>';
    str = str+ '<option value="341">Maestro</option>';
    str = str+ '<option value="342">Maestro Acompañante</option>';
    str = str+ '<option value="343">Maestro Alfabetizador</option>';
    str = str+ '<option value="344">Maestro Asistente Educaciónal</option>';
    str = str+ '<option value="345">Maestro Asistente Social</option>';
    str = str+ '<option value="346">Maestro Auxiliar</option>';
    str = str+ '<option value="347">Maestro Auxiliar</option>';
    str = str+ '<option value="348">Maestro Auxiliar</option>';
    str = str+ '<option value="349">Maestro Auxiliar Bilingüe</option>';
    str = str+ '<option value="350">Maestro Auxiliar de Secretaría</option>';
    str = str+ '<option value="351">Maestro Ayudante</option>';
    str = str+ '<option value="352">Maestro Ayudante Enseñanza Practica</option>';
    str = str+ '<option value="353">Maestro Ayudante de Enseñanza Práctica</option>';
    str = str+ '<option value="354">Maestro Ayudante de Trabajos Prácticos</option>';
    str = str+ '<option value="355">Maestro Bibliotecario</option>';
    str = str+ '<option value="356">Maestro Bibliotecario</option>';
    str = str+ '<option value="357">Maestro Bilingüe Intercultural</option>';
    str = str+ '<option value="358">Maestro Carcelario</option>';
    str = str+ '<option value="359">Maestro Celador</option>';
    str = str+ '<option value="360">Maestro Celador de Taller</option>';
    str = str+ '<option value="361">Maestro Cimunatorio de CAI (Centro de Actividades Infantiles)</option>';
    str = str+ '<option value="362">Maestro Complementario</option>';
    str = str+ '<option value="363">Maestro Comunitario</option>';
    str = str+ '<option value="364">Maestro de Actividades Deportivas Y Recreativas</option>';
    str = str+ '<option value="365">Maestro de Alteracaciones Del Lenguaje</option>';
    str = str+ '<option value="366">Maestro de Alto Riesgo Social</option>';
    str = str+ '<option value="367">Maestro de Año</option>';
    str = str+ '<option value="368">Maestro de Apoyo</option>';
    str = str+ '<option value="369">Maestro de Apoyo Pedagógico en Talleres</option>';
    str = str+ '<option value="370">Maestro de Area</option>';
    str = str+ '<option value="371">Maestro de Armado</option>';
    str = str+ '<option value="372">Maestro de Articulación</option>';
    str = str+ '<option value="373">Maestro de Braille Y Estenografia</option>';
    str = str+ '<option value="374">Maestro de Capacitación Laboral</option>';
    str = str+ '<option value="375">Maestro de Ciclo</option>';
    str = str+ '<option value="376">Maestro de Ciegos Y Disminuidos Visuales</option>';
    str = str+ '<option value="377">Maestro de Cultura Doméstica Agrícola</option>';
    str = str+ '<option value="378">Maestro de Cultura Rural</option>';
    str = str+ '<option value="379">Maestro de Cultura Rural Domestica</option>';
    str = str+ '<option value="380">Maestro de Curso Vocacional de Arte</option>';
    str = str+ '<option value="381">Maestro de Dactilografia Braille</option>';
    str = str+ '<option value="382">Maestro de Discapacidades Motoras</option>';
    str = str+ '<option value="383">Maestro de Educación Especial</option>';
    str = str+ '<option value="384">Maestro de Educación Temprana</option>';
    str = str+ '<option value="385">Maestro de Enseñanza Practica</option>';
    str = str+ '<option value="386">Maestro de Enseñanza Técnica</option>';
    str = str+ '<option value="387">Maestro de Espacio de Aceleración</option>';
    str = str+ '<option value="388">Maestro de Espacio de Fortalecimiento de Aprendizajes</option>';
    str = str+ '<option value="389">Maestro de Espacios Curriculares</option>';
    str = str+ '<option value="390">Maestro de Especialidad</option>';
    str = str+ '<option value="391">Maestro de Estimulación Y Eficiencia Visual</option>';
    str = str+ '<option value="392">Maestro de Grado</option>';
    str = str+ '<option value="393">Maestro de Grado Auxiliar</option>';
    str = str+ '<option value="394">Maestro de Grado de Educación Especial</option>';
    str = str+ '<option value="395">Maestro de Grado de Escuela de Adultos</option>';
    str = str+ '<option value="396">Maestro de Grado Psicopedagogo</option>';
    str = str+ '<option value="397">Maestro de Grado Recuperacion Lenta</option>';
    str = str+ '<option value="398">Maestro de Grado Taller</option>';
    str = str+ '<option value="399">Maestro de Grupo</option>';
    str = str+ '<option value="400">Maestro de Grupo Escolar</option>';
    str = str+ '<option value="401">Maestro de Internados</option>';
    str = str+ '<option value="402">Maestro de Jardín de Infantes</option>';
    str = str+ '<option value="403">Maestro de Jardín Maternal</option>';
    str = str+ '<option value="404">Maestro de Lengua de Señas</option>';
    str = str+ '<option value="405">Maestro de Lengua y/o Cultura Indígena</option>';
    str = str+ '<option value="406">Maestro de Mantenimiento</option>';
    str = str+ '<option value="407">Maestro de Materias Complementarias</option>';
    str = str+ '<option value="408">Maestro de Materias Especiales</option>';
    str = str+ '<option value="409">Maestro de Medios Audiovisuales</option>';
    str = str+ '<option value="410">Maestro de Musicoterapia</option>';
    str = str+ '<option value="411">Maestro de Orientación Y Tutoría</option>';
    str = str+ '<option value="412">Maestro de Orientación Manual</option>';
    str = str+ '<option value="413">Maestro de Orientación Y Movilidad</option>';
    str = str+ '<option value="414">Maestro de Programa</option>';
    str = str+ '<option value="415">Maestro de Proyectos Especificos</option>';
    str = str+ '<option value="416">Maestro de Psicomotricidad</option>';
    str = str+ '<option value="417">Maestro de Sala</option>';
    str = str+ '<option value="418">Maestro de Servicios</option>';
    str = str+ '<option value="419">Maestro de Severos Trastornos de La Personalidad</option>';
    str = str+ '<option value="420">Maestro de Sordos E Hipoacúsicos</option>';
    str = str+ '<option value="421">Maestro de Taller</option>';
    str = str+ '<option value="422">Maestro de Taller Extracurricular</option>';
    str = str+ '<option value="423">Maestro de Taller pedagògico creativo</option>';
    str = str+ '<option value="424">Maestro de Taller pedagògico productivo</option>';
    str = str+ '<option value="425">Maestro de Terapia Ocupacional</option>';
    str = str+ '<option value="426">Maestro Domiciliario</option>';
    str = str+ '<option value="427">Maestro Domiciliario Hospitalario</option>';
    str = str+ '<option value="428">Maestro Especial de Area</option>';
    str = str+ '<option value="429">Maestro Especial de Laborterapia</option>';
    str = str+ '<option value="430">Maestro Especial de Lengua Mapuche</option>';
    str = str+ '<option value="431">Maestro Especial de Modalidad Aborigen</option>';
    str = str+ '<option value="432">Maestro Especial de Psicomotricidad</option>';
    str = str+ '<option value="433">Maestro Especial de Taller</option>';
    str = str+ '<option value="434">Maestro Especial Rural</option>';
    str = str+ '<option value="435">Maestro Especial Técnico Agropecuario</option>';
    str = str+ '<option value="436">Maestro Estimulador</option>';
    str = str+ '<option value="437">Maestro Fonoaudiologo</option>';
    str = str+ '<option value="438">Maestro Formación Profesional</option>';
    str = str+ '<option value="439">Maestro Gabinete Psicologico Fonoaudiólogo</option>';
    str = str+ '<option value="440">Maestro Gabinetista</option>';
    str = str+ '<option value="441">Maestro Gabinetista Psicotécnico</option>';
    str = str+ '<option value="442">Maestro General</option>';
    str = str+ '<option value="443">Maestro General de Aplicación</option>';
    str = str+ '<option value="444">Maestro Hospitalario</option>';
    str = str+ '<option value="445">Maestro Integrador</option>';
    str = str+ '<option value="446">Maestro Intercultural Bilingüe</option>';
    str = str+ '<option value="447">Maestro Interprete Pedagógico de Lenguaje de Señas</option>';
    str = str+ '<option value="448">Maestro Itinerante Rural</option>';
    str = str+ '<option value="449">Maestro Nivelador</option>';
    str = str+ '<option value="450">Maestro Orientador</option>';
    str = str+ '<option value="451">Maestro para Atención de Alumnos con Sobreedad</option>';
    str = str+ '<option value="452">Maestro Para La Atencion de Alumnos Con Promocion Asistida/Acompañada</option>';
    str = str+ '<option value="453">Maestro Postescuela</option>';
    str = str+ '<option value="454">Maestro Práctica Rural Doméstica</option>';
    str = str+ '<option value="455">Maestro Preceptor</option>';
    str = str+ '<option value="456">Maestro Pretaller</option>';
    str = str+ '<option value="457">Maestro Psicólogo</option>';
    str = str+ '<option value="458">Maestro Psicopedagogo</option>';
    str = str+ '<option value="459">Maestro Psicotécnico</option>';
    str = str+ '<option value="460">Maestro Recuperador</option>';
    str = str+ '<option value="461">Maestro Reeducador</option>';
    str = str+ '<option value="462">Maestro Reeducador Acustico</option>';
    str = str+ '<option value="463">Maestro Reeducador Vocal</option>';
    str = str+ '<option value="464">Maestro Rural</option>';
    str = str+ '<option value="465">Maestro Seccional Pedagógica</option>';
    str = str+ '<option value="466">Maestro Secretario</option>';
    str = str+ '<option value="467">Maestro Secretario Cultural</option>';
    str = str+ '<option value="468">Maestro Técnico Audiovisual</option>';
    str = str+ '<option value="469">Maestro Tecnologico</option>';
    str = str+ '<option value="470">Maestro Tutor</option>';
    str = str+ '<option value="471">Médico</option>';
    str = str+ '<option value="472">Médico Escolar</option>';
    str = str+ '<option value="473">Médico Gabinetista</option>';
    str = str+ '<option value="474">Miembro de Consejo de Educación</option>';
    str = str+ '<option value="475">Miembro de Equipo de Orientación Y Asistencia Educativa</option>';
    str = str+ '<option value="476">Miembro de Junta</option>';
    str = str+ '<option value="477">Miembro Junta de Clasificacion</option>';
    str = str+ '<option value="478">Miembros Tribunal de Disciplina</option>';
    str = str+ '<option value="479">Modelo Vivo</option>';
    str = str+ '<option value="480">Musicoterapeuta</option>';
    str = str+ '<option value="481">Neurológo Infantil</option>';
    str = str+ '<option value="482">No Docente</option>';
    str = str+ '<option value="483">Odontologo</option>';
    str = str+ '<option value="484">Orientador Educaciónal</option>';
    str = str+ '<option value="485">Otros Cargos Directivos O de Jefatura</option>';
    str = str+ '<option value="486">Otros Cargos Docentes</option>';
    str = str+ '<option value="487">Otros Cargos No Docentes</option>';
    str = str+ '<option value="488">Pediatra</option>';
    str = str+ '<option value="489">Personal Administrativo</option>';
    str = str+ '<option value="490">Personal de Servicio</option>';
    str = str+ '<option value="491">Personal de Servicios y Maestranza</option>';
    str = str+ '<option value="492">Personal Obrero</option>';
    str = str+ '<option value="493">Personal Profesional Y Técnico</option>';
    str = str+ '<option value="494">Personal Técnico</option>';
    str = str+ '<option value="495">Personal Técnico Progama Especial</option>';
    str = str+ '<option value="496">Personal Unico</option>';
    str = str+ '<option value="497">Preceptor</option>';
    str = str+ '<option value="498">Preceptor Agrícola</option>';
    str = str+ '<option value="499">Preceptor Agrícola</option>';
    str = str+ '<option value="500">Preceptor Auxiliar</option>';
    str = str+ '<option value="501">Preceptor Auxiliar de Lengua y/o Cultura Indígena</option>';
    str = str+ '<option value="502">Preceptor Ayudante</option>';
    str = str+ '<option value="503">Preceptor de Escuela Albergue</option>';
    str = str+ '<option value="504">Preceptor de Escuela Hogar</option>';
    str = str+ '<option value="505">Preceptor de Viaje</option>';
    str = str+ '<option value="506">Preceptor Diferencial</option>';
    str = str+ '<option value="507">Preceptor Docente</option>';
    str = str+ '<option value="508">Preceptor Nocturno</option>';
    str = str+ '<option value="509">Preceptor Residente</option>';
    str = str+ '<option value="510">Preceptor Superior</option>';
    str = str+ '<option value="511">Presidente de Consejo General de Educación</option>';
    str = str+ '<option value="512">Presidente de Junta de Clasificacion</option>';
    str = str+ '<option value="513">Profesional de Gabinete</option>';
    str = str+ '<option value="514">Profesor</option>';
    str = str+ '<option value="515">Profesor Adjunto</option>';
    str = str+ '<option value="516">Profesor Asistente de Trabajos Prácticos</option>';
    str = str+ '<option value="517">Profesor Asociado</option>';
    str = str+ '<option value="518">Profesor Auxiliar de Enseñanza Práctica</option>';
    str = str+ '<option value="519">Profesor Ayudante de Trabajos Prácticos</option>';
    str = str+ '<option value="520">Profesor de Educación Especial</option>';
    str = str+ '<option value="521">Profesor de Educación Temprana</option>';
    str = str+ '<option value="522">Profesor de Enseñanza Practica</option>';
    str = str+ '<option value="523">Profesor de Espacios Curriculares/Materias/Asignaturas</option>';
    str = str+ '<option value="524">Profesor de Lengua y/o Cultura Indígena</option>';
    str = str+ '<option value="525">Profesor de Planta de Campamentos Educativos</option>';
    str = str+ '<option value="526">Profesor Guía</option>';
    str = str+ '<option value="527">Profesor Itinerante</option>';
    str = str+ '<option value="528">Profesor Itinerante Rural</option>';
    str = str+ '<option value="529">Profesor Jefe de Trabajos Prácticos</option>';
    str = str+ '<option value="530">Profesor Para La Atención de Alumnos Con Promocion Asistida/Acompañada</option>';
    str = str+ '<option value="531">Programador de Centro Deportivo</option>';
    str = str+ '<option value="532">Prosecretario</option>';
    str = str+ '<option value="533">Prosecretario</option>';
    str = str+ '<option value="534">Prosecretario Docente</option>';
    str = str+ '<option value="535">Psicodedagogo</option>';
    str = str+ '<option value="536">Psicólogo</option>';
    str = str+ '<option value="537">Psicomotricista</option>';
    str = str+ '<option value="538">Rector</option>';
    str = str+ '<option value="539">Reeducador Especial</option>';
    str = str+ '<option value="540">Reeducador Vocal</option>';
    str = str+ '<option value="541">Referente</option>';
    str = str+ '<option value="542">Regente</option>';
    str = str+ '<option value="543">Regente Técnico</option>';
    str = str+ '<option value="544">Representante Legal</option>';
    str = str+ '<option value="545">Representante Nacional</option>';
    str = str+ '<option value="546">Representante Zonal</option>';
    str = str+ '<option value="547">Responsable</option>';
    str = str+ '<option value="548">Responsable de Radio Escolar</option>';
    str = str+ '<option value="549">Responsable de Sección Títulos</option>';
    str = str+ '<option value="550">Responsable de Sede</option>';
    str = str+ '<option value="551">Responsable Técnico</option>';
    str = str+ '<option value="552">Responsable Zonal</option>';
    str = str+ '<option value="553">Responsable Zonal/Sectorial</option>';
    str = str+ '<option value="554">Secretario</option>';
    str = str+ '<option value="555">Secretario de Extensión Y Capacitación</option>';
    str = str+ '<option value="556">Secretario de Formación Profesional</option>';
    str = str+ '<option value="557">Secretario - No Docente</option>';
    str = str+ '<option value="558">Secretario Técnico General.</option>';
    str = str+ '<option value="559">Secretario Académico</option>';
    str = str+ '<option value="560">Secretario Administrativo</option>';
    str = str+ '<option value="561">Secretario Administrativo Académico</option>';
    str = str+ '<option value="562">Secretario Contable</option>';
    str = str+ '<option value="563">Secretario de Asuntos Docentes</option>';
    str = str+ '<option value="564">Secretario de Departamento de Aplicación</option>';
    str = str+ '<option value="565">Secretario de Departamento de Aplicación</option>';
    str = str+ '<option value="566">Secretario de Gabinete</option>';
    str = str+ '<option value="567">Secretario de Inspección</option>';
    str = str+ '<option value="568">Secretario de Jefatura</option>';
    str = str+ '<option value="569">Secretario de Junta de Clasificación</option>';
    str = str+ '<option value="570">Secretario de Supervisión</option>';
    str = str+ '<option value="571">Secretario Delegado Zonal</option>';
    str = str+ '<option value="572">Secretario Docente</option>';
    str = str+ '<option value="573">Secretario General</option>';
    str = str+ '<option value="574">Secretario Habilitado</option>';
    str = str+ '<option value="575">Secretario Pedagógico</option>';
    str = str+ '<option value="576">Secretario Personal de Apoyo</option>';
    str = str+ '<option value="577">Secretario Técnico</option>';
    str = str+ '<option value="578">Secretario Técnico Administrativo</option>';
    str = str+ '<option value="579">Secretario Técnico de Junta Calificacion</option>';
    str = str+ '<option value="580">Secretario Técnico Docente</option>';
    str = str+ '<option value="581">Secretario Técnico General</option>';
    str = str+ '<option value="582">Subauxiliar Docente</option>';
    str = str+ '<option value="583">Subcoordinador Pedagógico</option>';
    str = str+ '<option value="584">Subdirector</option>';
    str = str+ '<option value="585">Subinspector General.</option>';
    str = str+ '<option value="586">Subjefe</option>';
    str = str+ '<option value="587">Subjefe de Area</option>';
    str = str+ '<option value="588">Subjefe de Prácticas</option>';
    str = str+ '<option value="589">Subjefe de Preceptores</option>';
    str = str+ '<option value="590">Subregente</option>';
    str = str+ '<option value="591">Subregente de Departamento de Aplicación</option>';
    str = str+ '<option value="592">Supervisor</option>';
    str = str+ '<option value="593">Supervisor Adjunto</option>';
    str = str+ '<option value="594">Supervisor Adjunto de Idioma Extranjero</option>';
    str = str+ '<option value="595">Supervisor Coordinador de Educación Artistica</option>';
    str = str+ '<option value="596">Supervisor Coordinador de EducaciónTécnica</option>';
    str = str+ '<option value="597">Supervisor Coordinador de Idioma Extranjero</option>';
    str = str+ '<option value="598">Supervisor Coordinador de Materias Especiales</option>';
    str = str+ '<option value="599">Supervisor Coordinador de Educación Física</option>';
    str = str+ '<option value="600">Supervisor de Artistica</option>';
    str = str+ '<option value="601">Supervisor de Auxiliar de Portería</option>';
    str = str+ '<option value="602">Supervisor de Biblioteca</option>';
    str = str+ '<option value="603">Supervisor de Educación Artistica</option>';
    str = str+ '<option value="604">Supervisor de Educación de Adultos</option>';
    str = str+ '<option value="605">Supervisor de Educación Especial</option>';
    str = str+ '<option value="606">Supervisor de Educación Física</option>';
    str = str+ '<option value="607">Supervisor de Educación Manual</option>';
    str = str+ '<option value="608">Supervisor de Educación Privada</option>';
    str = str+ '<option value="609">Supervisor de Enseñanza Técnica</option>';
    str = str+ '<option value="610">Supervisor de Nivel Primario</option>';
    str = str+ '<option value="611">Supervisor de Nivel Secundario</option>';
    str = str+ '<option value="612">Supervisor de Nivel Superior</option>';
    str = str+ '<option value="613">Supervisor de Zona</option>';
    str = str+ '<option value="614">Supervisor Departamental de Biblioteca</option>';
    str = str+ '<option value="615">Supervisor Docente</option>';
    str = str+ '<option value="616">Supervisor Escolar</option>';
    str = str+ '<option value="617">Supervisor Escolar de Nivel</option>';
    str = str+ '<option value="618">Supervisor General</option>';
    str = str+ '<option value="619">Supervisor General de Enseñanza</option>';
    str = str+ '<option value="620">Supervisor General de Nivel</option>';
    str = str+ '<option value="621">Supervisor General Docente</option>';
    str = str+ '<option value="622">Supervisor Jefe</option>';
    str = str+ '<option value="623">Supervisor Pedagógico Docente</option>';
    str = str+ '<option value="624">Supervisor Provincial</option>';
    str = str+ '<option value="625">Supervisor Provincial de Bibliotecas Escolares</option>';
    str = str+ '<option value="626">Supervisor Regional</option>';
    str = str+ '<option value="627">Supervisor Seccional</option>';
    str = str+ '<option value="628">Supervisor Sectorial Técnico Docente</option>';
    str = str+ '<option value="629">Supervisor Técnico</option>';
    str = str+ '<option value="630">Supervisor Técnico Administrativo</option>';
    str = str+ '<option value="631">Supervisor Técnico de Adultos</option>';
    str = str+ '<option value="632">Supervisor Técnico Docente</option>';
    str = str+ '<option value="633">Supervisor Técnico Escolar</option>';
    str = str+ '<option value="634">Supervisor Zonal</option>';
    str = str+ '<option value="635">Tallerista de CAI (Centro de Actividades Infantiles)</option>';
    str = str+ '<option value="636">Tallerista de CAJ (Centro de Actividades Juveniles)</option>';
    str = str+ '<option value="637">Técnico</option>';
    str = str+ '<option value="638">Técnico de Gabinete</option>';
    str = str+ '<option value="639">Técnico de Plan de Alfabetizacion</option>';
    str = str+ '<option value="640">Técnico de Recuperacion Pedagógica</option>';
    str = str+ '<option value="641">Técnico de Servicio de Apoyo Técnico</option>';
    str = str+ '<option value="642">Técnico Docente</option>';
    str = str+ '<option value="643">Técnico Docente Auxiliar</option>';
    str = str+ '<option value="644">Técnico en Documentacion Educativa</option>';
    str = str+ '<option value="645">Técnico en Educación</option>';
    str = str+ '<option value="646">Terapista Educaciónal</option>';
    str = str+ '<option value="647">Tesorero</option>';
    str = str+ '<option value="648">Trabajador Social</option>';
    str = str+ '<option value="649">Tutor de Capacitación A Distancia</option>';
    str = str+ '<option value="650">Tutor de Curso</option>';
    str = str+ '<option value="651">Tutor de Plan de Mejora de la Educación Secundaria</option>';
    str = str+ '<option value="652">Tutor de Plan Fines</option>';
    str = str+ '<option value="653">Tutor de Secundario Rural</option>';
    str = str+ '<option value="654">Tutor Docente</option>';
    str = str+ '<option value="655">Vicedirector</option>';
    str = str+ '<option value="656">Vicedirector de Departamento de Aplicacion</option>';
    str = str+ '<option value="657">Vicedirector de Perfeccionamiento Docente</option>';
    str = str+ '<option value="658">Vicedirector de Planta de Campamentos Educativos</option>';
    str = str+ '<option value="659">Vicedirector de Psicología Educativa</option>';
    str = str+ '<option value="660">Vicedirector de Turismo Escolar</option>';
    str = str+ '<option value="661">Vicedirector Normalizador</option>';
    str = str+ '<option value="662">Vicerector</option>';
    str = str+ '<option value="663">Vicesupervisor General</option>';
    str = str+ '<option value="664">Visitador</option>';
    str = str+ '<option value="665">Visitador Social</option>';
    str = str+ '<option value="666">Vocal</option>';
    str = str+ '<option value="667">Web Master</option>';
    return str;
}
