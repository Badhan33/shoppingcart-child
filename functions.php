<?php
/**
 * Afra EShop functions
*/

// Enqueue Parent Script
function afra_enqueue_styles() {
 
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'afra_enqueue_styles' );

// Banner position below the slider
function change_adv_position( $shoppingcart_default_values ) {
	unset( $shoppingcart_default_values['shoppingcart_adv_ban_position'] );
	unset( $shoppingcart_default_values['shoppingcart_display_advertisement'] );

	$shoppingcart_default_values['shoppingcart_adv_ban_position'] 	   = 'below-slider';
	$shoppingcart_default_values['shoppingcart_display_advertisement'] = 'below-slider';

  	return $shoppingcart_default_values;
}

 add_filter( 'shoppingcart_get_option_defaults_values', 'change_adv_position' );