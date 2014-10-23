/* =============================================================
 * bootstrap-typeahead.js v2.0.3
 * http://twitter.github.com/bootstrap/javascript.html#typeahead
 * =============================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */

/*
 * 
 * Modifications by Paul Warelis
 * 
 */

!function($){

    "use strict"; // jshint ;_;

    /* TYPEAHEAD PUBLIC CLASS DEFINITION
	 * ================================= */

    var Typeahead = function (element, options) {
        this.$element = $(element)
        this.options = $.extend({}, $.fn.typeahead.defaults, options)
        this.options.menu = this.options.menu.replace(/[\%]+/,element.id)
        this.matcher = this.options.matcher || this.matcher
        this.sorter = this.options.sorter || this.sorter
        this.highlighter = this.options.highlighter || this.highlighter
        this.$menu = $(this.options.menu).appendTo('body')
        this.$icon = $('#'+element.id+'_icon');
        this.lastQuery='';
        this.clickedIcon = false;
        if (this.options.ajax) {
            var ajax = this.options.ajax;
            if (typeof ajax == "string") {
                ajax = {
                    url:ajax
                };
            }
            this.ajax = {
                create_msg: ajax.create_msg || null,
                initialData: ajax.data || null,
                lastQuery: ajax.lastQuery || "",
                nonQueryAjax: ajax.nonQueryAjax || null,
                active: ajax.active || null,
                lastResultCount: ajax.lastResultCount || null,
                url : ajax.url,
                data: ajax.data || null, // data inicial
                timeout : ajax.timeout || 300,
                method: ajax.method || "post",
                triggerLength : ajax.triggerLength || 3,
                loadingClass : ajax.loadingClass || null,
                displayField : ajax.displayField || null, // nombre del campo con la descripcion a mostrar
                preDispatch : ajax.preDispatch || null,
                preProcess : ajax.preProcess || null
            }
            this.query = "";
        } else {
            this.source = this.options.source
            this.ajax = null;
        }
        this.shown = false
        this.ajaxInitialSource(this.ajax.initialData); // crea menu con data inicial
        this.listen()
    }

    Typeahead.prototype = {

        constructor: Typeahead,

        select: function () {
            this.$element.removeClass('has-error');
            var val = this.$menu.find('.active').attr('data-value');
            if(val == this.ajax.create_msg){
                if(this.shown)
                    this.hide()
                $('#'+this.$element[0].id+'btnAdd').click();
                return;
            }
            if(val && !val.toLowerCase().match(this.$element.val().toLowerCase()))
                val = null;            
            if(!val){
                var blnFound = false;
                for( var i=0 ; i<this.$menu[0].children.length ; i++){
                    if(this.$menu[0].children[i].getAttribute('data-value').toLowerCase().match(this.$element.val().toLowerCase()) || this.$element.val().toLowerCase().match(this.$menu[0].children[i].getAttribute('data-value').toLowerCase())){
                        val = this.$menu[0].children[i].getAttribute('data-value');
                        blnFound = true;
                    }
                }

                var blnOtherMatch = false;
                for(var j=0 ; j<this.ajax.data.length ; j++){
                    if(this.ajax.data[j][this.ajax.displayField] == this.$element.val()){
                        blnOtherMatch = true;
                        var val = this.$menu.find('.active').attr('data-value');
                        break;
                    }
                }
                if(!blnOtherMatch && !blnFound){
                    document.getElementById(this.$element[0].id + "_selected_value").value = "";
                    return this.hide();
                }
                                
            }
            this.$element
            .val(this.updater(val))
            .change()
            this.$element.focus();
            // dejo solo ese en el menu
            var j = this.$menu[0].children.length;
            for(var i=0 ; i<j ; i++){
                if(this.$menu[0].children[0].className=="active")
                    break;
                this.$menu[0].removeChild(this.$menu[0].children[0]);
            }
            while(this.$menu[0].children.length>1)
                this.$menu[0].removeChild(this.$menu[0].children[1]);
            this.ajax.lastResultCount = 1;
            return this.hide()
        },

        updater: function(item) {    
            var arr = this.ajax.data;
            for( var i=0 ; i<arr.length ;  i++){
                if(arr[i][this.ajax.displayField]==item){
                    document.getElementById(this.$element[0].id + "_selected_value").value = arr[i]["id"];
                    return item;
                }                
            } 
            document.getElementById(this.$element[0].id + "_selected_value").value = "";
            console.log('ATENCION: no se encontro item en array de datos');
            return item;
        },        
        
        show: function () {
            //if(!$(this).is(":focus") && !this.$element.is(":focus") && !this.$menu.is(":focus"))
            //    return;
            var pos = $.extend({}, this.$element.offset(), {
                height: this.$element[0].offsetHeight
            })
			
            this.$menu.css({
                top: pos.top + pos.height,
                left: pos.left
            })
            this.$icon.removeClass("icon-caret-down");
            this.$icon.addClass("icon-caret-up");            
            this.$menu.show()
            this.shown = true
            return this
        },

        hide: function () {
            this.$icon.removeClass("icon-caret-up");
            this.$icon.addClass("icon-caret-down");
            this.$menu.hide()
            this.shown = false
            return this
        },

        ajaxLookup: function () {
	
            var query = this.$element.val();
			
            if (query == this.lastQuery) {
                return this;
            }
	
            // Query changed
            this.query = query
	
            // Cancel last timer if set
            if (this.ajax.timerId) {
                clearTimeout(this.ajax.timerId);
                this.ajax.timerId = null;
            }
			
            if (!query || query.length < this.ajax.triggerLength) {
                // cancel the ajax callback if in progress
                if (this.ajax.xhr) {
                    this.ajax.xhr.abort();
                    this.$icon.removeClass("icon-loading");
                    this.ajax.xhr = null;
                    this.ajaxToggleLoadClass(false);
                }
                return this.shown ? this.hide() : this
            }
	
            function execute() {
                this.ajaxToggleLoadClass(true);
				
                // Cancel last call if already in progress
                if (this.ajax.xhr){
                    this.ajax.xhr.abort();
                    this.$icon.removeClass("icon-loading");
                }
                
                var params = this.ajax.preDispatch ? this.ajax.preDispatch(query) : {
                    query : query
                }
                var jAjax = (this.ajax.method == "post") ? $.post : $.get;
                if(this.NonQueryAjax()){
                    this.ajax.nonQueryAjax = true;
                    this.ajaxSource(this.ajax.data);
                    this.lastQuery = this.query;
                }
                else{
                    this.ajax.nonQueryAjax = false;
                    this.lastQuery = this.query;
                    this.ajax.lastQuery = this.query;
                    this.ajax.xhr = jAjax(this.ajax.url, params, $.proxy(this.ajaxSource, this));
                    this.$icon.removeClass("icon-caret-up");
                    this.$icon.removeClass("icon-caret-down");
                    this.$icon.addClass("icon-loading");
                    this.ajax.timerId = null;
                }
            }
			
            // Query is good to send, set a timer
            this.ajax.timerId = setTimeout($.proxy(execute, this), this.ajax.timeout);
			
            return this;
        },
	
        ajaxSource: function (data) {
            this.ajaxToggleLoadClass(false);
	
            var that = this, items
            if(!this.ajax.nonQueryAjax){
                if (!this.ajax.xhr) return;			
                if (this.ajax.preProcess) {
                    data = this.ajax.preProcess(data);
                }
                this.ajax.lastResultCount = data.length;
                this.$icon.removeClass("icon-loading");
                if(this.shown)
                    this.$icon.removeClass("icon-caret-up");
                else    
                    this.$icon.addClass("icon-caret-down");
            }
            // Save for selection retreival
            this.ajax.data = data;
	
            items = $.grep(data, function (item) {
                if (that.ajax.displayField) {
                    item = item[that.ajax.displayField]
                }
                if (that.matcher(item)) return item
            })
	
            items = this.sorter(items)
            
            // si hay menos items del maximo y tiene boton add, agrego boton para crear
            if(($('#'+this.$element[0].id+'btnAdd').length>0) && items.length < this.options.items)
                items.push(this.ajax.create_msg);
			
            if (!items.length) {
                var j = this.$menu[0].children.length;
                for(var i=0 ; i<j ; i++)
                    this.$menu[0].removeChild(this.$menu[0].children[0]);
                return this.shown ? this.hide() : this
            }
	
            this.ajax.xhr = null;
            return this.render(items.slice(0, this.options.items)).show()
        },
    
        NonQueryAjax: function (){
            if(!this.ajax.active)
                return true;
            if(this.ajax.lastQuery == "")
                return false;
            if(this.query.substring(0,this.ajax.lastQuery.length) == this.ajax.lastQuery && this.ajax.lastResultCount<this.options.items)
                return true;
            return false;
        },
        
        ajaxInitialSource: function (data) {
            this.ajaxToggleLoadClass(false);
	
            var that = this, items
	
            items = $.grep(data, function (item) {
                return item;
            })
	
            items = this.sorter(items)
			
            if (!items.length) {
                return this.shown ? this.hide() : this
            }
	
            this.ajax.xhr = null;
            this.render(items.slice(0, this.options.items)).show()
            return this.hide();
        },
		
        ajaxToggleLoadClass: function (enable) {
            if (!this.ajax.loadingClass) return;
            this.$element.toggleClass(this.ajax.loadingClass, enable);
        },

        lookup: function (event) {
            var that = this, items
			
            this.query = this.$element.val()
            this.lastQuery = this.query;
			
            if (!this.query) {
                return this.shown ? this.hide() : this
            }
			
            items = $.grep(this.source, function (item) {
                return that.matcher(item)
            })
			
            items = this.sorter(items)
			
            if (!items.length) {
                return this.shown ? this.hide() : this
            }
			
            return this.render(items.slice(0, this.options.items)).show()
        },
	
        matcher: function (item) {
            return ~item.toLowerCase().indexOf(this.query.toLowerCase())
        },

        sorter: function (items) {
            var beginswith = [],
            caseSensitive = [],
            caseInsensitive = [],
            item
			
            while (item = items.shift()) {
                if (this.ajax && this.ajax.displayField) {
                    item = item[this.ajax.displayField]
                }
                if (!item.toLowerCase().indexOf(this.query.toLowerCase())) beginswith.push(item)
                else if (~item.indexOf(this.query)) caseSensitive.push(item)
                else caseInsensitive.push(item)
            }
			
            return beginswith.concat(caseSensitive, caseInsensitive)
        },

        highlighter: function (item) {
            var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&')
            return item.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
                return '<strong>' + match + '</strong>'
            })
        },

        render: function (items) {
            var that = this
			
            items = $(items).map(function (i, item) {
                i = $(that.options.item).attr('data-value', item)
                i.find('a').html(that.highlighter(item))
                return i[0]
            })
			
            items.first().addClass('active')
            this.$menu.html(items)
            return this
        },
		
        next: function (event) {
            var active = this.$menu.find('.active').removeClass('active'),
            next = active.next()
			
            if (!next.length) {
                next = $(this.$menu.find('li')[0])
            }
			
            next.addClass('active')
        },

        prev: function (event) {
            var active = this.$menu.find('.active').removeClass('active'),
            prev = active.prev()
			
            if (!prev.length) {
                prev = this.$menu.find('li').last()
            }
			
            prev.addClass('active')
        },

        listen: function () {
            this.$icon
            .on('click',     $.proxy(this.clickIcon, this))
            this.$element
            .on('blur',     $.proxy(this.blur, this))
            .on('keypress', $.proxy(this.keypress, this))
            .on('keyup',    $.proxy(this.keyup, this))
            .on('focus',    $.proxy(this.clickText, this))
			
            // Firefox needs this too
            this.$element.on('keydown', $.proxy(this.keypress, this))
			
            this.$menu
            .on('click', $.proxy(this.click, this))
            .on('mouseenter', 'li', $.proxy(this.mouseenter, this))
        },

        keyup: function (e) {
            if(e.keyCode==8 || e.keyCode == 46 || (e.keyCode>47 && e.keyCode<58) || (e.keyCode>64 && e.keyCode<91) || e.keyCode==106 ||  e.keyCode==107 || e.keyCode==108 || e.keyCode==110 || e.keyCode==111 || (e.keyCode>187 && e.keyCode<192))
                document.getElementById(this.$element[0].id + "_selected_value").value = "";
            switch(e.keyCode) {
                case 40: // down arrow
                case 38: // up arrow
                    break
				
                case 9: // tab             
                case 13: // enter
                    if (!this.shown) return
                    this.select()
                    break
				
                case 27: // escape
                    if (!this.shown) return
                    this.hide()
                    break
                
                default:
                    if (this.ajax) this.ajaxLookup()
                    else this.lookup()
            }
			if(this.$element.val().length==0)
                this.$element.removeClass('has-error');
            e.stopPropagation()
            e.preventDefault()
        },

        keypress: function (e) {
            if (!this.shown) {
                if (e.keyCode == 40){ 
                    if(this.$element.val().length ==0)
                        this.ajaxInitialSource(this.ajax.initialData);
                    else{
                        var blnMatch = false;
                        for(var i=0 ; i<this.ajax.data.length ; i++){
                            if(this.ajax.data[i][this.ajax.displayField] == this.$element.val()){
                                blnMatch = true;
                                break;
                            }
                        }
                        //console.log(this.lastQuery + ' - ' + this.$element.val());
                        if(!blnMatch && this.lastQuery != this.$element.val()){
                            if (this.ajax) this.ajaxLookup()
                            else this.lookup()
                            var that = this;
                            setTimeout(function(){
                                that.show();
                                that.$element.focus();                            
                                that.clickedIcon = false;                            
                            },this.ajax.timeout+5);
                            return;
                        }
                    }
                    this.show(); // si es down arrow, muestro menu
                }
                return
            }
			
            switch(e.keyCode) {
                case 9: // tab
                case 13: // enter
                case 27: // escape
                    e.preventDefault()
                    break
				
                case 38: // up arrow
                    if (e.type != 'keydown') break
                    e.preventDefault()
                    this.prev()
                    break
				
                case 40: // down arrow
                    if (e.type != 'keydown') break
                    e.preventDefault()
                    this.next()
                    break
            }
			
            e.stopPropagation()
        },

        blur: function (e) {
            var that = this
            clearTimeout(this.ajax.timerId);
			setTimeout(function () {
                clearTimeout(that.ajax.timerId);
                if(that.clickedIcon){
                    that.clickedIcon = false;
                    return;
                }
                that.clickedIcon = false;
                that.hide();
//                if(!that.validate()){
//                    that.bootbox();
//                } else
                if(that.$element.val().length>0 && document.getElementById(that.$element[0].id + "_selected_value").value==''){
                    return that.select;
                }
            }, 300)
        },
		
        click: function (e) {
            e.stopPropagation()
            e.preventDefault()
            this.select()
        },
        
        clickText: function (e){ // selecciona texto con simple click
            e.stopPropagation()
            e.preventDefault()
            this.$element.select();
        },
        
        clickIcon: function (e){
            this.clickedIcon = true;
            e.stopPropagation()
            e.preventDefault()
            if(this.shown)
                this.hide() 
            else {
                if(this.$element.val().length ==0)
                    this.ajaxInitialSource(this.ajax.initialData);                
                else{
                    var blnMatch = false;
                    for(var i=0 ; i<this.ajax.data.length ; i++){
                        if(this.ajax.data[i][this.ajax.displayField] == this.$element.val()){
                            blnMatch = true;
                            break;
                        }
                    }
                    //console.log(this.lastQuery + ' - ' + this.$element.val());
                    if(!blnMatch && this.lastQuery != this.$element.val()){
                        if (this.ajax) this.ajaxLookup()
                        else this.lookup()
                        var that = this;
                        setTimeout(function(){
                            that.show();
                            that.$element.focus();                            
                            that.clickedIcon = false;                            
                        },this.ajax.timeout+5);
                        return;
                    }
                }     
                this.show();
            }            
            this.$element.focus();
            var that = this;
            setTimeout(function () {
                that.clickedIcon = false;
            }, 250);
        },

        mouseenter: function (e) {
            this.$menu.find('.active').removeClass('active')
            $(e.currentTarget).addClass('active')
        },
        
        validate: function(){
            if(!this.$element.val()){
                document.getElementById(this.$element[0].id + "_selected_value").value=='';
                this.$element.removeClass('has-error');
                return true;
            }
            for(var i=0 ; i<this.ajax.data.length ; i++){
                if(this.ajax.data[i][this.ajax.displayField] == this.$element.val()){
                    this.$element.removeClass('has-error');
                    return true;
                }
            }
            this.$element.addClass('has-error');
            return false;
        }
        
//        bootbox: function(){
//            var that = this;
//            if($('#'+that.$element[0].id+'btnAdd').length>0){
//                bootbox.dialog({
//                    message: "El valor ingresado es inválido",
//                    buttons: {
//                        crear: {
//                            label: that.ajax.create_msg,
//                            className: "btn-success",
//                            callback: function() {
//                                $('#'+that.$element[0].id+'btnAdd').click();
//                            }
//                        },
//                        borrar: {
//                            label: "Dejar en blanco",
//                            className: "btn-default",
//                            callback: function() {
//                                that.$element.val("");
//                                that.$element.removeClass('has-error');
//                                setTimeout(function () {
//                                    that.$element.focusNextInputField();
//                                }, 500);
//                            }
//                        },
//                        volver: {
//                            label: "Volver",
//                            className: "btn-primary",                 
//                            callback: function() {
//                                setTimeout(function () {
//                                    that.$element.focus()
//                                }, 500);
//                            }
//                        }
//                    }
//                });  
//            }
//        }
        
    }


    /* TYPEAHEAD PLUGIN DEFINITION
	 * =========================== */

    $.fn.typeahead = function (option) {
        return this.each(function () {
            var $this = $(this),
            data = $this.data('typeahead'),
            options = typeof option == 'object' && option
            if (!data) $this.data('typeahead', (data = new Typeahead(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    $.fn.typeahead.defaults = {
        source: [],
        items: 60,
        menu: '<ul class="typeahead dropdown-menu" id="typeahead_dropdown_menu_%"></ul>',
        item: '<li><a href="#"></a></li>'
    }

    $.fn.typeahead.Constructor = Typeahead

    /* TYPEAHEAD DATA-API
	 * ================== */

    $(function () {
        $('body').on('focus.typeahead.data-api', '[data-provide="typeahead"]', function (e) {
            var $this = $(this)
            if ($this.data('typeahead')) return
            e.preventDefault()
            $this.typeahead($this.data())
        })
    })

}(window.jQuery);

// hace focus en el siguiente input que no sea hidden
$.fn.focusNextInputField = function() {
    return this.each(function() {
        var fields = $(this).parents("form:eq(0),body").find("button,input,textarea,select");
        var index = fields.index( this );
        if(index < 0)   
            return false;
        for(var j=1; ( index + j ) < fields.length; j++){
            if (fields.eq( index + j ).attr('type')!='hidden' && fields[index + j].style.display!='none'){
                fields.eq( index + j ).focus();
                break;
            }
        }            
        return false;
    });
};

function InitializeTypeahead(controlId, itemLimit, strMsg, blnActive, JSONData, strUrl, intTrigger, formId){
    $('#'+controlId).typeahead({   
        items: itemLimit,
        ajax: {
            create_msg: strMsg,
            active: blnActive,
            data: JSONData,
            url: strUrl,
            timeout: 500,
            displayField: "name",
            dataType: "json",
            triggerLength: intTrigger,
            method: "post",            
            preDispatch: function (query) {
                return {
                Qform__FormId: formId,
                Qform__FormState: $("#Qform__FormState").val(),
                Qform__FormUpdates: "",
                Qform__FormCheckableControls: "",
                Qform__FormParameter: $('#'+controlId).val(),
                Qform__FormEvent: "QAutoCompleteTextBoxEvent",
                Qform__FormCallType: "Ajax",
                Qform__FormControl: controlId
                }
            },
            preProcess: function (data) {
                return JSON.parse(data);
            }
        }
    });     
}

$('.typeahead').keydown(function(e) {
    if($('.dropdown-menu').is(':visible')) {

        var menu = $('#typeahead_dropdown_menu_' + this.id);
        var active = menu.find('.active');      
        var height = active.outerHeight(); //Height of <li>
        var top = menu.scrollTop(); //Current top of scroll window
        var menuHeight = menu[0].scrollHeight; //Full height of <ul>
        
        //Up
        if(e.keyCode == 38) {
            // si es el primero, vuelvo para abajo
            if($(menu.children()[0]).hasClass('active')){
                menu.scrollTop(menuHeight + height);
                return;
            }
            menu.scrollTop(top - height);            
        }    
        //Down
        if(e.keyCode == 40) {
            // si es el ultimo, vuelvo para arriba
            if($(menu.children()[menu.children().length - 1]).hasClass('active')){
                menu.scrollTop(0);
                return;
            }
            menu.scrollTop(top + height);
        }
    }
});