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
    
    if( strSelectName.indexOf("b3_d151_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(9,true));
    }else if( strSelectName.indexOf("b3_d152_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(9,true));
    }else if( strSelectName.indexOf("b3_d153_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(9,true));
    }else if( strSelectName.indexOf("b3_d16_o_1") == 0  ) { 
        obj.append(getSelect_FormaVivienda());
    }else if( strSelectName.indexOf("b3_d18_o_1") == 0  ){ 
        obj.append(getSelect_TipoVivienda());
    }else if( strSelectName.indexOf("b3_d19_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(9,true));
    }
    return true;
}

function getSelect_FormaVivienda(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Propia</option>';
    str = str+ '<option value="2">Alquilada</option>';
    str = str+ '<option value="3">Prestada</option>';
    return str;
}

function getSelect_TipoVivienda(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Casa</option>';
    str = str+ '<option value="2">PH</option>';
    str = str+ '<option value="3">Departamento</option>';
    str = str+ '<option value="4">Local</option>';
    str = str+ '<option value="5">Casilla</option>';
    str = str+ '<option value="6">Pensi&oacute;n/Hotel</option>';
    str = str+ '<option value="7">Otros</option>';
    return str;
}