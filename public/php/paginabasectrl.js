/*
 * Variables Globales
 * 
 */

var objGlobal = null; //Obj con variables que siempre residen
var strGlobalPageKey = 'b'+nro_pagina+'_global';
var strGlobalFormKey = 'b'+nro_pagina+'_gl_form';


/*
 * Fixs
 */

$( document ).ready(function(){
    $("[name*='_n_']").numericInput(); //maskereo todos los campos numericos
    $(".QLoadingPanel").hide();
});

function guardar_pagina(urlnext){
    AceptarFormulario();
    //$("#page_form").html();
    $.ajax({
      type: "POST",
      url: $("#page_form").attr("action"),
      data: "action=saveData&"+$("#page_globals").find(":input").serialize(),
      success: function(data) {
          if (!data.status) {
              alert("Ocurrió un error al guardar los datos:  "+textStatus+" - "+errorThrown);
              return;
          }
          
          switch(data.status) {
              case 1:
                  $.gritter.add({text: "Los datos fueron guardados correctamente",class_name: "gritter-success",time:2000});
                  break;
              case 2:
                  $.gritter.add({text: "Se encontraron errores en la información cargada.<br>Por favor corríjalos y vuelva a Guardar",class_name: "gritter-error",time:4000});
                  break;
          }
          if(urlnext) location.href=urlnext;
      },
      error:function(XMLHttpRequest, textStatus, errorThrown){
          alert("Ocurrió un error:  "+textStatus+" - "+errorThrown);
      },
      dataType: "json"
    });
}

function validar_tipo_dato(obj) { //Extraido de Consistencia
    var parts, bloque, dato, tipo_dato, copia, valor;
    parts = $(obj).attr('id').split('_');
    bloque = parts[0];
    dato = parts[1];
    tipo_dato = parts[2];
    switch (tipo_dato) {
        case 'n':
            $(obj).numericInput();
        break;
    }
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
    
    processInputTypeValidations(str_row_panel);
}

//-------------------------

function encodeGlobalTo(objDivFrom,objTo){
    var strJson;
    try{ strJson = JSON.stringify(objDivFrom.find("select, textarea, input").serializeJSON()); }catch(err){ strJson=''; }
    objTo.val(strJson);
}

function encodeFormTo(objDivFrom,objTo){
    var strJson;
    //try{ strJson = JSON.stringify($("#cue-panel-master_row").serializeJSON()); }catch(err){ strJson=''; }
    try{ strJson = JSON.stringify(objDivFrom.find("select, textarea, input").serializeJSON()); }catch(err){ strJson=''; }
    objTo.val(strJson);
}

function decodeFormFrom(objFrom){
    var objJson;
    try{ objJson = JSON.parse(objFrom.val()); }catch(err){ objJson=null; }
    return objJson;
}

function encodeValueTo(mixValue,obj){
    var strJson;
    try{ strJson = JSON.stringify(mixValue); }catch(err){ strJson=''; }
    obj.val(strJson);    
}

function decodeValueFrom(obj){
    var objJson;
    try{ objJson = JSON.parse(obj.val()); }catch(err){ objJson=null; }
    return objJson;  
}

//d: default cuando no existe.
function GetLoadedPostValue(s,d){
    return (strFormValues[s] != null && strFormValues[s] != ''? strFormValues[s]:(d!=null?d:''));
}

//d: default cuando no existe.
function GetLoadedGlobalValue(s,d){
    var value = null;
    if(objGlobal) value = objGlobal[s];
    return (value?value:(d!=null?d:''));
}

function GetLoadedFormValue(s,d){
    var value = null;
    if(objForm) value = objForm[s];
    return (value?value:(d!=null?d:''));
}

function getHiddenValue(strIdHidden){
    return $("#"+strIdHidden).val();
}

function setHiddenValue(strIdHidden,mixVal){
    $("#"+strIdHidden).val(mixVal);
}

function IncrementHidden(strIdHidden){
    var d = parseInt($("#"+strIdHidden).val());
    d = isNaN(d)?0:d;
    d = d + 1;
    setHiddenValue(strIdHidden,d);
    return d;
}

function getPositionFromArray(objArray,attr,value){
    var f=false,p=null,it=0;
    for(it;it<objArray.length && f==false;it++){
        objItem = objArray[it];
        if ( objItem[attr] == true){
            p=it; f=true;
        }
    }
    return p;
}

function setRowId(_str_row_id){
    str_row_id = _str_row_id;
}


/*
 * Funciones Globales de Carga
 */


function loadAccordionRows(strSector,fnProcessAt,objParam,strObjParamKey){
    var index_hidden = objParam?strGlobalFormKey+"_"+objParam[strObjParamKey]:strGlobalFormKey;
    var arr = decodeValueFrom($("#"+index_hidden+"_"+strSector+"_json_cant"));
    if(arr==null || !$.isArray(arr)) {
        arr = Array();
        objParam?
            loadAccordionRow(strSector,0,false,fnProcessAt,objParam,strObjParamKey):
                    loadAccordionRow(strSector,0,false,fnProcessAt);
    }else {
        for(var it=0;it < arr.length; it++){
            if(arr[it]==true)
                objParam?
                    loadAccordionRow(strSector,it,(it==0?false:true),fnProcessAt,objParam,strObjParamKey):
                            loadAccordionRow(strSector,it,(it==0?false:true),fnProcessAt);
        }
    }
}

function loadAccordionRow(strSector,intPos,has_delete,fnProcessAt,objParam,strObjParamKey){
    var objLine = $("#linea_"+strSector).clone();
    objLine.attr("data-index",intPos);
    var str_row_id = objParam?objParam[strObjParamKey]+"_"+intPos:intPos;
    objLine.attr("id",strSector+"_line_"+str_row_id);
    $("#accordion_"+strSector+"__rows").append(objLine);
    fnProcessAt(str_row_id,has_delete);
    objLine.show();
}

function addAccordionRow(strSector,fnProcessAt,objParam,strObjParamKey){
    var index_hidden = objParam?strGlobalFormKey+"_"+objParam[strObjParamKey]:strGlobalFormKey;
    var n = IncrementHidden(index_hidden+"_"+strSector+"_cant");
    arr = decodeValueFrom($("#"+index_hidden+"_"+strSector+"_json_cant"));
    if(arr==null || !$.isArray(arr)) {
        arr=Array();
        arr[0]=true;
    }
    arr[ n ]=true;
    encodeValueTo(arr,$("#"+index_hidden+"_"+strSector+"_json_cant"));
    objParam?loadAccordionRow(strSector,n,true,fnProcessAt,objParam,strObjParamKey):loadAccordionRow(strSector,n,true,fnProcessAt);
}

function removeObj(strObj){
    $("#"+strObj).remove();
}


function procesarObj(strSector,str_row_id,has_delete,intCantMaxTablas,blnIsDinamicForm){ 
    var Tag_a_0 = $("#"+strSector+"_line_"+str_row_id+" .panel-title a");
    str_row_panel = strSector+"_panel_"+str_row_id;
    Tag_a_0.attr("href","#"+str_row_panel);
    if(has_delete==true){
        Tag_a_0.append('<button style="float: right;" data-sector="'+strSector+'" id="remove_'+strSector+'_'+str_row_id+'" class="btn btn-danger btn-xs"><i class="icon-trash bigger-110 icon-only"></i></button>');
        if(blnIsDinamicForm)  $('#remove_'+strSector+'_'+str_row_id).attr("data-form",1);
        $('#remove_'+strSector+'_'+str_row_id).click(function(){
            var y = confirm("¿Desea eliminar la fila?");
                if (!y) return;
            objParent = $(this).parent().parent().parent().parent();
            var index_hidden = strGlobalFormKey;
            if($(this).attr("data-form")=="1"){
                objEst=objJson[intActiveIndex];
                index_hidden = strGlobalFormKey+'_'+objEst.IdEstablecimiento;
            }
            var strSector = $(this).attr("data-sector");
            var arr = decodeValueFrom($("#"+index_hidden+"_"+strSector+"_json_cant"));
            if(arr!=null){
                var n = objParent.attr("data-index");
                arr[n]=null;
                encodeValueTo(arr,$("#"+index_hidden+"_"+strSector+"_json_cant"));
                setTimeout(function(){removeObj(objParent.attr("id"))}, 0);
            }else{
                console.log('remove_'+strSector+'_'+str_row_id+' ClickError');
            }
            return true;
        });
    }
    var Tag_Div_0 = $("#"+strSector+"_line_"+str_row_id+" #accordion_"+strSector+"_");
    Tag_Div_0.attr("id",str_row_panel);
    
    //administracion de id, name por controles
    $("#"+str_row_panel+" [id^=b"+nro_pagina+"_d]").each(function(){
        $(this).attr("id",$(this).attr("id")+"_"+str_row_id);
        $(this).attr("name",$(this).attr("name")+"_"+str_row_id);
    });
    
    for(var it=1; it <= intCantMaxTablas; it++){
        $("#"+str_row_panel+" [id^=tabla_"+strSector+"_button_"+it+"]").each(function(){
            $(this).attr("id",$(this).attr("id")+"_"+str_row_id);
            $(this).attr("data-row",str_row_id);
            $(this).attr("data-table",it);
            $(this).click(function(){
                setRowId($(this).attr("data-row"));
                agregarTablaRow(str_row_id,$(this).attr("data-sector"),$(this).attr("data-table"));
            });
        });
    }
    
    $("#"+str_row_panel+" [id^=tabla_"+strSector+"_]").each(function(){
        $(this).attr("id",$(this).attr("id")+"_"+str_row_id);
    });
    
    $("#"+str_row_panel+" label").each(function(){
        if($(this).attr("for")!="")$(this).attr("for",$(this).attr("for")+"_"+str_row_id);
    });
    //Administracion de valores
    //Text Box
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
    
    LoadInternalTablas(str_row_id,strSector,intCantMaxTablas);
    
    $("#"+str_row_panel+" input").each(function(i) {
        if ($(this).attr('name') && $(this).attr('name').match(/b[\d]{1,2}_d[\d]{1,5}_/)) {
            validar_tipo_dato(this);
        }
    });
}

function processInputText(obj,IsGlobal){
    obj.val(IsGlobal?GetLoadedGlobalValue(obj.attr("name"),''):GetLoadedFormValue(obj.attr("name"),''));
    var regexExpression ="b"+nro_pagina+"_d[0-9]+_a_[0-9]+_text";
    var regex = new RegExp(regexExpression);
    if( regex.test(obj.attr("name")) == true ){
        var objIdTag = obj.attr("name").replace("_text","");
        $('#'+objIdTag).val(IsGlobal?GetLoadedGlobalValue(objIdTag,''):GetLoadedFormValue(objIdTag,''));
        setAutoCompleteTextBox($('#'+objIdTag),obj);
    }
}

//objParent se usa para tablas intermedias en formularios dinamicos.
function processInputSelect(obj,str_row_panel,IsGlobal,objParent){
    //Cargamos los datos
    if(loadSelectValues(obj,str_row_panel,objParent)==true) {
        obj.val(IsGlobal?GetLoadedGlobalValue(obj.attr("name"),0):GetLoadedFormValue(obj.attr("name"),0));
        obj.change();
    }
}

function processInputRadio(obj,IsGlobal){
    var mixValue=IsGlobal?GetLoadedGlobalValue(obj.attr("name"),null):GetLoadedFormValue(obj.attr("name"),null);
    if(mixValue){
        var s = 'input[name='+obj.attr("name")+'][value='+mixValue+']';
        $(s).attr('checked',true);
    }
}

function processInputCheckBox(obj,IsGlobal){
    var mixValue=IsGlobal?GetLoadedGlobalValue(obj.attr("name"),null):GetLoadedFormValue(obj.attr("name"),null);
    if(mixValue){
        var s = 'input[name='+obj.attr("name")+'][value='+mixValue+']';
        $(s).attr('checked',true);
    }
}

function processInputTypeValidations(str_row_panel){
    $("#"+str_row_panel+" input").each(function(i) {
        if ($(this).attr('name') && $(this).attr('name').match(/b[\d]{1,2}_d[\d]{1,5}_/)) {
            validar_tipo_dato(this);
        }
    });
}

//Se redefinen.
function LoadInternalTablas(str_row_id,strTabla,intCantTablas){
    //Redefinido en paginaxctrl.js
}
function InicializaConsistencia(){
    //Redefinido en paginaxcheck.js
}

function loadSelectValues(obj,str_row_panel){
    //Redefinido en paginaxctrl.js
}

function setAutoCompleteTextBox(obj,objText){
    //Redefinido en paginaxctrl.js
}

//Redefinido en paginaxctrl.js
function getAutoCompleteData(objIdTag){
    return objData = {};
}

 //AutoComplete
var cache= [];
function ConfigureAutoCompleteTextBox(objText, objDependence){
    objDependence = objDependence || {sinDependecia:1 }
    var objIdTag = objText.attr("name").replace("_text","");
    cache[objIdTag] = [] ;
    cache[objIdTag + "_dependence"] = objDependence;
    if(!objDependence.sinDependecia)
        cache[objIdTag + "_dependence_val"] = objDependence.val();
    objText.autocomplete({
        source: function(request, response) {
                        $('.ui-helper-hidden-accessible').hide();
                        var objIdTag = objText.attr("name").replace("_text","");
                        $("#"+objIdTag).val("");
                        objDependence = cache[objIdTag + "_dependence"];
                        if(!objDependence.sinDependecia && objDependence.val() != cache[objIdTag + "_dependence_val"]){
                            cache[objIdTag + "_dependence_val"] = objDependence.val();
                            cache[objIdTag] =[];
                        }


                        if(request.term.length == 3 || cache[objIdTag].length == 0){
                            objAjaxData = getAutoCompleteData(objIdTag);
                            if(objAjaxData.noprocesa){
                                return;
                            }
                            objAjaxData.term = request.term;
                            $.ajax({
                                url: 'autocompletetextbox.php',
                                dataType:'json',
                                data: objAjaxData
                                , success: function(data){
                                    var objIdTag = objText.attr("name").replace("_text","");
                                    cache[objIdTag] = [];
                                    for(var i in data)
                                        cache[objIdTag].push(data [i]);
                                    response(data);
                                    }
                                , error:function(XMLHttpRequest, textStatus, errorThrown){
                                  alert("Ocurrió un error:  "+textStatus+" - "+errorThrown);
                                },
                            });
                        }else{
                            response(cache[objIdTag].filter(function(e){return e.label.toUpperCase().indexOf(request.term.toUpperCase())>-1}));
                        }
        },
        minLength: 3,
        select: function( event, ui ) {
            var objIdTag = objText.attr("name").replace("_text","");
            $("#"+objIdTag).val(ui.item.id);
            $('.ui-helper-hidden-accessible').hide();
        }
});
}


//Selects comunes


function addSelectOption(obj,value,description,dataindex,dataindex2){
    var s = '';
    if(dataindex!=null) s = ' data-index="' + dataindex + '" ';
    if(dataindex2!=null) s = s + ' data-index2="' + dataindex2 + '" ';
    obj.append('<option '+s+' value="'+value+'">'+description+'</option>');    
}


function getSelect_Generico(){
    var str = '<option value="0"></option>';
    for(var it=1;it<=10;it++){
        str=str+'<option value="'+it+'">Opción '+it+'</option>';
    }
    return str;
}


function getSelect_Cantidad(max,blnIncluyeCero){
    var str = '';
    if(blnIncluyeCero){
        str = str+'<option value="-1"></option>';
        str = str+'<option value="0">0</option>';
    }else{
        str = str+'<option value="0"></option>';
    }
    for(m=1;m<=max;m++){
        str=str+'<option value="'+m+'">'+m+'</option>';
    }
    return str;
}

function validaRangoNros(jqObj,intMin,intMax){
    v = jqObj.val();
    v = parseInt(v);
    if(isNaN(v)){
        $.gritter.add({text: "Cantidad de horas semanales no es un número válido",class_name: "gritter-error",time:2000});
        jqObj.val("");
        return false;
    }
    if ( v<intMin || v >intMax ) {
         $.gritter.add({text: "Cantidad de horas semanales debe ser mayor a "+intMin+" y menor a "+intMax,class_name: "gritter-error",time:2000});
         jqObj.val("");
         return false;
    }
    return true;
}

function esAnio(jqObj,intMax,strEtiqueta){
    v = jqObj.val();
    n = parseInt(v);
    if( isNaN(n) || v.length != 4 ){
        $.gritter.add({text: strEtiqueta+" no es un año válido",class_name: "gritter-error",time:2000});
        jqObj.val("");
        return false;
    }
    if ( v >intMax ) {
         $.gritter.add({text: strEtiqueta+" ser menor a "+intMax,class_name: "gritter-error",time:2000});
         jqObj.val("");
         return false;
    }
    return true;
}