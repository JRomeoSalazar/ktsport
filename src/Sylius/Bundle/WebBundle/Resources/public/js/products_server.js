// Carga mis funciones
$(document).on("ready", products);

/******** FUNCIONES PROPIAS *******************/
// Funcion products - ejecuta mis funciones
function products () {
    hideQuery();
}

// Funciones para vertical tab content
$(verticalNav);

function verticalNav () {
    var items = $('.product .sw>ul>li');
    //************** Función *******************
    function manejadorFactory() {
        return {
            match : function() {
                items.each(onClic);
            }
        };
    }
    // Enquire Media Queries
    enquire.register("screen and (min-width : 768px)", manejadorFactory());
    //**************************************************

    //var items = $('.product .sw>ul>li').each(onClic);

    function onClic () {
        $(this).click(switchClass);
        function switchClass () {
            //remove previous class and add it to clicked tab
            items.removeClass('current');
            $(this).addClass('current');
 
            //hide all content divs and show current one
            $('.product .sw>div.tab-content').hide().eq(items.index($(this))).show('fast');

            window.location.hash = $(this).attr('tab');
        }
    }
 
    if (location.hash) {
        showTab(location.hash);
    }
    else {
        showTab("tab1");
    }
 
    function showTab(tab) {
        $(".product .sw ul li[tab=" + tab + "]").click();
    }
 
    // Bind the event hashchange, using jquery-hashchange-plugin
    $(window).hashchange(function () {
        showTab(location.hash.replace("#", ""));
    })
 
    // Trigger the event hashchange on page load, using jquery-hashchange-plugin
    $(window).hashchange();
}

// Funciones para vertical accordion content
function accordion () {
    if (!$('.product .desc-content').hasClass('sw')) {
        $('.product .content ul li h6').click(desplegar);
    }

    function desplegar() {
        //slide up all the link lists
        $(".vertical-tab-content").slideUp();
        //slide down the link list below the h3 clicked - only if its closed
        if(!$(this).next('div').is(":visible")) {
            $(this).next('div').slideDown();
        }
    }
}

// Funciones para media queries
function hideQuery () {
    $('.vertical-tab-content').hide();
    // DRY up handler creation
    function handlerFactory() {
        return {
            match : function() {
                $('.tab-content').hide();
                $('.product .desc-content').removeClass('sw');
                accordion();
            },
            unmatch : function() {
                $('.desc-content>div.tab-content').show();
                $('.product .desc-content').addClass('sw');
                $('.vertical-tab-content').hide();
                $(verticalNav);
            }
        };
    }

    // Enquire Media Queries
    enquire.register("screen and (max-width : 768px)", handlerFactory()).listen();
}