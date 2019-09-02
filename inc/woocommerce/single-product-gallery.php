<?php

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