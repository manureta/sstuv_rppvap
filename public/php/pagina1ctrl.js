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

function setAutoCompleteTextBox(obj,objText){
    var strInputName =  obj.attr('name');
    if( strInputName.indexOf("b1_d9_a_1") == 0  ){ //Localidad 
        ConfigureAutoCompleteTextBox(objText, $("#b1_d8_o_1"));
    }
}


function getAutoCompleteData(objIdTag){
    if( objIdTag.indexOf("b1_d9_a_1") == 0  ){ //Espacios Curriculares
        if($('#b1_d8_o_1').val()=="" || $('#b1_d8_o_1').val()=="0" ){
            alert("Para buscar una localidad, debe seleccionar una provincia.");
            $('#b1_d8_o_1').focus();
            return { noprocesa:1 };
        }
        return {
            provincia: $('#b1_d8_o_1').val(),
            cat: "localidad"
        };
    }
    return {};
}


function GetAutoCompleteDataFor_b1_d9_a_1(){
    
    
    
}

//Si existe la funcion con el prefijo GetAutoCompleteDataFor_[SELECTOR].. se carga en el ajax.
function GetAutoCompleteDataFor_b1_d9_a_1(){
    
}

//Selects
function loadSelectValues(obj,str_row_panel){
    var strSelectName =  obj.attr('name');
    if( strSelectName.indexOf("b1_d6_o_1") == 0  ){ 
        obj.append(getSelect_Sexo());
    }else if( strSelectName.indexOf("b1_d8_o_1") == 0  ){ 
        obj.append(getSelect_Provincia());
    }else if( strSelectName.indexOf("b1_d10_o_1") == 0  ){ 
        obj.append(getSelect_NivelEducativo());
    }else if( strSelectName.indexOf("b1_d11_o_1") == 0  ){ 
        obj.append(getSelect_NivelEducativo());
    }
    return true;
}

function getSelect_Sexo(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="1">Masculino</option>';
    str = str+ '<option value="2">Femenino</option>';
    return str;
}

function getSelect_Provincia(){
    var str = '<option value="0"></option>';
    str = str+ '<option value="02">Ciudad de Buenos Aires</option>';
    str = str+ '<option value="06">Buenos Aires</option>';
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
    str = str+ '<option value="62">Rιo Negro</option>';
    str = str+ '<option value="66">Salta</option>';
    str = str+ '<option value="70">San Juan</option>';
    str = str+ '<option value="74">San Luis</option>';
    str = str+ '<option value="78">Santa Cruz</option>';
    str = str+ '<option value="82">Santa Fe</option>';
    str = str+ '<option value="86">Santiago del Estero</option>';
    str = str+ '<option value="90">Tucumán </option>';
    str = str+ '<option value="94">Tierra del Fuego</option>';
    return str;
}

function getSelect_NivelEducativo(){
    var str = '<option value="1">Nunca asistió</option>';
    str = str+ '<option value="2">Primaria Incompleta</option>';
    str = str+ '<option value="3">Primaria completa</option>';
    str = str+ '<option value="4">Secundaria incompleta</option>';
    str = str+ '<option value="5">Secundaria completa</option>';
    str = str+ '<option value="6">Terciario (no universitario) incompleto</option>';
    str = str+ '<option value="7">Terciario (no universitario) completo</option>';
    str = str+ '<option value="8">Universitario incompleto</option>';
    str = str+ '<option value="9">Universitario completo</option>';
    str = str+ '<option value="10">No sabe</option>';
    return str;
}
