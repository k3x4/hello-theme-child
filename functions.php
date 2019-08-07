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
    wp_enqueue_script( 'child-theme-woo', get_stylesheet_directory_uri() . '/js/woo.js', ['jquery', 'wc-single-product'], false, true );
    wp_enqueue_style( 'child-theme-flex-css', get_stylesheet_directory_uri() . '/css/flexslider.min.css');
} );

add_filter( 'woocommerce_single_product_carousel_options', function($options){
    $options['controlNav'] = false;
    // $options['directionNav'] = true;
    $options['sync'] = '.k3x4_gallery_thumbs';

    return $options;
} );

// add_action('init', function(){
//     remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
// });

// add_filter( 'woocommerce_single_product_image_thumbnail_html', function($html, $post_thumbnail_id){
//     return k3x4_wc_get_gallery_image_html($post_thumbnail_id, true);
// }, 10, 2);

// add_action( 'woocommerce_before_single_product_summary', function(){
add_action( 'woocommerce_product_thumbnails', function(){
    global $product;

    $attachment_ids = $product->get_gallery_image_ids();

    if ( $attachment_ids && $product->get_image_id() ) {
        echo '</figure>';
        echo '<div class="k3x4_gallery_thumbs flexslider">';
        echo '<ul class="slides">';
        foreach ( $attachment_ids as $attachment_id ) {
            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', k3x4_wc_get_gallery_thumbs_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
        }
        echo '</ul>';
        echo '</div>';
        echo '<figure>';
    }
}, 20 );

function k3x4_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
	$flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
	$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
	$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
	$image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
	$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
	$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
	$image             = wp_get_attachment_image(
		$attachment_id,
		$image_size,
		false,
		apply_filters(
			'woocommerce_gallery_image_html_attachment_image_params',
			array(
				'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'data-src'                => esc_url( $full_src[0] ),
				'data-large_image'        => esc_url( $full_src[0] ),
				'data-large_image_width'  => esc_attr( $full_src[1] ),
				'data-large_image_height' => esc_attr( $full_src[2] ),
				'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
			),
			$attachment_id,
			$image_size,
			$main_image
		)
	);

	return '<div>' . $image . '</div>';
}

function k3x4_wc_get_gallery_thumbs_html( $attachment_id, $main_image = false ) {
	$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
	$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
	$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );

	return '<li><img src="' . esc_url( $thumbnail_src[0] ) . '" /></li>';
}