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
    if( strSelectName.indexOf("b4_d231_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(7,true));
    }
    return true;
}
