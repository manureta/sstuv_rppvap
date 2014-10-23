/*
 WATable 1.07
 Copyright (c) 2012 Andreas Petersson(apesv03@gmail.com)
 http://wootapa-watable.appspot.com/

 Permission is hereby granted, free of charge, to any person obtaining
 a copy of this software and associated documentation files (the
 "Software"), to deal in the Software without restriction, including
 without limitation the rights to use, copy, modify, merge, publish,
 distribute, sublicense, and/or sell copies of the Software, and to
 permit persons to whom the Software is furnished to do so, subject to
 the following conditions:

 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
(function ($, undefined) {

    var WATable = function () {

        var priv = {}; //private api
        var publ = {}; //public api

        priv.options = {};
        var defaults = {
			idTabla : '', // id de la tabla a nivel DOM
			btnSiguiente : '', // id del botón que esta fuera de area de la tabla para desplazamiento 1 a 1
			btnAnterior : '', // id del botón que esta fuera de area de la tabla para desplazamiento 1 a 1

			viewDefault : '', // valores: checked, unchecked y all
			viewAll : '', // all
			viewSelect : '', // checked
			viewNotSelect : '',	// unchecked
			
            url: '',  //webservice url
            urlData: {}, //webservice params
            urlPost: false, //use POST instead of GET
			
            urlHijo: '', //Url to a webservice if not setting data manually as we do in this example
            urlDataHijo: {}, //webservice params
            urlPostHijo: false, //use POST instead of GET
			
			infoAccesoHijo: '', // notifica al usuario que para ver datos del hijo debe hacer dblclick - 'Más datos doble click en la fila.'
			
			editBloqueado : false, // ctrl para bloquear la edicion de celdas y además ctrl para que no se defina más de un input de celda a la vez.
			
            debug: false, //prints debug info to console
            filter: false, //show filter row
            columnPicker: false, //show columnpicker
			itemaction : false, //Show the filas button - add and remove filas
            checkboxes: false, //show body checkboxes
            actions: '', //holds action links
            pageSize: 10, //current pagesize
            pageSizes: [10, 20, 30, 40, 50, 'All'], //available pagesizes
            hidePagerOnEmpty: false, //removes pager if no rows
            preFill: false, //prefill table with empty rows
            types: { //type specific options
                string: {},
                number: {},
                bool: {},
                date: {},
				list: {},
				fecha: {}
            }
        };

        /* bundled scripts */
        priv.ext = {};
        priv.ext.XDate = /* xdate 0.7 */ function(a,b,c,d){function e(){var b=this instanceof e?this:new e,c=arguments,d=c.length,h;typeof c[d-1]=="boolean"&&(h=c[--d],c=y(c,0,d));if(d)if(d==1)if(d=c[0],d instanceof a||typeof d=="number")b[0]=new a(+d);else if(d instanceof e){var c=b,i=new a(+d[0]);if(f(d))i.toString=G;c[0]=i}else{if(typeof d=="string"){b[0]=new a(0);a:{for(var c=d,d=h||!1,i=e.parsers,j=0,k;j<i.length;j++)if(k=i[j](c,d,b)){b=k;break a}b[0]=new a(c)}}}else b[0]=new a(F.apply(a,c)),h||(b[0]=u(b[0]));else b[0]=new a;typeof h=="boolean"&&g(b,h);return b}function f(a){return a[0].toString===G}function g(b,c,d){if(c){if(!f(b))d&&(b[0]=new a(F(b[0].getFullYear(),b[0].getMonth(),b[0].getDate(),b[0].getHours(),b[0].getMinutes(),b[0].getSeconds(),b[0].getMilliseconds()))),b[0].toString=G}else f(b)&&(b[0]=d?u(b[0]):new a(+b[0]));return b}function h(a,b,c,d,e){var f=x(s,a[0],e),a=x(t,a[0],e),e=b==1?c%12:f(1),g=!1;d.length==2&&typeof d[1]=="boolean"&&(g=d[1],d=[c]);a(b,d);g&&f(1)!=e&&(a(1,[f(1)-1]),a(2,[v(f(0),f(1))]))}function i(a,c,d,e){var d=Number(d),f=b.floor(d);a["set"+B[c]](a["get"+B[c]]()+f,e||!1);f!=d&&c<6&&i(a,c+1,(d-f)*D[c],e)}function j(a,c,d){var a=a.clone().setUTCMode(!0,!0),c=e(c).setUTCMode(!0,!0),f=0;if(d==0||d==1){for(var g=6;g>=d;g--)f/=D[g],f+=s(c,!1,g)-s(a,!1,g);d==1&&(f+=(c.getFullYear()-a.getFullYear())*12)}else d==2?(d=a.toDate().setUTCHours(0,0,0,0),f=c.toDate().setUTCHours(0,0,0,0),f=b.round((f-d)/864e5)+(c-f-(a-d))/864e5):f=(c-a)/[36e5,6e4,1e3,1][d-3];return f}function k(c){var d=c(0),e=c(1),c=c(2),e=new a(F(d,e,c)),f=l(d),c=f;e<f?c=l(d-1):(d=l(d+1),e>=d&&(c=d));return b.floor(b.round((e-c)/864e5)/7)+1}function l(b){b=new a(F(b,0,4));b.setUTCDate(b.getUTCDate()-(b.getUTCDay()+6)%7);return b}function m(a,b,c,e){var f=x(s,a,e),g=x(t,a,e),c=l(c===d?f(0):c);e||(c=u(c));a.setTime(+c);g(2,[f(2)+(b-1)*7])}function n(a,b,c,d,f){var g=e.locales,h=g[e.defaultLocale]||{},i=x(s,a,f),c=(typeof c=="string"?g[c]:c)||{};return o(a,b,function(a){if(d)for(var b=(a==7?2:a)-1;b>=0;b--)d.push(i(b));return i(a)},function(a){return c[a]||h[a]},f)}function o(a,b,c,e,f){for(var g,h,i="";g=b.match(E);){i+=b.substr(0,g.index);if(g[1]){h=i;for(var i=a,j=g[1],k=c,l=e,m=f,n=j.length,q=void 0,r="";n>0;)q=p(i,j.substr(0,n),k,l,m),q!==d?(r+=q,j=j.substr(n),n=j.length):n--;i=h+(r+j)}else g[3]?(h=o(a,g[4],c,e,f),parseInt(h.replace(/\D/g,""),10)&&(i+=h)):i+=g[7]||"'";b=b.substr(g.index+g[0].length)}return i+b}function p(a,c,d,f,g){var h=e.formatters[c];if(typeof h=="string")return o(a,h,d,f,g);else if(typeof h=="function")return h(a,g||!1,f);switch(c){case"fff":return A(d(6),3);case"s":return d(5);case"ss":return A(d(5));case"m":return d(4);case"mm":return A(d(4));case"h":return d(3)%12||12;case"hh":return A(d(3)%12||12);case"H":return d(3);case"HH":return A(d(3));case"d":return d(2);case"dd":return A(d(2));case"ddd":return f("dayNamesShort")[d(7)]||"";case"dddd":return f("dayNames")[d(7)]||"";case"M":return d(1)+1;case"MM":return A(d(1)+1);case"MMM":return f("monthNamesShort")[d(1)]||"";case"MMMM":return f("monthNames")[d(1)]||"";case"yy":return(d(0)+"").substring(2);case"yyyy":return d(0);case"t":return q(d,f).substr(0,1).toLowerCase();case"tt":return q(d,f).toLowerCase();case"T":return q(d,f).substr(0,1);case"TT":return q(d,f);case"z":case"zz":case"zzz":return g?c="Z":(f=a.getTimezoneOffset(),a=f<0?"+":"-",d=b.floor(b.abs(f)/60),f=b.abs(f)%60,g=d,c=="zz"?g=A(d):c=="zzz"&&(g=A(d)+":"+A(f)),c=a+g),c;case"w":return k(d);case"ww":return A(k(d));case"S":return c=d(2),c>10&&c<20?"th":["st","nd","rd"][c%10-1]||"th"}}function q(a,b){return a(3)<12?b("amDesignator"):b("pmDesignator")}function r(a){return!isNaN(+a[0])}function s(a,b,c){return a["get"+(b?"UTC":"")+B[c]]()}function t(a,b,c,d){a["set"+(b?"UTC":"")+B[c]].apply(a,d)}function u(b){return new a(b.getUTCFullYear(),b.getUTCMonth(),b.getUTCDate(),b.getUTCHours(),b.getUTCMinutes(),b.getUTCSeconds(),b.getUTCMilliseconds())}function v(b,c){return 32-(new a(F(b,c,32))).getUTCDate()}function w(a){return function(){return a.apply(d,[this].concat(y(arguments)))}}function x(a){var b=y(arguments,1);return function(){return a.apply(d,b.concat(y(arguments)))}}function y(a,b,e){return c.prototype.slice.call(a,b||0,e===d?a.length:e)}function z(a,b){for(var c=0;c<a.length;c++)b(a[c],c)}function A(a,b){b=b||2;for(a+="";a.length<b;)a="0"+a;return a}var B="FullYear,Month,Date,Hours,Minutes,Seconds,Milliseconds,Day,Year".split(","),C=["Years","Months","Days"],D=[12,31,24,60,60,1e3,1],E=/(([a-zA-Z])\2*)|(\((('.*?'|\(.*?\)|.)*?)\))|('(.*?)')/,F=a.UTC,G=a.prototype.toUTCString,H=e.prototype;H.length=1;H.splice=c.prototype.splice;H.getUTCMode=w(f);H.setUTCMode=w(g);H.getTimezoneOffset=function(){return f(this)?0:this[0].getTimezoneOffset()};z(B,function(a,b){H["get"+a]=function(){return s(this[0],f(this),b)};b!=8&&(H["getUTC"+a]=function(){return s(this[0],!0,b)});b!=7&&(H["set"+a]=function(a){h(this,b,a,arguments,f(this));return this},b!=8&&(H["setUTC"+a]=function(a){h(this,b,a,arguments,!0);return this},H["add"+(C[b]||a)]=function(a,c){i(this,b,a,c);return this},H["diff"+(C[b]||a)]=function(a){return j(this,a,b)}))});H.getWeek=function(){return k(x(s,this,!1))};H.getUTCWeek=function(){return k(x(s,this,!0))};H.setWeek=function(a,b){m(this,a,b,!1);return this};H.setUTCWeek=function(a,b){m(this,a,b,!0);return this};H.addWeeks=function(a){return this.addDays(Number(a)*7)};H.diffWeeks=function(a){return j(this,a,2)/7};e.parsers=[function(b,c,d){if(b=b.match(/^(\d{4})(-(\d{2})(-(\d{2})([T ](\d{2}):(\d{2})(:(\d{2})(\.(\d+))?)?(Z|(([-+])(\d{2})(:?(\d{2}))?))?)?)?)?$/)){var e=new a(F(b[1],b[3]?b[3]-1:0,b[5]||1,b[7]||0,b[8]||0,b[10]||0,b[12]?Number("0."+b[12])*1e3:0));b[13]?b[14]&&e.setUTCMinutes(e.getUTCMinutes()+(b[15]=="-"?1:-1)*(Number(b[16])*60+(b[18]?Number(b[18]):0))):c||(e=u(e));return d.setTime(+e)}}];e.parse=function(a){return+e(""+a)};H.toString=function(a,b,c){return a===d||!r(this)?this[0].toString():n(this,a,b,c,f(this))};H.toUTCString=H.toGMTString=function(a,b,c){return a===d||!r(this)?this[0].toUTCString():n(this,a,b,c,!0)};H.toISOString=function(){return this.toUTCString("yyyy-MM-dd'T'HH:mm:ss(.fff)zzz")};e.defaultLocale="";e.locales={"":{monthNames:"January,February,March,April,May,June,July,August,September,October,November,December".split(","),monthNamesShort:"Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec".split(","),dayNames:"Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday".split(","),dayNamesShort:"Sun,Mon,Tue,Wed,Thu,Fri,Sat".split(","),amDesignator:"AM",pmDesignator:"PM"}};e.formatters={i:"yyyy-MM-dd'T'HH:mm:ss(.fff)",u:"yyyy-MM-dd'T'HH:mm:ss(.fff)zzz"};z("getTime,valueOf,toDateString,toTimeString,toLocaleString,toLocaleDateString,toLocaleTimeString,toJSON".split(","),function(a){H[a]=function(){return this[0][a]()}});H.setTime=function(a){this[0].setTime(a);return this};H.valid=w(r);H.clone=function(){return new e(this)};H.clearTime=function(){return this.setHours(0,0,0,0)};H.toDate=function(){return new a(+this[0])};e.now=function(){return+(new a)};e.today=function(){return(new e).clearTime()};e.UTC=F;e.getDaysInMonth=v;if(typeof module!=="undefined"&&module.exports)module.exports=e;return e}(Date,Math,Array);

        //these holds the actual dom table objects, and is used to identify what parts of the table that needs to be created.
        var _cont; //container holding table
        var _table; //the table
        var _head; //table header
        var _headSort; //table header sorting row
        var _headFilter; //table header filter row
        var _body; //table body
        var _foot; //table footer

        var _data;  //columns and rows
        var _currPage = 1; //current page
        var _pageSize; //current pagesize
        var _totalPages; //total pages
        var _currSortCol; //current sorting column
        var _currSortFlip = false; //current sorting direction
        var _currDpOp; //clicked datepicker operator
        var _filterCols = {}; //array with current filters
        var _filterTimeout; //timer for delayed filtering
        var _uniqueCol; //reference to column with the unique property
        var _uniqueCols = {}; //array with checked rows
        var _checkToggleChecked = false; //check-all toggle state
		
		var _lastTblRow; // Ultima row accedida
		var _pageSizeInicial; // Para evitar que cambie con el manejo del filtro...
		
		var _ctrlParaFiltro = true; // Caso que se filtren datos pero no este activado el filtro.
		var _FiltroDefaultEstablecido = false; // Establece que solo una vez se puede aplicar el filtro default
		
		var _etiquetaEstado = "Inicial";

		var _currPageTableFather;
		var _urlPadre;
		var _urlDataPadre;
		
		var _estadoPadre = true;
		var _etiquetaPadre = ''; // Etiqueta que aparece en el footer que recuarda al padre y aparte para retornar a la tabla padre.
		
		var _classEdit; // guardo las propiedades de la celda antes de editarla.
		
		var _dataModif = []; // Lista de elementos modificados.

		var _ctrlS2 = { // Para el manejo del ctrl web "Select2" en la edicion de celdas tipo "list"
			asignarValor : function() {
				this.val = $("#ItemTipoLista").val();
			},
			idUnique : undefined,
			valItem : undefined,
			val : undefined,
			valItemOrg : undefined,
			column : undefined,
			cell : undefined
		};

		var _countRows = undefined; // Cantidad de rows si es undefined es que aun no se leyó el json con datos
		
        /*
         initialize the plugin.
         */
        priv.init = function () {
            _cont = priv.options.id;
            priv.options.types.string = ((priv.options.types || {}).string || {});
            priv.options.types.number = ((priv.options.types || {}).number || {});
            priv.options.types.bool = ((priv.options.types || {}).bool || {});
            priv.options.types.date = ((priv.options.types || {}).date || {});

            //fill the table with empty cells
            if (priv.options.preFill) {
                var data = {
                    cols: {
                        dummy: {
                            index: 1,
                            friendly: "&nbsp;",
                            type: "string"
                        }
                    },
                    rows: []
                };
                for (var i = 0; i < priv.options.pageSize; i++)
                    data.rows.push({dummy: "&nbsp;"});
                priv.setData(data);
            }
            //try call webservice for data
            priv.update();
        };

        /*
         creates the table with all its parts and handlers.
         note that only the parts we need is created.
         (yeah, the function is huge)
         */
        priv.createTable = function () {
            var start = new priv.ext.XDate();
						
            //create table itself
            if (!_table) {
                _head = _body = _foot = undefined;
                _table = $('<table id="' + priv.options.idTabla + '" class="watable table table-striped table-hover table-bordered table-condensed"></table>').appendTo(_cont);
            }

            //create the header which will later hold both sorting and filtering
            if (!_head) {
                _table.find('thead').remove();
                _headSort = _headFilter = undefined;
                _head = $('<thead></thead>').prependTo(_table);
            }

            //sort the columns in index order
            var colsSorted = Object.keys(_data.cols).sort(function (a, b) {
                return _data.cols[a].index - _data.cols[b].index;
            });

            //create the header sorting row
            if (!_headSort) {
				_head.find('.sort i').tooltip('hide');
                _head.find(".sort").remove();
                _headSort = $('<tr class="sort" style=""></tr>').prependTo(_head);

                //create the checkall toggle
                if (_uniqueCol && priv.options.checkboxes) {
                    var checked = _checkToggleChecked ? 'checked' : '';
                    var headCell = $('<th></th>').appendTo(_headSort);
                    var elem = $('<input {0} class="checkToggle" type="checkbox" /><span class="lbl"> </span>'.f(checked)).appendTo(headCell);
                    elem.on('change', priv.checkToggleChanged);
                }

                //create the sortable headers
                for (var i = 0; i < colsSorted.length; i++) {
                    var column = colsSorted[i];
                    var props = _data.cols[column];

                    if (!props.hidden) {
                        var headCell = $('<th></th>').appendTo(_headSort);
                        var link = $('<a class="pull-left" href="#">{0}</a>'.f(props.friendly || column));
                        link.on('click', {column: column}, priv.columnClicked).appendTo(headCell);

						if (props.tooltip) {
							$('<i class="icon-info-sign"></i>').tooltip({
								title: props.tooltip.trim(),
								html: true,
								container: 'body',
								placement: "top",
								delay: {
									show: 500,
									hide: 100
								}
							}).appendTo(link);
						}


                        //Add sort arrow
                        if (column == _currSortCol) {
                            if (_currSortFlip) $('<i class="icon-chevron-down pull-right"></i>').appendTo(headCell);
                            else $('<i class="icon-chevron-up pull-right"></i>').appendTo(headCell);
                        }
                    }
                }
            }

            //create the header filtering row
            if (!_headFilter && priv.options.filter) {
                _head.find(".filter").remove();
                _headFilter = $('<tr class="filter"></tr>').appendTo(_head);
                var headCell;
                var elem;
                var placeHolder = '';
                var tooltip = '';

                //create the filter checkbox
                if (_uniqueCol && priv.options.checkboxes) {
                    tooltip = priv.options.types.bool.filterTooltip || 'Estados:<br/>Inicial,<br/>Sin tildar,<br/>Todos y,<br/>Tildados';
                    headCell = $('<th style="padding-top: 1px;padding-bottom:0px"></th>').appendTo(_headFilter);
//                    elem = $('<input class="filter indeterminate" checked type="checkbox" /><span class="lbl"> </span>').appendTo(headCell);
                    elem = $('<input class="filter" checked type="checkbox" /><span class="lbl"> </span>').appendTo(headCell);

                    $.map(_filterCols, function (colProps, col) {
                        if (col == "unique") {
                            if (colProps.filter) elem.prop('checked', true).removeClass('indeterminate');
                            else if (!colProps.filter) elem.prop('checked', false).removeClass('indeterminate');
                            else if (colProps.filter == '') elem.addClass('indeterminate');
                        }
                    });


                    if (tooltip) {
                        elem.tooltip({
                            title: tooltip.trim(),
                            html: true,
                            container: 'body',
                            trigger: 'hover',
                            placement: 'top',
                            delay: {
                                show: 500,
                                hide: 100
                            }
                        });
                    }
                    elem.on('click', {column: "unique"}, priv.filterChanged);
                }

                //create the column filters
                for (var i = 0; i < colsSorted.length; i++) {
                    var column = colsSorted[i];
                    var props = _data.cols[column];
                    tooltip = props.filterTooltip === true ? undefined : props.filterTooltip === false ? '' : props.filterTooltip;
                    placeHolder = props.placeHolder === true ? undefined : props.placeHolder === false ? '' : props.placeHolder;

                    if (!props.hidden) {
                        headCell = $('<th></th>').appendTo(_headFilter);

                        switch (props.type || 'string') {
                            case "number":
                                if (placeHolder == undefined) placeHolder = priv.options.types.number.placeHolder;
                                placeHolder = (placeHolder === true || placeHolder == undefined) ? '10..20 o =50' : placeHolder === false ? '' : placeHolder;
                                if (tooltip == undefined) tooltip = priv.options.types.number.filterTooltip;
                                tooltip = (tooltip === true || tooltip == undefined) ? 'Datos 10 a 20:<br/>10..20<br/>Dato 50 es =50<br/>puede ser =, < o >' : tooltip === false ? '' : tooltip;
                                elem = $('<input placeholder="{0}" class="filter" type="text" />'.f(placeHolder));
                                elem.on('keyup', {column: column}, priv.filterChanged);
                                break;
                            case "date":
                                if (placeHolder == undefined) placeHolder = priv.options.types.date.placeHolder;
                                placeHolder = (placeHolder === true || placeHolder == undefined) ? '-7..0' : placeHolder === false ? '' : placeHolder;
                                if (tooltip == undefined) tooltip = priv.options.types.date.filterTooltip;
                                tooltip = (tooltip === true || tooltip == undefined) ? 'Today:<br/>0..1<br/>A week today excluded:<br/>-7..0' : tooltip === false ? '' : tooltip;
                                elem = $('<div><input placeholder="{0}" class="filter" type="text" /></div>'.f(placeHolder));

                                if (priv.options.types.date.datePicker === true || priv.options.types.date.datePicker == undefined)
                                {
                                    if ($().datepicker)
                                    {
                                        elem.addClass('date-wrap');
                                        var today = new priv.ext.XDate(false).setHours(0, 0, 0, 0).toString('yyyy-MM-dd');
                                        var dp = $('<div style="float:right" class="date" data-date="{0}" data-date-format="{1}" />'.f(today, 'yyyy-mm-dd')).appendTo(elem);
                                        $('<input style="display:none" type="text"  />').appendTo(dp);
                                        $('<span class="add-on"><i class="icon-chevron-right"></i></span>').on('click', {op: "l"}, priv.dpOpChanged).appendTo(dp);
                                        $('<span class="add-on"><i class="icon-chevron-left"></i></span>').on('click', {op: "r"}, priv.dpOpChanged).appendTo(dp);
                                        dp.datepicker({weekStart:1});
                                        dp.on('changeDate', {column: column, input: $('input.filter', elem)}, priv.dpClicked);
                                    }
                                    else
                                    if (priv.options.debug) console.log('datepicker plugin not found');
                                }
                                elem.on('keyup', 'input.filter', {column: column}, priv.filterChanged);
                                break;
                            case "bool":
                                if (tooltip == undefined) tooltip = priv.options.types.bool.filterTooltip;
                                tooltip = (tooltip === true || tooltip == undefined) ? 'Estados:<br/>Inicial,<br/>Sin tildar,<br/>Todos y,<br/>Tildados' : tooltip === false ? '' : tooltip;
//                                elem = $('<input class="filter indeterminate" checked type="checkbox" /><span class="lbl"> </span>');
                                elem = $('<input class="filter" checked type="checkbox" /><span class="lbl"> </span>');
                                elem.on('click', {column: column}, priv.filterChanged);
                                break;
                            case "fecha":
                            case "string":
                                if (placeHolder == undefined) placeHolder = priv.options.types.string.placeHolder;
                                placeHolder = (placeHolder === true || placeHolder == undefined) ? 'John Doe' : placeHolder === false ? '' : placeHolder;
                                if (tooltip == undefined) tooltip = priv.options.types.string.filterTooltip;
                                tooltip = (tooltip === true || tooltip == undefined) ? 'Buscar Juan Gomez:<br/>Juan Gomez<br/>todos menos<br/>a Juan Gomez:<br/>!Juan Gomez' : tooltip === false ? '' : tooltip;
                                elem = $('<input placeholder="{0}" class="filter" type="text" />'.f(placeHolder));
                                elem.on('keyup', {column: column}, priv.filterChanged);
                                break;
                            case "list":
                                if (placeHolder == undefined) placeHolder = priv.options.types.list.placeHolder;
                                placeHolder = (placeHolder === true || placeHolder == undefined) ? 'John Doe' : placeHolder === false ? '' : placeHolder;
                                if (tooltip == undefined) tooltip = priv.options.types.list.filterTooltip;
                                tooltip = (tooltip === true || tooltip == undefined) ? 'Buscar Juan Gomez:<br/>Juan Gomez<br/>todos menos<br/>a Juan Gomez:<br/>!Juan Gomez' : tooltip === false ? '' : tooltip;
                                elem = $('<input placeholder="{0}" class="filter" type="text" />'.f(placeHolder));
                                elem.on('keyup', {column: column}, priv.filterChanged);
                                break;
                            case "none":
                                elem = $('<div>&nbsp;</div>');
                                break;
                        }

                        if (tooltip) {
                            elem.tooltip({
                                title: tooltip.trim(),
                                html: true,
                                container: 'body',
                                trigger: 'hover',
                                placement: 'top',
                                delay: {
                                    show: 500,
                                    hide: 100
                                }
                            });
                        }
                        if (elem && props.filter) {
                            $.map(_filterCols, function (colProps, col) {
                                if (col == column) {
									if (colProps.col.type == 'bool') {
                                        if (colProps.filter) elem.prop('checked', true).removeClass('indeterminate');
                                        else if (!colProps.filter) elem.prop('checked', false).removeClass('indeterminate');
                                        else if (colProps.filter == '') elem.addClass('indeterminate');
                                    }
                                    else elem.val(colProps.filter);
                                }
                            });
                            elem.appendTo(headCell);
                        }
						
                    }
                }
            }

            //create the body
            if (!_body) {
                _table.find('tbody').remove();
                _body = $('<tbody></tbody>').insertAfter(_head);
				
				_body.off('change', '.unique');
                _body.on('change', '.unique', priv.rowChecked);
				
				// Manejo del llamado a una tabla hija / elección del ítem 
				_body.off('dblclick', 'tr');
				if ( _estadoPadre && (priv.options.infoAccesoHijo>'') ) {
					_body.on('dblclick', 'tr', priv.rowDblClicked);
				} else {
					_body.off('click', 'td');
					_body.on('click', 'td', priv.rowClicked);
				}


                //find out what rows to show next...
                var rowsAdded = 0;
                _data.toRow = _data.fromRow + priv.options.pageSize;
                if (_data.toRow > _data.rows.length)
                    _data.toRow = _data.rows.length;

                //slice out the chunk of data we need and create rows
                $.each(_data.rows.slice(_data.fromRow, _data.toRow), function (index, props) {
                    var row = $('<tr style=""></tr>').appendTo(_body);

                    //create checkbox
                    if (_uniqueCol && priv.options.checkboxes) {
                        var check = _uniqueCols[props[_uniqueCol]] != undefined ? 'checked' : '';
                        var checkable = props['checkable'] === false ? 'disabled' : '';
                        var cell = $('<td></td>').appendTo(row);
                        $('<input class="unique" {0} {1} type="checkbox" /><span class="lbl"> </span>'.f(check, checkable)).appendTo(cell);
                    }

                    //create cells
                    for (var i = 0; i < colsSorted.length; i++) {
                        var key = colsSorted[i];
                        var val = props[key];
                        if (!_data.cols[key]) return;
                        if (_data.cols[key].unique) row.data('unique', val);

                        if (!_data.cols[key].hidden) {
                            var cell = $('<td></td>').appendTo(row);
                            cell.data('column', key);
                            if (val === undefined) continue;

                            var format = props[key + 'Format'] || _data.cols[key].format || '{0}';

                            switch (_data.cols[key].type) {
								case "fecha":
								case "string":
                                    cell.html(format.f(val));
                                    break;
                                case "number":
                                    val = Number(val);
                                    var forceDecimals = !isNaN(_data.cols[key].decimals);
                                    if (forceDecimals) cell.html(format.f(val.toFixed(_data.cols[key].decimals)));
                                    else {
                                        (val || 0) % 1 === 0
                                            ? cell.html(format.f(val))
                                            : cell.html(format.f(val.toFixed(priv.options.types.number.decimals || 2)));
                                    }
                                    break;
                                case "date":
                                    val = new priv.ext.XDate(val, priv.options.types.date.utc === true).toString(priv.options.types.date.format || 'yyyy-MM-dd HH:mm:ss');
                                    cell.html(format.f(val));
                                    break;
                                case "bool":
									if (_data.cols[key].edit) {
										var checkElem = $('<input type="checkbox" {0} class="{1}"/><span class="lbl"> </span>'.f((val ? "checked" : ""),"checkgroup_"+_data.cols[key].checkgroup));
										checkElem.on('change',priv.editCellCheck);
										checkElem.appendTo(cell);										
									} else {
										$('<input type="checkbox" {0} disabled /><span class="lbl"> </span>'.f(val ? "checked" : "")).appendTo(cell);
									}
                                    break;
                                case "list":
									if ( val.length > 1 ) {
										if ( _data.cols[key].filter ) {
											_data.cols[key].filter = false;
											_head = undefined;
											priv.createTable();
										}
										cell.html(format.f("..."));
									} else {
										if ( _data.cols[key].listView === "desc" ) {
											cell.html(format.f(val[0].desc));
										} else if ( _data.cols[key].listView === "cod" ) {
											cell.html(format.f(val[0].cod));
										} else {
											cell.html(format.f(val[0].cod + " | " +val[0].desc));
										}
									}
                                    break;
                            }
							
							// Activo el icono para edicion si es editable y no es checkbox
							if ( _data.cols[key].edit && (_data.cols[key].type != "bool") ) {							
								// $('<i class="icon-edit hidden" data-original-title="" title=""></i>').appendTo(cell);
								$('<i class="icon-edit" data-original-title="" title=""></i>').appendTo(cell);
								
								cell.off('click', 'i');
								cell.on('click', 'i', priv.editCell);

								cell.find('i').css('cursor', 'pointer');
								
								cell.hover(
										function () {
											$(this).find('i').css({opacity: 0.8}); // seteo la opacacidad inicial
											// $(this).find('i').removeClass('hidden');
											$(this).find('i').animate({opacity: 0.2}, 1000); // pasa la opacacidad de .8 a .2
										}, function () {
											$(this).find('i').css({opacity: 0.8}); // seteo la opacacidad inicial
											// $(this).find('i').addClass('hidden');
										}
									);
							} else if (_data.cols[key].editmultilist && (_data.cols[key].type == "list")) {
								$('<i class="icon-list" data-original-title="" title=""></i>').appendTo(cell);
								
								cell.off('click', 'i');
								cell.on('click', 'i', priv.editCellMultiList);

								cell.find('i').css('cursor', 'pointer');
								
								cell.hover(
										function () {
											$(this).find('i').css({opacity: 0.8}); // seteo la opacacidad inicial
											$(this).find('i').animate({opacity: 0.2}, 1000); // pasa la opacacidad de .8 a .2
										}, function () {
											$(this).find('i').css({opacity: 0.8}); // seteo la opacacidad inicial
										}
									);
							}
                        }
                    }
                    rowsAdded++;

                    //enough rows created?
                    if (rowsAdded >= priv.options.pageSize) {
                        _data.toRow = _data.fromRow + rowsAdded;
                        return false;
                    }
                });

                if (_currPage == 1) {
					// _pageSizeInicial = _pageSize
                    _pageSize = rowsAdded;
                    _totalPages = Math.round(Math.ceil(_data.rows.length / _pageSize));
                }

                //pad with empty rows if we're at last page.
                if (_currPage == _totalPages) {
                    while (rowsAdded < priv.options.pageSize) { // < _pageSizeInicial) { // (rowsAdded < _pageSize) {
                        var row = $('<tr style=""></tr>').appendTo(_body);

                        if (_uniqueCol && priv.options.checkboxes) {
                            var cell = $('<td></td>').appendTo(row);
                            $('<input disabled type="checkbox" /><span class="lbl"> </span>').appendTo(cell);
                        }

                        $.each(_data.cols, function (column, props) {
                            if (!props.hidden) $('<td>&nbsp;</td>').appendTo(row);
                        });
                        rowsAdded++;
                    }
                }
            }

            //create the footer
            if (!_foot) {
                _table.find('tfoot').remove();
                _foot = $('<tfoot></tfoot>').insertAfter(_body);

                var footRow = $('<tr></tr>').appendTo(_foot);
                var footCell = $('<td colspan="999"></td>').appendTo(footRow);

                //create summary
                if (_data.rows.length > 0) {
//				    $('<p style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;">Filas {0}-{1} de {2}'.f(_data.fromRow + 1, Math.min(_data.toRow, _data.rows.length), _data.rows.length) + ' -*- Estado filtro: "' + _etiquetaEstado + '"</p>').appendTo(footCell);
					if ( _estadoPadre ) {
						// $('<div style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;">Filas {0}-{1} de {2}</div>'.f(_data.fromRow + 1, Math.min(_data.toRow, _data.rows.length), _data.rows.length)).appendTo(footCell);
						var footRow1 = $('<div style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;"></div>').appendTo(footCell);
						$('<div style="float:left;">Filas {0}-{1} de {2}</div>'.f(_data.fromRow + 1, Math.min(_data.toRow, _data.rows.length), _data.rows.length)).appendTo(footRow1);
						$('<div style="float:right;">{0}</div>'.f(priv.options.infoAccesoHijo)).appendTo(footRow1);
					} else { // _etiquetaPadre
						// $('<div class="control-group" style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;">Filas {0}-{1} de {2}<a id="returnFather" href="#" style="float:right;">{3}</a></div>'.f(_data.fromRow + 1, Math.min(_data.toRow, _data.rows.length), _data.rows.length, _etiquetaPadre)).appendTo(footCell);
						var footRow1 = $('<div style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;"></div>').appendTo(footCell);
						$('<div style="float:left;">Filas {0}-{1} de {2}</div>'.f(_data.fromRow + 1, Math.min(_data.toRow, _data.rows.length), _data.rows.length)).appendTo(footRow1);
						$('<a href="#" id="returnFather" style="float:right;">« {0}</a>'.f(_etiquetaPadre)).appendTo(footRow1);
						// $('<div style="clear:both;"></div>').appendTo(footRow1);
						footRow1.on('click', '#returnFather', priv.switchTableFather);
					}
                } else {
//                    $('<p style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;">Sin datos</p>').appendTo(footCell);
					if ( _estadoPadre ) {
						var footRow1 = $('<div style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;"></div>').appendTo(footCell);
						$('<div style="float:left;">Sin datos</div>').appendTo(footRow1);
						$('<div style="float:right;">{0}</div>'.f(priv.options.infoAccesoHijo)).appendTo(footRow1);
					} else { // _etiquetaPadre
						var footRow1 = $('<div style="height: 11px;line-height: 9px;padding-bottom: 3px;padding-top: 1px;"></div>').appendTo(footCell);
						$('<div style="float:left;">Sin datos</div>').appendTo(footRow1);
						$('<a href="#" id="returnFather" style="float:right;">« {0}</a>'.f(_etiquetaPadre)).appendTo(footRow1);
						footRow1.on('click', '#returnFather', priv.switchTableFather);
					}

                    _totalPages = 0;
                }

                //create the pager.
                var lowerPage = _currPage - 2;
                var upperPage = _currPage + 2;
                if (upperPage > _totalPages) {
                    var diff = upperPage - _totalPages;
                    upperPage = _totalPages;
                    lowerPage -= diff;
                }
                if (lowerPage < 1) lowerPage = 1;
                if (upperPage < 5) upperPage = 5;

                var footToolbar = $('<div class="btn-toolbar"></div>').appendTo(footCell);
                var footDiv = $('<div class="btn-group"></div>').appendTo(footToolbar);
                var footPagerDiv = $('<div class="pagination btn-small"></div>').appendTo(footDiv);
                var footPagerUl = $('<ul></ul>').appendTo(footPagerDiv);

                $('<li class="{0}"><a href="#">«</a></li>'.f(_currPage == 1 ? 'disabled' : ''))
                    .on('click', {pageIndex: _currPage - 1}, priv.pageChanged).appendTo(footPagerUl);

                for (var i = lowerPage; i <= upperPage; i++) {
                    var link;
                    if (i != _currPage) link = $('<li class="{1}"><a href="#">{0}</a></li>'.f(i, i > _totalPages ? 'disabled' : ''));
                    if (i == _currPage) link = $('<li class="active"><a href="#">{0}</a></li>'.f(i));

                    if (link) {
                        link.on('click', {pageIndex: i}, priv.pageChanged);
                        link.appendTo(footPagerUl);
                    }
                }
                $('<li class="{0}"><a href="#">»</a></li>'.f(_currPage == _totalPages ? 'disabled' : ''))
                    .on('click', {pageIndex: _currPage + 1}, priv.pageChanged).appendTo(footPagerUl);

                //create pagesize dropdown
                if (priv.options.pageSizes.length) {
                    var div = $('<div class="btn-group dropup pagesize"></div>').appendTo(footToolbar);
                    // var btn = $('<button class="btn dropdown-toggle" data-toggle="dropdown" href="#">Rows&nbsp;</button>').appendTo(div);
                    var btn = $('<button class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:5px;line-height: 15px;">Nro. Filas&nbsp;</button>').appendTo(div);
                    var span = $('<span class="caret"></span>').appendTo(btn);
                    var ul = $('<ul class="dropdown-menu">').appendTo(div);

                    $.each(priv.options.pageSizes, function (index, val) {
                        var li = $('<li></li>').appendTo(ul);
                        $('<a href="#">{0}</a>'.f(val)).appendTo(li);
                    });
                    div.on('click', 'a', priv.pageSizeChanged);
                }

                //create action add & delete Item - itemaction
                if (priv.options.itemaction) {
					if (_data.rows.length == 0) {
						var footRow1 = $('<div style="float: right; line-height: 9px; padding-bottom: 3px; padding-top: 1px;"></div>').appendTo(footCell);
						var div = $('<div class="btn-group dropup itemaction"></div>').appendTo(footRow1);
						var btn = $('<button class="btn btn-default btn-mini dropdown-toggle" data-toggle="dropdown">Filas&nbsp;</button>').appendTo(div);
						var span = $('<span class="caret"></span>').appendTo(btn);
						var ul = $('<ul class="dropdown-menu">').appendTo(div);
						var li;
						li = $('<li></li>').appendTo(ul);
						$('<a href="#" class="agregarFila"><i class="icon-plus"></i>&nbsp;&nbsp;Agregar una nueva fila</a>').appendTo(li);
						li = $('<li></li>').appendTo(ul);
						$('<a href="#" class="borrarFila"><i class="icon-remove"></i>&nbsp;&nbsp;Borrar una fila</a>').appendTo(li);
					} else {
						var div = $('<div class="btn-group dropup itemaction"></div>').appendTo(footToolbar);
						var btn = $('<button class="btn btn-default btn-mini dropdown-toggle" data-toggle="dropdown">Filas&nbsp;</button>').appendTo(div);
						var span = $('<span class="caret"></span>').appendTo(btn);
						var ul = $('<ul class="dropdown-menu">').appendTo(div);
						var li;
						li = $('<li></li>').appendTo(ul);
						$('<a href="#" class="agregarFila"><i class="icon-plus"></i>&nbsp;&nbsp;Agregar una nueva fila</a>').appendTo(li);
						li = $('<li></li>').appendTo(ul);
						$('<a href="#" class="borrarFila"><i class="icon-remove"></i>&nbsp;&nbsp;Borrar una fila</a>').appendTo(li);
					}
				}

                //create columnpicker dropdown
                if (priv.options.columnPicker) {
                    var div = $('<div class="btn-group dropup columnpicker"></div>').appendTo(footToolbar);
                    // var btn = $('<button class="btn dropdown-toggle" data-toggle="dropdown" href="#">Columns&nbsp;</button>').appendTo(div);
					var btn = $('<button class="btn btn-default btn-mini dropdown-toggle" data-toggle="dropdown">Col. a visualizar&nbsp;</button>').appendTo(div);
                    var span = $('<span class="caret"></span>').appendTo(btn);
                    var ul = $('<ul class="dropdown-menu">').appendTo(div);

                    $.each(_data.cols, function (col, props) {
                        if ( (props.type != "unique") && (!props.novisible) ) {
                            var li = $('<li></li>').appendTo(ul);
	                        // $('<label style="margin-left:4px;"><input {0} type="checkbox" title="{1}" value="{1}" ><span class="lbl">&nbsp;{2}</span></label>'.f(props.hidden ? '' : 'checked', col, props.friendly || col)).appendTo(li);
	                        $('<label style="margin-left:4px;"><input {0} type="checkbox" title="{1}" value="{1}" ><span class="lbl">&nbsp;{2}</span></label>'.f(props.hidden ? '' : 'checked', col, props.friendly || col)).appendTo(li);
                        }
                    });
                    div.on('click', 'input', priv.columnPickerClicked);
                }

                //create actions dropdown
                if (priv.options.actions) {
                    var div = $('<div class="btn-group dropup actions"></div>').appendTo(footToolbar);
                    // var btn = $('<button class="btn dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i>&nbsp;</button>').appendTo(div);
                    var btn = $('<button class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i>&nbsp;</button>').appendTo(div);
                    var span = $('<span class="caret"></span>').appendTo(btn);
                    var ul = $('<ul class="dropdown-menu">').appendTo(div);

                    if (priv.options.actions.filter) {
                        var li = $('<li></li>').appendTo(ul);
                        $('<input {0} type="checkbox"><span class="lbl">&nbsp;Activa Filtros</span>'.f(priv.options.filter ? 'checked' : '')).appendTo(li);
                        li.on('click', 'input', function (e) {
                            priv.options.filter = !priv.options.filter;
                            _head = undefined;
							priv.pageSizeChangedByFilter();
                            //priv.createTable();
                        });
                    }
                    if (priv.options.actions.columnPicker) {
                        var li = $('<li></li>').appendTo(ul);
                        $('<input {0} type="checkbox"><span class="lbl">&nbsp;Activa selección de columnas&nbsp;&nbsp;</span>'.f(priv.options.columnPicker ? 'checked' : '')).appendTo(li);
                        li.on('click', 'input', function (e) {
                            priv.options.columnPicker = !priv.options.columnPicker;
                            _foot = undefined;
                            priv.createTable();
                        });
                    }
                    if (priv.options.actions.custom) {
                        $.each(priv.options.actions.custom, function (index, val) {
                            var li = $('<li></li>').appendTo(ul);
                            $(val).appendTo(li);
                        });
                    }
                }
            }

            if (_data.rows.length == 0 && priv.options.hidePagerOnEmpty)
                $('.btn-toolbar', _foot).remove();
            if (priv.options.debug)
                console.log('table created in {0} ms.'.f(new priv.ext.XDate() - start));
            if (typeof priv.options.tableCreated == 'function')
                priv.options.tableCreated.call(_table.get(0), {table: _table.get(0)});

			//Asigna los eventos para los botones anterior y siguiente (ojo estan fuera de la tabla)
			if( $('#' + priv.options.btnAnterior).length == 1) { // Controlo que existan los botones
				$('#' + priv.options.btnAnterior).off('click');
				$('#' + priv.options.btnSiguiente).off('click');
				$('#' + priv.options.btnAnterior).on('click', priv.rowBtnMove);
				$('#' + priv.options.btnSiguiente).on('click', priv.rowBtnMove);
			}

			if( $('#' + priv.options.viewAll).length == 1) { // Controlo que existan los botones para el tipo de vista
				$('#' + priv.options.viewAll).off('click');
				$('#' + priv.options.viewSelect).off('click');
				$('#' + priv.options.viewNotSelect).off('click');
				$('#' + priv.options.viewAll).on('click', { vista : 'all' }, priv.viewRowChecked);
				$('#' + priv.options.viewSelect).on('click', { vista : 'checked' }, priv.viewRowChecked);
				$('#' + priv.options.viewNotSelect).on('click', { vista : 'unchecked' }, priv.viewRowChecked);
			}

			/*
				Variable "dataWATable" externa a waTable, 
				la utilizo para guardar info de la tabla,
				referencia a la tabla por el "priv.options.idTabla"
			*/
			if (typeof dataWATable != 'undefined') {
				var noEsta = true;
				var idTable = priv.options.idTabla;
				$.each(dataWATable,function(ind,data) {
					if ( idTable == data.tbl ) {
						dataWATable[ind].cantRows = _countRows;
						noEsta = false
					} 
				})
				if ( noEsta ) {
					dataWATable.push({ tbl : idTable, cantRows : _countRows });
				}
			}
			
		};

        /*
         calls the webservice(if defined).
         */
        priv.update = function (callback, skipCols, resetChecked) {
            if (!priv.options.url) {
                if (priv.options.debug) console.log('no url found');
                return;
            }

            if (priv.options.debug) console.log('requesting data from url:{0} data:{1}'.f(priv.options.url, JSON.stringify(priv.options.urlData) || ''));
            var start = new priv.ext.XDate();

            $.ajax({
                url: priv.options.url,
                type: priv.options.urlPost ? 'POST' : 'GET',
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                data: priv.options.urlData,
                async: true,
                success: function (data) {
                    if (priv.options.debug) console.log('request finished in {0} ms.'.f(new priv.ext.XDate() - start));

                    //assign the new data
                    if (data.d && data.d.cols)
                        priv.setData(data.d, skipCols, resetChecked);
                    else
                        priv.setData(data, skipCols, resetChecked);

                    if (typeof callback == "function")
                        callback.call(this);
                },
                error: function (err) {
                    console.log('request error: '.f(err));
                }
            });
        };

        /*
         assigns the new data.
         */
        priv.setData = function (pData, skipCols, resetChecked) {
            var data = $.extend(true, {}, pData);
            data.fromRow = _data && _data.fromRow || 0;
            data.toRow = _data && _data.toRow || 0;

            //use previous column definitions?
            skipCols = skipCols || false;
            if (skipCols) data.cols = _data.cols;
            else _filterCols = {};

            _data = data;
            _data.rowsOrg = _data.rows;

			_countRows = _data.rows.length;
			
            //we might have more/less data now. Recalculate stuff.
            if (_currPage > 1) {
                _data.toRow = Math.min(_data.rows.length, _data.toRow);
                _data.fromRow = _data.toRow - _pageSize;
                _data.fromRow = Math.max(_data.fromRow, 0);
                _currPage = Math.ceil(_data.fromRow / _pageSize) + 1;
                _totalPages = Math.ceil(_data.rows.length / _pageSize);
            } else {
                _data.fromRow = 0;
                if (priv.options.pageSize != -1)
                    _data.toRow = _data.fromRow + priv.options.pageSize;
                _data.toRow = Math.max(_data.toRow, _data.rows.length);
            }

            //wash the new data a bit
            _uniqueCol = "";
            $.each(_data.cols, function (col, props) {
                //set sorting
                if (!_currSortCol && props.sortOrder) {
                    _currSortCol = col;
                    _currSortFlip = props.sortOrder != "asc";
                }

                //default to string type if missing
                if (!props.type) _data.cols[col].type = "string";

                //if several unique columns is defined, use the first.
                if (props.unique) {
                    if (!_uniqueCol) _uniqueCol = col;
                    else props.unique = false;
                }

                //if index property is missing, create one
                if (!props.index) _data.cols[col].index = new priv.ext.XDate();
                props.column = col;

                //set any initial filter
                if (!skipCols) {
                    if (props.filter == undefined) props.filter = true;
                    if (props.filter && typeof props.type != "bool" && typeof props.filter != "boolean") {
                        _filterCols[col] = _filterCols[col] || {
                            filter: String(props.filter),
                            col: props
                        };
                    }
                }
            });

            //keep any previously checked rows around?
            if (resetChecked === true || resetChecked === undefined)
                _uniqueCols = {};
            else {
                for (var key in _uniqueCols)
                    _uniqueCols[key] = priv.getRow(key);
            }

            if (_uniqueCol) {
                //create a unique column definition
                _data.cols["unique"] = {
                    column: "unique",
                    type: "unique",
                    index: -1,
                    hidden: true
                };

                //add rows that needs to be pre-checked
                $.each(_data.rows, function (index, row) {
                    if (row["checked"] === true)
                        _uniqueCols[row[_uniqueCol]] = row;
                });
            }

            _head = undefined;
            _body = undefined;
            _foot = undefined;
			// priv.setFilterDefault(); // Establece filtro por default
            priv.filter();
            priv.sort();
            priv.createTable();
			
			priv.viewRowChecked();
        };

        /*
         filters the data.
         */
        priv.filter = function () {
			if (_ctrlParaFiltro) { // Caso que se filtren datos pero no este activado el filtro.
				if (!priv.options.filter) return;
			}
			if (Object.keys(_filterCols).length == 0) return;
			_ctrlParaFiltro = true;

            //get a fresh copy of the data
            _data.rows = $.extend(true, {}, _data.rowsOrg);
            var start = new priv.ext.XDate();
			
			var ctrlErrorEnFiltro = false;

            //for every column with a filter, run through the rows and return the matching rows
            $.each(_filterCols, function (col, colProps) {
                if (priv.options.debug) console.log('filtering on text:{0} col:{1} type:{2} '.f(colProps.filter, colProps.col.column, colProps.col.type));

                switch (colProps.col.type) {
                    case "fecha":
                    case "string":
                        _data.rows = $.map(_data.rows, function (row) {
                            var val = String(row[col]);
                            var filter = colProps.filter.toLowerCase();
                            var ne = filter.charAt(0) == '!';
                            if (ne) filter = filter.substring(1);
                            var pos = val.toLowerCase().indexOf(filter);

                            if ((pos == -1 && ne) || colProps.filter === '') return row;
                            else if (row[col] != undefined && pos >= 0 && !ne) {
                                if (!row[col + 'Format'] && !colProps.col.format) {
                                    var pre = val.substring(0, pos);
                                    var match = val.substring(pos, pos + colProps.filter.length);
                                    var post = val.substring(pos + colProps.filter.length, row[col].length);
                                    row[col + 'Format'] = '<span>{0}<span class="filter">{1}</span>{2}</span>'.f(pre, match, post);
                                }
                                return row;
                            }
                        });
                        break;
                    case "list":
						if ( colProps.col.listView === 'both' ) break;
                        _data.rows = $.map(_data.rows, function (row) {
						
							if ( row[col].length == 1 ) { 
								// var val = String(row[col]);
								var val ;
								if ( colProps.col.listView == 'cod' ) {
									val = String(row[col][0].cod);
								} else {
									val = String(row[col][0].desc);
								}
	 
								var filter = colProps.filter.toLowerCase();
								var ne = filter.charAt(0) == '!';
								if (ne) filter = filter.substring(1);
								var pos = val.toLowerCase().indexOf(filter);

								if ((pos == -1 && ne) || colProps.filter === '') return row;
								else if (row[col] != undefined && pos >= 0 && !ne) {
									if (!row[col + 'Format'] && !colProps.col.format) {
										var pre = val.substring(0, pos);
										var match = val.substring(pos, pos + colProps.filter.length);
										var post = val.substring(pos + colProps.filter.length, val.length);
										row[col + 'Format'] = '<span>{0}<span class="filter">{1}</span>{2}</span>'.f(pre, match, post);
									}
									return row;
								}
							} else {
								if( _filterCols[col].col.filter ) { // Aplico solo una vez
									_filterCols[col].col.filter = false;
									_data.cols[col].filter = false;
									ctrlErrorEnFiltro = true;
									_head, _body, _foot = undefined;
									alert("Posible error en busqueda por datos tipo multi-lista. Se recargara la tabla!!!");
								}
							}
                        });
                        break;
                    case "number":
                    case "date":
                        _data.rows = $.map(_data.rows, function (row) {
                            var exp = colProps.filter.replace(/\s+/gi, ' ').split(' ');
                            exp = $(exp).filter(function(){return this});
                            var opArray = [">=", "<=", "..", ">", "<", "="];
                            var matches = 0;
                            var illegal = true;

                            $.each(exp, function (index, expr) {

                                for (var i = 0; i < opArray.length; i++) {

                                    var op = opArray[i];
                                    var pos = expr.indexOf(op);
                                    var lval = expr.substring(0, pos);
                                    var rval = expr.substring(pos + op.length);

                                    if (pos == -1) continue;

                                    illegal = ((lval.length + rval.length) == 0);
                                    lval = parseFloat(lval);
                                    rval = parseFloat(rval);
                                    if (isNaN(lval)) lval = Number.NEGATIVE_INFINITY;
                                    if (isNaN(rval)) rval = Number.MAX_VALUE;

                                    if (colProps.col.type == "date") {
                                        var today = new priv.ext.XDate(priv.options.types.date.utc === true).setHours(0, 0, 0, 0);
                                        lval = today - (lval * -1) * (60 * 60 * 24 * 1000);
                                        rval = today - (rval * -1) * (60 * 60 * 24 * 1000);
                                    }

                                    switch (op) {
                                        case ">":
                                            if (row[col] > rval) matches++;
                                            break;
                                        case ">=":
                                            if (row[col] >= rval) matches++;
                                            break;
                                        case "<":
                                            if (row[col] < rval) matches++;
                                            break;
                                        case "<=":
                                            if (row[col] <= rval) matches++;
                                            break;
                                        case "=":
                                            if (row[col] == rval) matches++;
                                            break;
                                        case "..":
                                            if (colProps.col.type == "date") {
                                                if (row[col] >= lval && row[col] < rval) matches++;
                                            }
                                            else {
                                                if (row[col] >= lval && row[col] <= rval) matches++;
                                            }
                                            break;
                                        default:
                                            illegal = true;
                                    }
                                    break;
                                }
                            });
                            if ((exp.length == 1 && illegal) ||
                                (matches > 0 && illegal) ||
                                matches == exp.length ||
                                colProps.filter == '') return row;
                        });
                        break;
                    case "bool":
                        _data.rows = $.map(_data.rows, function (row) {
                            if (colProps.filter === '') return row;
                            if (row[col] != undefined && ((Boolean(row[col]) && colProps.filter) || (!Boolean(row[col]) && !colProps.filter))) return row;
                        });
                        break;
                    case "unique":
                        _data.rows = $.map(_data.rows, function (row) {
                            if (colProps.filter === '') return row;
                            var a = row[_uniqueCol];
                            var b = _uniqueCols[a] ? _uniqueCols[a][_uniqueCol] : '';
                            if ((colProps.filter && a === b) || (!colProps.filter && b === '')) return row;
                        });
                        break;
                }
                if (colProps.filter === '') delete _filterCols[colProps.col.column];
            });
            if (priv.options.debug) console.log('filtering finished in {0} ms.'.f(new priv.ext.XDate() - start));
		
			if (ctrlErrorEnFiltro) { // Si se dio un error por ser columna multi lista
				_data.rows = _data.rowsOrg; // se asignan los datos originales
				_head = undefined;
			}
			
            _currPage = 1;
            _data.fromRow = 0;
            _body = undefined;
            _foot = undefined;
        };

        /*
         sorts the data on the current sorting column
         */
        priv.sort = function () {
            if (!_data.cols[_currSortCol]) _currSortCol = "";
            if (!_currSortCol) return;

            var start = new priv.ext.XDate();
            if (priv.options.debug) console.log('sorting on col:{0} order:{1}'.f(_currSortCol, _currSortFlip ? "desc" : "asc"));

            var isString = (_data.cols[_currSortCol].type == "string");
            _data.rows = _data.rows.sort(function (a, b) {

                var valA = a[_currSortCol];
                var valB = b[_currSortCol];

                if (isString) {
                    if (valA == undefined) valA = '';
                    if (valB == undefined) valB = '';

                    if (String(valA).toLowerCase() == String(valB).toLowerCase()) return 0;
                    if (String(valA).toLowerCase() > String(valB).toLowerCase()) return _currSortFlip ? -1 : 1;
                    else return _currSortFlip ? 1 : -1;
                } else {
                    if (valA == undefined) valA = Number.NEGATIVE_INFINITY;
                    if (valB == undefined) valB = Number.NEGATIVE_INFINITY;

                    if (valA == valB) return 0;
                    if (valA > valB) return _currSortFlip ? -1 : 1;
                    else return _currSortFlip ? 1 : -1;
                }
            });
            if (priv.options.debug) console.log('sorting finished in {0} ms.'.f(new priv.ext.XDate() - start));
        };

        /*
         helper that returns the underlying data by the unique value
         */
        priv.getRow = function (unique) {
			if (unique == null) return undefined;
            var start = new priv.ext.XDate();
            var row;
            $.each(_data.rowsOrg, function (i, r) {
                if (r[_uniqueCol] == unique) {
                    row = r;
                    return false;
                }
            });
            if (priv.options.debug) console.log('row lookup finished in {0} ms.'.f(new priv.ext.XDate() - start));
            return row;
        };

        /*
         helper that append the data by the row
         */
        priv.addRow = function (row) {
            var start = new priv.ext.XDate();
			// _data.rowsOrg.push(row);
			_data.rowsOrg.push(row);

            _body = undefined;
            _foot = undefined;

			// Determino la cantidad de paginas
			_totalPages = Math.ceil( _data.rowsOrg.length / _pageSize );

            priv.filter();
            priv.sort();
            priv.createTable();

            if (priv.options.debug) console.log('row add finished in {0} ms.'.f(new priv.ext.XDate() - start));
        };


        /*
         helper that change the data by the row
         */
        priv.changeRow = function (row) {
            var start = new priv.ext.XDate();
			
			// _data.rows.push(row);
			
			// Determino el id del row segun la columna del tipo unique.
			var idRow;
			$.each( _data.cols, function(col,data) {
				if ( _data.cols[col].type === "unique" ) {
					idRow = row[col];
					return false;
				}
			});
			
			var newRow = priv.getRow( idRow ); // Obtengo el row a actualizar
			$.each( row, function(col,val) {
				// Aplico el dato ingresado en la data.
				newRow[ col ] = val;
			});

			// -- Refresco de grilla 
			
            _body = undefined;
            _foot = undefined;

            priv.filter();
            priv.sort();
            priv.createTable();

            if (priv.options.debug) console.log('row change finished in {0} ms.'.f(new priv.ext.XDate() - start));
        };


        /*
         helper that delete the data by the idUnique
         */
        priv.deleteRow = function (idUnique) {
            var start = new priv.ext.XDate();
			
			var columna;
			
			// Determina la columna "unique"
			$.each( _data.cols, function(col,data) {
				if ( _data.cols[col].type === "unique" ) {
					columna = col;
					return false;
				}
			});
			
			var ind = 0;
			for( ind; _data.rowsOrg.length > ind; ++ind ) {
				if ( _data.rowsOrg[ind][columna] == idUnique ) { 
					_data.rowsOrg.splice( ind, 1 ); // Al obtener el id del array borro al elemento.
					break;
				}
			};
			
			// -- Refresco de grilla 
			
            _body = undefined;
            _foot = undefined;

            priv.filter();
            priv.sort();
            priv.createTable();

            if (priv.options.debug) console.log('row change finished in {0} ms.'.f(new priv.ext.XDate() - start));
        };


        /*
         Retorna el item de la lista segun la columna - pensado para Select2
         */
        priv.getItemOfList = function ( column, val ) {
			
			var itemList = undefined;
		
			$.each( _data.cols[column].listElem, function(id,item) {
				if ( item.id === val ) {
					itemList = item;
					return false;
				}
			});

			return itemList;

        };


        /* Event Handlers
         *************************************************************************/

		priv.editCellCheck = function (e) {
			if (priv.options.editBloqueado) return; // Si hay algun input activo sale...
			
			priv.options.editBloqueado = true;
			
			var elem = $(this);
			var unique = elem.closest('tr').data('unique');
			var row = priv.getRow(unique);			
			var columName = elem.parent().data('column');
			
			// Analizo si pertenece a algun grupo de check
			var checkGroup = _data.cols[columName].checkgroup
			if ( checkGroup || false ) {
				$.each( _data.cols, function (i, col) {
					if ( (col.column != columName) && (col.checkgroup == checkGroup) && row[col.column] ) {

						// Asigno el cambio del valor
						row[col.column] = false;
						
						// informa el dato modificado
						priv.setDataModif( unique, col.column, false );

					}
				});
				// Lista de los input checkbox que pertenecen al grupo A
				$(elem).removeClass("checkgroup_" + checkGroup)
				$.each( elem.parent().parent().find("input.checkgroup_" + checkGroup ), function (i, ctrl) {
					if ($(ctrl).prop('checked')) $(ctrl).prop('checked', false);
				});
				$(elem).addClass("checkgroup_" + checkGroup)
			}

			// Asigno el cambio el valor
			row[columName] = !row[columName];
			
			// Actualizo el valor del checked según la columna tipo bool 
			if ( _data.cols[columName].setcheked ) {
				if ( priv.options.checkboxes ) {
					$(elem.parent().parent().find("input.unique")).prop('checked', row[columName]);
				}
				
				//store the row in checked array
				if (row[columName]) 
					_uniqueCols[unique] = priv.getRow(unique);
				else 
					delete _uniqueCols[unique];
			}
			
			// informa del dato modificado
			priv.setDataModif( unique, columName, row[columName] );			

			priv.options.editBloqueado = false;
			
		}
		 
		priv.editCellMultiList = function (e) {
			if (priv.options.editBloqueado) return; // Si hay algun input activo sale...

			priv.options.editBloqueado = true;

			var elem = $(this).parent();

			// Manejo del dialogo modal para la seleccion de multiples de la lista.
			
			// alert("Manejo del dialogo modal para la seleccion de multiples de la lista.");
			
			var $modal = $('body').find('#ajax-modal');
			
			modalDialogo = 'aplicacionDinamica/modal_ajax_SeleccionDeItemsMultiLista.html';
			
			$modal.load( modalDialogo, '', function(){

				$modal.modal();
				
				$modal.find("._guardar").on('click',function () {
					console.info("Actualizo grilla...");
					
					// acciones varias...
								
					$modal.find("._guardar").off('click');
				});
				
			});
			
			// ---

			priv.options.editBloqueado = false;
			
		}
		 
		priv.editCell = function (e) {
			if (priv.options.editBloqueado) return; // Si hay algun input activo sale...
			
			// Manejo del llamado a una tabla hija
			_body.off('dblclick', 'tr');

			priv.options.editBloqueado = true;
			
			var elem = $(this).parent();
			
			// Para obtener el dato desde el data guardada.
			// var column = _data.cols[elem.data('column')];
			// var unique = elem.closest('tr').data('unique');
			// var row = priv.getRow(unique);
			
			// Gurado el html de la celda
			_classEdit = elem.contents()[1];
			
			// Se obtiene el dato mediante el componente web
			var dato = elem.text(); // row[elem.data('column')];			
			
			var column = _data.cols[elem.data('column')];
			
			var ingresoData;
			
			if ( column.type == "list" ) {
				ingresoData = $('<input type="hidden" id="ItemTipoLista" class="search-query" style="width: 100%;"/>');
			} else {
				ingresoData = $('<input value="' + dato + '" type="text" style="border: 0 none; border-radius: 0 0 0 0; height: 14px; margin-bottom: 0; padding: 0; width: 100%;"/>');
				
				ingresoData.on('blur', function(){
					priv.options.editBloqueado = false;		
					var cell = $(this).parent();
					var val = $(this).prop('value') // Valor ingresado
					
					// $(this).attr('value') // Valor original
					
					var column = _data.cols[cell.data('column')];
					
					// cell.html(valor);
					// cell.html(format.f(val));
					
					// Limpio el contenido de la celda.
					cell.empty();
// ----
					var unique = elem.closest('tr').data('unique');
					var props = priv.getRow(unique);
					var key = cell.data('column');

					var format = props[key + 'Format'] || _data.cols[key].format || '{0}';
					
					switch (_data.cols[key].type) {
						case "list":
						case "string":
							cell.text(format.f(val));
							break;
						case "number":
							val = Number(val);
							var forceDecimals = !isNaN(_data.cols[key].decimals);
							if (forceDecimals) cell.text(format.f(val.toFixed(_data.cols[key].decimals)));
							else {
								(val || 0) % 1 === 0
									? cell.text(format.f(val))
									: cell.text(format.f(val.toFixed(priv.options.types.number.decimals || 2)));
							}
							break;
						case "date":
							val = new priv.ext.XDate(val, priv.options.types.date.utc === true).toString(priv.options.types.date.format || 'yyyy-MM-dd HH:mm:ss');
							cell.text(format.f(val));
							break;
						case "fecha":
							if ( validarFecha( val ) ) {
								cell.text(format.f(val));
							} else {
								cell.text('NaN');
							}
							break;
					}
// ----				
					if ( cell.text() === 'NaN' ) { // Si hay un dato no valido dejo el original
						cell.text(format.f($(this).attr('value')));
					} else { // informa del dato modificado
						priv.setDataModif( cell.closest('tr').data('unique'), cell.data('column'), val );
						// _dataModif.push(val);
					}

					// $('<i class="icon-edit hidden" title="" data-original-title="">').appendTo(cell);
					$('<i class="icon-edit" title="" data-original-title="">').appendTo(cell);
					cell.find('i').css('cursor', 'pointer');

					cell.off('click', 'i');
					cell.on('click', 'i', priv.editCell);

					if ( _estadoPadre && (priv.options.infoAccesoHijo>'') ) {
						_body.on('dblclick', 'tr', priv.switchTableSon);
					} 

					// Aplico el dato ingresado en la data.
					priv.getRow( cell.closest('tr').data('unique') )[ cell.data('column') ] = val;

					// alert("Salir...");
				});
				
				if ( column.mask != undefined ) {
					$.mask.definitions['~']='[+-]';
					ingresoData.mask(column.mask);
				}
			}

			elem.empty();
			ingresoData.appendTo(elem);

			var format;
			if ( column.type == "list" ) {
				format = function(item) { return item.desc; };
				
				var cerrarSelect2 = function(inThis) {
					console.info("cerrarSelect2...");
				}
				
				var sel2 = ingresoData.select2({
					data:{ more: false, results: column.listElem, text: 'desc' },
					formatSelection: format,
					formatResult: format
				});

				var unique = elem.closest('tr').data('unique')
				var fila = priv.getRow( unique );
				var column = elem.data('column');
				ingresoData.select2("val", fila[column][0].cod );

				_ctrlS2.idUnique = unique;
				_ctrlS2.val = fila[column][0].cod;
				_ctrlS2.valItemOrg = fila[column][0];
				_ctrlS2.column = column;
				_ctrlS2.cell = elem;

			}

			ingresoData.focus();
			
			// var valor = elem.closest('tr').data(column);
			
		}


		priv.setDataModif = function( idRow, col, valor ) {
			
			var pos = undefined; 
			
			$.each( _dataModif, function (i, r) {
                if (r.id == idRow) {
                    pos = i;
                    return false;
                }
            });
			
			if ( pos == undefined ) {
				pos = _dataModif.length; // pos es el indice del elemento a crear.
				_dataModif.push( { id : idRow });
			}

			_dataModif[pos][col] = valor;  // En col tengo el nombre de la columna.
		
		}
		
		priv.switchTableFather = function (e) {
			var elem = $(this);
			
			_estadoPadre = true; // Indico que estoy en presencia de la tabla padre
			
			// Seteo info para la tabla padre			
			priv.options.url = _urlPadre;
			priv.options.urlData = $.extend({}, _urlDataPadre); // Clono el objeto
			
			priv.init();

			_table.remove();
			_table = undefined; //the table

			// Determino la cantidad de paginas
			// _totalPages = Math.ceil( _data.rows.length / _pageSize );

            priv.filter();
            priv.sort();

            priv.createTable();
			
			_currPage = _currPageTableFather;
			priv.pageChanged();
			
		}
		 
		priv.switchTableSon = function (elem) {
			// var elem = $(this);
			
			_currPageTableFather = _currPage;
		
			_estadoPadre = false; // Indico que estoy en presencia de la tabla hija

			// Recuerdo el url de la tabla padre
			_urlPadre = priv.options.url;
			_urlDataPadre = $.extend({}, priv.options.urlData); // Clono el objeto
			
			// Seteo info para la tabla hija			
			priv.options.url = priv.options.urlHijo;
			
			_etiquetaPadre = 'volver, aca va el nomb. del padre...';

			$.each(_data.cols, function (col, props) {
				if (props.vistaParaHijo === true) {
					if (typeof priv.getRow($(elem).data('unique'))[col] === "string") {
						_etiquetaPadre = priv.getRow($(elem).data('unique'))[col];
					} else {
						_etiquetaPadre = priv.getRow($(elem).data('unique'))[col][0].desc;
					}
				}

				if ( (props.clavePedido === true) || ( (props.type === 'unique') && (col != 'unique') ) ) {
					priv.options.urlData.id = priv.getRow($(elem).data('unique'))[col];
				}

			});
			
			priv.init();

			_table.remove();
			_table = undefined; //the table

			// Determino la cantidad de paginas
			_totalPages = Math.ceil( _data.rows.length / _pageSize );

            priv.filter();
            priv.sort();
            priv.createTable();
		}
		
        /*
         when: typing a filter
         what: triggers filtering on the value
         */
        priv.filterChanged = function (e) {
            //clear old timer if we're typing fast enough
            if (_filterTimeout) {
                clearTimeout(_filterTimeout);
                if (priv.options.debug) console.log('filtering cancelled');
            }

            var filter = this.value;
            var col = _data.cols[e.data.column];
            var timeout = 200;

            //boolean filters needs some special care
            if (col.type == "bool" || col.type == "unique") {
                timeout = 0;
                var elem = $(this);
                var cssClass = 'indeterminate';
                if (elem.hasClass(cssClass)) {
                    e.preventDefault();
                    elem.removeClass(cssClass);
                    filter = true;
                } else {
                    if (!elem.is(':checked')) {
                        filter = false;
                    } else {
                        elem.addClass(cssClass);
                        filter = '';
                    }
                }
            }

            //add the filter to the filter array
            _filterCols[col.column] = {
                filter: filter,
                col: col
            };

            //wait a few deciseconds before filtering
            _filterTimeout = setTimeout(function () {
                _filterTimeout = undefined;
                priv.filter();
                priv.sort();
                priv.createTable();
            }, timeout);
        };

        /*
         when: changing page in pager
         what: triggers table to be created with new page
         */
        priv.pageChanged = function (e) {
			if ( e ) {
				e.preventDefault();
				_currPage = e.data.pageIndex;
			}

			if (_currPage < 1 || _currPage > _totalPages) return;
			
			//set the new page
            if (priv.options.debug) console.log('paging to index:{0}'.f(_currPage));

            //find out what rows to create
            _data.fromRow = ((_currPage - 1) * _pageSize);
            _data.toRow = _data.fromRow + _pageSize;
            if (_data.toRow > _data.rows.length) _data.toRow = _data.rows.length;

            //trigger callback
			if( e ) {
				if (typeof priv.options.pageChanged == 'function') {
					priv.options.pageChanged.call(e.target, {
						event: e,
						page: _currPage
					});
				} 
			} 

			_lastTblRow = undefined; // al cambiar de pagina destruyo el dato del ultimo row
			
            _body = undefined;
            _foot = undefined;
            priv.createTable();

        };

        /*
         when: changing pagesize in pagesize dropdown
         what: triggers table to be created with new pagesize
         */
        priv.pageSizeChanged = function (e) {
            e.preventDefault();
            var val = $(this).text().toLowerCase();
            if (priv.options.debug) console.log('pagesize changed to:{0}'.f(val));

            //set the new pagesize
            if (val == "all") priv.options.pageSize = _data.rows.length;
            else priv.options.pageSize = parseInt(val);

            //revert to first page, as its gets messy otherwise.
            _currPage = 1;
            _data.fromRow = 0;
            _data.toRow = _data.fromRow + priv.options.pageSize;
            if (_data.toRow > _data.rows.length) _data.toRow = _data.rows.length;

            //trigger callback
            if (typeof priv.options.pageSizeChanged == 'function') {
                priv.options.pageSizeChanged.call(e.target, {
                    event: e,
                    pageSize: priv.options.pageSize
                });
            }

            _body = undefined;
            _foot = undefined;
			
            priv.createTable();
        };

        /*
         when: changing pagesize si se activa el filtro
         what: triggers table to be created with new pagesize
         */
        priv.pageSizeChangedByFilter = function () {
            // var val = priv.options.filter ? _pageSize-1 : _pageSize+1;
			var val = priv.options.filter ? priv.options.pageSize-1 : priv.options.pageSize+1;

            if (priv.options.debug) console.log('pagesize changed to:{0}'.f(val));

            //set the new pagesize
            priv.options.pageSize = parseInt(val);
			_pageSizeInicial = priv.options.pageSize;

            //revert to first page, as its gets messy otherwise.
            _currPage = 1;
            _data.fromRow = 0;
            _data.toRow = _data.fromRow + priv.options.pageSize;
            if (_data.toRow > _data.rows.length) _data.toRow = _data.rows.length;

            _body = undefined;
            _foot = undefined;
			
            priv.createTable();
        };

        /*
         when: clicking a column
         what: triggers table to be sorted by the column
         */
        priv.columnClicked = function (e) {
            e.preventDefault();
            if (priv.options.debug) console.log('col:{0} clicked'.f(e.data.column));

            //set the new sorting column
            if (_currSortCol == e.data.column) _currSortFlip = !_currSortFlip;
            _currSortCol = e.data.column;

            //trigger callback
            if (typeof priv.options.columnClicked == 'function') {
                priv.options.columnClicked.call(e.target, {
                    event: e,
                    column: _data.cols[_currSortCol],
                    descending: _currSortFlip
                });
            }

            _headSort = undefined;
            _body = undefined;
            priv.sort();
            priv.createTable();
        };

        /*
         when: clicking a column in columnpicker
         what: triggers table to show/hide the column
         */
        priv.columnPickerClicked = function (e) {
            e.stopPropagation();

            var elem = $(this);
            var col = elem.val();
            if (priv.options.debug) console.log('col:{0} {1}'.f(col, elem.is(':checked') ? 'checked' : 'unchecked'));

            //toggle column visibility
            _data.cols[col].hidden = !_data.cols[col].hidden;

            _data.cols[col].index = new priv.ext.XDate();
            _head = undefined;
            _body = undefined;
            priv.createTable();
        };

        /*
         when: clicking the check-all checkbox
         what: toggles checked state on all rows, and adds/removes them from checked array
         */
        priv.checkToggleChanged = function (e) {
            var elem = $(this);

            if (elem.is(':checked')) {
                var start = new priv.ext.XDate();
                //for every row(except non checkables), add it to the checked array
                $.each(_data.rows, function (index, props) {
                    var row = _data.rows[index];
                    if (row.checkable === false) return;
                    _uniqueCols[props[_uniqueCol]] = row;
                });
                if (priv.options.debug) console.log('{0} rows checked in {1} ms.'.f(_data.rows.length, new priv.ext.XDate() - start));
                _checkToggleChecked = true;
            }
            else {
                var start = new priv.ext.XDate();
                //for every checked row(except non checkables), remove it from checked array
                for (var key in _uniqueCols) {
                    var row = _uniqueCols[key];
                    if (row.checkable === false)
                        continue;
                    else
                        delete _uniqueCols[key];
                }
                if (priv.options.debug) console.log('{0} rows unchecked in {1} ms.'.f(_data.rows.length, new priv.ext.XDate() - start));
                _checkToggleChecked = false;
            }
            _body = undefined;
            priv.createTable();
        };

        /*
         when: clicking a row checkbox
         what: toggles checked state on row, and add/removes it from checked array
         */
        priv.rowChecked = function (e) {
            var elem = $(this);

            //get the row's unique value
            var unique = elem.closest('tr').data('unique');
            if (priv.options.debug) console.log('row({0}) {1}'.f(unique, elem.is(':checked') ? 'checked' : 'unchecked'));

            //store the row in checked array
            if (elem.is(':checked')) _uniqueCols[unique] = priv.getRow(unique);
            else delete _uniqueCols[unique];
        };

        /*
         when: clicking anywhere on a row
         what: row data and other info is returned to caller
         */
        priv.rowClicked = function (e) {
            if (!_uniqueCol) {
                if (priv.options.debug) console.log('no unique column specified');
                return;
            }

            //gather callback data
            var elem = $(this);
            var column = _data.cols[elem.data('column')];
            var unique = elem.closest('tr').data('unique');
            var row = priv.getRow(unique);
            var isChecked = elem.closest('tr').find('.unique').is(':checked');
			
			_lastTblRow = elem.parent(); // Guardo el row actual
			
			var ind = 0;
			var detalle = "";
			$.each( _data.cols, function (index, col) {
				var etiqueta = "ver_" + String.fromCharCode(65 + ind++); // Con el prefijo "ver_..": "(texto separador)" se le pude indicar al campo si va a ser visible aunque no este presente la grilla.
				$.each( _data.cols, function (index, col) {
					if ( col[etiqueta] != undefined ) {
						if ( typeof row[index] == 'object' ) {
							// detalle += "("+row[index][0].cod+") " + row[index][0].desc + col[etiqueta];
							detalle = $.trim(detalle) + col[etiqueta] + row[index][0].desc;
						} else {
							detalle = $.trim(detalle) + col[etiqueta] + row[index];
						}
					}
				});
			});
			
            //trigger callback
            if (typeof priv.options.rowClicked == 'function') {
                priv.options.rowClicked.call(e.target, {
                    event: e,
                    row: row,
                    column: column,
                    checked: isChecked,
					detalle: detalle,
					idUnique: unique
                });
            }

        };

        /*
         when: clicking anywhere on a row
         what: row data and other info is returned to caller
         */
        priv.rowDblClicked = function (e) {
            if (!_uniqueCol) {
                if (priv.options.debug) console.log('no unique column specified');
                return;
            }
	
            //gather callback data
            var elem = $(this);
            var unique = elem.data('unique');
            var row = priv.getRow(unique);
            var isChecked = elem.find('.unique').is(':checked');
			
			_lastTblRow = elem; // Guardo el row actual

			var ind = 0;
			var detalle = "";
			$.each( _data.cols, function (index, col) {
				var etiqueta = "ver_" + String.fromCharCode(65 + ind++); // Con el prefijo "ver_..": "(texto separador)" se le pude indicar al campo si va a ser visible aunque no este presente la grilla.
				$.each( _data.cols, function (index, col) {
					if ( col[etiqueta] != undefined ) {
						if ( typeof row[index] == 'object' ) {
							// detalle += "("+row[index][0].cod+") " + row[index][0].desc + col[etiqueta];
							detalle = $.trim(detalle) + col[etiqueta] + row[index][0].desc;
						} else {
							detalle = $.trim(detalle) + col[etiqueta] + row[index];
						}
					}
				});
			});
						
            //trigger callback
            if (typeof priv.options.rowDblClicked == 'function') {
                priv.options.rowDblClicked.call(e.target, {
                    event: e,
                    row: row,
                    checked: isChecked,
					detalle: detalle,
					idUnique: unique
                });
            }

			// Cambio a vista pivote Hijo.
			priv.switchTableSon(elem); 

        };

        /*
         when: clicking sobre uno de los botones para desplazarce entre los row
         what: row data and other info is returned to caller
         */
		priv.rowBtnMove = function (e) {

			var elem,
				_firstElemenUnique = $($("#" + priv.options.idTabla + " tbody tr")[0]).data('unique'),
				_lastElemenUnique = $($("#" + priv.options.idTabla + " tbody tr")[_pageSize-1]).data('unique');
				
			if ( _lastElemenUnique == undefined ) {
				console.log(_lastElemenUnique);
				for ( var i = 1; $($("#" + priv.options.idTabla + " tbody tr")[i]).data('unique'); i = i + 1 );
				_lastElemenUnique = $($("#" + priv.options.idTabla + " tbody tr")[i-1]).data('unique');
			}
				
			if (_lastTblRow == undefined) { // undefined
				_lastTblRow = $($("#" + priv.options.idTabla + " tbody tr")[0]); // voy al primer "tr" de la tabla
			}

			// Me posiciono en la siguiente / anterior fila
			if ( _lastTblRow.data('unique') == _firstElemenUnique ) { // Veo si estoy en el primer tr
				if ( _currPage > 1 ) { // Si en el primer page no debo moverme
					if ( $(this).attr("id") == priv.options.btnAnterior ){
						_currPage = _currPage - 1;						
						priv.pageChanged(); // voy al bloque anterior
						elem = $($("#" + priv.options.idTabla + " tbody tr")[_pageSize-1]); // voy al ultimo "tr" de la tabla
					} else {
						elem = $(_lastTblRow.next()); // caso "A"
					}
				} else if ( $(this).attr("id") == priv.options.btnSiguiente ){
						elem = $(_lastTblRow.next()); // caso "A"
					} else {
						return;
					} 
			} else if ( _lastTblRow.data('unique') == _lastElemenUnique ) { // Veo si estoy en el botton
				if ( _currPage < _totalPages ) { // Veo si estoy en el ultimo bloque
					if ( $(this).attr("id") == priv.options.btnSiguiente ){
						_currPage = _currPage + 1;
						priv.pageChanged(); // estoy en el bloque siguiente
						elem = $($("#" + priv.options.idTabla + " tbody tr")[0]); // voy al primer "td" de la tabla
					} else {
						elem = $(_lastTblRow.prev()); // caso "B"
					}
				} else if ( $(this).attr("id") == priv.options.btnAnterior ) {
					elem = $(_lastTblRow.prev()); // caso "B"
				} else {
					return;
				}			
			} else if ( $(this).attr("id") == priv.options.btnSiguiente ){
				elem = $(_lastTblRow.next()); // caso "A"
			} else if ( $(this).attr("id") == priv.options.btnAnterior ){
				elem = $(_lastTblRow.prev()); // caso "B"
			}
			
			// Controlo que tenga datos...
			if ( elem.children()[1] == undefined ) {
				elem = $($("#" + priv.options.idTabla + " tbody tr")[0]);
			}
			
			_lastTblRow = elem; // Guardo el $(this) de la ultima fila indicada 
			elem = $(elem.children()[1]); // quedo en la primera columna significativa

			//gather callback data
			// var elem = $(this); // la defino y asigno antes.
			var column = _data.cols[elem.data('column')];
			var unique = elem.closest('tr').data('unique');
			var row = priv.getRow(unique);
			var isChecked = elem.closest('tr').find('.unique').is(':checked');

			//trigger callback
			if (typeof priv.options.rowBtnMove == 'function') {
				priv.options.rowBtnMove.call(e.target, {
					event: e,
					row: row,
					column: column,
					checked: isChecked
				});
			}
			
		};
		
        /*
         when: clicking a datepicker operator
         what: sets the datepicker operator before a datepicker date is chosen.
         */
        priv.dpOpChanged = function(e) {
            if (priv.options.debug) console.log('dp oper:{0} clicked'.f(e.data.op));
            e.preventDefault();
            _currDpOp = e.data.op;
        };

        /*
         when: clicking a datepicker date
         what: triggers filtering on the date
         */
        priv.dpClicked = function (e) {
            if (priv.options.debug) console.log('dp date:{0} clicked'.f(new priv.ext.XDate(e.date, priv.options.types.date.utc === true).toString('yyyy-MM-dd')));

            e.preventDefault();
            input = $(this).prev('input.filter').get(0);
            Placeholders.disable(input); //Remove date placeholders for IE

            var today = new priv.ext.XDate(false).setHours(0, 0, 0, 0);
            var daysDiff = Math.floor(e.date / (60 * 60 * 24 * 1000)) - Math.floor(today / (60 * 60 * 24 * 1000));

            var filter = $(e.data.input);
            var op = "..";
            var pos = filter.val().indexOf(op);
            var lval = filter.val().substring(0, pos);
            var rval = filter.val().substring(pos + op.length);

            if (_currDpOp == "l") lval = daysDiff;
            if (_currDpOp == "r") rval = daysDiff;

            filter.val("{0}{1}{2}".f(lval, op, rval));
            Placeholders.enable(input);
            $(this).datepicker('hide');
            filter.trigger('keyup');
        };

		/*
			Setea el filtro por segun definicion de vista inicial	
        */
		priv.setFilterDefault = function () {
			if ( Object.keys(_filterCols).length == 0 ) return;
			if ( (priv.options.viewDefault=='') || _FiltroDefaultEstablecido ) return;
			_FiltroDefaultEstablecido = true;
		
            var filter;
            var col = _data.cols["unique"];
            var timeout = 0;
			
			var elem;

			if ( $("#" + priv.options.idTabla + " th .filter").length > 0 ) {
				elem = $("#" + priv.options.idTabla + " th .filter")[0];
			}
			
			switch ( priv.options.viewDefault ) {
				case 'checked' :
					filter = true;
					if ( elem ) {
						$(elem).removeClass("indeterminate");
						elem.checked = true;
					}
					break;
				case 'unchecked' :
					filter = false;
					if ( elem ) {
						$(elem).removeClass("indeterminate");
						elem.checked = false;
					}
					break;
				case 'all' :
					filter = '';
					if ( elem ) {
						elem.checked = true;
						$(elem).addClass("indeterminate");
					}
					break;
			}
			// --------

            //add the filter to the filter array
            _filterCols["unique"] = {
                filter: filter,
                col: col
            };

			// Desactivo los controles que realiza "priv.filter()"
			_ctrlParaFiltro = false;
		
		}
		
		/*
         when: typing a filter, según control de selección de vista.
         what: triggers filtering on the value
         */
        priv.viewRowChecked = function (e) {
            //clear old timer if we're typing fast enough
            if (_filterTimeout) {
                clearTimeout(_filterTimeout);
                if (priv.options.debug) console.log('filtering cancelled');
            }
			
            var filter;
            var col = _data.cols["unique"];
            var timeout = 0;
			
			if ( ! col ) return; // Si no esta establecido el filtro termina.
			
			var elem;

			if ( $("#" + priv.options.idTabla + " th .filter").length > 0 ) {
				elem = $("#" + priv.options.idTabla + " th .filter")[0];
			}

			var caso;
			if ( e ) {
				caso = e.data.vista;
			} else {
				caso = priv.options.viewDefault;
			}
			if ( caso == '' ) return; 
			
			switch ( caso ) {
				case 'checked' :
					filter = true;
					if ( elem ) {
						$(elem).removeClass("indeterminate");
						elem.checked = true;
					}
					break;
				case 'unchecked' :
					filter = false;
					if ( elem ) {
						$(elem).removeClass("indeterminate");
						elem.checked = false;
					}
					break;
				case 'all' :
					filter = '';
					if ( elem ) {
						elem.checked = true;
						$(elem).addClass("indeterminate");
					}
					break;
			}
			// --------

            //add the filter to the filter array
            _filterCols["unique"] = {
                filter: filter,
                col: col
            };

			// Desactivo los controles que realiza "priv.filter()"
			_ctrlParaFiltro = false;
			
            //wait a few deciseconds before filtering
            _filterTimeout = setTimeout(function () {
                _filterTimeout = undefined;
                priv.filter();
                priv.sort();
                priv.createTable();
            }, timeout);
			
        };

		/* 
		* Retorna la cantidad de row 
		*/
		priv.getCountData = function () {
            if (priv.options.debug) console.log('priv.getCountData called');

            return _countRows;
        };
	
		/* 
		* Habilita o no el estado de: "priv.options.editBloqueado"
		* Por defecto esta en false
		*/
		priv.EditBloqueado = function (lEstado) {
            if (priv.options.debug) console.log('priv.EditBloqueado called');

			// Si el parametro es del tipo boolean lo cambio
			if ( typeof lEstado == 'boolean' ) {
				priv.options.editBloqueado = lEstado
			} 
			
            return priv.options.editBloqueado;
        };

        /* Public API
         *************************************************************************/

        publ.init = function (options) {
            if (priv.options.debug) console.log('watable initialization...');
            //merge supplied options with defaults
            $.extend(priv.options, defaults, options);
            priv.init();
            return publ;
        };

        publ.update = function (callback, skipCols, resetChecked) {
            if (priv.options.debug) console.log('publ.update called');
            priv.update(callback, skipCols, resetChecked);
            return publ;
        };

		/*
			Manejo el cierre y asignacion de datos generados en el Select2
		 */
		publ.setCtrlSelect2 = function (){
			// console.log('publ watable setCtrlSelect2...');
			
			if ( ! priv.options.editBloqueado ) return;
			
			_ctrlS2.asignarValor();

			var $cell = _ctrlS2.cell;
			
			// Limpio el contenido de la celda.			
			$cell.empty();
// ----
			var format = '{0}';
			

			if ( _ctrlS2.val === _ctrlS2.valItemOrg.id ) {
				$cell.text(format.f( _ctrlS2.valItemOrg.desc ));
			} else {
				_ctrlS2.valItem = priv.getItemOfList( _ctrlS2.column, _ctrlS2.val);
				
				// Aplico el dato ingresado en la data.
				priv.getRow( _ctrlS2.idUnique )[ _ctrlS2.column ] = [ { cod:_ctrlS2.valItem.id, desc:_ctrlS2.valItem.desc } ];
						
				// Dejo asentado el cambio
				priv.setDataModif( _ctrlS2.idUnique, _ctrlS2.column, _ctrlS2.valItem );

				$cell.text(format.f( _ctrlS2.valItem.desc ));
			}

// ----		
			// $('<i class="icon-edit hidden" title="" data-original-title="">').css('cursor', 'pointer').appendTo($cell);
			$('<i class="icon-edit" title="" data-original-title="">').css('cursor', 'pointer').appendTo($cell);

			$cell.off('click', 'i');
			$cell.on('click', 'i', priv.editCell);

			priv.options.editBloqueado = false;

		};
		
        publ.addRow = function (row) {
            if (priv.options.debug) console.log('publ.addRow called');
			priv.addRow(row);
            return publ;
        };

        publ.changeRow = function (row) {
            if (priv.options.debug) console.log('publ.changeRow called');
			priv.changeRow(row);
            return publ;
        };
		
		publ.deleteRow = function (idUnique) {
            if (priv.options.debug) console.log('publ.deleteRow called');
			priv.deleteRow(idUnique);
            return publ;
        };

        publ.getData = function (checked, filtered) {
            if (priv.options.debug) console.log('publ.getData called');
            checked = checked || false;
            filtered = filtered || false;

            var data = $.extend(true, {}, _data);
            delete data.cols["unique"];

            $.each(data.cols, function(col) {
                if (_filterCols[col]) data.cols[col].filter = _filterCols[col].filter;
            });

            if (!filtered) {
                delete data.rows;
                data.rows = data.rowsOrg;
            }
            delete data.rowsOrg;
            delete data.fromRow;
            delete data.toRow;

            if (checked) {
                delete data.rows;
                data.rows = $.map(_uniqueCols, function (val, index) {
                    return val;
                });
            }
            return data;
        };

		/*
		* Retorna la cantidad de filas
		*/
        publ.getCountData = function () {
            if (priv.options.debug) console.log('publ.getCountData called');

            return priv.getCountData();
        };

        publ.getDataPosCollapse = function () {
            if (priv.options.debug) console.log('publ.getDataPosCollapse called');

			var _firstElemenUnique = $($("#" + priv.options.idTabla + " tbody tr")[0]).data('unique');

			var row = priv.getRow(_firstElemenUnique);
			
            return row;
        };

        publ.setData = function (data, skipCols, resetChecked) {
            if (priv.options.debug) console.log('publ.setData called');
            priv.setData(data, skipCols, resetChecked);
            return publ;
        };

        publ.option = function (option, val) {
            if (priv.options.debug) console.log('publ.option called');
            if (val == undefined) return priv.options[option];
            priv.options[option] = val;
            _head = undefined;
            _body = undefined;
            _foot = undefined;
            priv.createTable();
            return publ;
        };

        publ.getDataModif = function () {
            if (priv.options.debug) console.log('publ.getDataModif called');

            return _dataModif;
        };

        publ.getRowChecked = function () {
            if (priv.options.debug) console.log('publ.getRowChecked called');

			var rows = [];
			
			rows = $.map(_uniqueCols, function (val, index) {
				return index; // retorno el unique
			});
			
            return rows;
        };
		
        publ.EditBloqueado = function (lEstado) {
            if (priv.options.debug) console.log('publ.EditBloqueado called');
			
            return priv.EditBloqueado(lEstado);
        };

        return publ;
    };

    $.fn.WATable = function (options) {
        options = options || {};
        return this.each(function () {
            options.id = this;
            $(this).data('WATable', new WATable().init(options));

            // $(this).data('cantElementos', 5 );
			
			// console.dir( $(this).data('WATable') );
			
        });
    };

    String.prototype.format = String.prototype.f = function () {
        var s = this;
        i = arguments.length;
        while (i--) s = s.replace(new RegExp('\\{' + i + '\\}', 'gm'), arguments[i]);
        return s;
    };

    //IE Polyfills
    /* placeholders.js */ (function(t){"use strict";function e(t,e,r){return t.addEventListener?t.addEventListener(e,r,!1):t.attachEvent?t.attachEvent("on"+e,r):void 0}function r(t,e){var r,n;for(r=0,n=t.length;n>r;r++)if(t[r]===e)return!0;return!1}function n(t,e){var r;t.createTextRange?(r=t.createTextRange(),r.move("character",e),r.select()):t.selectionStart&&(t.focus(),t.setSelectionRange(e,e))}function a(t,e){try{return t.type=e,!0}catch(r){return!1}}t.Placeholders={Utils:{addEventListener:e,inArray:r,moveCaret:n,changeType:a}}})(this),function(t){"use strict";function e(t){var e;return t.value===t.getAttribute(S)&&"true"===t.getAttribute(I)?(t.setAttribute(I,"false"),t.value="",t.className=t.className.replace(R,""),e=t.getAttribute(P),e&&(t.type=e),!0):!1}function r(t){var e,r=t.getAttribute(S);return""===t.value&&r?(t.setAttribute(I,"true"),t.value=r,t.className+=" "+k,e=t.getAttribute(P),e?t.type="text":"password"===t.type&&H.changeType(t,"text")&&t.setAttribute(P,"password"),!0):!1}function n(t,e){var r,n,a,u,i;if(t&&t.getAttribute(S))e(t);else for(r=t?t.getElementsByTagName("input"):v,n=t?t.getElementsByTagName("textarea"):b,i=0,u=r.length+n.length;u>i;i++)a=r.length>i?r[i]:n[i-r.length],e(a)}function a(t){n(t,e)}function u(t){n(t,r)}function i(t){return function(){f&&t.value===t.getAttribute(S)&&"true"===t.getAttribute(I)?H.moveCaret(t,0):e(t)}}function l(t){return function(){r(t)}}function c(t){return function(e){return p=t.value,"true"===t.getAttribute(I)?!(p===t.getAttribute(S)&&H.inArray(C,e.keyCode)):void 0}}function o(t){return function(){var e;"true"===t.getAttribute(I)&&t.value!==p&&(t.className=t.className.replace(R,""),t.value=t.value.replace(t.getAttribute(S),""),t.setAttribute(I,!1),e=t.getAttribute(P),e&&(t.type=e)),""===t.value&&(t.blur(),H.moveCaret(t,0))}}function s(t){return function(){t===document.activeElement&&t.value===t.getAttribute(S)&&"true"===t.getAttribute(I)&&H.moveCaret(t,0)}}function d(t){return function(){a(t)}}function g(t){t.form&&(x=t.form,x.getAttribute(U)||(H.addEventListener(x,"submit",d(x)),x.setAttribute(U,"true"))),H.addEventListener(t,"focus",i(t)),H.addEventListener(t,"blur",l(t)),f&&(H.addEventListener(t,"keydown",c(t)),H.addEventListener(t,"keyup",o(t)),H.addEventListener(t,"click",s(t))),t.setAttribute(j,"true"),t.setAttribute(S,y),r(t)}var v,b,f,h,p,m,A,y,E,x,T,N,L,w=["text","search","url","tel","email","password","number","textarea"],C=[27,33,34,35,36,37,38,39,40,8,46],B="#ccc",k="placeholdersjs",R=RegExp("\\b"+k+"\\b"),S="data-placeholder-value",I="data-placeholder-active",P="data-placeholder-type",U="data-placeholder-submit",j="data-placeholder-bound",V="data-placeholder-focus",q="data-placeholder-live",z=document.createElement("input"),D=document.getElementsByTagName("head")[0],F=document.documentElement,G=t.Placeholders,H=G.Utils;if(void 0===z.placeholder){for(v=document.getElementsByTagName("input"),b=document.getElementsByTagName("textarea"),f="false"===F.getAttribute(V),h="false"!==F.getAttribute(q),m=document.createElement("style"),m.type="text/css",A=document.createTextNode("."+k+" { color:"+B+"; }"),m.styleSheet?m.styleSheet.cssText=A.nodeValue:m.appendChild(A),D.insertBefore(m,D.firstChild),L=0,N=v.length+b.length;N>L;L++)T=v.length>L?v[L]:b[L-v.length],y=T.getAttribute("placeholder"),y&&H.inArray(w,T.type)&&g(T);E=setInterval(function(){for(L=0,N=v.length+b.length;N>L;L++)T=v.length>L?v[L]:b[L-v.length],y=T.getAttribute("placeholder"),y&&H.inArray(w,T.type)&&(T.getAttribute(j)||g(T),(y!==T.getAttribute(S)||"password"===T.type&&!T.getAttribute(P))&&("password"===T.type&&!T.getAttribute(P)&&H.changeType(T,"text")&&T.setAttribute(P,"password"),T.value===T.getAttribute(S)&&(T.value=y),T.setAttribute(S,y)));h||clearInterval(E)},100)}G.disable=a,G.enable=u}(this);
    Object.keys = Object.keys || function(o) { var result = []; for(var name in o) {  if (o.hasOwnProperty(name)) result.push(name); } return result; };
    String.prototype.trim = String.prototype.trim || function () { return this.replace(/^\s+|\s+$/g,''); };
    Date.now = Date.now || function() { return +new Date; };
    console = window.console || { log:function(){} };

})(jQuery);