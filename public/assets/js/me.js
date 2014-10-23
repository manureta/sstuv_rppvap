/*
	Creación de la extensión unaVez, util para validaciones y ejecución.
	
jQuery.fn.unaVez = function(func){
	this.length && func.apply(this);
	return this;

}

/* USO...
$('li.cartitems').unaVez(function(){

	// realizar algo

});
*/

/*
 * Funcion para la busqueda con respuesta automatica de datos machados...
 * Para formularios...
 */

function enable_search_e1_22(){
	$("#Solapa1-e1-22").typeahead({source:["Antonio Jose Castro",
					"Carlos Jose Castro",
					"Carlos Marcos Marin",
					"Carlos Matias Marin",
					"Gerardo Sebastian Fatima",
					"Juan Carlos Alaska",
					"Juan Carlos Flaco",
					"Juan Carlos Luca",
					"Juan Carlos Quinto",
					"Juan Domingo Fatima",
					"Juan Luiz Mico",
					"Juan Pablo Flaco",
					"Manuel Alberto Quinto",
					"Marco Aurelio Fonton",
					"Maximo Luiz Mico",
					"Nicolas Alberto Casco",
					"Paolo Andres Casco",
					"Pedro Alberto Fonton",
					"Silvio Nicolas Luca"],updater:function(a){
												$("Solapa1-e1-22").focus();
												return a
											}
	})
}

/* --- */

var bSettingsBoxOpen = false;
$("#ME-settings-btn").on("click",function(){
	SettingsBoxOpen(this);
});

function SettingsBoxOpen(myThis) {
	$(myThis).toggleClass("open");
	$("#ME-settings-box").toggleClass("open");
	bSettingsBoxOpen = ! bSettingsBoxOpen;
}

var sFiltroEs = "";
function irFiltro(){
	$('#'+sFiltroEs).modal({show:true});
	return false;
}
/* --- */

var menuNivel = [];
var menuAnteriorNivel = undefined;
var menuAnteriorNivelUno = undefined;
function fnMenuVertical() {

	var oAnt = null;
	var oRamaAnt = null;
	var oRamaPrincipal = null;
	
	//auto-close siblings
	$('#menu-vertical li').click(function(e) {
/*
		$(this).find('>ul').stop(true, true).slideToggle(150, "swing")
			.end().siblings().find('ul').slideUp();
*/

		var oItem = $(this).find('>ul');
		oItem.stop(true, true).slideToggle(150, "swing").end().siblings().find('ul').slideUp();
		
		// console.log('oItem.length: ' + oItem.length);
		
		if( oItem.length === 0 ) {

			// console.log('A-0) Paso...' + $(this).context );

			if( menuAnteriorNivelUno != undefined) {
//				menuAnteriorNivelUno.find('a').css('text-decoration', 'none').css('font-style', 'normal').css('font-weight','normal');
				menuAnteriorNivelUno.find('a').css('font-style', 'normal').css('font-weight','normal');
			}
			
//			$(this).find('a').css('text-decoration', 'underline').css('font-style', 'italic').css('font-weight','bold');

			$(this).parent().find('a').css('font-style', 'italic').css('font-weight','bold')
			// $(this).find('a').css('font-style', 'italic').css('font-weight','bold');

			menuAnteriorNivelUno = $(this);

			// ---
				
			
			if( oAnt != null) {
				$(oAnt).attr('class', '');
			} 

			if($(this).parent().prop('id') == 'menuRaiz') {
				oRamaPrincipal = this;
			}
			
			oAnt = this;
			
			// console.log('paso...');
			
			if($(oRamaAnt).attr('class') == 'active open') {
				$(oRamaAnt).attr('class','');
			}

			$(oRamaPrincipal).attr('class','active open');
			
			oRamaAnt = oRamaPrincipal;
			
			if( $(this).parent().prop('id') == 'menuRaiz' ) {
				$(this).attr('class', 'itemOn active open');
			} else {
				$(this).attr('class', 'itemOn');
			}

			// console.log('A) Paso...' + $(this).attr('class') );

		} else {
		
			// console.log('B) Paso...' + $(this).text() );
			
//			if($(this).children().length>1) {
				// console.log('C) Paso...' + $(this).children()[1] );

				// console.log('D) Paso...' + $(this).next('li').length );

				if( menuAnteriorNivel != undefined) {
					menuAnteriorNivel.find('a').css('font-style', 'normal').css('font-weight','normal');
				}

				if( menuAnteriorNivelUno != undefined) {					
					menuAnteriorNivelUno.find('a').css('font-style', 'normal').css('font-weight','normal');
					menuAnteriorNivelUno = undefined;
				}
				
				$(this).find('a').css('font-style', 'italic').css('font-weight','bold');

				menuAnteriorNivel = $(this);
		
//			}
		
			if($(this).parent().prop('id') == 'menuRaiz') {
			
				oRamaPrincipal = this; 

				if(oRamaAnt == null) {							
					oRamaAnt = oRamaPrincipal;
				}

			}

		} 

		e.stopPropagation();
	});

/*			
	// dale
	$('#menu-vertical li').each(function(i, val){
		
		var children = $(val).find('ul li');
		
		if(children.size() > 0)
			console.log(children.size());
		
	});
*/


	$("#menu-toggler").on("click",function(){
		$("#sidebar").toggleClass("display");
		$(this).toggleClass("display");
		return false
	});
	
	var a=false;
	$("#sidebar-collapse").on("click",function(){
		$("#sidebar").toggleClass("menu-min");
		$(this.firstChild).toggleClass("icon-double-angle-right");
		a=$("#sidebar").hasClass("menu-min");
		if(a){
			$(".open > .submenu").removeClass("open")
		}
	});
	
	$(".nav-list").on("click",function(d){
		if(a){return}
		var c=$(d.target).closest(".dropdown-toggle");
		if(c&&c.length>0){
			var b=c.next().get(0);
			if(!$(b).is(":visible")){
				$(".open > .submenu").each(function(){
					if(this!=b&&!$(this.parentNode).hasClass("active")){
						$(this).slideUp(200).parent().removeClass("open")
					}
				}
			)}
			$(b).slideToggle(200).parent().toggleClass("open");
			return false
		}
	});
	
}

/* --- */

/*
	Realiza el cambio de box principalmente zona login
*/
var sISeeNow = 'MElogin-box'; // Se inicia con la ventana de login
function show_box(id) {
	if(id == 'MEcarga-container') {
		if($('#'+id).attr('class') == 'hiddenCarga') { // No lo veo la ventana de carga
			$('#'+sISeeNow).removeClass('visible');  // Oculto las ventanas de login
		
			$('#'+id).attr('class','visibleCarga'); // hago visible la ventana de carga

		}
		
		// Para mostrar los grafico en la ventana de carga 
		DatosInformacionGeneralv001()
		
	} else { // Voy a ver las ventalas del login
		if(sISeeNow == 'MEcarga-container'){ // Si la ventana actual es de carga
			$('#'+sISeeNow).attr('class','hiddenCarga'); // Oculto la ventana actual es de carga
		} else {
			$('#'+sISeeNow).removeClass('visible'); // Oculto las ventanas de login
		}
		$('#'+id).addClass('visible'); // hago visible las ventanas de login
	}

	sISeeNow = id;
}

/* --- */

/*
	Graficos de la pantalla de informacion
*/
function fnPieChart() {

	$('.dialogs,.comments').slimScroll({
		height: '300px'
	});
	
	$('#tasks').sortable();
	$('#tasks').disableSelection();
	$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
		if(this.checked) $(this).closest('li').addClass('selected');
		else $(this).closest('li').removeClass('selected');
	});

	var oldie = $.browser.msie && $.browser.version < 9;
	$('.easy-pie-chart.percentage').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
		var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
		var size = parseInt($(this).data('size')) || 50;
		$(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: parseInt(size/10),
			animate: oldie ? false : 1000,
			size: size
		});
	})

	$('.sparkline').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
		$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
	});




  var data = [
	{ label: "social networks",  data: 38.7, color: "#68BC31"},
	{ label: "search engines",  data: 24.5, color: "#2091CF"},
	{ label: "ad campaings",  data: 8.2, color: "#AF4E96"},
	{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
	{ label: "other",  data: 10, color: "#FEE074"}
  ];

  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
  $.plot(placeholder, data, {
	
	series: {
		pie: {
			show: true,
			tilt:0.8,
			highlight: {
				opacity: 0.25
			},
			stroke: {
				color: '#fff',
				width: 2
			},
			startAngle: 2
			
		}
	},
	legend: {
		show: true,
		position: "ne", 
		labelBoxBorderColor: null,
		margin:[-30,15]
	}
	,
	grid: {
		hoverable: true,
		clickable: true
	},
	tooltip: true, //activate tooltip
	tooltipOpts: {
		content: "%s : %y.1",
		shifts: {
			x: -30,
			y: -50
		}
	}
	
 });

 
  var $tooltip = $("<div class='tooltip top in' style='display:none;'><div class='tooltip-inner'></div></div>").appendTo('body');
  placeholder.data('tooltip', $tooltip);
  var previousPoint = null;

  placeholder.on('plothover', function (event, pos, item) {
	if(item) {
		if (previousPoint != item.seriesIndex) {
			previousPoint = item.seriesIndex;
			var tip = item.series['label'] + " : " + item.series['percent']+'%';
			$(this).data('tooltip').show().children(0).text(tip);
		}
		$(this).data('tooltip').css({top:pos.pageY + 10, left:pos.pageX + 10});
	} else {
		$(this).data('tooltip').hide();
		previousPoint = null;
	}
	
 });






	var d1 = [];
	for (var i = 0; i < Math.PI * 2; i += 0.5) {
		d1.push([i, Math.sin(i)]);
	}

	var d2 = [];
	for (var i = 0; i < Math.PI * 2; i += 0.5) {
		d2.push([i, Math.cos(i)]);
	}

	var d3 = [];
	for (var i = 0; i < Math.PI * 2; i += 0.2) {
		d3.push([i, Math.tan(i)]);
	}
	
/*			
	var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
	$.plot("#sales-charts", [
		{ label: "Domains", data: d1 },
		{ label: "Hosting", data: d2 },
		{ label: "Services", data: d3 }
	], {
		hoverable: true,
		shadowSize: 0,
		series: {
			lines: { show: true },
			points: { show: true }
		},
		xaxis: {
			tickLength: 0
		},
		yaxis: {
			ticks: 10,
			min: -2,
			max: 2,
			tickDecimals: 3
		},
		grid: {
			backgroundColor: { colors: [ "#fff", "#fff" ] },
			borderWidth: 1,
			borderColor:'#555'
		}
	});
*/			

	$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
	function tooltip_placement(context, source) {
		var $source = $(source);
		var $parent = $source.closest('.tab-content')
		var off1 = $parent.offset();
		var w1 = $parent.width();

		var off2 = $source.offset();
		var w2 = $source.width();

		if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
		return 'left';
	}

}


/* ---- */

/*
 * actualizarDatosEnFicha(data.row.userId)
 * Actualiza los datos de la fichas segun el datos del row activo.
 */
function actualizarDatosEnFicha(aRow) {

	// console.dir(aRow);
	
	// $("#Solapa1").loadJSON(aRow);
	var primerElemento;
    for(var attr in aRow){
		// console.log(attr + ' : ' + aRow[attr]);
		if( attr.startsWith('Solapa') ) {
			var idCtrl = $("#"+attr);
			if (idCtrl.length > 0) {
                                if(attr.startsWith('SolapaMultiSimple')){
                                    /*Busqueda del control en pantalla*/
                                    pos = oFuncion.getWatablePosById(attr);
                                    if(pos!=-1){
                                        obj = watable_MultiListas[pos];
                                        var res = attr.split("-");
                                        var myMultiSelect = { 
                                            ctrlWeb : attr, 
                                            urlPedido : "/getRequest.php", 
                                            urlData: { reqCat: "OPFicha", reqDo: "getMultiListaSimple", multi:res[res.length-1], item: _IdUnique, fi: res[res.length-2] ,_hash_point_:hash_point, _OutPutStyle_: "JSON" }, 
                                            filterViewDefault : 'all',
                                            checkboxes : true,
                                            filterViewDefault : (obj.mm_filterviewdefault=="0"?'':obj.mm_filterviewdefault=="1"?'chequed':obj.mm_filterviewdefault=="2"?'unchecked':''),
                                            checkboxes : (obj.mm_p_seleccionar=="1"?true:false),
                                            filasPorDefecto : parseInt(obj.mm_filaspordefecto), 
                                            filter : (obj.mm_filter=="1"?true:false),
                                            columnPicker : (obj.mm_columnPicker=="1"?true:false)//,
                                            //editBloqueado : true
                                         };
                                         delete obj.watable;
                                         obj.watable = $.extend(true, [], tblMultiSelect( myMultiSelect ) );
                                    }
                                }else if(attr.startsWith('SolapaMultiRelacion')){
                                       /*Busqueda del control en pantalla*/
                                    pos = oFuncion.getWatablePosById(attr);
                                    if(pos!=-1){
                                        obj = watable_MultiListas[pos];
                                        var res = attr.split("-");
                                        var myMultiSelect = { 
                                           ctrlWeb : attr, 
                                           urlPedido : "/getRequest.php", 
                                           urlData: { reqCat: "OPFicha", reqDo: "getMultiListaRelacion", multi:res[res.length-1], item: _IdUnique, fi: res[res.length-2] ,_hash_point_:hash_point, _OutPutStyle_: "JSON" }, 
                                           filterViewDefault : 'all',
                                           checkboxes : true,
                                            filterViewDefault : (obj.mm_filterviewdefault=="0"?'':obj.mm_filterviewdefault=="1"?'chequed':obj.mm_filterviewdefault=="2"?'unchecked':''),
                                            checkboxes : (obj.mm_p_seleccionar=="1"?true:false),
                                            filasPorDefecto : parseInt(obj.mm_filaspordefecto), 
                                            filter : (obj.mm_filter=="1"?true:false),
                                            columnPicker : (obj.mm_columnPicker=="1"?true:false)//,
                                            //editBloqueado : true  
                                         };
                                         delete obj.watable;
                                         obj.watable = $.extend(true, [], tblMultiSelect( myMultiSelect ) );
                                    }
                                }else{
                                    primerElemento = primerElemento || $(idCtrl);
                                    setElementValue($(idCtrl),aRow[attr]);
                                }
			}
		}
    }
    FN14_DisableButtonsByAction(BTN_CANCELAR);
    oFuncion.doForm(FORM_LOCK,FORM_NOTCLEAN,FORM_NOTSAVE,FORM_NOTRESTORE);
    //$("#InputDefaultHidden").focus();
    //$("#btn-scroll-up").focus();
    //$("#nav-search-input").focus();
    $(primerElemento).focus();
    //$(primerElemento).attr('tabindex', -1).focus();
}


function setElementValue(element, value) {
    var type = element.type || element.tagName;
    if (type == null) {
        type = element[0].type || element[0].tagName; //select returns undefined if called directly
        if (type == null) {
            return;
        }
    }
    type = type.toLowerCase();
    switch (type) {

        case 'radio':
            if (value.toString().toLowerCase() == element.value.toLowerCase()) {
                $(element).attr("checked", "checked");
            }
            break;

        case 'checkbox':
            if (value) {
                //$(element).attr("checked", "checked");
                $(element).attr("checked", true);
            }
            break;
        case 'option':
            $(element).attr("value", value.value);
            $(element).text(value.text);
            if (value.selected)
                $(element).attr("selected", true);
            break;
        case 'select-multiple':
            //This is "interesting". In mobile use element.options while in the desktop use element[0].options
            var select = element[0];
            if (element[0].options == null || typeof (element[0].options) == "undefined") {
                select = element;
            }
            if (select.options.length > 1) {
                //If select list is not empty use values array to select optionses
                var values = value.constructor == Array ? value : [value];
                //replaced element with element[0] ???? because now it reports that element.optons does not exists
                for (var i = 0; i < select.options.length; i++) {
                    for (var j = 0; j < values.length; j++) {
                        select.options[i].selected |= select.options[i].value == values[j];
                    }
                }
            }
            break;

        case 'select':
        case 'select-one':
            if (typeof value == "string") {
                $(element).attr("value", value);
            }
            break;
        case 'text':
        case 'hidden':
			if (typeof value === "object") { // caso de array de listas...
				$(value).each(function(i, val){
					$(element).select2("val", val.cod);
				});
			} else {
				$(element).val(value);
				// $(element).val(value).focus().attr("value",value);
			}
            break;
        case 'img':

            if (obj.constructor == "String") {
                //Assumption is that value is in the HREF$ALT format
                var iPosition = value.indexOf('$');
                var src = "";
                var alt = "";
                if (iPosition > 0) {
                    src = value.substring(0, iPosition);
                    alt = value.substring(iPosition + 1);
                }
                else {
                    src = value;
                    var iPositionStart = value.lastIndexOf('/') + 1;
                    var iPositionEnd = value.indexOf('.');
                    alt = value.substring(iPositionStart, iPositionEnd);
                }
                $(element).attr("src", src);
                $(element).attr("alt", alt);
            } else {
                $(element).attr("src", obj.src);
                $(element).attr("alt", obj.alt);
                $(element).attr("title", obj.title);
            }
            break;

        case 'textarea':
        case 'submit':
        case 'button':
        default:
            try {
                $(element).html(value.toString());
            } catch (exc) { }
    }

}

/* ---- */

function validarFecha( value ) {
	var validator = this;
	var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
	var fechaCompleta = value.match(datePat);
	if (fechaCompleta == null) {
		return false;
	}

	dia = fechaCompleta[1];
	mes = fechaCompleta[3];
	anio = fechaCompleta[5];

	if (dia < 1 || dia > 31) {
		return false;
	}
	if (mes < 1 || mes > 12) { 
		return false;
	}
	if ((mes==4 || mes==6 || mes==9 || mes==11) && dia==31) {
		return false;
	}
	if (mes == 2) { // bisiesto
		var bisiesto = (anio % 4 == 0 && (anio % 100 != 0 || anio % 400 == 0));
		if (dia > 29 || (dia==29 && !bisiesto)) {
			return false;
		}
	}
	return true;
}

/* ---- */

/*
	Tabla de para la Seleccion del CUE posLogin
*/
function tablaSeleccionCUE() {

	var myDefParam = {

		urlPedido : '', // fuente de datos
		urlData : { id : 0, // en el caso de padre no se asigna
					reqCat: "OPFicha", 
					reqDo: "getResultSet", 
					_OutPutStyle_: "JSON", 
					_hash_point_: hash_point // esta la defini en el head del index.html
				},	
				
		urlPedidoHijo : '', // fuente de datos para tabla hija
		urlDataHijo : { id : 0, // se carga en el dblclick de la fila 
					reqCat: "OPFicha", 
					reqDo: "getResultSet", 
					_OutPutStyle_: "JSON", 
					_hash_point_: hash_point // esta la defini en el head del index.html
				},	

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
	
	myDefParam.urlPedido = 'aplicacionDinamica/ejemplo_datos_cue.php';
	// myDefParam.urlPedidoHijo = 'aplicacionDinamica/AdminAlumnosInscripEstCurric_v001.json';
	// myDefParam.infoAccesoHijo = 'Más datos doble clic en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
	
	// show_box('MEcarga-container');
	
	return tblMake( myDefParam );	

}

/* ---- */

/*
	PIVOTE
	""""""
	
	Tabla de para el Filtro y Seleccion para alimentar la ficha
*/
var waTable; 
var _IdUnique=0;  // Informa el id del campo unique al que se le hizo click
var _IdUniquePadre=0;  // Informa el id del campo unique al que se le hizo dblclick
function tablaFiltroSeleccion(idPedido) {
	// Indicador si esta la tabla visible 
	bHayDatosEnTabla = true;
	
	var myDefParam = {

		urlPedido : '', // fuente de datos
		urlData : { id : 0, // en el caso de padre no se asigna
					reqCat: "OPFicha", 
					reqDo: "getResultSet", 
					_OutPutStyle_: "JSON", 
					_hash_point_: hash_point // esta la defini en el head del index.html
				},	
				
		urlPedidoHijo : '', // fuente de datos para tabla hija
		urlDataHijo : { id : 0, // se carga en el dblclick de la fila 
					reqCat: "OPFicha", 
					reqDo: "getResultSet", 
					_OutPutStyle_: "JSON", 
					_hash_point_: hash_point // esta la defini en el head del index.html
				},	

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
	
	switch (idPedido) {
	case 1 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosPersonalesv010.json';
		break;
	case 2 :
		myDefParam.urlPedido = 'aplicacionDinamica/DefinicionSeccionesv001.json';
		break;
	case 3 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosPersonalesv001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/AntecedentesEducativosNoUniversitariov001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 4 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosPersonalesv001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/AntecedentesEducativosUniversitariov001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 5 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosPersonalesv001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/AdminAlumnosInscripEstCurric_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 6 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosPersonalesv001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/AdminAlumnosCargarNotasFinales_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 7 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosPersonalesv001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/AdminAlumnosActividadesExtracurriculares_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 8 :
		myDefParam.urlPedido = 'aplicacionDinamica/OrgInstitucCaracterísticasEstablecimiento_ProgramasProyectos.json';
		break;
	case 9 :
		myDefParam.urlPedido = 'aplicacionDinamica/OrgInstitucEstudiosCurriculares_CajaCurric.json';
		break;
	case 10 :
		// myDefParam.urlPedido = 'aplicacionDinamica/OrgInstitucEstudiosCurriculares_CajaCurric.json';
		myDefParam.urlPedido = 'aplicacionDinamica/Seleccion_Titulaciones_v001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/OrgInstitucEstudiosCurriculares_EspacioCurricular.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 11 :
		myDefParam.urlPedido = 'aplicacionDinamica/OrgInstitucEstudiosActivExtraCurric.json';
		break;
	case 12 :
		myDefParam.urlPedido = 'aplicacionDinamica/OrgInstituc_Secciones_InfoGeneral.json';
		break;
	case 13 :
		myDefParam.urlPedido = 'aplicacionDinamica/OrgInstituc_Secciones_InfoGeneral.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/OrgInstituc_Secciones_EstudCurric.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 14 :
		myDefParam.urlPedido = 'aplicacionDinamica/OrgInstituc_Secciones_InfoGeneral_EspaciosExtracurricilares.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/OrgInstituc_Secciones_EstudExtracurric.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 15 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosBasicosEstablecimiento_DatosBasicos_v001.json';
		break;
	case 16 :
		myDefParam.urlPedido = 'aplicacionDinamica/DatosBasicosEstablecimiento_DatosBasicos_v001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/DatosBasicosEstablecimiento_Autoridades_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 18 :
		myDefParam.urlPedido = 'aplicacionDinamica/OrgInstitucEstudiosCurriculares_CarreraTitulo.json';
		break;
	case 19 :
		myDefParam.urlPedido = 'aplicacionDinamica/Procesos_Inscripciones_EstCurric_Alumnos_Pivote_v001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/Procesos_Inscripciones_EstCurricPlanesNoGraduados_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 20 :
		myDefParam.urlPedido = 'aplicacionDinamica/Procesos_Inscripciones_EstCurric_Alumnos_Pivote_v001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/Procesos_Inscripciones_EstCurricPlanesGraduados_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 21 : // Procesos Carga Notas Alumnos
		myDefParam.urlPedido = 'aplicacionDinamica/Procesos_Inscripciones_CargaNotas_Alumnos_v001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/ID_Procesos_CargaNotas_Alumnos_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 22 : // Procesos Carga Notas Espacio Curricular
		myDefParam.urlPedido = 'aplicacionDinamica/Seleccion_Titulaciones_v001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/Seleccion_MateriaSeccion_segun_Titulaciones_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 23 : // Procesos de inscripción a Actividades Extracurriculares 
		myDefParam.urlPedido = 'aplicacionDinamica/Procesos_Inscripciones_ActividadesExtracurricilares.json';
		break;
	case 24 : // Procesos de Asignar sección a un grupo de alumnos
		myDefParam.urlPedido = 'aplicacionDinamica/Seleccion_Titulaciones_v001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/OrgInstituc_Secciones_InfoGeneral_Pivote.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	case 25 : // Procesos para Dar de baja alumnos
		myDefParam.urlPedido = 'aplicacionDinamica/DatosPersonalesv001.json';
		myDefParam.urlPedidoHijo = 'aplicacionDinamica/Seleccion_Titulaciones_por_Alumno_v001.json';
		myDefParam.infoAccesoHijo = 'Más datos doble click en la fila.'; // notifica al usuario que para ver datos del hijo debe hacer dblclick 
		break;
	}

	// Control para determinar si veo o no al PIVOTE según la cantidad de rows que posee
	ctrlParaVisibilidadDelPivote(myDefParam.urlPedidoHijo == '');
	
	return tblMake( myDefParam );
}
	
/*
	//An example with all options.
	$('#tablaFiltroSeleccion').empty();
	waTable = $('#tablaFiltroSeleccion').WATable({
		idTabla : 'tblDatosPersonales', // id de la tabla a nivel DOM
		btnSiguiente : "btnFichaSig", // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		btnAnterior : "btnFichaAnt", // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		pageSize : 5, //Sets the initial pagesize
		filter : false, //Show filter fields
		columnPicker : true, //Show the columnPicker button
		pageSizes : [], //Set custom pageSizes. Leave empty array to hide button.
		hidePagerOnEmpty : true, //Removes the pager if data is empty.
		checkboxes : true, //Make rows checkable. (Note. You need a column with the 'unique' property)
		preFill : false, //Initially fills the table with empty rows (as many as the pagesize).
		url: urlPedido,	//Url to a webservice if not setting data manually as we do in this example
		//url: '/someWebservice',    //Url to a webservice if not setting data manually as we do in this example
		//urlData: { report:1 },     //Any data you need to pass to the webservice
		//urlPost: true,             //Use POST httpmethod to webservice. Default is GET.
		types : {//Following are some specific properties related to the data types
			string : {
				//filterTooltip: "Giggedi..."    //What to say in tooltip when hoovering filter fields. Set false to remove.
				//placeHolder: "Type here..."    //What to say in placeholder filter fields. Set false for empty.
			},
			number : {
				decimals : 1 //Sets decimal precision for float types
			},
			bool : {
				//filterTooltip: false
			},
			date : {
				utc : true, //Show time as universal time, ie without timezones.
				format : 'dd/MM/yyyy', //The format. See all possible formats here http://arshaw.com/xdate/#Formatting.
				datePicker : false //Requires "Datepicker for Bootstrap" plugin (http://www.eyecon.ro/bootstrap-datepicker).
			}
		},
		actions : {//This generates a button where you can add elements.
			filter : true, //If true, the filter fields can be toggled visible and hidden.
			columnPicker : true, //if true, the columnPicker can be toggled visible and hidden.
			custom : [	//Add any other elements here. Here is a refresh and export example.
				$('<a href="#" class="refresh"><i class="icon-refresh"></i>&nbsp;Actualizar vista</a>')
				//	, $('<a href="#" class="export_all"><i class="icon-share"></i>&nbsp;Exportar todas las filas</a>')
				//	, $('<a href="#" class="export_checked"><i class="icon-share"></i>&nbsp;Exportar filas seleccionadas</a>')
				//	, $('<a href="#" class="export_filtered"><i class="icon-share"></i>&nbsp;Exportar filas filtradas</a>')
			]
		},
		tableCreated : function(data) {//Fires when the table is created / recreated. Use it if you want to manipulate the table in any way.
			console.log('table created');
			//data.table holds the html table element.
			console.log(data);
			//'this' keyword also holds the html table element.
		},
		rowClicked : function(data) {//Fires when a row is clicked (Note. You need a column with the 'unique' property).
			console.log('row clicked');
			//data.event holds the original jQuery event.
			console.log(data);
			//data.row holds the underlying row you supplied.
			//data.column holds the underlying column you supplied.
			//data.checked is true if row is checked.
			//'this' keyword holds the clicked element.
			if ($(this).hasClass('userId')) {
				data.event.preventDefault();
				alert('You clicked userId: ' + data.row.userId);
			}

			// - MAR -
			actualizarDatosEnFicha(data.row);
			// -------
		},
		rowBtnMove : function(data) {//Se activa a cliquear los botones de desplazamiento (Note. You need a column with the 'unique' property).
			console.log('row move');
			//data.event holds the original jQuery event.
			console.log(data);
			//data.row holds the underlying row you supplied.
			//data.column holds the underlying column you supplied.
			//data.checked is true if row is checked.
			//'this' keyword holds the clicked element.
			if ($(this).hasClass('userId')) {
				data.event.preventDefault();
				alert('You clicked userId: ' + data.row.userId);
			}

			// - MAR -
			actualizarDatosEnFicha(data.row);
			// -------
		},
		columnClicked : function(data) {//Fires when a column is clicked
			console.log('column clicked');
			//data.event holds the original jQuery event
			console.log(data);
			//data.column holds the underlying column you supplied
			//data.descending is true when sorted descending (duh)
		},
		pageChanged : function(data) {//Fires when manually changing page
			console.log('page changed');
			//data.event holds the original jQuery event
			console.log(data);
			//data.page holds the new page index
		},
		pageSizeChanged : function(data) {//Fires when manually changing pagesize
			console.log('pagesize changed');
			//data.event holds teh original event
			console.log(data);
			//data.pageSize holds the new pagesize
		},

	}).data('WATable');
	//This step reaches into the html data property to get the actual WATable object. Important if you want a reference to it as we want here.

}
*/

function tblMultiSelect( inParam ) {
	var myMultiSelect = {
		urlPedido : inParam.urlPedido, // fuente de datos
		urlPedidoHijo : '', // fuente de datos para tabla hija
		idDIV : inParam.ctrlWeb + ' .ME_tblMultiLista', // referencia al objeto a crear
		idTBL : "tblMultiSelect_" + inParam.ctrlWeb, // id del TABLE 
		btnSiguiente : '', // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		btnAnterior : '', // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		filterViewDefault : inParam.filterViewDefault, // ( '' o checked o unchecked ) filtro por defecto con el que se despliega inicialmente la tabla
		idViewAll : inParam.ctrlWeb + ' .verTodos', // all - id del boton para filtrar la vista "ver Todos"
		idViewSelect : inParam.ctrlWeb + ' .verSeleccionados', // checked - id del boton para filtrar la vista "ver Seleccionados"
		idViewNotSelect : inParam.ctrlWeb + ' .verNoSeleccionados', // unchecked - id del boton para filtrar la vista "ver No Seleccionados"
		checkboxes : inParam.checkboxes || false, // true, //Make rows checkable. (Note. You need a column with the 'unique' property)
		editBloqueado : inParam.editBloqueado || false, // ctrl para bloquear la edicion de celdas
		filasPorDefecto : inParam.filasPorDefecto || 10, // 10,
		urlData: inParam.urlData,
                //rowClicked : inParam.rowClicked,
                //rowDblClicked : inParam.rowDblClicked,
		enPivote : false, // Controla la visualización de los datos de referencia sobre la tabla pivote
		filter : inParam.filter || false, // true,
		columnPicker : inParam.columnPicker || false, // true,
		itemaction : inParam.itemaction || false,
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

	myMultiSelect.filasPorDefecto = inParam.filasPorDefecto || myMultiSelect.filasPorDefecto;
	
	return tblMake( myMultiSelect );
}

var removerFila = false; // para el borrado de fila al hacer click sobre la fila.
var tblWorkActiva; // guarda el objeto waTable que se requiera para su uso.
var dataWATable = []; // guarda info de las tablas usadas, acceso por en nombre de la tabla, actualmente guardo la cantidad del registros...
/*
		$.each( dataWATable , function(ind,pvt) {
			if ( pvt.tbl == "tblPivote") {

				console.info("Encontro el pivote con cantidad: " + pvt.cantRows );
	
			}
		});
*/

function tblMake( inParam ) {
        //_IdUniquePadre = 0;
        //_IdUnique = 0;
	var enPivote = inParam.enPivote;
	var idDiv = "#" + inParam.idDIV;
	var multiPivote = inParam.urlPedidoHijo != ''; // Informa si posee más de un nivel de PIVOTE
	var refPivotePadre = ""; // Guarda el literal del PIVOTE padre.
	
	//An example with all options.
	$(idDiv).empty();
	
	waTable = $(idDiv).WATable({
		idTabla : inParam.idTBL, // 'tblDatosPersonales', // id de la tabla a nivel DOM
		btnSiguiente : inParam.btnSiguiente, // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		btnAnterior : inParam.btnAnterior, // id del boton que esta fuera de area de la tabla para desplazamiento 1 a 1
		viewDefault : inParam.filterViewDefault, // Establece el filtro a utilizar por defecto. Datos a visualizar al principio.
		viewAll : inParam.idViewAll, // all - Para dar soporte al componente de filtar la vista 
		viewSelect : inParam.idViewSelect, // checked - Para dar soporte al componente de filtar la vista
		viewNotSelect : inParam.idViewNotSelect, // unchecked - Para dar soporte al componente de filtar la vista
		pageSize : inParam.filasPorDefecto, //Sets the initial pagesize
		filter : inParam.filter, // true, //Show filter fields
		columnPicker : inParam.columnPicker, //Show the columnPicker button
		itemaction : inParam.itemaction, // Show the filas button - add and remove filas
		pageSizes : [], //Set custom pageSizes. Leave empty array to hide button.
		hidePagerOnEmpty : true, //Removes the pager if data is empty.
		checkboxes : inParam.checkboxes, //Make rows checkable. (Note. You need a column with the 'unique' property)
		editBloqueado : inParam.editBloqueado || false, // ctrl para bloquear la edicion de celdas
		preFill : false, //Initially fills the table with empty rows (as many as the pagesize).
		url: inParam.urlPedido,	//Url to a webservice if not setting data manually as we do in this example
		urlData: inParam.urlData,	//Any data you need to pass to the webservice
		//url: '/someWebservice',    //Url to a webservice if not setting data manually as we do in this example
		//urlData: { report:1 },     //Any data you need to pass to the webservice
		//urlPost: true,             //Use POST httpmethod to webservice. Default is GET.

		urlHijo: inParam.urlPedidoHijo, // fuente de datos para tabla hija
		urlDataHijo: inParam.urlDataHijo,	//Any data you need to pass to the webservice
		//urlPostHijo: true,             //Use POST httpmethod to webservice. Default is GET.
		
		infoAccesoHijo : inParam.infoAccesoHijo, // notifica al usuario que para ver datos del hijo debe hacer dblclick  
		
		types : {//Following are some specific properties related to the data types
			string : {
				//filterTooltip: "Giggedi..."    //What to say in tooltip when hoovering filter fields. Set false to remove.
				//placeHolder: "Type here..."    //What to say in placeholder filter fields. Set false for empty.
			},
			number : {
				decimals : 1 //Sets decimal precision for float types
			},
			bool : {
				//filterTooltip: false
			},
			date : {
				utc : true, //Show time as universal time, ie without timezones.
				format : 'dd/MM/yyyy', //The format. See all possible formats here http://arshaw.com/xdate/#Formatting.
				datePicker : false //Requires "Datepicker for Bootstrap" plugin (http://www.eyecon.ro/bootstrap-datepicker).
			},
			list: {
				cod: true,
				description: true
			}
		},
		actions : inParam.actions,
/*
		actions : {//This generates a button where you can add elements.
			filter : true, //If true, the filter fields can be toggled visible and hidden.
			columnPicker : true, //if true, the columnPicker can be toggled visible and hidden.
			custom : [	//Add any other elements here. Here is a refresh and export example.
				$('<a href="#" class="refresh"><i class="icon-refresh"></i>&nbsp;Actualizar vista</a>')
				//	, $('<a href="#" class="export_all"><i class="icon-share"></i>&nbsp;Exportar todas las filas</a>')
				//	, $('<a href="#" class="export_checked"><i class="icon-share"></i>&nbsp;Exportar filas seleccionadas</a>')
				//	, $('<a href="#" class="export_filtered"><i class="icon-share"></i>&nbsp;Exportar filas filtradas</a>')
			]
		},
*/
		rowClicked : function(data) {//Fires when a row is clicked (Note. You need a column with the 'unique' property).
			console.log('row clicked');
			//data.event holds the original jQuery event.
			console.log(data);
			//data.row holds the underlying row you supplied.
			//data.column holds the underlying column you supplied.
			//data.checked is true if row is checked.
			//'this' keyword holds the clicked element.
			if ($(this).hasClass('userId')) {
				data.event.preventDefault();
				alert('You clicked userId: ' + data.row.userId);
			}

			// - MAR -
			if ( enPivote ) {
                                // Obtengo el id guardado en la columna del tipo "unique"
				_IdUnique = data.idUnique;
				//alert( _IdUnique );	
                                
				if ( multiPivote ) {
					$("#detalleSegunFila").text("Ref.: " + refPivotePadre + data.detalle );  // Visualizo el detalle segun columnas como referencia de la fila
				} else {
					$("#detalleSegunFila").text("Ref.: " + data.detalle );  // Visualizo el detalle segun columnas como referencia de la fila
				}
				bFiltroSeleccionVisible = true;
				activaFiltroSeleccion();
				actualizarDatosEnFicha(data.row);

						
			}
			
			if ( removerFila ) {
				console.log('borrado de fila...');
				bootbox.setLocale('es');
				bootbox.confirm("Atención!!! al cliquear sobre el botón aceptar borrar la fila.", function(result) {
					if (result) tblWorkActiva.deleteRow( data.idUnique ); // Indico el id del unique a borrar...
				}); 
				removerFila = false;
			}
			// -------
		},
		rowDblClicked : function(data) {// Obtengo el evento dblclick
			console.log('row dbl clicked');
			//data.event holds the original jQuery event.
			console.log(data);		

			// -------
			// - MAR -
			if ( enPivote ) {
                                // Obtengo el id guardado en la columna del tipo "unique"
				_IdUniquePadre = data.idUnique;
				//alert( _IdUniquePadre );
                                
				refPivotePadre = data.detalle;
				$("#detalleSegunFila").text("Ref.: " + refPivotePadre );  // Visualizo el detalle segun columnas como referencia de la fila
				// bFiltroSeleccionVisible = true;
				// activaFiltroSeleccion();
				// actualizarDatosEnFicha(data.row);
			}
			
		},
		rowBtnMove : function(data) {//Se activa a cliquear los botones de desplazamiento (Note. You need a column with the 'unique' property).
			console.log('row move');
			//data.event holds the original jQuery event.
			console.log(data);
			//data.row holds the underlying row you supplied.
			//data.column holds the underlying column you supplied.
			//data.checked is true if row is checked.
			//'this' keyword holds the clicked element.
			if ($(this).hasClass('userId')) {
				data.event.preventDefault();
				alert('You clicked userId: ' + data.row.userId);
			}

			// - MAR -
			actualizarDatosEnFicha(data.row);
			// -------
		},			
		addRow : function(row) {}, // Para agregar filas
		changeRow : function(row) {}, // Para cambiar datos de la fila
		deleteRow : function(row) {}, // Para elimnar fila, pasar solo columna "unique"
                tableCreated: function(data) {oFuncion.watableCreado(data)}

	}).data('WATable');
	//This step reaches into the html data property to get the actual WATable object. Important if you want a reference to it as we want here.

	return waTable;
}


/* --- */
function limpioZonaDeTabla() {
	bHayDatosEnTabla = false; // Indicador su esta la tabla visible
	$('#tablaFiltroSeleccion').empty();
	return false;
}
/* --- */

/*
	Manejo de la visualización de "Filtro y selección"
*/
var bFiltroSeleccionVisible = true;

// Invierto el boton para que se apoye en la linea superior
$("#btnFiltroSeleccion").removeClass("activado");

// Activo el cuadro de filtrado y selección para su utilización
$("#ZonaDeFiltroSeleccion").attr("class","visible");

// Oculto el formulario
$("#zonaCargaDP").attr("class","hidden");

function activaFiltroSeleccion(){

	if(bFiltroSeleccionVisible){
		// Determina el texto en el boton
		$("#btnFiltroSeleccion").text("Ver grilla de selección");

		// Oculta el panel de la barra de botones
		if( ! bSettingsBoxOpen ) {
			SettingsBoxOpen($("#ME-settings-btn"));
		}

		// Invierto el boton para que se apoye en la linea superior
		$("#btnFiltroSeleccion").removeClass("activado");
		
		// desactivo el cuadro de filtrado y seleccion
		$("#ZonaDeFiltroSeleccion").attr("class","hidden");
		
		// visualizo el formulario de carga
		$("#zonaCargaDP").removeClass("hidden");
		
		// - MAR -
		if ( tblPivote ) {
			actualizarDatosEnFicha(tblPivote.getDataPosCollapse());
		}
		// -------
	} else {
		// Determina el texto en el boton
		$("#btnFiltroSeleccion").text("Ver formulario");
	
		// Oculta el panel de la barra de botones
		if( bSettingsBoxOpen ) {
			SettingsBoxOpen($("#ME-settings-btn"));
		}

		// Invierto el boton para que se apoye en el cuadro de filtrado y seleccion
		$("#btnFiltroSeleccion").addClass("activado");
		
		// Oculto el formulario de carga
		$("#zonaCargaDP").addClass("hidden");
		
		// Activo el cuadro de filtrado y seleccion para su utilización
		$("#ZonaDeFiltroSeleccion").attr("class","visible");

	}
	bFiltroSeleccionVisible = ! bFiltroSeleccionVisible;

	return false;
}

// Darga de la tabla para selección
// tablaFiltroSeleccion();

/* --- */

/*
	Controlo si se debe ver el PIVOTE.
	Para el caso de que hay más de un item en la grilla de pivote.
*/
var tblPivote; // Tengo la referencia al PIVOTE
var ctrlParaVisibilidadDelPivote = function(pivoteSimple) {

// Oculto la grilla
	// Invierto el botón para que se apoye en la linea superior
	$("#btnFiltroSeleccion").removeClass("activado");
	
	// desactivo el cuadro de filtrado y selección
	$("#ZonaDeFiltroSeleccion").attr("class","hidden");
//---

	var timeoutPVT = undefined;
	var cortePVT_timeout_trigger = 10; // Cantidad de re intentos antes de cancelar la acción...

	PVT_timeout_trigger = function() { 
		tblPivote = $('#tablaFiltroSeleccion').data('WATable'); // Obtengo el pivote
		if ( typeof tblPivote.getCountData() == "number" ) {
			clearTimeout(timeoutPVT); // Corto el ctrl sobre carga de pivote
/*			
			if ( tblPivote.getCountData() > 1 ) { // Hay más de un row en el pivote...
				console.info("Encontró el pivote con cantidad (>1): " + tblPivote.getCountData() );
			} else {
				console.info("Encontró el pivote con cantidad (<2): " + tblPivote.getCountData() );
			}
*/

			if ( pivoteSimple ) {
				bFiltroSeleccionVisible = tblPivote.getCountData() < 2; // se visualiza el Formulario de carga
				activaFiltroSeleccion();
			} else {
				bFiltroSeleccionVisible = false; // En el caso de pivote doble siempre muestro la grilla
				activaFiltroSeleccion();
				if ( tblPivote.getCountData() == 1 ) { // Determina si tiene una row 
					$($('#tablaFiltroSeleccion tbody>tr')[0]).trigger('dblclick');
				}
			}

		}
		cortePVT_timeout_trigger = cortePVT_timeout_trigger - 1;
	}

	timeoutPVT = setTimeout('PVT_timeout_trigger()', 250); // 1000 = un segundo
//---					
}

/* --- */

/*
	Mediante el "blur" del select2 llamo a esta funcion "cerrarControlSelect2ParaWATable" 
	para que actualice waTable 
 */
var ctrlWATableActivo = [];
var _cerrarControlSelect2ParaWATable = function() { /*Cambio el nombre para no interferir, la funcion la llama watable.js. y esto genera muchos cambios*/
	// console.info("cerrarControlSelect2...");
	$.each( ctrlWATableActivo, function(ind,waT) { // Recorro los waTable generados en las solapas
		waT.setCtrlSelect2(); // el waTable en modo edicion sera procesado
	});
}
	
/* --- */

