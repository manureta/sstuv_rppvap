
function Session_setError(strMsj) {
    oSession.strErrMsj = strMsj;
    oSession.ocurrioError = true;
}

/* Session_isServerCookieActiva
 * Verifica si la session ya fue iniciada para no hacer el login nuevamente
 * @returns {Boolean}
 */
function _Session_isServerCookieActiva(data, obj, nextFunctionContinue) {
    if (data == null) {
        var parametrosPost = new Array();
        parametrosPost = {reqCat: "Session", reqDo: "serverCookieActiva"};
        var parametrosUrl = "";
        oRequest.makeRequestPostJson(parametrosPost, parametrosUrl, _Session_isServerCookieActiva, obj, nextFunctionContinue);
    } else {
        if (data.errorMsj != null) {
            Session_setError(data.errorMsj)
            nextFunctionContinue(false,0);
        } else {
            nextFunctionContinue(data.status,data.hash_point);
        }
    }
}

function Session_isServerCookieActiva(nextFunctionContinue) {
    _Session_isServerCookieActiva(null, this, nextFunctionContinue);
}

/* Session_isNavigatorCookieActiva
 * Verifica que el navegador soporte cookies
 * @returns {Boolean}
 */
function Session_isNavigatorCookieActiva() {
    var aceptaCookies = false;
    aceptaCookies = navigator.cookieEnabled;
    return(aceptaCookies)
}

function Session_getErrMsj() {
    return this.strErrMsj;
}

function Session_hasError() {
    return this.ocurrioError;
}

function _Session_closeSession(data, obj) {
    if (data == null) {
        var parametrosPost = new Array();
        parametrosPost = {reqCat: "Session", reqDo: "closeSession"};
        var parametrosUrl = "";
        oRequest.makeRequestPostJson(parametrosPost, parametrosUrl, _Session_closeSession, obj);
    } else {
        if (data.errorMsj != null) {
            /*Parsing Error*/
            oSession.stopSessionQuery();
            Tool_Delete_Cookie_ByName('SINAPP_SESSID002'); /*Si hay error, forzamos la salida*/
            N_show_box('MElogin-box');
        } else {
            oSession.stopSessionQuery();
            N_show_box('MElogin-box');
        }
    }
}

function Session_closeSession() {
    var y = confirm("Desea cerrar la sesion?");
    if (y) {
        _Session_closeSession(null, this);
    }
}

function Session_startSessionQuery() {
    if (this.quryHdlr != null) {
        clearInterval(this.quryHdlr);
        this.quryHdlr = null;
    }
    this.quryHdlr = setInterval(function() {
        Session_sessionQuery()
    }, (this.sessionRefreshSeconds * 1000));
}

function Session_stopSessionQuery() {
    if (this.quryHdlr != null) {
        clearInterval(this.quryHdlr);
        this.quryHdlr = null;
    }
}

function Session_sessionQuery() {

}

function Session_startSession() {
    this.startSessionQuery();
    this.refreshMenu();
    this.setSessionUserName();
}

function _Session_refreshMenu(data, obj) {
    if (data == null) {
        var parametrosPost = new Array();
        parametrosPost = {reqCat: "Session", reqDo: "getMenu"};
        var parametrosUrl = "";
        oRequest.makeRequestPostTxt(parametrosPost, parametrosUrl, _Session_refreshMenu, obj);
    } else {
        if (data.errorMsj != null) {
            alert("Sucedio un error al cargar el menu: " + data.errorMsj);
        } else {
            if(data!="#NOREFRESH#"){
                $("#ID_ZoneLoadData").html(data);
                $("#menu-vertical").empty().append($('#ID_To_ItemMenu'));
                //$("#page-content").empty().append($('#ID_To_PageContent'));
                fnMenuVertical();
                fnACE();
                oFuncion.setInicial(menu1Pos); /*Establece, si existe menu inicio, la pantalla de inicio, debe declararse en la BD*/
                // fnPieChart();
            }
        }
    }
}

function Session_refreshMenu() {
    _Session_refreshMenu(null, this);
}

function Session_getPivoteTrabajo(data){
    if (data == null) {
        var parametrosPost = new Array();
        parametrosPost = {reqCat: "Session", reqDo: "getPivoteTrabajo"};
        var parametrosUrl = "";
        oRequest.makeRequestPostTxt(parametrosPost, parametrosUrl, Session_getPivoteTrabajo);
    } else {
        if (data.errorMsj != null) {
            alert("Sucedio un error al cargar pivote de trabajo." + data.errorMsj);
        } else {
            alert(data);
            if(data=="OK"){
                startSinide();
            }
        }
    }
}

function _Session_setSessionUserName(data, obj){
     if (data == null) {
        var parametrosPost = new Array();
        parametrosPost = {reqCat: "Session", reqDo: "getUserName"};
        var parametrosUrl = "";
        oRequest.makeRequestPostTxt(parametrosPost, parametrosUrl, _Session_setSessionUserName, obj);
    } else {
        if (data.errorMsj != null) {
            alert("Sucedio un error al cargar el nombre de usuario: " + data.errorMsj);
        } else {
            $("#user_name").html(data);
        }
    }
}

function Session_setSessionUserName(){
    _Session_setSessionUserName(null,this);
}
/* Class Session
 * Funciones de manejo de session
 */
function Session() {
    this.strErrMsj = "";
    this.quryHdlr = null;
    this.sessionRefreshSeconds = 20;
    this.ocurrioError = false;
    this.isServerCookieActiva = Session_isServerCookieActiva;
    this.isNavigatorCookieActiva = Session_isNavigatorCookieActiva;
    this.getErrMsj = Session_getErrMsj;
    this.hasError = Session_hasError;
    this.closeSession = Session_closeSession;
    this.startSessionQuery = Session_startSessionQuery;
    this.keepAlive = Session_startSessionQuery;
    this.stopSessionQuery = Session_stopSessionQuery;
    this.startSession = Session_startSession;
    this.refreshMenu = Session_refreshMenu;
    this.setSessionUserName = Session_setSessionUserName;
    this.getPivoteTrabajo = Session_getPivoteTrabajo;
}

oSession = new Session();