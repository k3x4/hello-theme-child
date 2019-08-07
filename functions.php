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

// add_filter( 'woocommerce_single_product_carousel_options', function($options){
//     // $options['controlNav'] = false;
//     // $options['directionNav'] = true;
//     $options['sync'] = '.k3x4_gallery_thumbs';

//     return $options;
// } );

// require_once(dirname(__FILE__) . '/inc/woocommerce-flexslider.php');
// add_filter( 'woocommerce_single_product_flexslider_enabled', '__return_false' );

// add_filter( 'woocommerce_single_product_carousel_options', function($options){
//     $options['directionNav'] = true;
//     return $options;
// } );