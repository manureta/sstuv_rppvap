/*
 * Variables Globales
 * 
 */

/*
 * 
 * Funciones de Carga de Datos
 */

function loadPageGlobals(){
    var index_hidden = strGlobalPageKey; //Guardadas en BD
    //Formulario Global a pagina
    $('#page_globals').append("<input type='hidden' id='"+index_hidden+"' name='"+index_hidden+"' value='"+GetLoadedPostValue(index_hidden)+"' />"); //Ojo... comillas simple obligatorias!
    objGlobal = decodeFormFrom($('#'+index_hidden));
}




function bloqueCtrl (){
    InicializaForm();
    InicializaConsistencia();
    ProcessInicialConsistencia();
}

function InicializaForm(){
    //0.Guardo el form y cargo globales generales de la 
    f0();

}


function f0(){
    loadPageGlobals();
    processAttrGlobals();
}


function saveAll(){
    encodeGlobalTo( $("#global-panel-master_row"), $('#'+strGlobalPageKey) );
}

function AceptarFormulario(){
    saveAll();
}

//Selects
function loadSelectValues(obj,str_row_panel){
    var strSelectName =  obj.attr('name');
    if( strSelectName.indexOf("b9_d372_o_1") == 0  ){ 
        obj.append(getSelect_MotivoSuspensionDocencia());
    }else if( strSelectName.indexOf("b5_d25_o_1") == 0  ){ 
        obj.append(getSelect_Asiste());
    }else if( strSelectName.indexOf("b9_d373_o_1") == 0  ){ 
        obj.append(getSelect_MotivoVueltaDocencia());
    }
    return true;
}

function getSelect_MotivoSuspensionDocencia(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Cuestiones familiares</option>';
    str = str+ '<option value="2">Cuestiones económicas</option>';
    str = str+ '<option value="3">Otros</option>';
    return str;
}

function getSelect_MotivoVueltaDocencia(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Cambió la situación por la que suspendió</option>';
    str = str+ '<option value="2">Necesidad económica</option>';
    str = str+ '<option value="3">Otros</option>';
    return str;
}
