'use strict';
var cc = cc || {};
cc.dom_ready = [];
cc.add_dom_ready =  function (fn) {
    cc.dom_ready.push(fn);
};

cc.log = function(text) {
    if (window.console) {
        window.console.log(text);
    }
};

function log(text) { cc.log(text); }
(function ($, window, document) {

    // DOM READY 
    var dom_ready = function () {
        $(cc.dom_ready).each(function (i,fn){
            fn();
        });
        //qb.after_dom_ready(); 
    };
    //$(dom_ready);
    $(dom_ready);

}(jQuery, window, document));


(function ($, window, document) {
    'use strict';
    cc.init = (function() {
        cc.add_dom_ready(function() {
            /* inicializo la validacion de tipo de datos */
            cc.validar_tipo_dato = (function(obj) {
                var parts, bloque, dato, tipo_dato, copia, valor;
                parts = $(obj).attr('id').split('_');
                bloque = parts[0];
                dato = parts[1];
                tipo_dato = parts[2];
                switch (tipo_dato) {
                    case 'n':
                        $(document).delegate(obj, 'keyup', function() {
                            MaskInteger(obj, 3);
                        });
                        $(document).delegate(obj, 'blur', function() {
                            ValidateInteger(obj, 0, 3);
                        });
                    break;
                }
            });
            /* fin tipo de dato */
        });

        cc.add_dom_ready(function() {
            $('input').each(function(i) {
                if ($(this).attr('name') && $(this).attr('name').match(/b[\d]{1,2}_d[\d]{1,5}_/)) {
                    cc.validar_tipo_dato(this);
                }
            });
        });

    }());
}(jQuery, window, document));

var ERROR_EN_PAGINA = false;
cc.mostrar_error_dato = function (name, error_message, error_code) {
    if ($('.consistencia_'+name).length) {
        $('.consistencia_'+name).text('');
    } else {
        $('<div><span class="consistencia-error consistencia_'+name+'"></span></div>').insertAfter($('#'+name));
    }
    $('.consistencia_'+name).text('Error '+error_code + ': '+error_message);
    ERROR_EN_PAGINA = true;
};

cc.limpiar_error_dato = function (name) {
    if ($('.consistencia_'+name).length) {
        $('.consistencia_'+name).remove();
    }
};


cc.array_consistencia = [];
cc.array_consistencia_event = [];
cc.register_consistencia = function(nombre_consistencia) {
    window.consistencias = window.consistencias || [];
    for (var i = 0; i<window.consistencias.length; i++) {
        if (window.consistencias[i].nombre == nombre_consistencia) {
            return;
        }
    }
    var consistencia = {
      nombre: nombre_consistencia
    };
    window.consistencias.push(consistencia);
};

cc.register_consistencia_event = function(nombre_consistencia_event) {
    window.consistencias_events = window.consistencias_events || [];
    for (var i = 0; i<window.consistencias_events.length; i++) {
        if (window.consistencias_events[i].nombre == nombre_consistencia_event) {
            return;
        }
    }
    var consistencia_event = {
        nombre: nombre_consistencia_event
    };
    window.consistencias_events.push(consistencia_event);
};

cc.correr_consistencias = function() {
    var i=0;
    var fn ;
    if (window.consistencias) {
        for (var i = 0; i < window.consistencias.length ; i++) {
            fn = window[window.consistencias[i].nombre];
            if (typeof fn === 'function') {
                fn();
            }
        }
    }
    if (window.consistencias_events) {
        for (var i = 0; i < window.consistencias_events.length ; i++) {
            fn = window[window.consistencias_events[i].nombre];
            if (typeof fn === 'function') {
                fn();
            }
        }
    }
};

/**************************************************************************/
/**************** COMIENZA EL CODIGO DE CONSISTENCIAS *********************/

cc.consistencia2_1 = function() {
    if ($("#b2_d13_o_1_2").is(":checked")) {
        $("#novivesolo").show();
        
        /*
        $("[name='b2_d131_o_1']").hide();
        $("#b2_d1321_n_1").hide();
        $("#b2_d1322_n_1").hide();
        $("#b2_d1323_n_1").hide();
        $("#b2_d1324_n_1").hide();
        
        $("[name='b2_d131_o_1']").attr("disabled", true);
        $("#b2_d1321_n_1").attr("readonly", true);
        $("#b2_d1322_n_1").attr("readonly", true);
        $("#b2_d1323_n_1").attr("readonly", true);
        $("#b2_d1324_n_1").attr("readonly", true);*/
    } else {
        $("#novivesolo").hide();
        /*
        
        $("[name='b2_d131_o_1']").show();
        $("#b2_d1321_n_1").show();
        $("#b2_d1322_n_1").show();
        $("#b2_d1323_n_1").show();
        $("#b2_d1324_n_1").show();
        
        $("[name='b2_d131_o_1']").attr("disabled", false);
        $("#b2_d1321_n_1").attr("readonly", false);
        $("#b2_d1322_n_1").attr("readonly", false);
        $("#b2_d1323_n_1").attr("readonly", false);
        $("#b2_d1324_n_1").attr("readonly", false);
        */
    }
};

cc.consistencia2_1_event = function() {
    //$("[name='b2_d13_o_1']").bind('change', function() {
    $(document).delegate("[name='b2_d13_o_1']", 'change', function() {
        cc.consistencia2_1();
    });
};

cc.consistencia3_1 = function() {
    
    
    if (!$("#b3_d154_c_4").is(":checked")) {
        $("#tienecomputadora").hide();
        /*
        $('#b3_d151_o_1').attr("disabled", true);
        $('#b3_d152_o_1').attr("disabled", true);
        $('#b3_d153_o_1').attr("disabled", true);
        */
    } else {
        $("#tienecomputadora").show();
        /*
        $('#b3_d151_o_1').attr("disabled", false);
        $('#b3_d152_o_1').attr("disabled", false);
        $('#b3_d153_o_1').attr("disabled", false);
        */
    }
};

cc.consistencia3_1_event = function() {
    $(document).delegate("#b3_d154_c_4", 'change', function() {
        cc.consistencia3_1();
    });
};

cc.consistencia4_1 = function() {
    if (!$("#b4_d20_o_1_1").is(":checked")) {
        $("#escucharadio").hide();
    } else {
        $("#escucharadio").show();
    }
};

cc.consistencia4_1_event = function() {
    $(document).delegate("[name='b4_d20_o_1']", 'change', function() {
        cc.consistencia4_1();
    });
};

cc.consistencia4_2 = function() {
    if (!$("#b4_d21_o_1_1").is(":checked")) {
        $("#miratv").hide();
    } else {
        $("#miratv").show();
    }
};

cc.consistencia4_2_event = function() {
    $(document).delegate("[name='b4_d21_o_1']", 'change', function() {
        cc.consistencia4_2();
    });
};

cc.consistencia4_3 = function() {
    if (!$("#b4_d23_o_1_1").is(":checked")) {
        $("#leediario").hide();
    } else {
        $("#leediario").show();
    }
};

cc.consistencia4_3_event = function() {
    $(document).delegate("[name='b4_d23_o_1']", 'change', function() {
        cc.consistencia4_3();
    });
};
cc.consistencia5_1 = function() {
    log("Disableando b5_d241_o_1_1 y b5_d241_o_1_2 ? ");

    if ($("#b5_d24_o_1").val() > 1) {
        $("#primarioasiste").show();
    } else {
        $("#primarioasiste").hide();
    }
    if ($("#b5_d24_o_1").val() == 2) {
        $("#primarioasistio").show();
    }else
        $("#primarioasistio").hide();
    
    //$("[name='b5_d241_o_1']").attr('disabled', !( $("#b5_d24_o_1").val() > 1 ) );
    //$("[name='b5_d242_o_1']").attr('disabled',  !($("#b5_d24_o_1").val() == 2) );
};

cc.consistencia5_1_event = function() {
    $(document).delegate('#b5_d24_o_1', 'change', function() {
        cc.consistencia5_1();
    });
};

cc.consistencia5_2 = function() {
    log("Disableando b5_d251_o_1_1 y b5_d251_o_1_2 ? ");
    //$("[name='b5_d251_o_1']").attr('disabled', !( $("#b5_d25_o_1").val() > 1 ) );
    //$("[name='b5_d252_o_1']").attr('disabled',  !($("#b5_d25_o_1").val() == 2) );
    
    if ($("#b5_d25_o_1").val() > 1) {
        $("#secundarioasiste").show();
    } else {
        $("#secundarioasiste").hide();
    }
    if ($("#b5_d25_o_1").val() == 2) {
        $("#secundarioasistio").show();
    }else
        $("#secundarioasistio").hide();

};

cc.consistencia5_2_event = function() {
    $(document).delegate('#b5_d25_o_1', 'change', function() {
        cc.consistencia5_2();
    });
};

cc.consistencia6_1 = function() {
    if ( $("#b6_d26_o_1_1").is(':checked') ) {
        //$("#bloque6").show();
        $("#agregarest").show();
    } else {
        //$("#bloque6").hide();
        $("#agregarest").hide();
    }
};

cc.consistencia6_1_event = function() {
    $(document).delegate('[name="b6_d26_o_1"]', 'change', function() {
        cc.consistencia6_1();
    });
};

cc.consistencia6_2 = function() {
    if ( !$("#b6_d266_c_1_1").is(':checked') ) {
        $("#b6_d267_n_1").attr('readonly', 'readonly');
    } else {
        $("#b6_d267_n_1").attr('readonly', false);
    }
};

cc.consistencia6_2_event = function() {
    $(document).delegate('[name="b6_d266_c_1"]', 'change', function() {
        cc.consistencia6_2();
    });
};

cc.consistencia7_1 = function() {
    if ( $("#b7_d27_o_1_1").is(':checked') ) {
        //$("#bloque6").show();
        $("#agregarestuni").show();
    } else {
        //$("#bloque6").hide();
        $("#agregarestuni").hide();
    }
};

cc.consistencia7_1_event = function() {
    $(document).delegate('[name="b7_d27_o_1"]', 'change', function() {
        cc.consistencia7_1();
    });
};

cc.consistencia9_5 = function() {
    if ( $('input[name=b9_d31_o_1]:checked').val() == 2 ) {
        $("#b9_d32_n_1").attr('disabled', 'disabled');
    } else {
        $("#b9_d32_n_1").attr('disabled', false);
    }
};

cc.consistencia9_5_event = function() {
     $(document).delegate("[name='b9_d31_o_1']", 'change', function() {
        cc.consistencia9_5();
    });
};

/*********************** FIN EL CODIGO DE CONSISTENCIAS *************************/
/********************************************************************************/

/** Registro las consistencias en "window" para poder llamarlas dinamicamente... **/

function consistencia2_1() { cc.consistencia2_1(); };
function consistencia2_1_event () { cc.consistencia2_1_event(); }

function consistencia3_1() { cc.consistencia3_1(); };
function consistencia3_1_event () { cc.consistencia3_1_event(); }

function consistencia4_1() { cc.consistencia4_1(); };
function consistencia4_1_event () { cc.consistencia4_1_event(); }

function consistencia4_2() { cc.consistencia4_2(); };
function consistencia4_2_event () { cc.consistencia4_2_event(); }

function consistencia4_3() { cc.consistencia4_3(); };
function consistencia4_3_event () { cc.consistencia4_3_event(); }

function consistencia5_1() { cc.consistencia5_1(); };
function consistencia5_1_event () { cc.consistencia5_1_event(); }

function consistencia5_2() { cc.consistencia5_2(); };
function consistencia5_2_event () { cc.consistencia5_2_event(); }

function consistencia6_1() { cc.consistencia6_1(); };
function consistencia6_1_event () { cc.consistencia6_1_event(); }

function consistencia6_2() { cc.consistencia6_2(); };
function consistencia6_2_event () { cc.consistencia6_2_event(); }

function consistencia7_1() { cc.consistencia7_1(); };
function consistencia7_1_event () { cc.consistencia7_1_event(); }

function consistencia9_5() { cc.consistencia9_5(); };
function consistencia9_5_event () { cc.consistencia9_5_event(); }

