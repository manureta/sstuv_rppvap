/**
 // Alto de la ventana de datos personales
 var nZonaFiltroDP = 200;
 var nZonaCargaDP = 415;
 // Indicador su esta la tabla visible
 var bHayDatosEnTablabHayDatosEnTabla = false;
 */


if (typeof String.prototype.startsWith != 'function') {
    String.prototype.startsWith = function(str) {
        return this.slice(0, str.length) == str;
    };
}

if (typeof String.prototype.endsWith != 'function') {
    String.prototype.endsWith = function(str) {
        return this.slice(-str.length) == str;
    };
}


function fnACE() {
    enable_search_ahead();
    add_browser_detection(jQuery);
    general_things();
    widget_boxes();
    $(document).off("click.dropdown-menu");
}

function enable_search_ahead() {
    $("#nav-search-input").typeahead(
            {source: ["2010", "2011", "2012", "2013"], updater: function(a) {
                    $("#nav-search-input").focus();
                    return a
                }
            }
    )
}
function add_browser_detection(c) {
    if (!c.browser) {
        var a, b;
        c.uaMatch = function(e) {
            e = e.toLowerCase();
            var d = /(chrome)[ \/]([\w.]+)/.exec(e) || /(webkit)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || e.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e) || [];
            return{browser: d[1] || "", version: d[2] || "0"}
        }
        ;
        a = c.uaMatch(navigator.userAgent);
        b = {}
        ;
        if (a.browser) {
            b[a.browser] = true;
            b.version = a.version
        }
        if (b.chrome) {
            b.webkit = true
        }
        else {
            if (b.webkit) {
                b.safari = true
            }
        }
        c.browser = b
    }
}
function general_things() {
    $('.ace-nav [class*="icon-animated-"]').closest("a").on("click", function() {
        var b = $(this).find('[class*="icon-animated-"]').eq(0);
        var a = b.attr("class").match(/icon\-animated\-([\d\w]+)/);
        b.removeClass(a[0]);
        $(this).off("click")
    }
    );
    $("#ace-settings-btn").on("click", function() {
        $(this).toggleClass("open");
        $("#ace-settings-box").toggleClass("open")
    }
    );
    $("#ace-settings-header").removeAttr("checked").on("click", function() {
        if (this.checked) {
            $(".navbar").addClass("navbar-fixed-top");
            $(document.body).addClass("navbar-fixed")
        }
        else {
            $(".navbar").removeClass("navbar-fixed-top");
            $(document.body).removeClass("navbar-fixed");
            if ($("#ace-settings-sidebar").get(0).checked) {
                $("#ace-settings-sidebar").click()
            }
        }
    }
    );
    $("#ace-settings-sidebar").removeAttr("checked").on("click", function() {
        if (this.checked) {
            $("#sidebar").addClass("fixed");
            if (!$("#ace-settings-header").get(0).checked) {
                $("#ace-settings-header").click()
            }
        }
        else {
            $("#sidebar").removeClass("fixed")
        }
    }
    );
    $("#btn-scroll-up").on("click", function() {
        var a = Math.max(100, parseInt($("html").scrollTop() / 3));
        $("html,body").animate({scrollTop: 0}
        , a);
        return false
    }
    );
    $("#skin-colorpicker").ace_colorpicker().on("change", function() {
        var b = $(this).find("option:selected").data("class");
        var a = $(document.body);
        a.attr("class", a.hasClass("navbar-fixed") ? "navbar-fixed" : "");
        if (b != "default") {
            a.addClass(b)
        }
        if (b == "skin-1") {
            $(".ace-nav > li.grey").addClass("dark")
        }
        else {
            $(".ace-nav > li.grey").removeClass("dark")
        }
        if (b == "skin-2") {
            $(".ace-nav > li").addClass("no-border margin-1");
            $(".ace-nav > li:not(:last-child)").addClass("light-pink").find('> a > [class*="icon-"]').addClass("pink").end().eq(0).find(".badge").addClass("badge-warning")
        }
        else {
            $(".ace-nav > li").removeClass("no-border").removeClass("margin-1");
            $(".ace-nav > li:not(:last-child)").removeClass("light-pink").find('> a > [class*="icon-"]').removeClass("pink").end().eq(0).find(".badge").removeClass("badge-warning")
        }
        if (b == "skin-3") {
            $(".ace-nav > li.grey").addClass("red").find(".badge").addClass("badge-yellow")
        }
        else {
            $(".ace-nav > li.grey").removeClass("red").find(".badge").removeClass("badge-yellow")
        }
    }
    )
}

function widget_boxes() {
    $(".widget-toolbar > a[data-action]").each(function() {
        var f = $(this);
        var h = f.data("action");
        var e = f.closest(".widget-box");
        if (h == "collapse") {
            var d = e.find(".widget-body");
            var b = f.find("[class*=icon-]").eq(0);
            var a = b.attr("class").match(/icon\-(.*)\-(up|down)/);
            var c = "icon-" + a[1] + "-down";
            var g = "icon-" + a[1] + "-up";
            d = d.wrapInner('<div class="widget-body-inner"></div>').find(":first-child").eq(0);
            f.on("click", function(i) {
                if (e.hasClass("collapsed")) {
                    if (b) {
                        b.addClass(g).removeClass(c)
                    }
                    e.removeClass("collapsed");
                    d.slideDown(200)
                }
                else {
                    if (b) {
                        b.addClass(c).removeClass(g)
                    }
                    d.slideUp(300, function() {
                        e.addClass("collapsed")
                    }
                    )
                }
                i.preventDefault()
            }
            );
            if (e.hasClass("collapsed") && b) {
                b.addClass(c).removeClass(g)
            }
        }
        else {
            if (h == "close") {
                f.on("click", function(i) {
                    e.hide(300, function() {
                        e.remove()
                    }
                    );
                    i.preventDefault()
                }
                )
            }
            else {
                if (h == "reload") {
                    f.on("click", function(j) {
                        f.blur();
                        var i = false;
                        if (!e.hasClass("position-relative")) {
                            i = true;
                            e.addClass("position-relative")
                        }
                        e.append('<div class="widget-box-layer"><i class="icon-spinner icon-spin icon-2x white"></i></div>');
                        setTimeout(function() {
                            e.find("> div:last-child").remove();
                            if (i) {
                                e.removeClass("position-relative")
                            }
                        }
                        , parseInt(Math.random() * 1000 + 1000));
                        j.preventDefault()
                    }
                    )
                }
                else {
                    if (h == "settings") {
                        f.on("click", function(i) {
                            i.preventDefault()
                        }
                        )
                    }
                }
            }
        }
    }
    )
}
