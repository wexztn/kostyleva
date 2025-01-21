<?php
/**
 * Traveller Agency Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Traveller Agency
 */


if ( ! defined( 'TRAVELLER_AGENCY_URL' ) ) {
    define( 'TRAVELLER_AGENCY_URL', esc_url( 'https://www.themagnifico.net/products/travel-agency-wordpress-theme', 'traveller-agency', 'traveller-agency') );
}

if ( ! defined( 'TRAVELLER_AGENCY_TEXT' ) ) {
    define( 'TRAVELLER_AGENCY_TEXT', __( 'Traveller Agency Pro','traveller-agency' ));
}

if ( ! defined( 'TRAVELLER_AGENCY_BUY_TEXT' ) ) {
    define( 'TRAVELLER_AGENCY_BUY_TEXT', __( 'Buy Traveller Agency Pro','traveller-agency' ));
}

use WPTRT\Customize\Section\Traveller_Agency_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Traveller_Agency_Button::class );

    $manager->add_section(
        new Traveller_Agency_Button( $manager, 'traveller_agency_pro', [
           'title'       => esc_html( TRAVELLER_AGENCY_TEXT,'traveller-agency' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'traveller-agency' ),
            'button_url'  => esc_url( TRAVELLER_AGENCY_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'traveller-agency-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'traveller-agency-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function traveller_agency_customize_register($wp_customize){

     // Pro Version
    class Traveller_Agency_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( TRAVELLER_AGENCY_BUY_TEXT,'traveller-agency' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Traveller_Agency_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('traveller_agency_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'traveller_agency_sanitize_number_absint'
    ));
    $wp_customize->add_control('traveller_agency_logo_max_height',array(
        'label' => esc_html__('Logo Width','traveller-agency'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('traveller_agency_logo_title_text', array(
      'default' => true,
      'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_logo_title_text',array(
      'label'          => __( 'Enable Disable Title', 'traveller-agency' ),
      'section'        => 'title_tagline',
      'settings'       => 'traveller_agency_logo_title_text',
      'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('traveller_agency_theme_description', array(
      'default' => false,
      'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_theme_description',array(
      'label'          => __( 'Enable Disable Tagline', 'traveller-agency' ),
      'section'        => 'title_tagline',
      'settings'       => 'traveller_agency_theme_description',
      'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('traveller_agency_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'traveller_agency_logo_title_color', array(
        'label'    => __('Site Title Color', 'traveller-agency'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('traveller_agency_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'traveller_agency_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'traveller-agency'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));

    // General Settings
    $wp_customize->add_section('traveller_agency_general_settings',array(
        'title' => esc_html__('General Settings','traveller-agency'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('traveller_agency_site_width_layout',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_site_width_layout',array(
        'label'       => esc_html__( 'Site Width Layout','traveller-agency' ),
        'type' => 'radio',
        'section' => 'traveller_agency_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','traveller-agency'),
            'Wide Width' => __('Wide Width','traveller-agency'),
            'Container Width' => __('Container Width','traveller-agency')
        ),
    ) );

    $wp_customize->add_setting('traveller_agency_preloader_hide', array(
        'default' => '',
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'traveller-agency' ),
        'section'        => 'traveller_agency_general_settings',
        'settings'       => 'traveller_agency_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'traveller_agency_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'traveller_agency_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','traveller-agency'),
        'section' => 'traveller_agency_general_settings',
        'settings' => 'traveller_agency_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'traveller_agency_preloader_dot_1_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'traveller_agency_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','traveller-agency'),
        'section' => 'traveller_agency_general_settings',
        'settings' => 'traveller_agency_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'traveller_agency_preloader_dot_2_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'traveller_agency_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','traveller-agency'),
        'section' => 'traveller_agency_general_settings',
        'settings' => 'traveller_agency_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('traveller_agency_scroll_hide', array(
        'default' => '',
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'traveller-agency' ),
        'section'        => 'traveller_agency_general_settings',
        'settings'       => 'traveller_agency_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('traveller_agency_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_scroll_top_position',array(
        'label'       => esc_html__( 'Scroll To Top Positions','traveller-agency' ),
        'type' => 'radio',
        'section' => 'traveller_agency_general_settings',
        'choices' => array(
            'Right' => __('Right','traveller-agency'),
            'Left' => __('Left','traveller-agency'),
            'Center' => __('Center','traveller-agency')
        ),
    ) );

    $wp_customize->add_setting( 'traveller_agency_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'traveller_agency_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','traveller-agency'),
        'section' => 'traveller_agency_general_settings',
        'settings' => 'traveller_agency_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'traveller_agency_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'traveller_agency_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','traveller-agency'),
        'section' => 'traveller_agency_general_settings',
        'settings' => 'traveller_agency_scroll_color'
    )));

    $wp_customize->add_setting('traveller_agency_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('traveller_agency_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','traveller-agency'),
        'description' => __('Put in px','traveller-agency'),
        'section'   => 'traveller_agency_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'traveller_agency_scroll_to_top_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'traveller_agency_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'traveller_agency_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Scroll To Top Border Radius','traveller-agency' ),
        'section'     => 'traveller_agency_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

     $wp_customize->add_setting('traveller_agency_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'traveller-agency' ),
        'section'        => 'traveller_agency_general_settings',
        'settings'       => 'traveller_agency_sticky_header',
        'type'           => 'checkbox',
    )));

    // Product Columns
    $wp_customize->add_setting( 'traveller_agency_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'traveller_agency_sanitize_select',
    ) );

    $wp_customize->add_control('traveller_agency_products_per_row', array(
       'label' => __( 'Product per row', 'traveller-agency' ),
       'section'  => 'traveller_agency_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('traveller_agency_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('traveller_agency_product_per_page',array(
        'label' => __('Product per page','traveller-agency'),
        'section'   => 'traveller_agency_general_settings',
        'type'      => 'number'
    ));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('traveller_agency_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'traveller-agency' ),
        'section'        => 'traveller_agency_general_settings',
        'settings'       => 'traveller_agency_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('traveller_agency_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','traveller-agency'),
        'section' => 'traveller_agency_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','traveller-agency'),
            'Right Sidebar' => __('Right Sidebar','traveller-agency'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('traveller_agency_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'traveller-agency' ),
        'section'        => 'traveller_agency_general_settings',
        'settings'       => 'traveller_agency_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('traveller_agency_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','traveller-agency'),
        'section' => 'traveller_agency_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','traveller-agency'),
            'Right Sidebar' => __('Right Sidebar','traveller-agency'),
        ),
    ) );

    $wp_customize->add_setting( 'traveller_agency_woo_product_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'traveller_agency_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'traveller_agency_woo_product_image_box_shadow', array(
        'label'       => esc_html__( 'Product Image Box Shadow','traveller-agency' ),
        'section'     => 'traveller_agency_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('traveller_agency_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','traveller-agency' ),
        'type' => 'radio',
        'section' => 'traveller_agency_general_settings',
        'choices' => array(
            'Right' => __('Right','traveller-agency'),
            'Left' => __('Left','traveller-agency'),
            'Center' => __('Center','traveller-agency')
        ),
    ) );

    $wp_customize->add_setting( 'traveller_agency_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'traveller_agency_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'traveller_agency_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','traveller-agency' ),
        'section'     => 'traveller_agency_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Related Product
    $wp_customize->add_setting('traveller_agency_woocommerce_related_product_show_hide', array(
        'default' => true,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_woocommerce_related_product_show_hide',array(
        'label'          => __( 'Show / Hide Related product', 'traveller-agency' ),
        'section'        => 'traveller_agency_general_settings',
        'settings'       => 'traveller_agency_woocommerce_related_product_show_hide',
        'type'           => 'checkbox',
    )));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'traveller_agency_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('traveller_agency_post_settings',array(
        'title' => esc_html__('Post Settings','traveller-agency'),
        'priority'   =>40,
    ));

      $wp_customize->add_setting('traveller_agency_post_page_title',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_post_page_meta',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_post_page_thumb',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting( 'traveller_agency_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'traveller_agency_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'traveller_agency_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Post Page Image Border Radius','traveller-agency' ),
        'section'     => 'traveller_agency_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'traveller_agency_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'traveller_agency_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'traveller_agency_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Post Page Image Box Shadow','traveller-agency' ),
        'section'     => 'traveller_agency_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('traveller_agency_post_page_content',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_post_page_excerpt_length',array(
        'sanitize_callback' => 'traveller_agency_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('traveller_agency_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('traveller_agency_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('traveller_agency_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_post_page_btn',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_post_page_pagination',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_single_post_thumb',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'traveller-agency'),
    ));

    $wp_customize->add_setting( 'traveller_agency_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'traveller_agency_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'traveller_agency_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','traveller-agency' ),
        'section'     => 'traveller_agency_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'traveller_agency_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'traveller_agency_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'traveller_agency_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','traveller-agency' ),
        'section'     => 'traveller_agency_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('traveller_agency_single_post_meta',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_single_post_title',array(
            'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_single_post_page_content',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_single_post_tags',array(
            'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'traveller-agency'),
        'section'     => 'traveller_agency_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('traveller_agency_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','traveller-agency'),
        'section' => 'traveller_agency_post_settings',
    ));

    $wp_customize->add_setting('traveller_agency_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('traveller_agency_single_post_comment_title',array(
        'label' => __('Add Comment Title','traveller-agency'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'traveller-agency' ),
        ),
        'section'=> 'traveller_agency_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('traveller_agency_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('traveller_agency_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','traveller-agency'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'traveller-agency' ),
        ),
        'section'=> 'traveller_agency_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'traveller_agency_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('traveller_agency_page_settings',array(
        'title' => esc_html__('Page Settings','traveller-agency'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('traveller_agency_single_page_title',array(
            'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'traveller-agency'),
        'section'     => 'traveller_agency_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_single_page_thumb',array(
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('traveller_agency_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'traveller-agency'),
        'section'     => 'traveller_agency_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'traveller-agency'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'traveller_agency_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));

    //Header
    $wp_customize->add_section('traveller_agency_header',array(
        'title' => esc_html__('Header Option','traveller-agency')
    ));

    $wp_customize->add_setting('traveller_agency_phone',array(
        'default' => '',
        'sanitize_callback' => 'traveller_agency_sanitize_phone_number'
    ));
    $wp_customize->add_control('traveller_agency_phone',array(
        'label' => esc_html__('Phone Number','traveller-agency'),
        'section' => 'traveller_agency_header',
        'setting' => 'traveller_agency_phone',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'traveller_agency_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));

    //Slider
    $wp_customize->add_section('traveller_agency_top_slider',array(
        'title' => esc_html__('Slider Option','traveller-agency')
    ));

    $wp_customize->add_setting('traveller_agency_slider_setting', array(
        'default' => false,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_slider_setting',array(
        'label'          => __( 'Show Slider', 'traveller-agency' ),
        'section'        => 'traveller_agency_top_slider',
        'settings'       => 'traveller_agency_slider_setting',
        'type'           => 'checkbox',
        'priority' => 1,
    )));

    $wp_customize->add_setting('traveller_agency_top_slider_text', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('traveller_agency_top_slider_text', array(
        'label' => __('Slider Title', 'traveller-agency'),
        'section' => 'traveller_agency_top_slider',
        'type' => 'text',
    ));

    $wp_customize->add_setting('traveller_agency_slider_title_setting', array(
        'default' => 1,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_slider_title_setting',array(
        'label'          => __( 'Enable Disable Slider Page Title', 'traveller-agency' ),
        'section'        => 'traveller_agency_top_slider',
        'settings'       => 'traveller_agency_slider_title_setting',
        'type'           => 'checkbox',
    )));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'traveller_agency_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'traveller_agency_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'traveller_agency_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'traveller-agency' ),
            'description' => __('Slider image size (1400 x 550)','traveller-agency'),
            'section'  => 'traveller_agency_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Slider Image Opacity
    $wp_customize->add_setting('traveller_agency_slider_opacity_color',array(
      'default' => '',
      'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));

    $wp_customize->add_control( 'traveller_agency_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','traveller-agency' ),
    'section'     => 'traveller_agency_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','traveller-agency'),
      '0.1' =>  esc_attr('0.1','traveller-agency'),
      '0.2' =>  esc_attr('0.2','traveller-agency'),
      '0.3' =>  esc_attr('0.3','traveller-agency'),
      '0.4' =>  esc_attr('0.4','traveller-agency'),
      '0.5' =>  esc_attr('0.5','traveller-agency'),
      '0.6' =>  esc_attr('0.6','traveller-agency'),
      '0.7' =>  esc_attr('0.7','traveller-agency'),
      '0.8' =>  esc_attr('0.8','traveller-agency'),
      '0.9' =>  esc_attr('0.9','traveller-agency')
    ),
    ));

    //Slider height
    $wp_customize->add_setting('traveller_agency_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('traveller_agency_slider_img_height',array(
        'label' => __('Slider Height','traveller-agency'),
        'description'   => __('Add the slider height in px(eg. 500px).','traveller-agency'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'traveller-agency' ),
        ),
        'section'=> 'traveller_agency_top_slider',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('traveller_agency_email_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('traveller_agency_email_text',array(
        'label' => esc_html__('Email Text','traveller-agency'),
        'section' => 'traveller_agency_top_slider',
        'setting' => 'traveller_agency_email_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('traveller_agency_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('traveller_agency_email',array(
        'label' => esc_html__('Email','traveller-agency'),
        'section' => 'traveller_agency_top_slider',
        'setting' => 'traveller_agency_email',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'traveller_agency_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));

    // Best Destination

    $wp_customize->add_section('traveller_agency_best_destination',array(
        'title' => esc_html__('Best Destination','traveller-agency'),
        'description' => esc_html__('Here you have to select category which will display Best Destination in the home page.','traveller-agency')
    ));

    $wp_customize->add_setting('traveller_agency_latest_destination_setting', array(
        'default' => false,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'traveller_agency_latest_destination_setting',array(
        'label'          => __( 'Show Best Destination', 'traveller-agency' ),
        'section'        => 'traveller_agency_best_destination',
        'settings'       => 'traveller_agency_latest_destination_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('traveller_agency_best_destination_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('traveller_agency_best_destination_title',array(
        'label' => esc_html__('Title','traveller-agency'),
        'section' => 'traveller_agency_best_destination',
        'setting' => 'traveller_agency_best_destination_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('traveller_agency_best_destination_short_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('traveller_agency_best_destination_short_title',array(
        'label' => esc_html__('Short Title','traveller-agency'),
        'section' => 'traveller_agency_best_destination',
        'setting' => 'traveller_agency_best_destination_short_title',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('traveller_agency_best_destination_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'traveller_agency_sanitize_select',
    ));
    $wp_customize->add_control('traveller_agency_best_destination_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select category to display latest properties','traveller-agency'),
        'section' => 'traveller_agency_best_destination',
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_destination_setting', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_destination_setting', array(
        'section'     => 'traveller_agency_best_destination',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('traveller_agency_site_footer_section', array(
        'title' => esc_html__('Footer', 'traveller-agency'),
    ));

    $wp_customize->add_setting('traveller_agency_show_hide_footer',array(
        'default' => true,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('traveller_agency_show_hide_footer',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Footer','traveller-agency'),
        'section' => 'traveller_agency_site_footer_section',
        'priority' => 1,
    ));

    $wp_customize->add_setting('traveller_agency_footer_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'traveller_agency_footer_background_color', array(
        'label'    => __('Footer Background Color', 'traveller-agency'),
        'section'  => 'traveller_agency_site_footer_section',
    )));

    $wp_customize->add_setting('traveller_agency_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'traveller_agency_footer_bg_image',array(
        'label' => __('Footer Background Image','traveller-agency'),
        'section' => 'traveller_agency_site_footer_section',
    )));

    $wp_customize->add_setting('traveller_agency_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','traveller-agency'),
        'choices' => array(
            'fixed' => __('fixed','traveller-agency'),
            'scroll' => __('scroll','traveller-agency'),
        ),
        'section'=> 'traveller_agency_site_footer_section',
    ));

    $wp_customize->add_setting('traveller_agency_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','traveller-agency'),
        'section' => 'traveller_agency_site_footer_section',
        'choices' => array(
            'Left' => __('Left','traveller-agency'),
            'Center' => __('Center','traveller-agency'),
            'Right' => __('Right','traveller-agency')
        ),
    ) );

    $wp_customize->add_setting('traveller_agency_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','traveller-agency'),
        'section' => 'traveller_agency_site_footer_section',
        'choices' => array(
            'Left' => __('Left','traveller-agency'),
            'Center' => __('Center','traveller-agency'),
            'Right' => __('Right','traveller-agency')
        ),
    ) );

    $wp_customize->add_setting('traveller_agency_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'traveller_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('traveller_agency_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','traveller-agency'),
        'section' => 'traveller_agency_site_footer_section',
    ));

    $wp_customize->add_setting('traveller_agency_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('traveller_agency_footer_text_setting', array(
        'label' => __('Replace the footer text', 'traveller-agency'),
        'section' => 'traveller_agency_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('traveller_agency_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'traveller_agency_sanitize_choices'
    ));
    $wp_customize->add_control('traveller_agency_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','traveller-agency'),
        'section' => 'traveller_agency_site_footer_section',
        'choices' => array(
            'Left' => __('Left','traveller-agency'),
            'Center' => __('Center','traveller-agency'),
            'Right' => __('Right','traveller-agency')
        ),
    ) );

    $wp_customize->add_setting('traveller_agency_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'traveller_agency_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'traveller-agency'),
        'section'  => 'traveller_agency_site_footer_section',
    )));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Traveller_Agency_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Traveller_Agency_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'traveller_agency_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'traveller-agency' ),
        'description' => esc_url( TRAVELLER_AGENCY_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'traveller_agency_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function traveller_agency_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function traveller_agency_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function traveller_agency_customize_preview_js(){
    wp_enqueue_script('traveller-agency-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'traveller_agency_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function traveller_agency_panels_js() {
    wp_enqueue_style( 'traveller-agency-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'traveller-agency-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'traveller_agency_panels_js' );

