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

function processAttrGlobals(){
    var str_row_panel = "page_globals_input_vars";
    var blnIsDinamicForm = false;
    $("#"+str_row_panel+" [type=text]").each(function(){
        processInputText($(this),!blnIsDinamicForm);
    });
    $("#"+str_row_panel+" select").each(function(){
        processInputSelect($(this),str_row_panel,!blnIsDinamicForm);
        
    });
    $("#"+str_row_panel+" [type=radio]").each(function(){
        processInputRadio($(this),!blnIsDinamicForm);
    });
    $("#"+str_row_panel+" [type=checkbox ]").each(function(){
        processInputCheckBox($(this),!blnIsDinamicForm);
    });
    
    //processInputTypeValidations(str_row_panel);
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

function loadSelectValues(obj,str_row_panel){
    var strSelectName =  obj.attr('name');
    if( strSelectName.indexOf("b2_d1321_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(14,true));
        addSelectOption(obj,"15","15 o más")
    }else if( strSelectName.indexOf("b2_d1322_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(14,true));
        addSelectOption(obj,"15","15 o más")
    }else if( strSelectName.indexOf("b2_d1323_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(2,true));
    }else if( strSelectName.indexOf("b2_d1324_o_1") == 0  ){ 
        obj.append(getSelect_Cantidad(14,true));
        addSelectOption(obj,"15","15 o más")
    }
    
    return true;
}