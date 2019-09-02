<?php 

function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor'
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts' );

/********************************* */

add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'child-theme-front', get_stylesheet_directory_uri() . '/js/front.js', ['jquery'], false, true );
    // wp_enqueue_script( 'child-theme-woo', get_stylesheet_directory_uri() . '/js/woo.js', ['jquery', 'wc-single-product'], false, true );
    // wp_enqueue_style( 'child-theme-flex-css', get_stylesheet_directory_uri() . '/css/flexslider.min.css');
} );

// woocommerce_thumbnail
// woocommerce_single
// woocommerce_gallery_thumbnail
// woocommerce_get_image_size_{SIZE_NAME_WITHOUT_WOOCOMMERCE_PREFIX}
add_filter( 'woocommerce_get_image_size_single', function($size){
    return [
        'width' => 600,
        'height' => 450,
        'crop' => 1,
    ];
});

add_filter( 'woocommerce_single_product_image_gallery_classes', function($wrapper_classes){
    $columns = 5; // change this to 2, 3, 5, etc. Default is 4.
    $wrapper_classes[2] = 'woocommerce-product-gallery--columns-' . absint( $columns );
    return $wrapper_classes;
});

add_filter( 'woocommerce_single_product_carousel_options', function($options){
    $options['directionNav'] = true;
    return $options;
});