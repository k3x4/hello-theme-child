(function($) {

    var functionExist = setInterval(function() {
        var $elem = $('.elementor-nav-menu');
        if ($.isFunction($elem.smartmenus)) {
           clearInterval(functionExist);

            var $menu = $( '.elementor-nav-menu' );
            // destroy the menu
            $menu.smartmenus('destroy');
            //re- instantiate the menu with no delay settings
            $menu.smartmenus( { 
                subIndicatorsText: '',
                subIndicatorsPos: 'append',
                subMenusMaxWidth: '1000px',
                showFunction: function($ul, complete) { $ul.slideDown(200, complete); },
                showDuration: 0,
                showTimeout: 0,
                hideFunction: function($ul, complete) { $ul.slideUp(200, complete); },//null,
                hideDuration: 0,
                hideTimeout: 0
            });

        }
    }, 500); // check every 100ms
    
	
})( jQuery );

