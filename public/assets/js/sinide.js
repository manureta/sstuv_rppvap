window.sinide = {
    reqUri: "/getRequest.php?",
    load: function(elem, url) {
        var cargando = $('#cargando').is(':hidden');
        $('#cargando').show();

        var x = $.ajax({type: 'GET', url: url, async: false,
            fail: function() {
                alert('Se produjo un error de conexión con el servidor. Intente nuevamente.');
            },
        });
        $(elem).html(x.responseText);
        if (cargando) $('#cargando').hide();
    },
    
    post: function(param,nextFunction,nextFunctionParam) {
        var cargando = $('#cargando').is(':hidden');
        $('#cargando').show();
        var x = $.ajax({type: 'POST', url: this.reqUri,
            data: param, dataType: 'json', async: false,
            fail: function(xhr, textStatus, errorThrown) {
                var msj = sinide.reqUrl + ":(" + textStatus + "-" + errorThrown + ")";
//                console.log(msj);
                if (jQuery.isFunction(nextFunction))
                    nextFunction({errorMsj: msj}, nextFunctionParam);
            },
        });
//        console.log(x.responseText);
        var o = jQuery.parseJSON(x.responseText);
        if (jQuery.isFunction(nextFunction))
            return nextFunction(o, nextFunctionParam);
        else {
            if (cargando) $('#cargando').hide();
            return o;
        }
    },
    data: {},
    start: function() {
        //chequeo que estén activas las cookies
        if (!navigator.cookieEnabled) {
            $('#cargando').replaceWith('<h1>Su navegador no acepta cookies.<br>El sistema requiere que las cookies estén habilitadas.</h1>');
            return;
        }

        this.data = this.post({reqCat: "Session", reqDo: "serverCookieActiva"});
        
        //        req.validar(this.data);
        hash_point=this.data.hash_point;
        if(this.data.status !== true){
            this.loadLogin();
            return;
        }
        this.keepAlive.start();
        $.when(this.loadBody()).done(function() {
            // todavía no cargó los menúes
        });
    },
    loadLogin: function() {
        this.load('#body','tpl/login.tpl.html');
        $('#cargando').hide();
    },
    loadBody: function() {
        this.load('#body','tpl/body.tpl.html');
        this.loadMenu();
        this.load('#menu-usuario','tmp/menu-usuario.html');
        $('#cargando').hide();
        return;
    },
    loadMenu: function() {
        this.load('#menu-vertical', this.reqUri + 'reqCat=Session&reqDo=getMenu');        
        ace.handle_side_menu(jQuery);
    },
    keepAlive: { 
        handler: null,
        interval: 30,
        start: function() {
            if (this.handler !== null) {
                clearInterval(this.handler);
                this.handler = null;
            }
            this.handler = setInterval(function() {
                //TODO postear
            }, (this.interval * 1000));
        },
    },
    
};

