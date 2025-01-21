<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

function adventure_travelling_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adventure_travelling_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 350,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'adventure_travelling_header_style',
		'default-image'          => get_parent_theme_file_uri( '/assets/images/sliderimage.png' ),
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/sliderimage.png',
			'thumbnail_url' => '%s/assets/images/sliderimage.png',
			'description'   => __( 'Default Header Image', 'adventure-travelling' ),
		),
	) );
}
add_action( 'after_setup_theme', 'adventure_travelling_custom_header_setup' );

if ( ! function_exists( 'adventure_travelling_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'adventure_travelling_header_style' );
function adventure_travelling_header_style() {
    if ( get_header_image() ) :
    $adventure_travelling_custom_css = "
        .header-img, .headerimg, .single-page-img {
            background-image: url('".esc_url(get_header_image())."') !important;
            background-position: center top !important;
            height: 350px;
            background-size: cover !important;
            display: block;
        }
        @media (max-width: 1000px) {
            .header-img, .headerimg,
            .single-page-img, .external-div .box-image img, .external-div {
                height: 200px;
            }
        }";
        wp_add_inline_style( 'adventure-travelling-style', $adventure_travelling_custom_css );
    endif;
}
endif;
