function DateFilterMask(obj){
    obj.value = obj.value.replace(/[^0-9/]+/,"");
    obj.value = obj.value.substr(0,10);
    // elimino tercer / y todo lo que venga despues despues
    var index = obj.value.indexOf('/');
    if(index<0)
        return;
    var dia = obj.value.substr(0,index);
    var resto = obj.value.substr(index+1);
    index = resto.indexOf('/');
    if(index<0)
        return;
    var mes = resto.substr(0,index);
    resto = resto.substr(index+1);
    index = resto.indexOf('/');
    if(index<0)
        return;
    obj.value = dia + '/' + mes + '/' + resto.substr(0,index);
}


