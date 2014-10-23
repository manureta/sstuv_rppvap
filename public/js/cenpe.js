function MaskCuit(obj){return;
    // elimino todo lo que no es numero (si tiene mas de 2 caracteres, permito tambien -)
    if(obj.value.length>2)
        obj.value=obj.value.replace(/[^0-9\-]+/,"");
    else
        obj.value=obj.value.replace(/[^0-9]+/,"");
    
    // verifico que el tercer caracter sea -
    if(obj.value.length>1 && obj.value.charAt(2)!='-')
        obj.value = obj.value.substr(0,2) + '-' + obj.value.substr(2);
    
    if(obj.value.length<4)
        return;
    
    // verifico que entre el cuarto y undecimo caracter solo haya numeros
    if(obj.value.length<12){
        txt = obj.value.substr(3);
        txt = txt.replace(/[^0-9]+/,"");
        obj.value = obj.value.substr(0,3) + txt;
    }
    else{
        txt = obj.value.substr(3,8);
        txt = txt.replace(/[^0-9]+/,"");
        obj.value = obj.value.substr(0,3) + txt +obj.value.substr(11);
    }
    
    // verifico que el duodecimo caracter sea -
    if(obj.value.length>10 && obj.value.charAt(11)!='-'){
        obj.value = obj.value.substr(0,11) + '-' + obj.value.substr(11);
    }
        
    // verifico que el ultimo caracter sea numerico
    if(obj.value.length==13 && obj.value.charAt(12)=='-'){
        obj.value = obj.value.substr(0,12);
    }
    
    if(obj.value.length>13)
        obj.value = obj.value.substr(0,13);
}

function MaxLenth(obj, max) {
    if (obj.value.length > max) {
        obj.value = obj.value.substr(0,max);
    }
}

function MinLenth(obj, min) {
    if (obj.value.length < min) {
        // marcar error
    }
}