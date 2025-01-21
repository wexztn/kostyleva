<?php

function travel_vlogger_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'adventure_travelling_slider_section' );

    $wp_customize->remove_section( 'adventure_travelling_static_blog_section' );

    $wp_customize->remove_section( 'adventure_travelling_topbar' );

    $wp_customize->remove_setting( 'adventure_travelling_location' );
    $wp_customize->remove_control( 'adventure_travelling_location' );

    $wp_customize->remove_setting( 'adventure_travelling_timming' );
    $wp_customize->remove_control( 'adventure_travelling_timming' );

    $wp_customize->remove_setting( 'adventure_travelling_slider_buttom_mob' );
    $wp_customize->remove_control( 'adventure_travelling_slider_buttom_mob' );
    
    $wp_customize->remove_setting( 'adventure_travelling_menu_font_size' );
    $wp_customize->remove_control( 'adventure_travelling_menu_font_size' );

    $wp_customize->remove_setting( 'adventure_travelling_tp_color_option_link' );
    $wp_customize->remove_control( 'adventure_travelling_tp_color_option_link' );

}
add_action( 'customize_register', 'travel_vlogger_remove_customize_register', 11 );

function travel_vlogger_customize_register( $wp_customize ) {

    // Register the custom control type.
    $wp_customize->register_control_type( 'Travel_Vlogger_Toggle_Control' );

    $wp_customize->add_setting( 'travel_vlogger_search_icon', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'travel_vlogger_search_icon', array(
        'label'       => esc_html__( 'Show / Hide Search Option','travel-vlogger'),
        'section'     => 'adventure_travelling_social_media',
        'type'        => 'toggle',
        'settings'    => 'travel_vlogger_search_icon',
    ) ) );

    // Slider Section
    $wp_customize->add_section( 'travel_vlogger_slider_post_section' , array(
        'title'      => __( 'Post Slider Settings', 'travel-vlogger' ),
        'panel' => 'adventure_travelling_panel_id',
        'priority' => 3,
    ) );

    $wp_customize->add_setting( 'travel_vlogger_slider_show_hide', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Travel_Vlogger_Toggle_Control( $wp_customize, 'travel_vlogger_slider_show_hide', array(
        'label'       => esc_html__( 'Show / Hide Slider section', 'travel-vlogger' ),
        'section'     => 'travel_vlogger_slider_post_section',
        'type'        => 'toggle',
        'settings'    => 'travel_vlogger_slider_show_hide',
    ) ) );

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $offer_cat[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $offer_cat[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('travel_vlogger_slider_section_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('travel_vlogger_slider_section_category',array(
        'type'    => 'select',
        'choices' => $offer_cat,
        'label' => __('Select Category','travel-vlogger'),
        'section' => 'travel_vlogger_slider_post_section',
    ));

    $wp_customize->add_setting( 'travel_vlogger_slider_remove_date', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'travel_vlogger_slider_remove_date', array(
        'label'       => esc_html__( 'Show / Hide Date','travel-vlogger'),
        'section'     => 'travel_vlogger_slider_post_section',
        'type'        => 'toggle',
        'settings'    => 'travel_vlogger_slider_remove_date',
    ) ) );

    // Post Section
	$wp_customize->add_section( 'travel_vlogger_trip_offer_section' , array(
        'title'      => __( 'Explore Destination Settings', 'travel-vlogger' ),
        'panel' => 'adventure_travelling_panel_id',
        'priority' => 3,
    ) );

    $wp_customize->add_setting( 'travel_vlogger_offer_show_hide', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Travel_Vlogger_Toggle_Control( $wp_customize, 'travel_vlogger_offer_show_hide', array(
        'label'       => esc_html__( 'Show / Hide section', 'travel-vlogger' ),
        'section'     => 'travel_vlogger_trip_offer_section',
        'type'        => 'toggle',
        'settings'    => 'travel_vlogger_offer_show_hide',
    ) ) );

    $wp_customize->add_setting('travel_vlogger_offer_section_tittle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_vlogger_offer_section_tittle',array(
        'label' => __('Section Title','travel-vlogger'),
        'section'   => 'travel_vlogger_trip_offer_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('travel_vlogger_offer_section_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_vlogger_offer_section_text',array(
        'label' => __('Section Description','travel-vlogger'),
        'section'   => 'travel_vlogger_trip_offer_section',
        'type'      => 'text'
    ));

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $offer_cat[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $offer_cat[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('travel_vlogger_offer_section_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('travel_vlogger_offer_section_category',array(
        'type'    => 'select',
        'choices' => $offer_cat,
        'label' => __('Select Category','travel-vlogger'),
        'section' => 'travel_vlogger_trip_offer_section',
    ));

    $wp_customize->add_setting( 'travel_vlogger_latest_remove_date', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'travel_vlogger_latest_remove_date', array(
        'label'       => esc_html__( 'Show / Hide Date','travel-vlogger'),
        'section'     => 'travel_vlogger_trip_offer_section',
        'type'        => 'toggle',
        'settings'    => 'travel_vlogger_latest_remove_date',
    ) ) );

}
add_action( 'customize_register', 'travel_vlogger_customize_register' );
