
function Tool_VaciarArray(arr) {
    while (arr.length > 0)
        arr.pop();
}

function Tool_DestruirArray(arr) {
    Tool_VaciarArray(arr);
    delete arr;
}

function Tool_clearVolatileMsj(div) {
    $("#" + div).html("&nbsp;");
}

function Tool_VolatileMsj(div, mensaje, segundos) {
    $("#" + div).html(mensaje);
    setTimeout("Tool_clearVolatileMsj('" + div + "')", (segundos * 1000));
}

function Tool_Delete_Cookie_ByDomain(name, path, domain)
{
    if (Get_Cookie(name))
        document.cookie = name + "=" + ((path) ? ";path=" + path : "") + ((domain) ? ";domain=" + domain : "") +
                ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
}

function Tool_Delete_Cookie_ByName(name)
{
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function trim (myString)
{
    return myString.replace(/^\s+/g,'').replace(/\s+$/g,'');
}

function replaceAll( text, busca, reemplaza ){
  while (text.toString().indexOf(busca) != -1)
      text = text.toString().replace(busca,reemplaza);
  return text;
}


function Tool_CtrlDisable(a){
    if ( $("#"+a).is(':disabled') == false)  $("#"+a).attr("disabled","true"); 
}

function Tool_CtrlEnable(a){
    if ( $("#"+a).is(':disabled') == true)   $("#"+a).removeAttr("disabled"); 
}

/*SELECT2 Tool*/
function Tool_Select2_Disable(a){
    if ( $("#"+a).is(':disabled') == false) {
         $("#"+a).select2("disable");
    }
}

function Tool_Select2_Enable(a){
    if ( $("#"+a).is(':disabled') == true){ 
         $("#"+a).select2("enable");
    }
}

/*CHOSEN Tool*/

function Tool_Chosen_Disable(a){
    if ( $("#"+a).is(':disabled') == false) {
        $("#"+a).attr("disabled", true).trigger("liszt:updated");
    }
}

function Tool_Chosen_Enable(a){
    if ( $("#"+a).is(':disabled') == true){ 
        $("#"+a).attr("disabled", false).trigger("liszt:updated");
    }
}

function Tool_Chosen_Modificarvalor_INTERNAL(a,value,haschange){
    var deshabilitado=false;
    if ( $("#"+a).is(':disabled') == true){ 
        $("#"+a).attr("disabled", false).trigger("liszt:updated");
        deshabilitado=true;
    }
    $("#"+a).val(value).trigger("liszt:updated");
    if(haschange==1) $("#"+a).change();
    if(deshabilitado==true){
        $("#"+a).attr("disabled",true).trigger("liszt:updated");
    }
}

function Tool_Chosen_Modificarvalor(div_id,value){
    Tool_ChosenModificarvalor_INTERNAL(div_id,value,0);
}

function Tool_Chosen_Modificarvalor_y_change(a,value){
    Tool_ChosenModificarvalor_INTERNAL(a,value,1);
}

function Tool_Chosen_GetDescripcionSelected(a){
   return $("#"+a+" option:selected").text(); 
}

function Tool_esEntero(x){
	var y = parseInt(x);
	if (isNaN(y)) 
		return false;
	return x == y && x.toString() == y.toString();
}

function Tool_esNumerico(x){
	var RegExPattern = /^(-)?(\d){1,17}((\.\d)|(\.\d\d))?$/;
         if ( x.match(RegExPattern) )  return true;
         else return false;
}

//http://jquerybyexample.blogspot.com/2011/12/validate-date-using-jquery.html
function Tool_esFecha(txtDate)
{

    var currVal = txtDate;
    if(currVal == '')
      return false;

    //Declare Regex 
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
    var dtArray = currVal.match(rxDatePattern); // is format OK?

    if (dtArray == null)
       return false;

    //Checks for dd/mm/yyyy format.
    dtMonth = dtArray[3];
    dtDay= dtArray[1];
    dtYear = dtArray[5];
    
    if (dtMonth < 1 || dtMonth > 12)
        return false;
    else if (dtDay < 1 || dtDay> 31)
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
        return false;
    else if (dtMonth == 2)
    {
       var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
       if (dtDay> 29 || (dtDay ==29 && !isleap))
            return false;
    }
    return true;
}
