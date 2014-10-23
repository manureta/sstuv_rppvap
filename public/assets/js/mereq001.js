
function load(element, url, params, callback) {
    return element.load(url, params, callback);
}

var reqUri = "/getRequest.php?";
function RequestHandler_makeRequestPostJson(aParametrosPost, aParametrosUrl, nextFunction, nextFunctionPar1, nextFunctionPar2) {
    return $.post(reqUri + "_OutPutStyle_=JSON" + aParametrosUrl,
            aParametrosPost,
        function(data) {
                if (data == "" || !data) {
                    data = new Array();
                    data = {excepcion: 1, errorMsj: oIdm.gMsj(19)};
                    nextFunction(data, nextFunctionPar1, nextFunctionPar2);
                } else {
                    if (data.excepcion == 1) {
                        if($.inArray(data.codigo, ["SESMGM018","SESMGM011","SESMGM013","SESMGM015"])){
                            alert("La sesion finalizó");
                            Tool_Delete_Cookie_ByName('SINAPP_SESSID002');
                            location.reload();
                        }
                        aux = data;
                        delete data;
                        data = {errorMsj: "("+aux.codigo + ") - " + aux.mensaje};
                    }
                }
                nextFunction(data, nextFunctionPar1, nextFunctionPar2);
         },
            "json"
         ).error(function(XMLHttpRequest, textStatus, errorThrown) {
            data = {errorMsj: this.url + ":(" + textStatus + "-" + errorThrown + ")"};
            nextFunction(data, nextFunctionPar1, nextFunctionPar2);
    });
}

function RequestHandler_makeRequestPostTxt(aParametrosPost, aParametrosUrl, nextFunction, nextFunctionPar1, nextFunctionPar2) {
    $.post(reqUri + aParametrosUrl,
            aParametrosPost,
        function(data) {
                if (data == "" || !data) {
                    data = new Array();
                    data = {excepcion: 1, errorMsj: oIdm.gMsj(19)};
                    nextFunction(data, nextFunctionPar1, nextFunctionPar2);
                } else {
                    var n = data.indexOf("\"excepcion\": 1")
                    if (n != -1) {
                        var parsedJSON = $.parseJSON(data);
                        data = new Array();
                        if($.inArray(data.codigo, ["SESMGM018","SESMGM011","SESMGM013","SESMGM015"])){
                            alert("La sesion finalizó");
                            Tool_Delete_Cookie_ByName('SINAPP_SESSID002');
                            location.reload();
                        }
                        delete data;
                        data = {errorMsj: parsedJSON.codigo + " " + parsedJSON.mensaje};
                    }
                }
                nextFunction(data, nextFunctionPar1, nextFunctionPar2);
         },
            "text"
         ).error(function(XMLHttpRequest, textStatus, errorThrown) {
            data = {errorMsj: this.url + ":(" + textStatus + "-" + errorThrown + ")"};
            nextFunction(data, nextFunctionPar1, nextFunctionPar2);
    });
}

function RequestHandler_validarDataJson(data){
    if (data == "" || !data) {
        data = new Array();
        data = {excepcion: 1, errorMsj: oIdm.gMsj(19)};
    } else {
        if (data.excepcion == 1) {
            if($.inArray(data.codigo, ["SESMGM018","SESMGM011","SESMGM013","SESMGM015"])){                alert("La sesion finalizó");
                Tool_Delete_Cookie_ByName('SINAPP_SESSID002');
                location.reload();
            }
            aux = data;
            delete data;
            data = {errorMsj: aux.codigo + " " + aux.mensaje};
        }
    }
    return data;
}
        
/* RequestHandler
 * Clase para el manejo de peticiones
 * @returns {RequestHandler}
 */
function RequestHandler() {
    this.makeRequestPostJson = RequestHandler_makeRequestPostJson;
    this.json = function(aParametrosPost, nextFunction, nextFunctionPar1, nextFunctionPar2) {return RequestHandler_makeRequestPostJson(aParametrosPost, '', nextFunction, nextFunctionPar1, nextFunctionPar2)};
    this.makeRequestPostTxt = RequestHandler_makeRequestPostTxt;
    this.txt = RequestHandler_makeRequestPostTxt;
    this.validarDataJson = RequestHandler_validarDataJson;
    this.validar = RequestHandler_validarDataJson;
}
window.req = oRequest = new RequestHandler();
