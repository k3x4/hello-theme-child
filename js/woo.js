(function($) {

    $('.k3x4_gallery_thumbs').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 5,
        /*asNavFor: '.woocommerce-product-gallery'*/
        asNavFor: '.woocommerce-product-gallery__wrapper'
    });
	
})( jQuery );

