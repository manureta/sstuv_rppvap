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
    if( strSelectName.indexOf("b5_d24_o_1") == 0  ){ 
        obj.append(getSelect_Asiste());
    }else if( strSelectName.indexOf("b5_d25_o_1") == 0  ){ 
        obj.append(getSelect_Asiste());
    }else if( strSelectName.indexOf("b5_d253_o_1") == 0  ){ 
        obj.append(getSelect_OrientacionNivelSecundario());
    }
    return true;
}

function getSelect_Asiste(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Nunca asisti&oacute;</option>';
    str = str+ '<option value="2">Asisti&oacute;</option>';
    str = str+ '<option value="3">Asiste actualmente</option>';
    return str;
}

function getSelect_OrientacionNivelSecundario(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Bachiller</option>';
    str = str+ '<option value="2">Comercial</option>';
    str = str+ '<option value="3">Tècnica</option>';
    str = str+ '<option value="4">Artìstica</option>';
    str = str+ '<option value="5">Agropecuaria</option>';
    str = str+ '<option value="6">Docente/Maestro Normal</option>';
    str = str+ '<option value="7">Producciòn de Bienes y Servicios</option>';
    str = str+ '<option value="8">Economía y Gestiòn de las Organizaciones</option>';
    str = str+ '<option value="9">Comunicaciòn, Artes y Diseño</option>';
    str = str+ '<option value="10">Ciencias Naturales</option>';
    return str;
}
