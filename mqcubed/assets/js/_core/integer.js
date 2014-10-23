function MaskInteger(obj, min){
    if(min<0){
        obj.value = obj.value.replace(/[^0-9.-]+/,"");
        // Saco todos los signos negativos que no esten al comienzo
        obj.value = obj.value.charAt(0) + obj.value.substr(1).replace(/[^0-9.]+/,"");
    }
    else{
        obj.value = obj.value.replace(/[^0-9.]+/,"");
    }
    // Saco todos los puntos despues del primer punto
    if(obj.value.indexOf('.') != obj.value.lastIndexOf('.'))
        obj.value = obj.value.substr(0, obj.value.indexOf('.')+1) + obj.value.substr(obj.value.indexOf('.')+1).replace(/[^0-9]+/,"");
    if(obj.value.charAt(0)=='.')
        obj.value = '0' + obj.value;   
}

function ValidateInteger(obj, min, max){
    var blnError = false;
    if(obj.value != obj.value.replace(/[^0-9.]+/,""))
        blnError = true;
    else if(obj.value<min || obj.value > max)
        blnError = true;
    if(blnError)
        $('#'+arguments[0].id).addClass("danger-textbox");
    else
        $('#'+arguments[0].id).removeClass("danger-textbox");
}