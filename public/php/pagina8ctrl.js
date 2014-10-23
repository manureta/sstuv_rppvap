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
       
    var index_hidden = strGlobalFormKey;
    $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_curso_cant" name="'+index_hidden+'_curso_cant" value="'+GetLoadedGlobalValue(index_hidden+'_curso_cant','0')+'" />');
    $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_curso_json_cant" name="'+index_hidden+'_curso_json_cant" value="'+GetLoadedGlobalValue(index_hidden+'_curso_json_cant')+'" />');
}

function processAttrGlobals(){
    $("#page_globals_input_vars select").each(function(){
        processInputSelect($(this),"page_globals_input_vars",true);
    });
}


function bloqueCtrl (){
    InicializaForm();
}


function InicializaForm(){
    //0.Guardo el form y cargo globales generales de la 
    f0();

    //2. Carga de Cursos
    f1();
}


function f0(){
    loadPageGlobals();
    processAttrGlobals();
}


//2. Carga de Cursos
function f1(){
    loadAccordionRows('curso',procesarObjCurso);
    $('#curso_button_add').click(function(){
        addAccordionRow('curso',procesarObjCurso);
    });
    $('#curso-central-master').show();
}

function procesarObjCurso(str_row_id,has_delete,intCantMaxTablas){
    procesarObj("curso",str_row_id,has_delete,0,false);
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
    //DESIGNACION
    if( strSelectName.indexOf("b8_d28_o_1") == 0  ){ 
        obj.change(
            function(){ 
                var t = $(this).find(":selected").text();
                if(t=="") t="Nuevo Curso / Actividad";
                objParent=$(this).parent();
                objParent=objParent.parent();
                objParent=objParent.parent();
                objParent=objParent.parent();
                objParent=objParent.parent();
                objParent.find("#accordion_curso_row__name").text(t);
            }
        );
    }else if( strSelectName.indexOf("b8_d281_o_1") == 0  ){ 
        //obj.append(getSelect_Generico());
    }else if( strSelectName.indexOf("b8_d29_o_1") == 0  ){ 
        //obj.append(getSelect_Generico());
    }
    
    return true;
}

