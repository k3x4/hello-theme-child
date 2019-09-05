(function($) {

    /*
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
    
	$( ".woocommerce-product-gallery" ).on( "wc-product-gallery-after-init", function() {
        $('.wc-loader-icon').fadeOut();
        blurElement(this, 0, 0.5);
	});
	
	function blurElement(element, size, delay) {
		var filterVal = 'blur(' + size + 'px)';
		$(element).css({
			'filter':filterVal,
			'webkitFilter':filterVal,
			'mozFilter':filterVal,
			'oFilter':filterVal,
			'msFilter':filterVal,
			'transition':'all ' + delay + 's ease-in-out',
			'-webkit-transition':'all ' + delay + 's ease-in-out',
			'-moz-transition':'all ' + delay + 's ease-in-out',
			'-o-transition':'all ' + delay + 's ease-in-out'
		});
    }
    
    */

    String.prototype.getDecimals || (String.prototype.getDecimals = function () {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), jQuery(document).on("click", ".plus, .minus", function () {
        var a = jQuery(this).closest(".quantity").find(".qty"),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
    });
   
	
})( jQuery );

