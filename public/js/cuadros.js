var IE = /*@cc_on!@*/false;
var _PRUEBA_AUTOCOMPLETE_ = false;

//var arrCuadrosEnPagina = new Array;

function AddNewFila(cuadro) {
    var arrAutocompleteVals = new Array;
    var tmpLength ;
    var c = qc.getC('tbl_'+cuadro);
    var tblBody = c.tBodies[0];
    var newNode = tblBody.rows[tblBody.rows.length-1].cloneNode(true);
    var intSumI = 2;
    var IdColumnaCodigo = '';
    var blnRegisterAutocomplete = false;
    var blnRegisterArrayAutocomplete = false;
    if (IE)
        intSumI = 1;
    for (var i=1; i< newNode.childNodes.length;i = i + intSumI) {
        if (newNode.childNodes[i].childNodes[0].nodeName == "DIV") {
            var inp = newNode.childNodes[i].childNodes[0].childNodes[0];
        } else {
            var inp = newNode.childNodes[i].childNodes[0];
        }
        // si es un checkbox pongo checked false
        if(newNode.childNodes[i].childNodes[0].type=="checkbox")
            newNode.childNodes[i].childNodes[0].checked = false;
        
        var oldId = inp.id;
        IdColumnaCodigo = $('#'+oldId+'_id_columna_codigo').val();
        var arrIds = inp.id.toString().split('_');
        RegPatternOrig = 'inp_'+arrIds[1]+'_'+arrIds[2]+'_';
        RegPatternNew = 'inp_'+arrIds[1]+'_'+(parseInt(arrIds[2])+1)+'_';
        /* for (j=1;j<inp.attributes.length;j++) {
            var myStr = "" + inp.attributes[j].value;
            myStr = myStr.replace(RegPatternOrig, RegPatternNew);
            inp.attributes[j].value = myStr;
        }*/
        IdRegExp = new RegExp(RegPatternOrig, 'g');
        //inp.innerHTML.replace(oldId, 'inp_'+arrIds[1]+'_'+(parseInt(arrIds[2])+1)+'_'+arrIds[3]);
        // Si el proximo input es un del_* (los botones para borrar informacion), le ponemos el id que corresponde con el numero de fila que corresponde.
        // De otra manera la funcion FocusNextInput falla porque busca un input con un id 'del_'
        if (oldId.match('del_')) {
            inp.id = 'del_'+(parseInt(arrIds[1])+1);
        } else {
            inp.id = 'inp_'+arrIds[1]+'_'+(parseInt(arrIds[2])+1)+'_'+arrIds[3];
        }
        inp.value='';
        if (inp.className.indexOf("InputError") != -1 || inp.className.indexOf("InputWarning") != -1) {
            inp.className = inp.className.replace(/InputError/g, "");
            inp.className = inp.className.replace(/InputWarning/g, "");
        }
        if (inp.className.indexOf('Autocomplete') != -1) {
            var IdInputAutocomplete = inp.id;    
            //alert(IdColumnaCodigo);
            if (IdColumnaCodigo) {
                var IdInputCodigo = IdColumnaCodigo.replace(RegPatternOrig, RegPatternNew);
            } else {
                var IdInputCodigo = '';
            }
            //var IdInputCodigo = 'inp_'+arrIds[1]+'_'+(parseInt(arrIds[2])+1)+'_'+IdColumnaCodigo;
            var IdDefCuadro = arrIds[1];
            blnRegisterAutocomplete = true;
            var TipoDato = $('#'+oldId).attr('rel');
            if (inp.className.indexOf('ArrayAuto') != -1) {
                blnRegisterArrayAutocomplete = true;
            }
        }
        /**
        * Este for es para los hiddens
        */
        for (j=1;j<newNode.childNodes[i].childNodes.length;j++) {
            blnRegisterAutocomplete = true;
            inpTmp =  newNode.childNodes[i].childNodes[j];
            if (inpTmp.id.indexOf(oldId) != -1 && inpTmp.id.match(RegPatternOrig)) {
                if (inpTmp.getAttribute("onkeyup") !== null) {
                    //alert(inpTmp.getAttribute("onkeyup"));
                    onkeyup = inpTmp.getAttribute("onkeyup").replace(RegPatternOrig, RegPatternNew);
                    inpTmp.setAttribute("onkeyup", onkeyup);
                }
                inpTmp.name = inpTmp.name.replace(RegPatternOrig, RegPatternNew);
                inpTmp.id = inpTmp.id.replace(RegPatternOrig, RegPatternNew);
                inpTmp.value = inpTmp.value.replace(RegPatternOrig, RegPatternNew);
                //alert(oldId + ' ' + inp.id+ ' '+ inpTmp.id);
            }
        }
    // @TODO y si es un select...?? chequear
        if (blnRegisterAutocomplete) {
            tmpLength = arrAutocompleteVals.length;
            arrAutocompleteVals[tmpLength] = new Array;
            arrAutocompleteVals[tmpLength][0] = IdInputAutocomplete;
            arrAutocompleteVals[tmpLength][1] = TipoDato;
            arrAutocompleteVals[tmpLength][2] = IdInputCodigo;
            arrAutocompleteVals[tmpLength][3] = IdDefCuadro;
            //RegisterNewAutocomplete(IdInputAutocomplete, TipoDato, IdInputCodigo, IdDefCuadro);
            //alert(IdInputAutocomplete +' '+ TipoDato +' '  +' ' + IdInputCodigo);
            blnRegisterAutocomplete = false;
        }        
    }
    //html = $(newNode).html();
    //$(newNode).html( html.replace(RegPatternOrig, RegPatternNew) );
    //alert(html);
    tblBody.appendChild(newNode);
    for (var i=0;i<arrAutocompleteVals.length;i++) {
        if(blnRegisterArrayAutocomplete)
            RegisterNewAutocompleteArray(arrayDataAutocomplete,arrAutocompleteVals[i][0], arrAutocompleteVals[i][1], arrAutocompleteVals[i][2], arrAutocompleteVals[i][3]);
        else if(arrAutocompleteVals[i][0].search('^inp_611_.*_549$') != -1)
            RegisterNewAutocompleteCuadro611(arrAutocompleteVals[i][0], arrAutocompleteVals[i][0].replace(/_549$/, '_550'), arrAutocompleteVals[i][1]);
        else
            RegisterNewAutocomplete(arrAutocompleteVals[i][0], arrAutocompleteVals[i][1], arrAutocompleteVals[i][2], arrAutocompleteVals[i][3]);
        blnRegisterArrayAutocomplete = false;
    }
    ResetColorFila(tblBody.rows[tblBody.rows.length-1]);
    SetUpKeyNavigation(); // se vuelve a correr para agregarle los handlers a la fila agregada
}

function getidCuadroFromInput(input){
    var inp = $("#"+input);
    if (!inp) return false;
    var par = inp.parents('table.cuadro:first');
    if (!par) return false;
    var id = par.attr('id');
    if (!id) return false;
    var x= id.substr(4); //le saco el tbl_
    return x;
}

function CompletarConCero(input){
    var strid = getidCuadroFromInput(input);
    LlenarCuadroCeros(strid);
}

function ResetChkBox(controlId){
    var id = 'tbl_' + controlId;
    var cuadro = document.getElementById(id);
    var tblBody = cuadro.tBodies[0];
    for(var i=0 ; i<tblBody.rows.length ; i++){
        var objFila = tblBody.rows[i];
        for(var j=0; j<objFila.cells.length ; j++){
            var td = objFila.cells[j];
            for(var k=0; k<td.childNodes.length ; k++){
                if(td.childNodes[k].type=="checkbox")
                    td.childNodes[k].checked = false;
            }
        }    
    }
}

function ActivarBotonDeshabilitar(idCuadroChkbox){
    $('input[id^="inp_'+idCuadroChkbox+'"]').bind('click', {idCuadro: idCuadroChkbox}, function(event){
        var TB = $('input[id^="inp_' + event.data.idCuadro + '"]')[0].id;
        var strid = getidCuadroFromInput(TB);        
        document.getElementById("deshabiilta"+strid).click();    
    });
}

function SetSinInformacion(input){
    var strid = getidCuadroFromInput(input);
    document.getElementById('sininfo'+strid).click();
    //$("#sininfo"+strid).click();
}

// recibo el id del control del cuadro y deshabilito las celdas
function RenderSinInformacion(ctrlid) {
    limitctl = $('#'+ctrlid); 
    $('input:text', limitctl).val(''); 
    $('select', limitctl).val(''); 
    $('input:checkbox', limitctl).val(''); 
    $('textarea', limitctl).val('');
    $('input:text', limitctl).attr('disabled','disabled'); 
    $('select', limitctl).attr('disabled','disabled'); 
    $('input:checkbox', limitctl).attr('disabled','disabled'); 
    $('textarea', limitctl).attr('disabled','disabled');
    if (IsCuadroInfinito(ctrlid))
        $('.agregarfila_button',$('#'+ctrlid)).attr('disabled','disabled');
}

function LlenarCuadroEnteroConCeros(cuadro) {
    var c = qc.getC('tbl_'+cuadro);
    var tblBody = c.tBodies[0];
    $('input.smallint[value=""]', tblBody).val(0);
    $('input.integer[value=""]', tblBody).val(0);
}

function CheckBoxAll(check){
    var blnState = $(check).attr('checked');
    var tblBody = check.parentNode.parentNode.parentNode;
    $('input:checkbox', $('.delete_col',tblBody)).attr('checked',blnState);
}


function LlenarCuadroCeros(cuadro) {
    var c = qc.getC('tbl_'+cuadro);
    if (!c) return;
    var tblBody = c.tBodies[0];
    // input.value == '' && (input.className.search("smallint")>-1 OR input.className.search("integer")>-1)
    var cuadroVacio = true;
    
    for(var i=1 ; i<tblBody.rows.length ; i++) {
        if(!FilaVacia(cuadro,i)){
            cuadroVacio = false;
            // lleno fila con ceros
            $('input.smallint[value=""]', tblBody.rows[i]).val(0);
            $('input.integer[value=""]', tblBody.rows[i]).val(0);
        }
    }
    if(cuadroVacio)
        LlenarCuadroEnteroConCeros(cuadro);    
}

function IsCuadroInfinito(cuadro){
	var cuadro = document.getElementById('tbl_'+cuadro);
	return (cuadro.className.search("cuadro_infinito")>-1);
}

function FilaVacia(mixTRoNombreCuadro, nroFila) {
    var tr = mixTRoNombreCuadro;
    if (typeof mixTRoNombreCuadro == 'string') {
        var c = qc.getC('tbl_'+mixTRoNombreCuadro);
        var tblBody = c.tBodies[0];
        tr = tblBody.rows[nroFila];
    }
    //if (!tr) return false;
    for(var i=0; i<tr.cells.length ; i++){
        var td = tr.cells[i];
        if (td.className == 'delete_col') continue;
        for (var j=0;j<td.childNodes.length;j++) {
            var child = td.childNodes[j];
            if (child.nodeName == "DIV") { // para las columnas con select
                if(td.childNodes[j].childNodes[0].selectedIndex)// == 0 || td.childNodes[j].childNodes[0].selectedIndex == "") 
                    return false;
            }
            else { // el resto son todos inputs (los check son de cuadros FIJOS)
                if(td.childNodes[j].id && td.childNodes[j].id.search('id_columna_codigo')<0 
                    && td.childNodes[j].value)
                    return false;
            }
        }
    }
    return true;
}

function MoverFila(cuadro, nroFilaDesde, nroFilaHacia){
    var tblBody = cuadro;
    if (typeof cuadro == 'string') {
        var c = qc.getC('tbl_'+cuadro);
        tblBody = c.tBodies[0];
    }
    var filaHacia = nroFilaHacia;
    var filaDesde = nroFilaDesde;
    for(var i=0; i<tblBody.rows[filaDesde].cells.length ; i++){
        var td_hacia = tblBody.rows[filaHacia].cells[i];
        if (td_hacia.className == 'delete_col') continue;
        var td_desde = tblBody.rows[filaDesde].cells[i];
        for (var j=0;j<td_hacia.childNodes.length;j++) {
            var child = td_hacia.childNodes[j];
            if (child.nodeName == "DIV") { // para las columnas con select
                td_hacia.childNodes[j].childNodes[0].selectedIndex = td_desde.childNodes[j].childNodes[0].selectedIndex;
                td_desde.childNodes[j].childNodes[0].selectedIndex = "";
            }
            else { // el resto son todos inputs (los check son de cuadros FIJOS)
                td_hacia.childNodes[j].value = td_desde.childNodes[j].value;
                td_desde.childNodes[j].value = "";
            }
        }
    }
}

function SacarFilasVaciasIntermedias(){
	var arrCuadros = $(".cuadro_infinito");
	for(var i=0;i<arrCuadros.length;i++)
		SacarFilasVaciasIntermediasEnCuadro(arrCuadros[i].id.substr("tbl_".length));
}

function SacarFilasVaciasIntermediasEnCuadro(cuadro){
    var tblCuadro = cuadro;
    if (typeof cuadro == 'string') {
        var c = qc.getC('tbl_'+cuadro);
        tblCuadro = c.tBodies[0];
    }
    if (tblCuadro.parentNode.className.indexOf('cuadro_infinito') == -1) return;
    // evito empezar en los headers
    var x = 0;
    while (tblCuadro.rows[x].children[1].nodeName.toLowerCase() == 'th') x++;
    for(var i = x; i<tblCuadro.rows.length ; i++) {
        if (!FilaVacia(tblCuadro.rows[i])) continue;
        var j=i;
        while (j<tblCuadro.rows.length && FilaVacia(tblCuadro.rows[j])) {j++}
        if (j == tblCuadro.rows.length) return;
        MoverFila(tblCuadro,j,i);
    }

}

function BorrarFila(objFila){
    for(var i=0; i<objFila.cells.length ; i++){
        var td = objFila.cells[i];
        for (var j=0;j<td.childNodes.length;j++) {
            var content = td.childNodes[j];
            if (content.nodeName == "DIV" && content.childNodes[0].nodeName == 'SELECT') { // para las columnas con select
                content.childNodes[0].selectedIndex = "";
                ResetColorCelda(content.childNodes[0].id);
            }
            else { 
                if (!content.id || content.id.search('id_columna_codigo')>0) continue;
                // el resto son todos inputs (los check son de cuadros FIJOS)
                content.value = "";
                ResetColorCelda(content.id);
            }
        }
    }        
    $('input:checkbox', objFila).attr('checked',false);
}

function ResetColorFila(objFila){
    for(var i=0; i<objFila.cells.length ; i++){
        var td_borro = objFila.cells[i];
        for (var j=0;j<td_borro.childNodes.length;j++) {
            var child = td_borro.childNodes[j];
            if (child.nodeName == "DIV") { // para las columnas con select
                ResetColorCelda(td_borro.childNodes[j].childNodes[0].id);
            }
            else { // el resto son todos inputs (los check son de cuadros FIJOS)
                ResetColorCelda(td_borro.childNodes[j].id);
            }
        }
        
    }        
}

function ResetColorCuadro(cuadro) {
    var c = qc.getC('tbl_'+cuadro);
    var tblBody = c.tBodies[0];
    for(var i=1 ; i<tblBody.rows.length ; i++) {
        var elem = tblBody.rows[i].cells[0].firstChild;
            ResetColorFila(tblBody.rows[i]);        
    }
}

function LimpiarInconsistencias(idDiv){    
    var x = $('.inconsistencias','#'+idDiv)[0];
    if (x) x.style.display = 'none';
    ResetColorCuadro(idDiv);
}


function BorrarCuadro(cuadro) {
    var c = qc.getC('tbl_'+cuadro);
    var tblBody = c.tBodies[0];
    var blnBorre = false;
    for(var i=1 ; i<tblBody.rows.length ; i++) {
        var elem = tblBody.rows[i].cells[0].firstChild;
        if(elem && $(elem).attr("checked")) {
            BorrarFila(tblBody.rows[i]);
            PageModified = true;
            blnBorre = true;
        }
    }
    if(blnBorre)
        LimpiarInconsistencias(cuadro);
    if (c.className.indexOf('cuadro_infinito') > -1)
        SacarFilasVaciasIntermediasEnCuadro(tblBody);
}

function BorrarFilaActual(element){
    var tr = $('#'+element).parents('tr:first');
    $('input:checkbox',tr).attr('checked','checked');
    var cuadro = getidCuadroFromInput(element);
    if (cuadro) BorrarCuadro(cuadro);
}


function getColIndexOfCheckBox(checkBox){
	for(var i = 0; i<checkBox.parentNode.parentNode.cells.length; i++){
		if(checkBox.parentNode == checkBox.parentNode.parentNode.cells[i]){			
			return i;
		}
	}
}	

function getRowIndexOfCheckBox(checkBox){
	for(var i = 0; i<checkBox.parentNode.parentNode.parentNode.parentNode.rows.length; i++){
		if(checkBox.parentNode.parentNode == checkBox.parentNode.parentNode.parentNode.parentNode.rows[i]){			
			return i;
		}
	}
}	
	

// mode: 1 = horizontal, 2 = vertical, 3 = unico
function RadioCheck(checkBox,mode){
	var arrRows = checkBox.parentNode.parentNode.parentNode.parentNode.rows;
	var colIndex = 0;
	var rowIndex = 0;
	if(mode == 2)
		colIndex = getColIndexOfCheckBox(checkBox);
	if(mode == 1)
		rowIndex = getRowIndexOfCheckBox(checkBox);
	for(var i=0 ; i<arrRows.length ; i++){
		if(mode==1 && rowIndex!=i)
			continue;
		for(var j=0 ; j<arrRows[i].cells.length ; j++){
			if(mode==2 && colIndex!=j)
				continue;
			if(arrRows[i].cells[j].childNodes.length==0)
				continue;
			if(checkBox != arrRows[i].cells[j].childNodes[0])
				$(arrRows[i].cells[j].childNodes[0]).attr('checked',false);
		}
	}
}


function RegisterNewAutocomplete(IdColAuto, TipoDato, IdColCodigo, IdDefCuadro) {
//    alert('1 = ' + IdColAuto + ' 2 = ' + TipoDato + ' 3 = ' + IdColCodigo + ' 4 = ' + IdDefCuadro)
        var ExtraGet = (IdDefCuadro) ? '&id_definicion_cuadro='+IdDefCuadro:'';
        $("#"+IdColAuto).autocomplete(__APP_URI__+"/php/autocomplete.php?tipo_dato_type="+TipoDato+ExtraGet,
            {autoFill:false,matchContains:true,matchCase:false,mustMatch:false,multiple:false,max:60}
        ).result(function(event, data, formatted) {
            $("#"+IdColAuto).val(data[0]);
            $("#"+IdColAuto+"_selected_text").val(data[0]);
            $("#"+IdColAuto+"_selected_value").val(data[0]);
            $("#"+IdColAuto+"_tilde_ok").show();
            if (IdColCodigo)
                $("#"+IdColCodigo).val(data[1]);
            FocusNextInput(IdColAuto);
        });
        if (IdColCodigo && !$("#"+IdColCodigo).val()) {
            $("#"+IdColAuto+"_selected_text").val($("#"+IdColAuto).val());
            $("#"+IdColAuto+"_selected_value").val($("#"+IdColAuto).val());
        }
}

var arrayDataAutocomplete;
function RegisterNewAutocompleteArray(ArrayData,IdColAuto, TipoDato, IdColCodigo, IdDefCuadro) {
        $("#"+IdColAuto).autocomplete(ArrayData,//*/[["0", "Ciclo Básico"], ["22", "00000000 Título Sin informacion"],],
            {autoFill:true,matchContains:true,matchCase:false,mustMatch:true,multiple:true,max:30}
        ).result(function(event, data, formatted) {
            $("#"+IdColAuto).val(data[0]);
            $("#"+IdColAuto+"_selected_text").val(data[0]);
            $("#"+IdColAuto+"_selected_value").val(data[0]);
            $("#"+IdColAuto+"_tilde_ok").show();
            if (IdColCodigo)
                $("#"+IdColCodigo).val(data[1]);
            FocusNextInput(IdColAuto);
        });
        if (IdColCodigo && !$("#"+IdColCodigo).val()) {
            $("#"+IdColAuto+"_selected_text").val($("#"+IdColAuto).val());
            $("#"+IdColAuto+"_selected_value").val($("#"+IdColAuto).val());
        }
        arrayDataAutocomplete = ArrayData;

    //});
}


function RegisterNewAutocompleteCuadro611(IdColAuto, IdColAuto2, TipoDato, IdColCodigo, IdDefCuadro) {
        var ExtraGet = (IdDefCuadro) ? '&id_definicion_cuadro='+IdDefCuadro:'';
        $("#"+IdColAuto).autocomplete(__APP_URI__+"/php/autocomplete.php?tipo_dato_type="+TipoDato+ExtraGet,
            {autoFill:false,matchContains:true,matchCase:false,mustMatch:false,multiple:false,max:60,
//            {autoFill:true,matchContains:true,matchCase:true,mustMatch:false,multiple:true,max:60,
                extraParams: {tipo_titulacion: function() {return $("#"+IdColAuto2).val();}}}
			).result(function(event, data, formatted) {
            $("#"+IdColAuto).val(data[0]);
            $("#"+IdColCodigo).val(data[1]) + $("#"+IdColAuto+"_selected_value").val(data[0]);
            $("#"+IdColAuto+"_tilde_ok").show();
            if (IdColCodigo)
                $("#"+IdColCodigo).val(data[1]);
            FocusNextInput(IdColAuto);
        });
        if (IdColCodigo && !$("#"+IdColCodigo).val()) {
            $("#"+IdColAuto+"_selected_text").val($("#"+IdColAuto).val());
            $("#"+IdColAuto+"_selected_value").val($("#"+IdColAuto).val());
        };

}


function SetZeroVal(intId, strStr) {
    if ($('#'+intId).val() == "0") {
        $('#'+intId).val(strStr);
    }
}

function DontAllowZero(element) {
    if ($('#'+element.id).val() == "0") {
        $('#'+element.id).val('');
    }
}

function AllowZero(intId) {
    if ($('#'+intId).val() == "0") {
        $('#'+intId).val('');
    }
}

function AutocompleteOnKeyUp(IdCol, IdInputColCodigo) {
    if($('#'+IdCol).val() != $('#'+IdCol+'_selected_text').val()) {
        $('#'+IdCol+'_selected_text').val($('#'+IdCol).val());
        $('#'+IdCol+'_tilde_ok').hide();
        $('#'+IdCol+'_selected_value').val($('#'+IdCol).val());
        if (IdInputColCodigo) {
            IdColCodigo = $('#'+IdInputColCodigo).val();
            $('#'+IdColCodigo).val('');
        }
    }
    
}

var ValorAnterior = "";
function num(obj,cantDecimales) {
    if (obj.value=="") return;
    if(cantDecimales){
        if (obj.value=='.') {obj.value='0.';return;}
        cantDecimales = parseInt(cantDecimales);
        var regex = traerRegex(cantDecimales);
        var esDecimal = regex.test(obj.value);
        if(!esDecimal){
            //si tiene otra cosa que no sea ni Numero ni punto
            obj.value=obj.value.replace(/[^0-9\.]+/,"");
            //Si tiene 2 puntos simples
            while(obj.value.indexOf(".")<obj.value.lastIndexOf("."))
                obj.value=obj.value.substring(0,obj.value.lastIndexOf("."));
            //Si tiene masdecimales que los configurados
            if(obj.value.length - 1 - obj.value.lastIndexOf(".")>cantDecimales)
                obj.value=obj.value.substring(0,obj.value.length - 1);
            obj.value = (obj.value<0)?(obj.value * -1):(obj.value );
        }else{
            //Si acaba de poner un punto espero un seg a ver si lo completa.
            //si despues del segundo, la exp sigue igual borro el ultimo punto
            if(obj.value.indexOf(".")==(obj.value.length - 1)||obj.value.lastIndexOf("0")==(obj.value.length - 1))
                setTimeout("setearNro('" + obj.id + "')",2000);
            else
                obj.value = (obj.value<0)?(obj.value * -1):(obj.value );
        }
    }else{
        if(obj.value!=obj.value.replace(/[^0-9]+/g,"")){
            obj.value=obj.value.replace(/[^0-9]+/g,"");
        }
        // borra todos los ceros no significativos. ej: 00->0    04->4
        if (obj.value != '') obj.value = obj.value*1;
    }
     return;
}
function pintarCeldaCon(IdElemento, errorclass, txtError){
    var celda = document.getElementById(IdElemento);
    if (!celda) return false;
    celda.className += ' '+errorclass;
    if(celda.type=="select-one")
        celda.parentNode.className += ' '+errorclass;
    if(celda.title=='')
        celda.title = txtError;
    else
        celda.title += "  |  " + txtError;
}

function ResetColorCelda(IdElemento){
    var celda = document.getElementById(IdElemento);
    if (!celda) return false;
    var arrayCssStyles = celda.className.split(' ');
    var className = '';
    for(i=0;i<arrayCssStyles.length;i++){
        if(arrayCssStyles[i]!='InputError' && arrayCssStyles[i]!='InputWarning')
            className += ' ' + arrayCssStyles[i];
    }
    celda.className = className;
    celda.title = '';
    if(celda.type=="select-one"){
        celda = celda.parentNode;
        var arrayCssStyles = celda.className.split(' ');
        var className = '';
        for(i=0;i<arrayCssStyles.length;i++){
            if(arrayCssStyles[i]!='InputError' && arrayCssStyles[i]!='InputWarning')
                className += ' ' + arrayCssStyles[i];
        }
        celda.className = className;
    }    
    return true;
}

 
SelectEventListener = {
    handleEvent: function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.preventBubble();
        e.preventCapture();
        var TB = e.target.id;
        var arrayIds = TB.split("_");
            if (e.keyCode == 40 || e.keyCode == 13) { // arrow down
            e.preventDefault();
            e.stopPropagation();
                    var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + eval(arrayIds[2]+'+1') + '_' + arrayIds[3]);
                    if (element)
                            element.focus();
        //    e.stopImmediatePropagation();
            }

            if (e.keyCode == 38) { // arrow up
            e.preventDefault();
            e.stopPropagation();
                    var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + eval(arrayIds[2]+'-1') + '_' + arrayIds[3]);
                    if (element)
                            element.focus();
        //    e.stopImmediatePropagation();
            }

            if (e.keyCode == 39) { // arrow right
                    //var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + arrayIds[2] + '_' + eval(arrayIds[3]+'+1'));
            e.preventDefault();
            e.stopPropagation();
            var element = $(':input')[$(':input').index(document.getElementById(TB))+1];
                    if (element)
                            element.focus();
        //    e.stopImmediatePropagation();
            }

            if (e.keyCode == 37) { // arrow left
                    //var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + arrayIds[2] + '_' + eval(arrayIds[3]+'-1'));
            e.preventDefault();
            e.stopPropagation();
            var element = $(':input')[$(':input').index(document.getElementById(TB))-1];
                    if (element)
                            element.focus();
        //    e.stopImmediatePropagation();
            }  
        //alert(e.bubbles);
        e.preventDefault();
        e.stopPropagation();
        e.preventBubble();
        e.preventCapture();
        alert(e.target.options[e.target.selectedIndex].text);
    //e.stopImmediatePropagation();
    //  return false;
    }
};

SelectEventDiscarder = {
    handleEvent: function(e) {
        e.preventDefault();
        e.preventBubble();
        e.preventCapture();
        e.stopPropagation();
    //alert(e.target.options[e.target.selectedIndex].text);
    //e.bubbles = false;
    //e.stopImmediatePropagation();
    }
};

function FocusByIdEdad(cuadro,nroFila,idEdad){
    var idFocus = 0;
    switch(idEdad){
        case '22':idFocus = 10;break;
        case '23':idFocus = 11;break;
        case '24':idFocus = 12;break;
        case '25':idFocus = 13;break;
        // TODO agregar el resto
        
        default:return false;
    }
    var idFocus = 'inp_' + cuadro + '_' + nroFila + '_' + idFocus;
    var element = document.getElementById(idFocus);        
    if (element)
        try {element.focus();} catch (e) {};    
    return true;
}



function FocusNextInput(TB) {
    if(_PRUEBA_AUTOCOMPLETE_) return;

/*    var arrData = TB.split('_');
    cuadro = arrData[1];
    nroFila = arrData[2];
    idCol = arrData[3];

    // si hice enter en un input de varones, entro y veo si hay que saltear inputs
    while(idCol == 7){
        var idColEdad = 0;
        // en este switch van los id cuadro y los id columna con el select que tiene el valor del idEdad
        switch(cuadro){
            case "104":   idColEdad = 1;  break;

        }
        if(!idColEdad){
            // en ese cuadro la columna varon no hace saltar a ningun lado o aun no esta contemplado
            break;
        }
        var idColEdad = 'inp_' + cuadro + '_' + nroFila + '_' + idColEdad;
        var idEdad = document.getElementById(idColEdad).value;
        if(FocusByIdEdad(cuadro,nroFila,idEdad)){
            // ya puso el foco, salgo
            return;
        }
        // no existe ese idEdad (puede ser que no haya un indice seleccionado), 
        // entonces se comporta como cualquier input
        break;
    }
*/
    // comienzo comportamiento "normal"
    var element = $(':input')[$(':input').index(document.getElementById(TB))+1];
    var times = 50;
    while(times-- && ($(element).attr('disabled') || $(element).attr('type') == "hidden" || element.id.match('del_') || $(element).attr('type') == "button")) {
         element = $(':input')[$(':input').index(element)+1];
    }
    if (element)
        try {element.focus();} catch (e) {};
}

function FocusCuadroChange(){
    $('#cuadroTextBox').select().focus();
}

function FocusNextCuadro(TB) {
    var idTblCuadro = getidCuadroFromInput(TB);
    var CuadroWrapper = qc.getW(idTblCuadro);
    if (!CuadroWrapper) return false;
    var childs = CuadroWrapper.parentNode.childNodes;
    var NextCuadroWrapper = null;
    for (i=0;i<childs.length && !NextCuadroWrapper;i++) {
        if (childs[i].id == CuadroWrapper.id) NextCuadroWrapper = childs[i+1]
    }
    if (!NextCuadroWrapper) return false;

    var elementSelector = $(':input',NextCuadroWrapper);
    var element = elementSelector[0];
    var times = 10;
    while(times-- && element && (element.id.indexOf("inp") == -1)){
         element = elementSelector[elementSelector.index(element)+1];
    }
    if (element){
        element.focus();
    }else{
        $('input[value|="Siguiente"]').focus();
    }
    //*/
}

function SetUpKeyNavigation() {
    /*
  document.getElementById('inp_104_1_4').addEventListener('keypress', SelectEventListener, true);
  document.getElementById('inp_104_2_4').addEventListener('keypress', SelectEventListener, true);
  document.getElementById('inp_104_3_4').addEventListener('keypress', SelectEventListener, true);
  document.getElementById('inp_104_1_4').addEventListener('keydown', SelectEventDiscarder, true);
  document.getElementById('inp_104_2_4').addEventListener('keydown', SelectEventDiscarder, true);
  document.getElementById('inp_104_3_4').addEventListener('keydown', SelectEventDiscarder, true);
  document.getElementById('inp_104_1_4').addEventListener('keyup', SelectEventDiscarder, true);
  document.getElementById('inp_104_2_4').addEventListener('keyup', SelectEventDiscarder, true);
  document.getElementById('inp_104_3_4').addEventListener('keyup', SelectEventDiscarder, true);
  //  for (var elem in $(':select')) { 
	//			elem.addEventListener('keypress', SelectEventListener, true);
  //  }
*/
    $(':input').keydown(function keyPressedCelda(e) 
    {
        var TB = e.target.id;
        if (e.target.className.indexOf('Autocomplete') != -1) return;
        /*
    var arrayIds = TB.split("_");
    if (e.keyCode == 40) { // arrow down
        e.preventDefault();
				e.stopPropagation();
        e.stopImmediatePropagation();
        var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + eval(arrayIds[2]+'+1') + '_' + arrayIds[3]);
        if (element)
            element.focus();
    }

    if (e.keyCode == 38) { // arrow up
        e.preventDefault();
				e.stopPropagation();
        e.stopImmediatePropagation();
        var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + eval(arrayIds[2]+'-1') + '_' + arrayIds[3]);
        if (element)
            element.focus();
    }

    if (e.keyCode == 39 || e.keyCode == 13) { // arrow right
        //var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + arrayIds[2] + '_' + eval(arrayIds[3]+'+1'));
        e.preventDefault();
				e.stopPropagation();
        e.stopImmediatePropagation();
        var element = $(':input')[$(':input').index(document.getElementById(TB))+1];
        if (element)
            element.focus();
    } */

            if (e.keyCode == 13) { // enter
                //var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + arrayIds[2] + '_' + eval(arrayIds[3]+'+1'));
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                FocusNextInput(TB);
            }
            
            if(e.altKey && e.shiftKey && e.keyCode == 67){ //C
                //Completar con ZERO
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                CompletarConCero(TB);
                
            }
            if(e.altKey && e.shiftKey && e.keyCode == 88){//X
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                FocusNextCuadro(TB);
                SetSinInformacion(TB);
                
            }
            if(e.altKey && e.shiftKey && e.keyCode == 90){//Z
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                BorrarFilaActual(TB);
                //FocusNextCuadro(TB);
                
            }
            if(e.altKey && e.shiftKey && e.keyCode == 87){//W
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                //alert("mostrar descripcion");
                MostrarDescripcionColumnas(TB);                
            }
            if(e.altKey && e.shiftKey && e.keyCode == 81){//Q
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                FocusCuadroChange();
                
            }
    /*    if (e.keyCode == 37) { // arrow left
        //var element = document.getElementById(arrayIds[0] + '_' + arrayIds[1] + '_' + arrayIds[2] + '_' + eval(arrayIds[3]+'-1'));
        e.preventDefault();
				e.stopPropagation();
        e.stopImmediatePropagation();
        var element = $(':input')[$(':input').index(document.getElementById(TB))-1];
        if (element)
            element.focus();
    }  */
    //	alert(e.target.options[e.target.selectedIndex].text);
    //  e.bubbles = false;
    //  e.preventDefault();
    //	e.stopPropagation();
    //  e.stopImmediatePropagation();
    //  return false;
    });
/*$(':select').keydown(function keyDownSelect(e) 
{
    if ((e.keyCode == 40 || e.keyCode == 13) // arrow down
    || (e.keyCode == 38) // arrow up
    || (e.keyCode == 39) // arrow right
    || (e.keyCode == 37)) { // arrow left
        e.preventDefault();
				e.stopPropagation();
        e.stopImmediatePropagation();
				return false;
    }
			//	alert(e.target.options[e.target.selectedIndex].text);
      //  e.bubbles = false;
      //  e.preventDefault();
			//	e.stopPropagation();
      //  e.stopImmediatePropagation();
			//	return false;
});
$(':select').keyup(function keyDownSelect(e) 
{
    if ((e.keyCode == 40 || e.keyCode == 13) // arrow down
    || (e.keyCode == 38) // arrow up
    || (e.keyCode == 39) // arrow right
    || (e.keyCode == 37)) { // arrow left
        e.preventDefault();
				e.stopPropagation();
        e.stopImmediatePropagation();
				return false;
    }
			//	alert(e.target.options[e.target.selectedIndex].text);
      //  e.bubbles = false;
      //  e.preventDefault();
			//	e.stopPropagation();
      //  e.stopImmediatePropagation();
			//	return false;
});*/
}

var arrDescripcionDisplay = new Array();
function MostrarDescripcionColumnas(TB){
    var idCuadro = getidCuadroFromInput(TB);
    var descripcionDisplay = false;
    for(var i=0;i<arrDescripcionDisplay.length;i++){
        if(arrDescripcionDisplay[i] == idCuadro){
            descripcionDisplay = true;
            break;
        }                    
    }
    if(!descripcionDisplay){
        if(document.getElementById(TB).parentNode.nodeName == "DIV")
            var nextNode = document.getElementById(TB).parentNode.parentNode.parentNode;        
        else
            var nextNode = document.getElementById(TB).parentNode.parentNode;        
        if(nextNode==nextNode.parentNode.rows[0])   
            return;
        var cantFilas = nextNode.parentNode.rows[0].cells[0].rowSpan;            
        var cantAnt = nextNode.parentNode.rows[0].getElementsByClassName('separador')[0].rowSpan;
        nextNode.parentNode.rows[0].getElementsByClassName('separador')[0].rowSpan = cantAnt + cantFilas;
        nextNode.id = "fila_post_descr_"+idCuadro;
        for(j=0;j<cantFilas;j++){
            var newNode = nextNode.parentNode.rows[j].cloneNode(true);                
            if(!j)
                newNode.getElementsByClassName('separador')[0].style.display='none';
            newNode.id = "thead_clonado_"+j+"_"+idCuadro;
            $("#fila_post_descr_"+idCuadro).before(newNode);
        }
        arrDescripcionDisplay.push(idCuadro);                
    }
    else{
        if(document.getElementById(TB).parentNode.nodeName == "DIV")
            var nextNode = document.getElementById(TB).parentNode.parentNode.parentNode;        
        else
            var nextNode = document.getElementById(TB).parentNode.parentNode;        
        if(nextNode==nextNode.parentNode.rows[0])   
            return;
        var cantFilas = nextNode.parentNode.rows[0].cells[0].rowSpan;            
        var cantAnt = nextNode.parentNode.rows[0].getElementsByClassName('separador')[0].rowSpan;
        nextNode.parentNode.rows[0].getElementsByClassName('separador')[0].rowSpan = cantAnt - cantFilas;
        document.getElementById("fila_post_descr_"+idCuadro).removeAttribute("id");
        for(j=0;j<cantFilas;j++){
            var filaEliminar = document.getElementById("thead_clonado_"+j+"_"+idCuadro);
            filaEliminar.parentNode.removeChild(filaEliminar);
        }
        delete(arrDescripcionDisplay[i]);
    }   
  
}

var PageModified = false;
var PreviousValue;
function SetBeforeUnloadEvent() {
    $(document).ready ( function () {
        /*
        $('select').each ( function () {
            $(this).change ( function () {
                PageModified = true;
            });
        });
        $('input:checkbox').each ( function () {
            $(this).keyup ( function () {
                PageModified = true;
            });
        });
        $('input:text').each ( function () {
            $(this).keyup ( function () {
                PageModified = true;
            });
        });
        */
        SetHasChangeFunctions();
        window.onbeforeunload = function(e) {
            var msg = "ATENCIÓN: Los cambios que no se hayan verificado se perderán: ¿está seguro que quiere abandonar la carga?";
            if (PageModified) {
                var e = e | window.event;
                if (e) {
                    e.returnValue = msg;
                }
                return msg;
            }
        }
    });
}


function SetReadOnly(){
    var arrInputs = $('[class="button borrarfilas_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].style.display = 'none';
    }
    var arrInputs = $('[class="button llenarconcero_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].style.display = 'none';
    }    
    var arrInputs = $('[class="button sininformacion_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].disabled = "disabled";
    }
    var arrInputs = $('[class="button coninformacion_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].disabled = "disabled";
    }    
    var arrInputs = $('[class="button agregarfila_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].disabled = "disabled";
    }    
    var arrInputs = $('textarea[id^="inp_"]');    
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].readOnly = true;
    }
    var arrInputs = $('input[id^="inp_"]');    
    for(var i=0 ; i<arrInputs.length ; i++){
        if(arrInputs[i].type == "text"){
            arrInputs[i].readOnly = true;
        }
        else{   // es checkbox
            arrInputs[i].disabled = "disabled";
        }
    }
    var arrInputs = $('select[id^="inp_"]');
    for(var i=0 ; i<arrInputs.length ; i++){        
        var str = arrInputs[i].options[arrInputs[i].selectedIndex].text;// + "  |  " + arrInputs[i].title;
        var div=arrInputs[i].parentNode;
        if(arrInputs[i].title=='')
            var title = arrInputs[i].options[arrInputs[i].selectedIndex].text;
        else
            var title = arrInputs[i].options[arrInputs[i].selectedIndex].text + "  |  " + arrInputs[i].title;
        var strDisabled = "";
        if(arrInputs[i].disabled)
            strDisabled = 'disabled="disabled"';
        div.innerHTML = "<input type='text' class='"+arrInputs[i].className+"' "+strDisabled+" title='"+title+"' value='"+str+"' />";
        div.childNodes[0].readOnly = true;
        //arrInputs[i].disabled = "disabled";
        //arrInputs[i].title = arrInputs[i].options[arrInputs[i].selectedIndex].text + "  |  " + arrInputs[i].title;
    }
}

function SetPreviousValue(e){
    if (!e) e = window.event;
    if(e.target)
        PreviousValue = e.target.value;   
    else
        PreviousValue = e.srcElement.value;   
}

function PreviousValueHaschange(e){
    if (!e) e = window.event;
    if(e.target){
        if(PreviousValue != e.target.value) 
            PageModified = true;
    }
    else{
        if(PreviousValue != e.srcElement.value) 
            PageModified = true;
    }
}

function SetHasChange(e){
    PageModified = true;
}

function SetHasChangeFunctions(){
    var arrInputs = $('[class="button agregarfila_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].onfocus = SetHasChange;
    }
    var arrInputs = $('[class="button llenarconcero_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].onfocus = SetHasChange;
    }    
    var arrInputs = $('[class="button sininformacion_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].onfocus = SetHasChange;
    }
    var arrInputs = $('[class="button coninformacion_button"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].onfocus = SetHasChange;
    }    
    var arrInputs = $('input[id^="inp_"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].onfocus = SetPreviousValue;
        arrInputs[i].onblur = PreviousValueHaschange;
        if(arrInputs[i].type=="checkbox")
            arrInputs[i].onchange = SetHasChange;
    }
    var arrInputs = $('select[id^="inp_"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].onfocus = SetPreviousValue;
        arrInputs[i].onblur = PreviousValueHaschange;
    }
    var arrInputs = $('textarea[id^="inp_"]');
    for(var i=0 ; i<arrInputs.length ; i++){
        arrInputs[i].onfocus = SetPreviousValue;
        arrInputs[i].onblur = PreviousValueHaschange;
    }
}

function SetConflictoCuadro(cuadro){
    var clasesViejas = document.getElementById('tbl_'+cuadro).className
    document.getElementById('tbl_'+cuadro).className = clasesViejas + ' conflicto';
}


/*
function IrACuadro(){
    var nombreCorto = document.getElementById("cuadroTextBox").value;
    var encontro = false;
    for(var i=0;i<arrCuadrosEnPagina.length;i++){
        if(arrCuadrosEnPagina[i]==nombreCorto){
            //location.href="#"+arrCuadrosEnPagina[i];
            document.getElementById('cuadro_'+nombreCorto).focus();
            encontro = true;
        }
    }
    return encontro;
}
*/
SetBeforeUnloadEvent();

