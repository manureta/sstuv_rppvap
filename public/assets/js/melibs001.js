var _sISeeNow = 'MElogin-box'; 
/*Otros*/

function startSinide(){
    N_show_box('posLogin-box');
}

function fn_acceso(data,id){
    if(data.excepcion==1){
        Tool_VolatileMsj("Session_ErrMsj",data.errorMsj,5000);
        return;
    }
    if(data.status == 0){
        oSession.startSession();
        oSession.getPivoteTrabajo();
    }else{
         if(data.status == 1) oIdm.volatileMsj("Session_ErrMsj",20,5);
         else if(data.status == 2 || data.status == 3) oIdm.volatileMsj("Session_ErrMsj",21,5);
         else if(data.status == -1) oIdm.volatileMsj("Session_ErrMsj",22,5);
         else  oIdm.volatileMsj("Session_ErrMsj",23,5);
    }
}

function continueSession(v,h){
    hash_point=h;
    if(v==true){
        oSession.startSession();
        oSession.getPivoteTrabajo();
     }else{
         if(oSession.hasError()==true){
             Tool_VolatileMsj("Session_ErrMsj",oSession.getErrMsj(),5);
         }
     }
 }
  
function startUpSinideApp(){
    /*
     * Por ahora lo ponemos aca.. ponerle funcionalidad. CUES
     */
    var myDefParam = {
        urlPedido : '', // fuente de datos
        urlData : '',	
        urlPedidoHijo : '', // fuente de datos para tabla hija
        urlDataHijo : '',	
        infoAccesoHijo : '', // notifica al usuario que para ver datos del hijo debe hacer dblclick 
        idDIV : 'tablaSeleccionCUE', // referencia al objeto a crear
        idTBL : 'tblDatosCUE', // id del TABLE 
        btnSiguiente : '', // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
        btnAnterior : '', // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
        filterViewDefault : '', // ( '' o checked o unchecked ) filtro por defecto con el que se despliega inicialmente la tabla
        idViewAll : '', // all - id del boton para filtrar la vista "ver Todos"
        idViewSelect : '', // checked - id del boton para filtrar la vista "ver Seleccionados"
        idViewNotSelect : '', // unchecked - id del boton para filtrar la vista "ver No Seleccionados"
        checkboxes : false, //Make rows checkable. (Note. You need a column with the 'unique' property)
        filasPorDefecto : 10,
        enPivote : false, // Controla la visualizacion de los datos de referencia sobre la tabla pivote
        filter : false,
        columnPicker : false,
	};
	myDefParam.urlPedido = 'aplicacionDinamica/DatosCueNivel_v001.json';
		
    /* *************************************************************************************** */
    $("#tablaSeleccionCUE").on('click', 'tbody tr', function(e) {
            e.preventDefault();
            N_show_box('MEcarga-container');
    });
    tblMake( myDefParam );
    // Tooltips (por ejemplo caso Menu)
    $('[data-rel=tooltip]').tooltip();

    if (oSession.isNavigatorCookieActiva()==true){
        oSession.isServerCookieActiva(continueSession);
    }
}

function N_start_box(id){
    /*El navegador debe estar seteado para aceptar cookies*/
    if (oSession.isNavigatorCookieActiva()==false){
        oIdm.volatileMsj("Session_ErrMsj",18,5);
        return;
    }
    var oUser=$("#MElogin_User");
    var oPass=$("#MElogin_Password");
    var oPublic=$("#MElogin_Publica");
    var postParam=new Array();
    if(oUser.val() == "") {
        oIdm.volatileMsj("Session_ErrMsj",24,5);return;
    }
    if(oPass.val() == "") {
        oIdm.volatileMsj("Session_ErrMsj",25,5);return;
    }
    postParam = {
        reqCat:"Login", 
        reqDo:"IniciarSession", 
        usuario:oUser.val(), 
        clave:oPass.val(), 
        conexionpublica:oPublic.is(':checked')
    };
    var UrlParam="";
    /*Validamos usuario y contraseña*/
    oRequest.makeRequestPostJson(postParam,UrlParam,fn_acceso,id);
}

function N_show_box(id) {
    if(id == 'MEcarga-container') {
        if($('#'+id).attr('class') == 'hiddenCarga') { // No lo veo la ventana de carga
                $('#'+_sISeeNow).removeClass('visible');  // Oculto las ventanas de login

                $('#'+id).attr('class','visibleCarga'); // hago visible la ventana de carga

        }
    }else{
        if(_sISeeNow == 'MEcarga-container'){ // Si la ventana actual es de carga
                $('#'+_sISeeNow).attr('class','hiddenCarga'); // Oculto la ventana actual es de carga
        } else {
                $('#'+_sISeeNow).removeClass('visible'); // Oculto las ventanas de login
        }
    }
    $('#'+id).addClass('visible'); // hago visible las ventanas de login
    _sISeeNow = id;
}
