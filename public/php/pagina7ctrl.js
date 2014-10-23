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
    $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_estudio_cant" name="'+index_hidden+'_estudio_cant" value="'+GetLoadedGlobalValue(index_hidden+'_estudio_cant','0')+'" />');
    $('#page_globals_hidden_vars').append('<input type="hidden" id="'+index_hidden+'_estudio_json_cant" name="'+index_hidden+'_estudio_json_cant" value="'+GetLoadedGlobalValue(index_hidden+'_estudio_json_cant')+'" />');
}

function bloqueCtrl (){
    InicializaForm();
    InicializaConsistencia();
    ProcessInicialConsistencia();
}


function InicializaForm(){
    //0.Guardo el form y cargo globales generales de la 
    f0();

    //2. Carga de estudios
    f1();
}


function f0(){
    loadPageGlobals();
    processAttrGlobals();
}


//2. Carga de estudios
function f1(){
    loadAccordionRows('estudio',procesarObjEstudio);
    $('#estudio_button_add').click(function(){
        addAccordionRow('estudio',procesarObjEstudio);
    });
}

function procesarObjEstudio(str_row_id,has_delete,intCantMaxTablas){
    procesarObj("estudio",str_row_id,has_delete,0,false);
    $("#estudio_line_"+str_row_id).find("[id^=b7_d271_a_1_text]").change();
}


function saveAll(){
    encodeGlobalTo( $("#global-panel-master_row"), $('#'+strGlobalPageKey) );
}

function AceptarFormulario(){
    saveAll();
}

function setAutoCompleteTextBox(obj,objText){
    var strInputName =  obj.attr('name');
    if( strInputName.indexOf("b7_d271_a_1") == 0  ){ //Nombre Designacion central
        ConfigureAutoCompleteTextBox(objText);
        objText.change(
            function(){ 
                var t = $(this).val();
                if(t=="") t="Nuevo estúdio de posgrado en el nivel superior y universitario.";
                objParent=$(this).parents("[id^=estudio_line_]");
                objParent.find(".panel-heading #accordion_estudio_row__name").text(t);
            }
        );
    }
}

function getAutoCompleteData(objIdTag){
    if( objIdTag.indexOf("b7_d271_a_1") == 0  ){ //Titulo Posgrado
        return {
            cat: "titulo_posgrado"
        };
    }
    return {};
}

//Selects
function loadSelectValues(obj,str_row_panel){
    var strSelectName =  obj.attr('name');
    //DESIGNACION
    if( strSelectName.indexOf("b7_d272_o_1") == 0  ){ 
        obj.append(getSelect_TipoTitulo());
    }else if( strSelectName.indexOf("b7_d274_o_1") == 0  ){ 
        obj.append(getSelect_JurisdiccionCursaCarrera());
    }else if( strSelectName.indexOf("b8_d29_o_1") == 0  ){ 
        obj.append(getSelect_Generico());
    }
    
    return true;
}

function getSelect_JurisdiccionCursaCarrera(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="06">Buenos Aires</option>';
    str = str+ '<option value="02">Ciudad de Buenos Aires</option>';
    str = str+ '<option value="10">Catamarca</option>';
    str = str+ '<option value="14">Córdoba</option>';
    str = str+ '<option value="18">Corrientes</option>';
    str = str+ '<option value="22">Chaco</option>';
    str = str+ '<option value="26">Chubut</option>';
    str = str+ '<option value="30">Entre Ríos</option>';
    str = str+ '<option value="34">Formosa</option>';
    str = str+ '<option value="38">Jujuy</option>';
    str = str+ '<option value="42">La Pampa</option>';
    str = str+ '<option value="46">La Rioja</option>';
    str = str+ '<option value="50">Mendoza</option>';
    str = str+ '<option value="54">Misiones</option>';
    str = str+ '<option value="58">Neuquén</option>';
    str = str+ '<option value="62">Río Negro</option>';
    str = str+ '<option value="66">Salta</option>';
    str = str+ '<option value="70">San Juan</option>';
    str = str+ '<option value="74">San Luis</option>';
    str = str+ '<option value="78">Santa Cruz</option>';
    str = str+ '<option value="82">Santa Fe</option>';
    str = str+ '<option value="86">Santiago del Estero</option>';
    str = str+ '<option value="94">Tierra del Fuego</option>';
    str = str+ '<option value="90">Tucumán</option>';
    str = str+ '<option value="99">Otro País</option>';
    return str;
}

function getSelect_TipoTitulo(){
    var str = '<option value="0"></option>';
    str = str+ '<option  value="1">Post&iacute;tulo</option>';
    str = str+ '<option  value="2">Especializaci&oacute;n</option>';
    str = str+ '<option  value="3">Diplomatura</option>';
    str = str+ '<option  value="4">Maestr&iacute;a</option>';
    str = str+ '<option  value="5">Doctorado</option>';
    str = str+ '<option  value="6">Posdoctorado</option>';
    return str;
}
