var menu1Pos = "breadcrumb1";
var AIdSelected="";
function format(item) { return item.tag; };
var CHECK_WATABLE = null;
var CHECK_WATABLE_ROWS_COUNT = 0;
var CHECK_WATABLE_ROWS_FUNCTION = function(){};
var BTN_NINGUNA = 1;
var BTN_AGREGAR = 2;
var BTN_MODIFICAR = 3;
var BTN_CANCELAR = 4;
var BTN_GUARDAR = 5;
var FORM_NOTCLEAN = false;
var FORM_UNLOCK = false;
var FORM_NOTSAVE = false;
var FORM_NOTRESTORE = false;
var FORM_CLEAN = true;
var FORM_LOCK = true;
var FORM_SAVE = true;
var FORM_RESTOREIFSAVED = true;
/*Por defecto siempre hay una solapa, sin nombre, si no hay corte inicial*/
var solapasActivas = Array();
var solapaActiva = 0;
solapasActivas.push({id:'',descripcion:'*'});
var maskDefs = Array();
var watable_padre=null;
var watable_hija=null;
var watable_MultiListas = Array();
var user_selecciono = BTN_NINGUNA;
var datosAnteriores = {idr:0,campos:Array()};
var canClick=true;
var menuClicsFIFO = Array();
// Para el manejo del Select2 sobre el WATable
var cerrarControlSelect2ParaWATable = function() {
	// console.info("cerrarControlSelect2...");
        for( i=0; i < watable_MultiListas.length; i++){
           var oWaT =  watable_MultiListas[i];
           if(oWaT.tieneLista==true) oWaT.watable.setCtrlSelect2();
        }
}
/*
        Carga el manejo del select2 para el alta de items si no encuentra el dato en la lista
*/
var paraEntidad = {defEntidad:false, select2:Array()};


function clearCanClick(){
    canClick=true;
}

function byPassWatable(){
    //alert('Click automatico en primer fila.'); Se ejecuta varias veces. Error
}

function showInicio(objAId) {
    if(AIdSelected==objAId) return;
    clearTimeout(this.itemEjecucion);
    AIdSelected=objAId;
    objA=$("#"+objAId);
    this.cleanFN();
    this.itemEjecucion = setTimeout( function(){inicio(objA);} ,1 );
}

function processFN14(idRef, objAId){
    if(AIdSelected==objAId) return;
    clearTimeout(this.itemEjecucion);
    AIdSelected=objAId;
    this.cleanFN();
    objA=$("#"+objAId);
    obj=this;
    this.validarForm = FN14_validarForm;
    this.validarRtaBorrar = FN14_validarRtaBorrar;
    this.validarRtaModificar = FN14_validarRtaModificar;
    this.validarRtaAgregar = FN14_validarRtaAgregar;
    this.borrar = FN14_Borrar;
    this.modificar = FN14_Modificar;
    this.agregar = FN14_Agregar;
    this.guardar = FN14_Guardar;
    this.cancelar = FN14_Cancelar;
    this.doForm = FN14_doForm;
    this.itemEjecucion = setTimeout( function(){reloadFN14(objA,idRef,obj);} ,1 );
    setTimeout( "clearCanClick" ,5000 );
}

function showFN14(idRef, objAId) {
   if(AIdSelected==objAId) return;
   if(canClick==false){
       return;
   }
   menuClicsFIFO.push({_idRef:idRef,_objAId:objAId});
   canClick=false
   while (menuClicsFIFO.length > 0){
       a=menuClicsFIFO.pop();
       this.processFN14(a._idRef, a._objAId);
   }
}

function cleanFN(){
    /*Externas*/
    _IdUnique=0;
    _IdUniquePadre=0;
    bFiltroSeleccionVisible=true;
    /*Propias*/
    $("#settings-box-shortcuts-large").find("button").off('click');
    $("#settings-box-shortcuts-large").find("button").addClass("disabled");
    CHECK_WATABLE = null;
    CHECK_WATABLE_ROWS_COUNT = 0;
    CHECK_WATABLE_ROWS_FUNCTION = function(){};
    if(solapasActivas){
        Tool_DestruirArray(solapasActivas);
    }
    paraEntidad.defEntidad=false;
    if(paraEntidad.select2){
        Tool_DestruirArray(paraEntidad.select2);
    }
    solapaActiva=0;
    solapasActivas = Array();
    solapasActivas.push({id:'',descripcion:'*'});
    if(maskDefs){
        Tool_DestruirArray(maskDefs);
    }

    if(ctrlWATableActivo){
        Tool_DestruirArray(ctrlWATableActivo);
    }
    maskDefs = Array();
    if(watable_MultiListas){
        Tool_DestruirArray(watable_MultiListas);
    }
    if(datosAnteriores.campos){
        Tool_DestruirArray(datosAnteriores.campos);
    }
    datosAnteriores.idr=0;
    watable_MultiListas = Array();
    if(this.FN14ficha) {
        Tool_DestruirArray(this.FN14ficha.metadata);
        delete this.FN14ficha;
    }
    this.FN14ficha = { 
        idficha:null,
        nombreficha:null,
        idesquema:null,
        espadre:null,
        idesquemapadre:null,
        esfichaalta:null,
        fichaalta:null,
        nombreentidadpadre:null,
        nombreentidadpropia:null,
        nombrecampopivotepadre:null,
        nombrecampopivotehijo:null,
        cant_campos_ficha:null,
        pivotesup:null,
        metadata:Array()
        };
    this.p_agregar=false;
    this.p_borrar=false;
    this.p_modificar=false;
    this.validarForm = function(){};
    this.validarRtaBorrar = function(){};
    this.validarRtaModificar = function(){};
    this.validarRtaAgregar = function(){};
    this.borrar = function(){};
    this.modificar = function(){};
    this.agregar = function(){};
    this.doForm = function(){};
    delete(watable_padre);
    watable_padre=null;
    delete(watable_hija);
    watable_hija=null;watable_hija
    user_selecciono = BTN_NINGUNA;
}

function startButtons(){//disabled
  /*Esta siempre es la ultima funcion a realizar*/
   if(this.p_agregar==true){
       $("#Button_Agregar").removeClass("disabled");
       $("#Button_Agregar").on('click', function(){oFuncion.agregar();});
   }
   if(this.p_borrar==true){
       $("#Button_Borrar").removeClass("disabled");
       $("#Button_Borrar").on('click', function(){oFuncion.borrar();});
   }
   if(this.p_modificar==true){
       $("#Button_Modificar").removeClass("disabled");
       $("#Button_Modificar").on('click', function(){oFuncion.modificar();});
   }
}

function getBreadCrumByIdTagA(ruta, idBreadCrumb) {
    var objBC = $("#" + idBreadCrumb);
    ruta = ruta.replace("MenuItem", "");
    objBC.find("li").remove();
    var first = true;
    var strNavigation = "MenuItem";
    var tam = ruta.split("_").slice(0, -1).length;
    var i = 0;
    $.each(ruta.split("_").slice(0, -1), function(index, item) {
        i++;
        strNavigation = strNavigation + item + "_";
        var etiqueta = $("#" + strNavigation).find("span").html();
        var onclick = (i != tam?$("#" + strNavigation).attr("onClick"):"");
        if (onclick != "" ){
            onclick = onclick.replace("$(this)","null");
            etiqueta = '<a onClick="' + onclick + '" href="#">' + etiqueta + '</a>';
        }
        else 
            etiqueta = '<a>' + etiqueta + '</a>';
        
        if (first == true) {
            first = false;
            var cls = trim($("#" + strNavigation).find("i").attr("class"));
            objBC.append('<li ' + (i == tam ? 'class="active"' : '') + ' ><i class="' + (cls != "" ? cls : "icon-home") + '"></i>' + etiqueta + (i != tam ? '<span class="divider"><i class="icon-angle-right"></i></span>' : '') + '</li>');
        } else {
            objBC.append('<li ' + (i == tam ? 'class="active"' : '') + ' >' + etiqueta + (i != tam ? '<span class="divider"><i class="icon-angle-right"></i></span>' : '') + '</li>');
        }
    });

}

function inicio(objA) {
    $("#ID_ZoneLoadData").load("web/inicio.html", function(responseText, statusText, xhr)
    {
        if (statusText == "success") {
            getBreadCrumByIdTagA(objA.attr("id"), menu1Pos); /*breadcrums*/
            $("#page-content").empty().append($('#ID_To_PageContent'));
            $('#BOARDTitulo').html(objA.attr("titulo"));
            $('#BOARDDescripcion').html(objA.attr("descripcion"));
            
            // Oculta el panel de la barra de botones
            if (bSettingsBoxOpen) {
                SettingsBoxOpen($("#ME-settings-btn"));
            }
         //fnMenuVertical();
         fnACE();
         fnPieChart();
           
        }
        if (statusText == "error")
            alert("An error occurred: " + xhr.status + " - " + xhr.statusText);
    });
}

function setInicial(menu) {
    $('#menuRaiz li a').each(function(){if($(this).attr("inicial")=="1") $(this).click();});
}

function FN14_getWatablePosById(ID){
    var found = false;
    var pos = -1;
    for(i=0; i < watable_MultiListas.length && found==false ; i++){
        o = watable_MultiListas[i];
        if(o.idHtml == ID) {
            pos = i;
            found = true;
        }
    }
    return pos;
}

function watableCreado(data){
    if(CHECK_WATABLE_ROWS_COUNT != 0)
        if( CHECK_WATABLE.getCountData() == CHECK_WATABLE_ROWS_COUNT ) {
            CHECK_WATABLE_ROWS_FUNCTION();
        }
}

                                                        /*Funcion 14 Op Fichas*/
                                                        
                                                        /*BOTONES*/

function FN14_DisableButtonsByAction(BTN){
    switch(BTN){
        case BTN_AGREGAR:
            if(user_selecciono==BTN_AGREGAR) return;
            $("#Button_Agregar").addClass("disabled");$("#Button_Agregar").off('click');
            $("#Button_Borrar").addClass("disabled");$("#Button_Borrar").off('click');
            $("#Button_Modificar").addClass("disabled");$("#Button_Modificar").off('click');
            $("#Button_Guardar").removeClass("disabled");$("#Button_Guardar").on('click', function(){oFuncion.guardar();});
            $("#Button_Cancelar").removeClass("disabled");$("#Button_Cancelar").on('click', function(){oFuncion.cancelar();});
            user_selecciono = BTN_AGREGAR;
            break;
        case BTN_MODIFICAR:
            if(user_selecciono==BTN_MODIFICAR) return;
            $("#Button_Agregar").addClass("disabled");$("#Button_Agregar").off('click');
            $("#Button_Borrar").addClass("disabled");$("#Button_Borrar").off('click');
            $("#Button_Modificar").addClass("disabled");$("#Button_Modificar").off('click');
            $("#Button_Guardar").removeClass("disabled"); $("#Button_Guardar").on('click', function(){oFuncion.guardar();});
            $("#Button_Cancelar").removeClass("disabled"); $("#Button_Cancelar").on('click', function(){oFuncion.cancelar();});
            user_selecciono = BTN_MODIFICAR;
            break;
         case BTN_CANCELAR:
            if(user_selecciono==BTN_CANCELAR) return;
         case BTN_GUARDAR:
            if(user_selecciono==BTN_GUARDAR) return;
            if(user_selecciono==BTN_NINGUNA) return;
            $("#Button_Agregar").removeClass("disabled");if(oFuncion.p_agregar==true)$("#Button_Agregar").on('click', function(){oFuncion.agregar();});
            $("#Button_Borrar").removeClass("disabled"); if(oFuncion.p_borrar==true)$("#Button_Borrar").on('click', function(){oFuncion.borrar();});
            $("#Button_Modificar").removeClass("disabled");if(oFuncion.p_modificar==true)$("#Button_Modificar").on('click', function(){oFuncion.modificar();});
            $("#Button_Guardar").addClass("disabled");$("#Button_Guardar").off('click');
            $("#Button_Cancelar").addClass("disabled");$("#Button_Cancelar").off('click');
            user_selecciono = BTN_NINGUNA;
         break;
        default:
            return;
            break;
    }
}

function FN14_ActualizarDataMultilistas(){
/*Buscamos todas las asignaciones de todo multilista*/
/*Ej.
 * watable_MultiListas.push({idMultiLista: subitem.idmultilista, idHtml:IDACTUALMULTISIMPLE, tipo: 101, watable: $.extend(true, [], objWatable )}); comun
 * watable_MultiListas.push({idMultiLista: subitem.idmultilista, idHtml:IDACTUALMULTIRELACION, tipo: 102, watable: $.extend(true, [], objWatable )}); ext
 */
for (i = 0; i < watable_MultiListas.length; i++) {
    waTableAux = watable_MultiListas[i].watable;
    oBjHidden = {idMultiLista: watable_MultiListas[i].idMultiLista, ids: Array(), reg: Array(), cmod: Array()};
    switch (watable_MultiListas[i].tipo) {
        case 102: /*Multilista Relacionado-Paso Adicional, registros modificados.*/
            var todoSeleccionado = watable_MultiListas[i].todoseleccionado;
            data0 = waTableAux.getDataModif();
            for (j = 0; j < data0.length; j++) {
                oBjHidden.cmod.push(data0[j]);
            }
            
            var data2;
            if(todoSeleccionado=="1"){
                data2 = waTableAux.getData(false,false); 
            }else{
                data2 = waTableAux.getData(true);                 
            }
            
            for (j = 0; j < data2.rows.length; j++) {
                oBjHidden.ids.push(data2.rows[j].id);
            }
            oBjHidden.reg = $.extend(true, [], data2.rows);
            break;
        case 101: /*Multilista Comun*/
            data2 = waTableAux.getData(true); /*Cambiar a True*/
            for (j = 0; j < data2.rows.length; j++) {
                oBjHidden.ids.push(data2.rows[j].id);
            }
            break;
    }

    //_A_getDataModif.push(waTableAux.getDataModif());
    //_A_getRowChecked.push(waTableAux.getRowChecked());
    $("#" + watable_MultiListas[i].idHtml + "-Data").val($.toJSON(oBjHidden));
}
}

function FN14_Guardar() {
    /*Controles y armado inicial*/
    if (bFiltroSeleccionVisible == true)
        return;
    if (user_selecciono == BTN_NINGUNA)
        return;
    /* Para RESULTADO OK*/
    var accion = user_selecciono;
    /*Fin de controles Iniciales */


    /*AGREGAR*/
    if (accion == BTN_AGREGAR) {
        if (this.validarForm(BTN_AGREGAR)) {
            $("#idr").val(0);
            $("#idrp").val(_IdUniquePadre);
            var options = {
                dataType: 'json',
                success: FN14_validarRtaAgregar,
                url: "/getRequest.php?_OutPutStyle_=JSON&reqCat=OPFicha&reqDo=agregarRegistro&_hash_point_=" + hash_point,
                type: "post",
                dataType: "json",
                        error: function() {
                    alert("Ocurrio un error al procesar la solicitud.")
                }
            };

            FN14_ActualizarDataMultilistas();

            $('#formdinamico').ajaxSubmit(options);
         }else user_selecciono = accion;
    }

    /*MODIFICAR*/
    if (accion == BTN_MODIFICAR) {
        if (this.validarForm(BTN_MODIFICAR)) {
            if (_IdUnique == 0) {
                alert("Debe seleccionar algun registro para modificar.");
                return;
            }
            $("#idr").val(_IdUnique);
            $("#idrp").val(_IdUniquePadre);
            var options = {
                dataType: 'json',
                success: FN14_validarRtaModificar,
                url: "/getRequest.php?_OutPutStyle_=JSON&reqCat=OPFicha&reqDo=modificarRegistro&_hash_point_=" + hash_point,
                type: "post",
                dataType: "json",
                        error: function() {
                    alert("Ocurrio un error al procesar la solicitud.")
                }
            };
            
            FN14_ActualizarDataMultilistas();
            
            $('#formdinamico').ajaxSubmit(options);
        }else user_selecciono = accion;
    }
}

function FN14_Cancelar(){
   /*Controles y armado inicial*/
   if(bFiltroSeleccionVisible==true) return;
   if(user_selecciono==BTN_NINGUNA) return;
   FN14_DisableButtonsByAction(BTN_CANCELAR);
   /*Fin de controles Iniciales*/
   this.doForm(FORM_LOCK,FORM_NOTCLEAN,FORM_NOTSAVE,FORM_RESTOREIFSAVED);
}

function FN14_Borrar(){
    if(bFiltroSeleccionVisible==true) return;
    //if(_IdUnique==0){
    if(_IdUnique==0){
         alert("Debe seleccionar algun registro para eliminar.");
         return;
     }
     var y=confirm("Desea eliminar el registro? Esta acción no se puede deshacer.");
     if(y){
         /*Las siguientes dos lineas permiten enviar por submit los idregistros*/
         $("#idr").val(_IdUnique);
         $("#idrp").val(_IdUniquePadre);
         this.doForm(FORM_UNLOCK,FORM_NOTCLEAN,FORM_NOTSAVE,FORM_NOTRESTORE);
         var options = { 
            dataType:  'json', 
            success:   FN14_validarRtaBorrar,
            url: "/getRequest.php?_OutPutStyle_=JSON&reqCat=OPFicha&reqDo=borrarRegistro&_hash_point_="+hash_point,
            type: "post",
            dataType: "json",
            error: function(){alert("Ocurrio un error al procesar la solicitud.")}
           }; 
           $('#formdinamico').ajaxSubmit(options); 
     }
}

function FN14_Modificar(){
   /*Controles y armado inicial*/
   if(bFiltroSeleccionVisible==true) return;
   if(_IdUnique==0){
       alert("Debe seleccionar un registro a modificar.");
       return;
   }
   if(user_selecciono==BTN_MODIFICAR) return;
   FN14_DisableButtonsByAction(BTN_MODIFICAR);
   /*Fin de controles Iniciales*/
   
   /*Apertura de Controles Activos*/
   this.doForm(FORM_UNLOCK,FORM_NOTCLEAN,FORM_SAVE,FORM_NOTRESTORE);
}

function FN14_Agregar(){
   /*Controles y armado inicial*/
   if(bFiltroSeleccionVisible==true) return;
   if(user_selecciono==BTN_AGREGAR) return;
   FN14_DisableButtonsByAction(BTN_AGREGAR);
   /*Fin de controles Iniciales */
    
   /*Limpieza de Formulario y Seteo de Valores por defecto*/  
   this.doForm(FORM_UNLOCK,FORM_CLEAN,FORM_SAVE,FORM_NOTRESTORE);
}

                                                        /*OTROS*/

function FN14_doForm(LOCK, CLEAN, SAVE, RESTOREIFSAVED) {
//Ver la limpieza del dato de referencia, en la parte superior.
    if (SAVE == true && RESTOREIFSAVED == true) {
        alert("Error JS. SAVE = RESTOREIFSAVED = TRUE");
        return;
    }
    if (SAVE == true) {
        if (datosAnteriores.campos) {
            Tool_DestruirArray(datosAnteriores.campos);
        }
        datosAnteriores.idr = 0;
    }
    var _solapaActiva_ = 0;
    obj = this.FN14ficha.metadata;
    var oF = this.FN14ficha;
    var zzz = 1;
    var restoreReg = false;
    if (RESTOREIFSAVED == true && datosAnteriores.idr != 0) {
        _IdUnique=datosAnteriores.idr;
        restoreReg = true;
    }
    if (SAVE == true)
        datosAnteriores.idr = _IdUnique;

    for (var zzz = 0; zzz < obj.length; zzz++) {
        subitem = obj[zzz];
        if (subitem.tipo == '100' && zzz == 0) {
            _solapaActiva_ = 0;
        }
        var sIdMultilista = "";
        var IDACTUAL = 'Solapa' + _solapaActiva_ + '-e' + oF.idesquema + '-' + subitem.id;
        var IDACTUALMULTISIMPLE = 'SolapaMultiSimple' + _solapaActiva_ + '-e' + oF.idesquema + '-' + subitem.ncontrol + "-" + subitem.idmultilista;
        var IDACTUALMULTIRELACION = 'SolapaMultiRelacion' + _solapaActiva_ + '-e' + oF.idesquema + '-' + subitem.ncontrol + "-" + subitem.idmultilista;
        var IDSOLAPACONTENTACTUAL = 'Solapa' + _solapaActiva_ + 'Content';

        switch (subitem.tipo) {
            case '4': //PASSWORD
                Tool_CtrlEnable('vfy-' + IDACTUAL);
                if (CLEAN == true) {
                    $("#vfy-" + IDACTUAL).val("");
                }
                if (LOCK == true || (subitem.eseditable == "0" && oF.esfichaalta == "0"))
                    Tool_CtrlDisable('vfy-' + IDACTUAL);
            case '1': //ENTERO
            case '2': //NUMERICO
            case '5': //TEXTO
            case '3': //FECHA
                if( subitem.novisible == "1")  continue;
                Tool_CtrlEnable(IDACTUAL);
                if (SAVE == true) {
                    datosAnteriores.campos.push({id: IDACTUAL, val: $("#" + IDACTUAL).val(), tipo: subitem.tipo});
                }
                if (CLEAN == true) {
                    /*Analisis del Valor Por Defecto - Menos Password*/
                    if (subitem.valordefault != "" && subitem.tipo != '4')
                        $("#" + IDACTUAL).val(subitem.valordefault);
                    else
                        $("#" + IDACTUAL).val("");
                }
                if (LOCK == true || (subitem.eseditable == "0" && oF.esfichaalta == "0"))
                    Tool_CtrlDisable(IDACTUAL);
                break;
            case '6': //LISTA
                 if( subitem.novisible == "1")  continue;
                Tool_Select2_Enable(IDACTUAL);
                if (subitem.eslistaextendida == "0") {
                    /*Lista Comun*/
                    if (SAVE == true) {
                        datosAnteriores.campos.push({id: IDACTUAL, val: $("#" + IDACTUAL).select2("val"), tipo: subitem.tipo});
                    }
                } else {
                    /*Lista Extendida*/
                    if (SAVE == true) {
                        datosAnteriores.campos.push({id: IDACTUAL, val: $("#" + IDACTUAL).select2("val"), tipo: subitem.tipo});
                    }
                }
                if (CLEAN == true) {
                    if (subitem.eslistaextendida == "0") {
                        /*Lista Comun*/
                        $("#" + IDACTUAL).select2("val", subitem.l_default);
                    } else {
                        /*Lista Extendida*/
                        $("#" + IDACTUAL).select2("val", subitem.l_default);
                    }
                }
                if (LOCK == true || (subitem.eseditable == "0" && oF.esfichaalta == "0"))
                    Tool_Select2_Disable(IDACTUAL);
                break;
            case '101':
                sIdMultilista = IDACTUALMULTISIMPLE;
            case '102':
                sIdMultilista = IDACTUALMULTIRELACION;
                pos = oFuncion.getWatablePosById(sIdMultilista);
                /*
                if(pos!=-1){
                    obj = watable_MultiListas[pos];
                    obj.watable;
                    obj.watable.EditBloqueado(false);

                    if (LOCK == true) obj.watable.EditBloqueado(true);
                }else{
                    alert("Multilista no registrado. Posicion "+pos);
                }
                                    */
                break;
            case '100':
                 if( zzz == 0)  continue;
                _solapaActiva_++;
                break;
        }
    }

    if (restoreReg == true) {
        /* Restauracion de Valores */
        for (var i = 0; i < datosAnteriores.campos.length; i++) {
            o = datosAnteriores.campos[i];
            if (o.tipo == 6) {
                var d = false;
                $("#" + o.id).select2("val", o.val);
            } else {
                $("#" + o.id).val(o.val);
            }
        }
    }

}

function FN14_validarRtaBorrar(data){
    data = oRequest.validarDataJson(data);
    if (data.errorMsj != null) {
          alert("Ocurrio un error al borrar los datos. "+data.errorMsj);
    } else {
        switch(data.status){
        /*Errores*/
        case 0: alert("Sucedio un error grave al intentar realizar la operacion.");break;
        case 9: alert("Se enviaron parámetros incorrectos.");break;
        case -4: alert("No puede modificar este registro.");break;
        case -5: alert("El registro pertenece a una lista extendida cuyo codigo es Valor Por Defecto de algun atributo.");break;
        case -100:
        case -103: alert("Otros registros dependen del que intenta borrar. ");break;
        /*Ok*/
        case 1: 
            if(watable_padre) watable_padre.update();
            if(watable_hija) watable_hija.update();
            activaFiltroSeleccion();
            break;
        default:
             alert("Ha ocurrido un error no contemplado ("+data.status+")");break;
      }
    }
}

function FN14_validarRtaModificar(data){
    user_selecciono = BTN_MODIFICAR;
    data = oRequest.validarDataJson(data);
    if (data.errorMsj != null) {
          alert("Ocurrio un error al modificar los datos."+data.errorMsj);
    } else {
         var nombreCampo="No Definido";
         if(data.campo == null){
            var dcampo = data.campo;
            $.each(oFuncion.FN14ficha.metadata, function(j, subitem) {
               if(subitem.c_nro==dcampo) nombreCampo = subitem.etiqueta;
            });
        }
         var ActIns = "modificar";
            switch(data.status){
                case 0: alert('Error en validacion de datos.');break;
                case 9: alert('Se enviaron parámetros incorrectos.');break;
                case -11: //DATO_NO_ENTERO
                     alert("El campo "+nombreCampo+ " no es Entero");break;
                    break;
                case -13: //DATO_NO_FECHA
                    alert("El campo "+nombreCampo+ " no es fecha");break;
                    break;
                case -12: //DATO_NO_NUMERICO
                    alert("El campo "+nombreCampo+ " no es numerico");break;
                    break;
                case -17: //CONTRASEÑA_INCORRECTA
                    alert("El campo "+nombreCampo+ " contiene una contraseña incorrecta.");break;
                    break;
                case -16: //DATO_NO_LISTA
                    alert("El campo "+nombreCampo+ " no es tipo lista");break;
                    break;
                case -15: //TEXTO_INCORRECTO_SUPERA_LONGITUD
                    alert("El campo "+nombreCampo+ " supera la longitud maxima.");break;
                    break;
                case -20: //CAMPO_OBLIGATORIO
                    alert("El campo "+nombreCampo+ " es obligatorio.");break;
                    break;
                case -21: //CAMPO_NO_EDITABLE
                    alert("El campo "+nombreCampo+ " no es editable.");break;
                    break;
                case -30: //MULTILISTA_CAMPO_OBLIGATORIO
                    alert("El multilista requiere un campo obligatorio.");break;
                    break;
                 case -22: //DATOS_VACIOS
                    alert("No hay modificaciones realizadas.");break;
                    break;
                case -4: alert("No puede modificar este registro.");break;
                case -2: ActIns = "actualizar";
                case -3: 
                    switch(data.tipo){
                    case -99: //ERR_NO_DEFINIDO
                         alert("Existe un error no contemplado al "+ActIns+" el registro.");break;
                        break;
                    case -100: //ERR_INTEGRIDAD_REFERENCIAL
                        alert("Existe un error de integridad referencial al "+ActIns+" el registro.");break;
                        break;
                     case -101: //ERR_GRUPOS_UNIVOCOS
                        alert("Al "+ActIns+" se viola un grupo de atributos univocos.");break;
                        break;
                     case -102: //ERR_GRUPOS_UNIVOCOS
                        alert("Al "+ActIns+" se viola la caracteristica de atributo univoco.");break;
                        break;
                     default: alert("Ocurrio un error al "+ActIns+" los datos.");break;
                    }
                      break;
                case 1: 
                        if(watable_padre) watable_padre.update();
                        if(watable_hija) watable_hija.update();
                        FN14_DisableButtonsByAction(BTN_GUARDAR);
                        oFuncion.doForm(FORM_LOCK,FORM_NOTCLEAN,FORM_NOTSAVE,FORM_NOTRESTORE);
                        user_selecciono = BTN_NINGUNA;
                        break;
                default: alert('Ha ocurrido un error al realizar la acción.');break;
              }
    }
}

function FN14_validarRtaAgregar(data){
    user_selecciono = BTN_AGREGAR;
    data = oRequest.validarDataJson(data);
    if (data.errorMsj != null) {
          alert("Ocurrio un error al borrar los datos."+data.errorMsj);
    } else {
         var nombreCampo="No Definido";
         var dcampo = data.campo;
         $.each(oFuncion.FN14ficha.metadata, function(j, subitem) {
            if(subitem.c_nro==dcampo) nombreCampo = subitem.etiqueta;
         });
        var ActIns="Agregar";
        switch(data.status){
            case 0: alert('Error en validacion de datos.');break;
            case 9: alert('Se enviaron parámetros incorrectos.');break;
            case -4: alert("No tiene permisos para realizar esta acción.");break;
            case -99: //ERR_NO_DEFINIDO
                alert("Existe un error no contemplado al "+ActIns+" el registro.");break;
            case -100: //ERR_INTEGRIDAD_REFERENCIAL
               alert("Existe un error de integridad referencial al "+ActIns+" el registro.");break;
            case -101: //ERR_GRUPOS_UNIVOCOS
               alert("Al "+ActIns+" se viola un grupo de atributos univocos.");break;
            case -102: //ERR_GRUPOS_UNIVOCOS
               alert("Al "+ActIns+" se viola la caracteristica de atributo univoco.");break;
            case -11: //DATO_NO_ENTERO
                alert("El campo "+nombreCampo+ " no es Entero");break;
            case -13: //DATO_NO_FECHA
               alert("El campo "+nombreCampo+ " no es fecha");break;
            case -12: //DATO_NO_NUMERICO
               alert("El campo "+nombreCampo+ " no es numerico");break;
            case -17: //CONTRASEÑA_INCORRECTA
               alert("El campo "+nombreCampo+ " contiene una contraseña incorrecta.");break;
            case -16: //DATO_NO_LISTA
               alert("El campo "+nombreCampo+ " no es tipo lista");break;
            case -15: //TEXTO_INCORRECTO_SUPERA_LONGITUD
               alert("El campo "+nombreCampo+ " supera la longitud maxima.");break;
            case -20: //CAMPO_OBLIGATORIO
               alert("El campo "+nombreCampo+ " es obligatorio.");break;
            case -21: //CAMPO_NO_EDITABLE
               alert("El campo "+nombreCampo+ " no es editable.");break;
            case -22: //DATOS_VACIOS
               alert("Debe especificar algun dato a la ficha.");break;
            default: 
                if(data.status<0) alert('Ha ocurrido un error al realizar la acción.');
                else{
                    if(watable_padre) watable_padre.update();
                    if(watable_hija) watable_hija.update();
                    FN14_DisableButtonsByAction(BTN_GUARDAR);
                    oFuncion.doForm(FORM_LOCK,FORM_NOTCLEAN,FORM_NOTSAVE,FORM_NOTRESTORE);
                    user_selecciono = BTN_NINGUNA;
                    $("#idr").val(data.status);
                }
        }
    }
}

function FN14_validarForm(btn_ACCION) {
    var _solapa = 0;
    var idEsquema = this.FN14ficha.idesquema;
    for (var zzz = 0; zzz < this.FN14ficha.metadata.length; zzz++) {
        var subitem = this.FN14ficha.metadata[zzz];
        /*Si lo primero que hay es una solapa, todo se encapsula en esa y no en la generica*/
        if (subitem.tipo == '100' && zzz != 0) {
            _solapa++;
        }
        if(subitem.tipo == '100' && zzz == 0){
            continue;
        }
        if( subitem.novisible == "1")  continue;
        var premensaje = "El Campo " + subitem.etiqueta;
        var IDACTUAL = 'Solapa' + _solapa + '-e' + idEsquema + '-' + subitem.id;
        /*OBLIGATORIEDAD*/
        
        if (subitem.esobligatorio == '1') {
            var mensaje = " es Obligatorio";
            switch (subitem.tipo) {
                case '1': //ENTERO
                case '2': //NUMERICO
                case '3': //FECHA
                case '4': //PASS
                case '5': //TEXTO
                    if ($("#" + IDACTUAL).val() == "") {
                        $('#a_Solapa' + _solapa).click();
                        $("#" + IDACTUAL).focus();
                        alert(premensaje + mensaje);
                        user_selecciono = btn_ACCION;
                        return false;
                    }
                    break;
                case '6':
                    if ($("#" + IDACTUAL).val() == "" && subitem.eslistaextendida == 1) {
                        $('#a_Solapa' + _solapa).click();
                        $("#" + IDACTUAL).focus();
                        alert(premensaje + mensaje);
                        user_selecciono = btn_ACCION;
                        return false;
                    }
                    if ($("#" + IDACTUAL).val() == "S" && subitem.eslistaextendida == 0) {
                        $('#a_Solapa' + _solapa).click();
                        $("#" + IDACTUAL).focus();
                        alert(premensaje + mensaje);
                        user_selecciono = btn_ACCION;
                        return false;
                    }
                    break;
            }
        }
        /*ANALISIS DE TIPO*/
        /*Si no es obligatorio puede guardarse un campo vacio*/
        //if( a != "" && a != null){
        switch (subitem.tipo) {
            case '1': //ENTERO
                if (subitem.esautoincremental == 1) {
                    /*No hay control sobre este tipo de campo.*/
                    $("#" + IDACTUAL).val("Autoincremental");
                    break;
                }
                $("#" + IDACTUAL).val(trim($("#" + IDACTUAL).val()));
                var max = 999999999;
                var min = -999999999;
                var a = $("#" + IDACTUAL).val();
                /*
                if (Tool_esEntero(a) != true && $("#" + IDACTUAL).val() != "") {
                    $('#a_Solapa' + _solapa).click();
                    $("#" + IDACTUAL).focus();
                    alert(premensaje + " debe ser un numero entero");
                    user_selecciono = btn_ACCION;
                    return false;
                }
                if (a > max || a < min) {
                    $('#a_Solapa' + _solapa).click();
                    $("#" + IDACTUAL).focus();
                    alert(premensaje + " debe ser un numero entero entre " + min + " y " + max);
                    user_selecciono = btn_ACCION;
                    return false;
                }
                        */
                break;
            case '2': //NUMERICO
                $("#" + IDACTUAL).val(trim($("#" + IDACTUAL).val()));
                if ($("#" + IDACTUAL).val() != '' && !Tool_esNumerico($("#" + IDACTUAL).val())) {
                    $('#a_Solapa' + _solapa).click();
                    $("#" + IDACTUAL).focus();
                    alert(premensaje + " no debe poseer letras ni comas. Utilize un punto. Maximo [17 parte entera].[2 parte decimal]");
                    user_selecciono = btn_ACCION;
                    return false;
                }
                break;
            case '4': //PASS
                var max = subitem.longitud;
                var l = $("#" + IDACTUAL).val().length;
                if (l > max) {
                    // $('#a_Solapa'+_solapa).click();
                    //  $( "#"+IDACTUAL ).focus();
                    // alert(premensaje+" tiene "+l+" caracteres y se definio una longitud maxima de "+max+" caracteres.");
                    //  ret = false;
                    var a = 1;
                }
                else if ($("#" + IDACTUAL).val() != $("#vfy-" + IDACTUAL).val()) {
                    $('#a_Solapa' + _solapa).click();
                    $("#vfy-" + IDACTUAL).focus();
                    alert(premensaje + " no coincide con su verificacion");
                    user_selecciono = btn_ACCION;
                    return false;
                }

                break;
            case '5': //TEXTO
                $("#" + IDACTUAL).val(trim($("#" + IDACTUAL).val()));
                var max = subitem.longitud;
                var l = $("#" + IDACTUAL).val().length;
                if (l > max) {
                    $('#a_Solapa' + _solapa).click();
                    $("#" + IDACTUAL).focus();
                    alert(premensaje + " tiene " + l + " caracteres y se definio una longitud maxima de " + max + " caracteres.");
                    user_selecciono = btn_ACCION;
                    return false;
                }

                break;
            case '3': //FECHA
                $("#" + IDACTUAL).val(trim($("#" + IDACTUAL).val()));
                var fecha = $("#" + IDACTUAL).val();
                if (Tool_esFecha(fecha) == false && fecha != "") {
                    $('#a_Solapa' + _solapa).click();
                    $("#" + IDACTUAL).focus();
                    alert(premensaje + "debe ser del tipo dd/mm/aaaa. Ej. 02/02/2013.");
                    user_selecciono = btn_ACCION;
                    return false;
                }
                break;
        }
    }
    return true;
}

function FN14_getDataPivote() {
	// Indicador si esta la tabla visible 
        if(this.FN14ficha.idficha==null){
            alert("Error en ficha.");
            return;
        }
        
        var iControl = this.itemEjecucion;
            
	bHayDatosEnTabla = true;
        
        var myDefParam = {

		urlPedido : '', // fuente de datos
		urlData : '',
		urlPedidoHijo : '', // fuente de datos para tabla hija
		urlDataHijo : '',	

		infoAccesoHijo : '', // notifica al usuario que para ver datos del hijo debe hacer dblclick 

		idDIV : 'tablaFiltroSeleccion', // referencia al objeto a crear
		idTBL : 'tblPivote', // id del TABLE 
		btnSiguiente : 'btnFichaSig', // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		btnAnterior : 'btnFichaAnt', // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		filterViewDefault : '', // ( '' o checked o unchecked ) filtro por defecto con el que se despliega inicialmente la tabla
		idViewAll : '', // all - id del boton para filtrar la vista "ver Todos"
		idViewSelect : '', // checked - id del boton para filtrar la vista "ver Seleccionados"
		idViewNotSelect : '', // unchecked - id del boton para filtrar la vista "ver No Seleccionados"
		checkboxes : false, //Make rows checkable. (Note. You need a column with the 'unique' property)
		filasPorDefecto : 15,
		enPivote : true, // Controla la visualizacion de los datos de referencia sobre la tabla pivote
		filter : true,
		columnPicker : true,
		itemaction : false,
		actions : {//This generates a button where you can add elements.
			filter : true, //If true, the filter fields can be toggled visible and hidden.
			columnPicker : true, //if true, the columnPicker can be toggled visible and hidden.
			custom : [	//Add any other elements here. Here is a refresh and export example.
				$('<a href="#" class="refresh"><i class="icon-refresh"></i>&nbsp;Actualizar vista</a>')
				//	, $('<a href="#" class="export_all"><i class="icon-share"></i>&nbsp;Exportar todas las filas</a>')
				//	, $('<a href="#" class="export_checked"><i class="icon-share"></i>&nbsp;Exportar filas seleccionadas</a>')
				//	, $('<a href="#" class="export_filtered"><i class="icon-share"></i>&nbsp;Exportar filas filtradas</a>')
			]
		}		
	};
        
        
        if(this.FN14ficha.espadre=="1" && this.FN14ficha.pivotesup=="0"){
            myDefParam.urlData={ 
					reqCat: "OPFicha", 
					reqDo: "getInfoPivote",
					_OutPutStyle_: "JSON", 
					_hash_point_: hash_point // esta la defini en el head del index.html
				};
             myDefParam.urlPedido = '/getRequest.php';
             if( iControl != this.itemEjecucion ) return false;
             watable_padre =  tblMake( myDefParam );
        }else{
             myDefParam.urlData={ 
					reqCat: "OPFicha", 
					reqDo: "getInfoPivote",
					_OutPutStyle_: "JSON", 
					_hash_point_: hash_point // esta la defini en el head del index.html
				};
             myDefParam.urlPedido = '/getRequest.php';
             myDefParam.urlDataHijo={ 
					reqCat: "OPFicha", 
					reqDo: "getInfoPivote",
					_OutPutStyle_: "JSON", 
					_hash_point_: hash_point // esta la defini en el head del index.html
				};
             myDefParam.urlPedidoHijo = '/getRequest.php';
             myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; 
             if( iControl != this.itemEjecucion ) return false;
             watable_hija =  tblMake( myDefParam );
        }
        canClick=true;
}

function FN14_setMetadataFicha(data,oF){
    var iControl = oF.itemEjecucion;
    if (data.errorMsj != null) {
        alert("Error al procesar la ficha: "+data.errorMsj);
        return;
    }    
    obj=data.DT_METADATAFICHA.rows;
    oRow=data.DT_INFOFICHA.rows[0];
    if(!oF) {
        alert("Error al visualizar la ficha.");
        return;
    }
  
    oF.FN14ficha.idficha=oRow.idficha;
    oF.FN14ficha.pivotesup=oRow.pivotesup;
    oF.FN14ficha.nombreficha=oRow.nombreficha;
    oF.FN14ficha.idesquema=oRow.idesquema;
    oF.FN14ficha.espadre=oRow.espadre;
    oF.FN14ficha.idesquemapadre=oRow.idesquemapadre;
    oF.FN14ficha.esfichaalta=oRow.esfichaalta;
    oF.FN14ficha.fichaalta=oRow.fichaalta;
    oF.FN14ficha.nombreentidadpadre=oRow.nombreentidadpadre;
    oF.FN14ficha.nombreentidadpropia=oRow.nombreentidadpropia;
    oF.p_agregar=(oRow.p_agregar=="1"?true:false);
    oF.p_borrar=(oRow.p_borrar=="1"?true:false);
    oF.p_modificar=(oRow.p_modificar=="1"?true:false);
    oF.FN14ficha.nombrecampopivotepadre=oRow.nombrecampopivotepadre;
    oF.FN14ficha.nombrecampopivotehijo=oRow.nombrecampopivotehijo;
    oF.FN14ficha.cant_campos_ficha=oRow.cant_campos_ficha;
    oF.FN14ficha.metadata= $.extend(true, [], obj);
    var count = data.DT_METADATAFICHA.rowscount;
    for (var zzz = 0; zzz < obj.length; zzz++){
        var subitem = obj[zzz];
        if( iControl != oF.itemEjecucion ) return false;
        var registro="";
        var hasMask=0;
        var MaskCodificado="";
        var MaskClass="";
        
        /*Si lo primero que hay es una solapa, todo se encapsula en esa y no en la generica*/
        if(subitem.tipo == '100' && zzz == 0){
            Tool_DestruirArray(solapasActivas);
            solapasActivas = Array();
            solapasActivas.push({id:'',descripcion:subitem.solapa});
            solapaActiva=0;
        }
        
        if( zzz==0 ){
            /*Lo primero que hacemos es agregar la solapa*/
            $("#myTab2").append('<li id="li_Solapa'+solapaActiva+'" ><a id="a_Solapa'+solapaActiva+'" data-toggle="tab" href="#Solapa'+solapaActiva+'">'+solapasActivas[solapaActiva].descripcion+'</a></li>');
            $("#div-tab-content").append('<div id="Solapa'+solapaActiva+'" class="tab-pane in active"><div class="slim-scroll" data-height="425"><span id="Solapa'+solapaActiva+'Content"></span></div>');
            $('#li_Solapa'+solapaActiva).addClass("active");
            $('#a_Solapa'+solapaActiva).click();
        }
        
        var IDACTUAL = 'Solapa'+solapaActiva+'-e'+oF.FN14ficha.idesquema+'-'+subitem.id;
        var IDACTUALMULTISIMPLE='SolapaMultiSimple'+solapaActiva+'-e'+oF.FN14ficha.idesquema+'-'+subitem.ncontrol+"-"+subitem.idmultilista;
        var IDACTUALMULTIRELACION='SolapaMultiRelacion'+solapaActiva+'-e'+oF.FN14ficha.idesquema+'-'+subitem.ncontrol+"-"+subitem.idmultilista;
        var IDSOLAPACONTENTACTUAL = 'Solapa'+solapaActiva+'Content';

        if(subitem.tipo!="100"){
            if(subitem.mascara!=""){
                hasMask=1;
                MaskCodificado=subitem.mascara;
                MaskClass="input-mask-numero-"+subitem.id;
                maskDefs.push({id:IDACTUAL, mascara:subitem.mascara});
            }
        }
        
        switch(subitem.tipo){
            case '1': //ENTERO
            case '2': //NUMERICO
                if( subitem.novisible == "1")  continue;
                registro = '\n\
                            <div class="control-group" style="width: 100%;float: left;"> \n\
                                <label for="'+IDACTUAL+'" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">\n\
                                    '+subitem.etiqueta+(subitem.esobligatorio=='1' && subitem.eseditable == '1'?'<small class="text-error">*</small>':'')+'\n\
                                    '+(hasMask==1?'<small class="text-warning">'+MaskCodificado+'</small>':'')+'\n\
                                </label>\n\
                                <div class="input-prepend">\n\
                                    <span class="input-icon">\n\
                                        <input class="input-large '+(hasMask==1?MaskClass:'')+'" type="text" maxlength="'+subitem.longitud+'" '+(subitem.valordefault != ''?'value="'+subitem.valordefault+'"':'')+' id="'+IDACTUAL+'" name="'+IDACTUAL+'" />\n\
                                        <i class="'+(subitem.eseditable == "0"?'icon-ban-circle':subitem.deschtml_icono)+'"></i>\n\
                                    </span>\n\
                                </div>\n\
                            </div>\n\
                            ';
                /*
                    if(subitem.esautoincremental == 1){
                        itemcampo = itemcampo + "<input type=\"hidden\" name=\""+subitem.id+"\" id=\""+subitem.id+"\" value=\"0\" /> ";
                        itemcampo = itemcampo + "<input disabled=\"true\" "; 
                        itemcampo = itemcampo + " value=\""+gMsj(20046)+"\" ";
                        itemcampo = itemcampo + " type=\"text\" class=\"sinide_form_TEXT\" name=\"AUTOINCREMENTAL_"+subitem.id+"\" id=\"AUTOINCREMENTAL_"+subitem.id+"\" />";
                        break;
                    }
                */
               
            break;
            case '3': //FECHA
                if( subitem.novisible == "1")  continue;
                registro = '\n\
                            <div class="control-group" style="width: 100%;float: left;">\n\
                                <label for="'+IDACTUAL+'" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">\n\
                                    '+subitem.etiqueta+(subitem.esobligatorio=='1' && subitem.eseditable == '1'?'<small class="text-error">*</small>':'')+'\n\
                                    '+(hasMask==1?'<small class="text-warning">'+MaskCodificado+'</small>':'')+'\n\
                                </label>\n\
                                <div class="input-append">\n\
                                    <span class="input-icon">\n\
                                        <input class="input-large" type="text" '+(subitem.valordefault != ''?'value="'+subitem.valordefault+'"':'')+'  id="'+IDACTUAL+'" name="'+IDACTUAL+'" />\n\
                                        <i class="icon-calendar"></i>\n\
                                    </span>\n\
                                </div>\n\
                            </div>\n\
                            ';
                   break;
            case '4': //PASSWORD
                if( subitem.novisible == "1")  continue;
                registro = '\n\
                            <div class="control-group" style="width: 100%;float: left;">\n\
                                <label for="'+IDACTUAL+'" class="control-label" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">'+subitem.etiqueta+(subitem.esobligatorio=='1'?'<small class="text-error">*</small>':'')+'</label>\n\
                                <div class="controls" style="">\n\
                                    <span class="input-icon">\n\
                                        <input class="input-large" id="'+IDACTUAL+'" name="'+IDACTUAL+'" maxlength="'+subitem.longitud+'" type="text" '+(subitem.valordefault != ''?'value="'+subitem.valordefault+'"':'')+'>\n\
                                        <i class="'+(subitem.eseditable == "0"?'icon-ban-circle':subitem.deschtml_icono)+'"></i>\n\
                                    </span>\n\
                                </div>\n\
                            </div>\n\
                            <div class="control-group" style="width: 100%;float: left;">\n\
                                <label for="'+IDACTUAL+'" class="control-label" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">Verifique<small class="text-error">*</small></label>\n\
                                <div class="controls" style="">\n\
                                    <span class="input-icon">\n\
                                        <input class="input-large" id="vfy-'+IDACTUAL+'" name="vfy-'+IDACTUAL+' maxlength="'+subitem.longitud+'" type="text" '+(subitem.valordefault != ''?'value="'+subitem.valordefault+'"':'')+'>\n\
                                        <i class="'+(subitem.eseditable == "0"?'icon-ban-circle':subitem.deschtml_icono)+'"></i>\n\
                                    </span>\n\
                                </div>\n\
                            </div>';
                    break;
            case '5': //TEXTO
                if( subitem.novisible == "1")  continue;
                if(subitem.textarea == "0"){
                    registro = '\n\
                            <div class="control-group" style="width: 100%;float: left;">\n\
                                <label for="'+IDACTUAL+'" class="control-label" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">'+subitem.etiqueta+(subitem.esobligatorio=='1' && subitem.eseditable == '1'?'<small class="text-error">*</small>':'')+'\n\
                                    '+(hasMask==1?'<small class="text-warning">'+MaskCodificado+'</small>':'')+'\n\
                                </label>\n\
                                <div class="controls" style="">\n\
                                    <span class="input-icon">\n\
                                        <input class="input-large '+(hasMask==1?MaskClass:'')+'" id="'+IDACTUAL+'" name="'+IDACTUAL+'" maxlength="'+subitem.longitud+'" type="text" '+(subitem.valordefault != ''?'value="'+subitem.valordefault+'"':'')+'>\n\
                                        <i class="'+(subitem.eseditable == "0"?'icon-ban-circle':subitem.deschtml_icono)+'"></i>\n\
                                    </span>\n\
                                </div>\n\
                            </div>';
                }else{
                     registro = '\n\
                            <div class="control-group" style="width: 100%;float: left;">\n\
                                <label for="'+IDACTUAL+'" class="control-label" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">'+subitem.etiqueta+(subitem.esobligatorio=='1' && subitem.eseditable == '1'?'<small class="text-error">*</small>':'')+'</label>\n\
                                <div class="controls" style="">\n\
                                    <span class="input-icon">\n\
                                        <textarea class="autosize-transition limited input-xlarge" maxlength="'+subitem.longitud+'" data-maxlength="'+subitem.longitud+'" id="'+IDACTUAL+'" name="'+IDACTUAL+'" type="text" '+(subitem.valordefault != ''?'value="'+subitem.valordefault+'"':'')+'></textarea>\n\
                                        <i class="'+(subitem.eseditable == "0"?'icon-ban-circle':subitem.deschtml_icono)+'"></i>\n\
                                    </span>\n\
                                </div>\n\
                            </div>';
                }
                    break;
            case '6': //LISTA
                if( subitem.novisible == "1")  continue;
                    if(subitem.eslistaextendida==0){
                        
                        registro = '\n\
                        <div class="control-group" style="width: 100%;float: left;">\n\
                            <label for="'+IDACTUAL+'" class="control-label" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">'+subitem.etiqueta+(subitem.esobligatorio=='1' && subitem.eseditable == '1'?'<small class="text-error">*</small>':'')+'</label>\n\
                            <div class="controls" style="">\n\
                                <span class="input-icon">\n\
                                    <input type="hidden" id="'+IDACTUAL+'" name="'+IDACTUAL+'" class="input-icon input-large search-query" style="width:242px;"/>\n\
                                    <i class="'+(subitem.eseditable == "0"?'icon-ban-circle':subitem.deschtml_icono)+'"></i>\n\
                                </span>\n\
                            </div>\n\
                        </div>\n\
                        ';
                                    
                    }else{
                        
                        registro = '\n\
                        <div class="control-group" style="width: 100%;float: left;">\n\
                            <label for="'+IDACTUAL+'" class="control-label" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;">'+subitem.etiqueta+(subitem.esobligatorio=='1' && subitem.eseditable == '1'?'<small class="text-error">*</small>':'')+'</label>\n\
                            <div class="controls" style="">\n\
                                <span class="input-icon">\n\
                                    <input type="hidden" id="'+IDACTUAL+'" name="'+IDACTUAL+'" class="input-icon input-large search-query" style="width:242px;"/>\n\
                                    <i class="'+(subitem.eseditable == "0"?'icon-ban-circle':subitem.deschtml_icono)+'"></i>\n\
                                </span>\n\
                            </div>\n\
                        </div>\n\
                        ';
                    }
                    break;
              case '100':
                if(zzz == 0) continue;
                  /*Nuevo Corte Solapa*/
                solapasActivas.push({id:'',descripcion:subitem.solapa});
                $('#li_Solapa'+solapaActiva).removeClass("active");
                solapaActiva=solapaActiva+1;
                $("#myTab2").append('<li id="li_Solapa'+solapaActiva+'"><a id="a_Solapa'+solapaActiva+'" data-toggle="tab" href="#Solapa'+solapaActiva+'">'+solapasActivas[solapaActiva].descripcion+'</a></li>');
                $("#div-tab-content").append('<div id="Solapa'+solapaActiva+'" class="tab-pane in active"><div class="slim-scroll" data-height="425"><span id="Solapa'+solapaActiva+'Content"></span></div>');
                $('#li_Solapa'+solapaActiva).addClass("active");
                break;
              case '101':
                /*Multilistas Simple*/
                  if( subitem.idmultilista != '0'){
                      registro = '\n\
                        <div class="control-group" style="float: left;padding-left: 20%; padding-right: 20%; width: auto;">\n\
                            <div id="'+IDACTUALMULTISIMPLE+'" class="widget-box transparent collapsed" style="width: auto;"> <!-- collapsed -->\n\
                                <div class="widget-header" style="border-width: 0 0 0;">\n\
                                    <label style="padding-top: 0.5%; padding-right: 5px;color: #393939;">'+subitem.etiqueta+(subitem.esobligatorio=='1'?'<small class="text-error">*</small>':'')+'</label>\n\
                                    <div class="widget-toolbar">\n\
                                        <a href="#" data-action="collapse" style="margin-right: 10px; display:inherit"><i class="icon-chevron-up"></i></a>\n\
                                        <button class="btn btn-mini bigger dropdown-toggle" data-toggle="dropdown">Vista<i class="icon-angle-down icon-on-right"></i></button>\n\
                                        <ul class="dropdown-menu pull-right dropdown-caret dropdown-close">\n\
                                            <li><a class="verSeleccionados" href="#">Seleccionados</a></li>\n\
                                            <li><a class="verNoSeleccionados" href="#">No seleccionados</a></li>\n\
                                            <li><a class="verTodos" href="#">Todos</a></li>\n\
                                            <li class="divider"></li>\n\
                                            <li><a href="#">salir</a></li>\n\
                                        </ul>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="widget-body">\n\
                                    <div class="widget-main ME_tblMultiLista" style="text-align: right; ">\n\
                                        <p >Cuadro de selección...</p>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                        <input id="'+IDACTUALMULTISIMPLE+'-Data" type="hidden" value="" name="'+IDACTUALMULTISIMPLE+'-Data">\n\
                        ';
                  }
                  break;
            case '102':
                /*Multilistas Relacion*/
                  if( subitem.idmultilista != '0'){
                      registro = '\n\
                        <div class="control-group" style="float: left;padding-left: 20%; padding-right: 20%; width: auto;">\n\
                            <div id="'+IDACTUALMULTIRELACION+'" class="widget-box transparent collapsed" style="width: auto;"> <!-- collapsed -->\n\
                                <div class="widget-header" style="border-width: 0 0 0;">\n\
                                     <label style="padding-top: 0.5%; padding-right: 5px;color: #393939;">'+subitem.etiqueta+(subitem.esobligatorio=='1'?'<small class="text-error">*</small>':'')+'</label>\n\
                                     <div class="widget-toolbar">\n\
                                         <a href="#" data-action="collapse" style="margin-right: 10px; display:inherit"><i class="icon-chevron-up"></i></a>\n\
                                         <button class="btn btn-mini bigger dropdown-toggle" data-toggle="dropdown">Vista<i class="icon-angle-down icon-on-right"></i></button>\n\
                                         <ul class="dropdown-menu pull-right dropdown-caret dropdown-close">\n\
                                             <li><a class="verSeleccionados" href="#">Seleccionados</a></li>\n\
                                             <li><a class="verNoSeleccionados" href="#">No seleccionados</a></li>\n\
                                             <li><a class="verTodos" href="#">Todos</a></li>\n\
                                             <li class="divider"></li>\n\
                                             <li><a href="#">salir</a></li>\n\
                                         </ul>\n\
                                     </div>\n\
                                 </div>\n\
                                <div class="widget-body">\n\
                                    <div class="widget-main ME_tblMultiLista" style="text-align: right; ">\n\
                                        <p >Cuadro de selección...</p>\n\
                                    </div>\n\
                                </div>\n\
                        </div>\n\
                        <input id="'+IDACTUALMULTIRELACION+'-Data" type="hidden" value="" name="'+IDACTUALMULTIRELACION+'-Data">\n\
                        ';
                  }
                  break;
            default: 
                registro = '\n\
                        <div class="control-group" style="width: 100%;float: left;">\n\
                            <label for="CAMPO_NO_SOPORTADO.ERROR" class="control-label" style="width: 40%; float: left; text-align:right; padding-top: .5%; padding-right: 5px;"><small class="text-error">"CAMPO_NO_SOPORTADO.ERROR"</small></label>\n\
                            <div class="controls" style="">\n\
                                <span class="input-icon">\n\
                                    <input type="hidden" id="CAMPO_NO_SOPORTADO.ERROR" name="CAMPO_NO_SOPORTADO.ERROR" class="input-icon input-large search-query" style="width:242px;"/>\n\
                                </span>\n\
                            </div>\n\
                        </div>\n\
                        ';
                  break;
        }
        if( iControl != oF.itemEjecucion ) return false;
        
        //Agregacion del control.
        if(subitem.tipo!="100"){
            $("#"+IDSOLAPACONTENTACTUAL).append(registro);
        }
        
        //CONFIGURACION DEL LISTAS
        switch(subitem.tipo){
            case '1': //ENTERO
            case '2': //NUMERICO
            case '5': //TEXTO
            case '3': //FECHA
            case '4': //PASS
            break;
            case '6': //LISTA
                if (subitem.eslistaextendida == 0){
                         var dataItemsLista = Array();
                         for (i=0; i<subitem.c_jsonval.length;i++){
                             dataItemsLista.push({id:subitem.c_jsonval[i].id,tag:subitem.c_jsonval[i].valor});
                         }
                         $( '#'+IDACTUAL).select2({
                             data:{ more: false, results: dataItemsLista, text: 'tag' },
                             formatSelection: format,
                             formatResult: format
                         });
                         $( "#"+IDACTUAL ).select2("val",subitem.l_default); 
                }else if (subitem.eslistaextendida == 1) {
                    //Traemos los datos de la lista con su filtro
                    oF.FN14_getListaItems(IDACTUAL,subitem.id,subitem.l_default);
                }
                break;
           case '101': 
                var myMultiSelect = { 
                     ctrlWeb : IDACTUALMULTISIMPLE, 
                     urlPedido : "/getRequest.php", 
                     urlData: { reqCat: "OPFicha", reqDo: "getMultiListaSimple", multi:subitem.idmultilista, item:0, fi: subitem.ncontrol ,_hash_point_:hash_point, _OutPutStyle_: "JSON" },
                     filterViewDefault : (subitem.mm_filterviewdefault=="0"?'':subitem.mm_filterviewdefault=="1"?'chequed':subitem.mm_filterviewdefault=="2"?'unchecked':''),
                     checkboxes : (subitem.mm_p_seleccionar=="1"?true:false),
                     filasPorDefecto : parseInt(subitem.mm_filaspordefecto), 
                     filter : (subitem.mm_filter=="1"?true:false),
                     columnPicker : (subitem.mm_columnPicker=="1"?true:false)//,
                     //editBloqueado : true
                 };	
                 var objWatable = tblMultiSelect( myMultiSelect );
                 /*RECORDAR: Toda modificacion, agregado de atributos impacta directamente en me.js linea 454 actualizarDatosEnFicha, en la reconstruccion del watable en cada clic en cada fila*/
                 watable_MultiListas.push({idMultiLista: subitem.idmultilista, tieneLista: false, idHtml:IDACTUALMULTISIMPLE, tipo: 101, todoseleccionado: "0", mm_filterViewDefault: subitem.mm_filterviewdefault, mm_p_seleccionar: subitem.mm_p_seleccionar,  mm_filaspordefecto: subitem.mm_filaspordefecto, mm_filter: subitem.mm_filter, mm_columnPicker: subitem.mm_columnPicker, watable: objWatable});
                 break;
           case '102': 
                 var myMultiSelect = { 
                     ctrlWeb : IDACTUALMULTIRELACION, 
                     urlPedido : "/getRequest.php", 
                     urlData: { reqCat: "OPFicha", reqDo: "getMultiListaRelacion", multi:subitem.idmultilista, item:0, fi: subitem.ncontrol ,_hash_point_:hash_point, _OutPutStyle_: "JSON" },
                     filterViewDefault : (subitem.mm_filterviewdefault=="0"?'':subitem.mm_filterviewdefault=="1"?'chequed':subitem.mm_filterviewdefault=="2"?'unchecked':''),
                     checkboxes : (subitem.mm_p_seleccionar=="1"?true:false),
                     filasPorDefecto : parseInt(subitem.mm_filaspordefecto), 
                     filter : (subitem.mm_filter=="1"?true:false),
                     columnPicker : (subitem.mm_columnPicker=="1"?true:false)//,
                     //editBloqueado : true
                 };	
                 var objWatable = tblMultiSelect( myMultiSelect );
                 var tieneLista = (subitem.mm_conlista=="1"?true:false);
                 /*RECORDAR: Toda modificacion, agregado de atributos impacta directamente en me.js linea 454 actualizarDatosEnFicha, en la reconstruccion del watable en cada clic en cada fila*/
		 watable_MultiListas.push({idMultiLista: subitem.idmultilista,tieneLista: tieneLista,idHtml:IDACTUALMULTIRELACION, tipo: 102, todoseleccionado: subitem.mm_todoseleccionado, mm_filterViewDefault: subitem.mm_filterviewdefault, mm_p_seleccionar: subitem.mm_p_seleccionar,  mm_filaspordefecto: subitem.mm_filaspordefecto, mm_filter: subitem.mm_filter, mm_columnPicker: subitem.mm_columnPicker, watable: objWatable});
                break;
        }
        
        //CONFIGURACION DEL DATEPICKER Y TRANSICION
        switch(subitem.tipo){
            case '1': //ENTERO
            case '2': //NUMERICO
            case '5': //TEXTO
                 if(subitem.textarea == "1"){
                     $('#'+IDACTUAL).autosize();
                     $('#'+IDACTUAL).inputlimiter({
                                "limit": (parseInt(subitem.longitud) || 100),
                                remText: '%n caractere%s restantes...',
                                limitText: 'máximos permitidos: %n.'
                        });
                 }
            break;
            case '3': //FECHA
                $( '#'+IDACTUAL ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showOn: "button",
                    buttonImageOnly: true,
                    format: "dd/mm/yyyy",
                    language: "es-ES"
                });
                 $(  '#'+IDACTUAL ).datepicker( "option", "dateFormat", "dd/mm/yyyy" );
            break;
            case '6': //LISTA
            break;
        }
        
        /*Bloqueo del Control*/
        switch(subitem.tipo){
            case '4': //PASS
                Tool_CtrlDisable('vfy-'+IDACTUAL);
            case '1': //ENTERO
            case '2': //NUMERICO
            case '3': //FECHA
            case '5': //TEXTO
                Tool_CtrlDisable(IDACTUAL);
            break;
            case '6': //LISTA
                /*La Lista Extendida, tiene su delay al cargar los datos. La desabilitamos en esa instancia.*/
                Tool_Select2_Disable(IDACTUAL);
            break;
        }
 
    }
        /*Se proceso todo*/
        $('#a_Solapa0').click();
        // $("#FiltroModal").empty().append($('#ID_To_FiltroModal'));

        // Cierra la barra de botones si esta abierta
        if (bSettingsBoxOpen) {
            SettingsBoxOpen($("#ME-settings-btn"));
        }

        widget_boxes();

        // Indicador su esta la tabla visible
        bHayDatosEnTabla = false;

       // scrollables zona de filtro
        $('.slim-scroll-filtro').each(function () {
                var $this = $(this);
                $this.slimScroll({
                        height: $this.data('height') || 195,
                        railVisible:true
                });
        });

        // scrollables zona formulario de carga
        $('.slim-scroll').each(function () {
                var $this = $(this);
                $this.slimScroll({
                        height: $this.data('height') || nZonaCargaDP,
                        railVisible:true
                });
        });


        // Determino las alturas para la ventana de carga, utilizo '#Solapa1' dado que siempre esta presente
        nZonaFiltroDP = $('#ZonaDeFiltroSeleccion').css('height').replace('px','');
        nZonaCargaDP = $('#Solapa0 .slimScrollDiv').css('height').replace('px','');

        $(".chzn-select").chosen();
        $(".chzn-select-deselect").chosen({allow_single_deselect: true});

        if(maskDefs.length!=0){
            $.mask.definitions['~'] = '[+-]';
            for(i=0; i<maskDefs.length;i++){
                var oM = maskDefs[i];
                $('#'+oM.id).mask(oM.mascara);
            }
        }
        oFuncion.FN14_getDataPivote();
        oF.startButtons();
        
        /*Con esto, una vez generado el watable padre. Si tiene un registro solo, va directamente a la ficha*/
        if(!watable_hija && watable_padre){ //Solo si es un formulario con watable padre
            CHECK_WATABLE = watable_padre;
            CHECK_WATABLE_ROWS_COUNT = 1;
            CHECK_WATABLE_ROWS_FUNCTION = byPassWatable;
        }
}

function FN14__setListaItems(data,IDACTUAL,l_default){
   var dataItemsLista = Array();
   if (data.errorMsj != null) {
        //alert("Sucedio un error al cargar valores de la lista extendida: " + data.errorMsj);
   } else {
       for (i=0; i<data.length;i++){
            dataItemsLista.push({id:data[i].id,tag:data[i].valor});
        }
   }
        $( '#'+IDACTUAL).select2({
         data:{ more: false, results: dataItemsLista, text: 'tag' },
         formatSelection: format,
         formatResult: format
     });
     Tool_Select2_Disable(IDACTUAL);
      $( "#"+IDACTUAL ).select2("val",l_default); 
}

function FN14_getListaItems(IDACTUAL,itemid){
    var parametrosPost = {reqCat: "OPFicha", reqDo: "getListaItems", item:itemid, _hash_point_:hash_point};
    var parametrosUrl = "";
    oRequest.makeRequestPostJson(parametrosPost, parametrosUrl, FN14__setListaItems,IDACTUAL);
}

function reloadFN14(objA,idRef,oF) {
    var iControl = oF.itemEjecucion;
    $("#ID_ZoneLoadData").load("web/FN14.html", function(responseText, statusText, xhr)
    {
        if (statusText == "success") {
            getBreadCrumByIdTagA(objA.attr("id"), menu1Pos); /*breadcrums*/
            $("#page-content").empty().append($('#ID_To_PageContent'));
            $('#BOARDTitulo').html(objA.attr("titulo"));
            $('#BOARDDescripcion').html(objA.attr("descripcion"));


            /*Metadata de Ficha*/
            if( iControl != oF.itemEjecucion ) return false;
            parametrosPost = {reqCat: "OPFicha", reqDo: "getMDFicha", idf:idRef, _hash_point_:hash_point};
            var parametrosUrl = "";
            oRequest.makeRequestPostJson(parametrosPost, parametrosUrl, FN14_setMetadataFicha,oF);
         }
        if (statusText == "error")
            alert("An error occurred: " + xhr.status + " - " + xhr.statusText);
    });
}

function Funcion() {
    this.itemEjecucion = null;
    this.p_agregar = false;
    this.p_modificar = false;
    this.p_borrar = false;
    this.setInicial = setInicial;
    this.cleanFN = cleanFN;
    this.startButtons = startButtons;
    this.watableCreado = watableCreado;
  
    /*Comunes*/
    this.validarForm = function(){};
    this.borrar = function(){};
    this.modificar = function(){};
    this.agregar = function(){};
    this.guardar = function(){};
    this.cancelar = function(){};
    this.doForm = function(){};
    this.validarRtaBorrar = function(){};
    this.validarRtaModificar = function(){};
    this.validarRtaAgregar = function(){};
    this.getWatablePosById = FN14_getWatablePosById;
   
    /*Inicio*/
    this.showInicio = showInicio;
    
    /*Funcion OP Ficha*/
    this.showFN14 = showFN14;
    this.processFN14 = processFN14;
    this.FN14ficha = null;
    this.FN14_getDataPivote = FN14_getDataPivote;
    this.FN14_getListaItems = FN14_getListaItems;
}

oFuncion = new Funcion();
