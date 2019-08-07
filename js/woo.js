/*
(function($) {

    $('.k3x4_gallery_thumbs').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '.woocommerce-product-gallery'
    });
	
})( jQuery );
*/
(function($) {

    var thumbsExist = setInterval(function() {
        var $elem = $('.flex-control-thumbs');
        if ($elem.length) {
            clearInterval(thumbsExist);

            $elem.insertAfter('.woocommerce-product-gallery');
            $elem.removeClass().addClass('slides');
            $elem.wrap( "<div class='k3x4_gallery_thumbs flexslider'></div>" );
            $elem.flexslider({
                /*
                animation: "slide",
                controlNav: false,
                animationLoop: true,
                slideshow: false,
                itemWidth: 100,
                itemMargin: 24,
                maxItems: 4,
                minItems: 3,
                */
               controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                asNavFor: '.woocommerce-product-gallery'
            });

            $('.woocommerce-product-gallery').addClass('flexslider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: ".k3x4_gallery_thumbs"
            });
        }
    }, 500);

    /*
    setTimeout(function () {
        var thubmNav = $('.flex-control-thumbs');
            thubmNav.addClass('slides');
            $('.flex-control-thumbs').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: true,
                slideshow: false,
                itemWidth: 100,
                itemMargin: 24,
                maxItems: 4,
                minItems: 3,
            });
    }, 100);
    */

/****************Variation product js code ****************************************/

$(".variations_form").on("wc_additional_variation_images_frontend_ajax_response_callback", function (event, variation) {
    console.log("variation");
    setTimeout(function () {
        var thubmNav = $(".woocommerce - product - gallery.flex - control - nav");
        if (thubmNav.length) {
            /*if(!thubmNav.parent().hasClass("navWrapper")){
            thubmNav.wrap("
            
            ");
            var itemsLength_ = thubmNav.children("li").length
            var itemWidth_ = thubmNav.children("li").outerWidth();
            thubmNav.width( itemWidth_* itemsLength_);
            thubmNav.parent().css({"width": $(".woocommerce-product-gallery").width(), "overflow":"hidden"});
            
            var navigationDiv_ = $("
            
            ", {class: "navigationWrapper"});
            var leftNavigation_ = $("", {class: "leftNavigation"});
            var rightNavigation_ = $("", {class: "rightNavigation"});
            navigationDiv_.append(leftNavigation_).append(rightNavigation_);
            navigationDiv_.insertAfter(thubmNav);
            leftNavigation_.on("click", function(){
            
            });
            rightNavigation_.on("click", function(){
            
            });
            }*/
            //console.log("asd", !thubmNav.closest(".navWrapper").length)
            if (!thubmNav.closest(".navWrapper").length) {
                thubmNav.addClass("slides");
                thubmNav.wrap("");
                $('.navWrapper').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 100,
                    itemMargin: 24,
                    maxItems: 4,
                    minItems: 3,
                });
            }

        }
    }, 100);
});


})( jQuery );
