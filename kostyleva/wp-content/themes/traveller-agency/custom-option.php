<?php

    $traveller_agency_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $traveller_agency_scroll_position = get_theme_mod( 'traveller_agency_scroll_top_position','Right');
    if($traveller_agency_scroll_position == 'Right'){
        $traveller_agency_theme_css .='#button{';
            $traveller_agency_theme_css .='right: 20px;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_scroll_position == 'Left'){
        $traveller_agency_theme_css .='#button{';
            $traveller_agency_theme_css .='left: 20px; right:auto;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_scroll_position == 'Center'){
        $traveller_agency_theme_css .='#button{';
            $traveller_agency_theme_css .='right: auto;left: 50%; transform: translate(
            50%);';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $traveller_agency_scroll_to_top_border_radius = get_theme_mod('traveller_agency_scroll_to_top_border_radius');
    $traveller_agency_scroll_bg_color = get_theme_mod('traveller_agency_scroll_bg_color');
    $traveller_agency_scroll_color = get_theme_mod('traveller_agency_scroll_color');
    $traveller_agency_scroll_font_size = get_theme_mod('traveller_agency_scroll_font_size');
    if($traveller_agency_scroll_to_top_border_radius != false || $traveller_agency_scroll_bg_color != false || $traveller_agency_scroll_color != false || $traveller_agency_scroll_font_size != false){
        $traveller_agency_theme_css .='#colophon a#button{';
            $traveller_agency_theme_css .='border-radius: '.esc_attr($traveller_agency_scroll_to_top_border_radius).'px; background-color: '.esc_attr($traveller_agency_scroll_bg_color).'; color: '.esc_attr($traveller_agency_scroll_color).' !important; font-size: '.esc_attr($traveller_agency_scroll_font_size).'px;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $traveller_agency_slider_img_opacity = get_theme_mod( 'traveller_agency_slider_opacity_color','');
    if($traveller_agency_slider_img_opacity == '0'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.1'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.1';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.2'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.2';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.3'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.3';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.4'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.4';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.5'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.5';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.6'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.6';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.7'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.7';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.8'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.8';
        $traveller_agency_theme_css .='}';
        }else if($traveller_agency_slider_img_opacity == '0.9'){
        $traveller_agency_theme_css .='.slider-box img{';
            $traveller_agency_theme_css .='opacity:0.9';
        $traveller_agency_theme_css .='}';
        }

    /*---------------------------Slider Height ------------*/

    $traveller_agency_slider_img_height = get_theme_mod('traveller_agency_slider_img_height');
    if($traveller_agency_slider_img_height != false){
        $traveller_agency_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $traveller_agency_theme_css .='height: '.esc_attr($traveller_agency_slider_img_height).';';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Post Page Image Border Radius -------------------*/

    $traveller_agency_post_page_image_border_radius = get_theme_mod('traveller_agency_post_page_image_border_radius', 0);
    if($traveller_agency_post_page_image_border_radius != false){
        $traveller_agency_theme_css .='.article-box img{';
            $traveller_agency_theme_css .='border-radius: '.esc_attr($traveller_agency_post_page_image_border_radius).'px;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Post Page Image Box Shadow -------------------*/

    $traveller_agency_post_page_image_box_shadow = get_theme_mod('traveller_agency_post_page_image_box_shadow',0);
    if($traveller_agency_post_page_image_box_shadow != false){
        $traveller_agency_theme_css .='.article-box img{';
            $traveller_agency_theme_css .='box-shadow: '.esc_attr($traveller_agency_post_page_image_box_shadow).'px '.esc_attr($traveller_agency_post_page_image_box_shadow).'px '.esc_attr($traveller_agency_post_page_image_box_shadow).'px #cccccc;';
        $traveller_agency_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $traveller_agency_single_post_navigation_show_hide = get_theme_mod('traveller_agency_single_post_navigation_show_hide',true);
    if($traveller_agency_single_post_navigation_show_hide != true){
        $traveller_agency_theme_css .='.nav-links{';
            $traveller_agency_theme_css .='display: none;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Product Image Box Shadow -------------------*/

    $traveller_agency_woo_product_image_box_shadow = get_theme_mod('traveller_agency_woo_product_image_box_shadow',0);
    if($traveller_agency_woo_product_image_box_shadow != false){
        $traveller_agency_theme_css .='.woocommerce ul.products li.product a img{';
            $traveller_agency_theme_css .='box-shadow: '.esc_attr($traveller_agency_woo_product_image_box_shadow).'px '.esc_attr($traveller_agency_woo_product_image_box_shadow).'px '.esc_attr($traveller_agency_woo_product_image_box_shadow).'px #cccccc;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $traveller_agency_product_sale = get_theme_mod( 'traveller_agency_woocommerce_product_sale','Right');
    if($traveller_agency_product_sale == 'Right'){
        $traveller_agency_theme_css .='.woocommerce ul.products li.product .onsale{';
            $traveller_agency_theme_css .='left: auto; right: 15px;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_product_sale == 'Left'){
        $traveller_agency_theme_css .='.woocommerce ul.products li.product .onsale{';
            $traveller_agency_theme_css .='left: 15px; right: auto;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_product_sale == 'Center'){
        $traveller_agency_theme_css .='.woocommerce ul.products li.product .onsale{';
            $traveller_agency_theme_css .='right: 50%;left: 50%;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Border Radius -------------------*/

    $traveller_agency_woo_product_sale_border_radius = get_theme_mod('traveller_agency_woo_product_sale_border_radius');
    if($traveller_agency_woo_product_sale_border_radius != false){
        $traveller_agency_theme_css .='.woocommerce ul.products li.product .onsale{';
            $traveller_agency_theme_css .='border-radius: '.esc_attr($traveller_agency_woo_product_sale_border_radius).'px;';
        $traveller_agency_theme_css .='}';
    }

     /*--------------------------- Woocommerce Related Products -------------------*/

    $traveller_agency_woocommerce_related_product_show_hide = get_theme_mod('traveller_agency_woocommerce_related_product_show_hide',true);
    if($traveller_agency_woocommerce_related_product_show_hide != true){
        $traveller_agency_theme_css .='.related.products{';
            $traveller_agency_theme_css .='display: none;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $traveller_agency_single_post_page_image_box_shadow = get_theme_mod('traveller_agency_single_post_page_image_box_shadow',0);
    if($traveller_agency_single_post_page_image_box_shadow != false){
        $traveller_agency_theme_css .='.single-post .entry-header img{';
            $traveller_agency_theme_css .='box-shadow: '.esc_attr($traveller_agency_single_post_page_image_box_shadow).'px '.esc_attr($traveller_agency_single_post_page_image_box_shadow).'px '.esc_attr($traveller_agency_single_post_page_image_box_shadow).'px #cccccc;';
        $traveller_agency_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $traveller_agency_single_post_page_image_border_radius = get_theme_mod('traveller_agency_single_post_page_image_border_radius', 0);
    if($traveller_agency_single_post_page_image_border_radius != false){
        $traveller_agency_theme_css .='.single-post .entry-header img{';
            $traveller_agency_theme_css .='border-radius: '.esc_attr($traveller_agency_single_post_page_image_border_radius).'px;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $traveller_agency_footer_bg_image_position = get_theme_mod( 'traveller_agency_footer_bg_image_position','scroll');
    if($traveller_agency_footer_bg_image_position == 'fixed'){
        $traveller_agency_theme_css .='#colophon, .footer-widgets{';
            $traveller_agency_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $traveller_agency_theme_css .='}';
    }elseif ($traveller_agency_footer_bg_image_position == 'scroll'){
        $traveller_agency_theme_css .='#colophon, .footer-widgets{';
            $traveller_agency_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $traveller_agency_footer_widget_heading_alignment = get_theme_mod( 'traveller_agency_footer_widget_heading_alignment','Left');
    if($traveller_agency_footer_widget_heading_alignment == 'Left'){
        $traveller_agency_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $traveller_agency_theme_css .='text-align: left;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_footer_widget_heading_alignment == 'Center'){
        $traveller_agency_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $traveller_agency_theme_css .='text-align: center;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_footer_widget_heading_alignment == 'Right'){
        $traveller_agency_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $traveller_agency_theme_css .='text-align: right;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $traveller_agency_footer_bg_image = get_theme_mod('traveller_agency_footer_bg_image');
    if($traveller_agency_footer_bg_image != false){
        $traveller_agency_theme_css .='#colophon, .footer-widgets{';
            $traveller_agency_theme_css .='background: url('.esc_attr($traveller_agency_footer_bg_image).');';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Footer Background Color -------------------*/

    $traveller_agency_footer_background_color = get_theme_mod('traveller_agency_footer_background_color');
    if($traveller_agency_footer_background_color != false){
        $traveller_agency_theme_css .='.footer-widgets{';
            $traveller_agency_theme_css .='background-color: '.esc_attr($traveller_agency_footer_background_color).' !important;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $traveller_agency_copyright_background_color = get_theme_mod('traveller_agency_copyright_background_color');
    if($traveller_agency_copyright_background_color != false){
        $traveller_agency_theme_css .='.footer_info{';
            $traveller_agency_theme_css .='background-color: '.esc_attr($traveller_agency_copyright_background_color).' !important;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $traveller_agency_logo_title_color = get_theme_mod('traveller_agency_logo_title_color');
    if($traveller_agency_logo_title_color != false){
        $traveller_agency_theme_css .='p.site-title a, .navbar-brand a{';
            $traveller_agency_theme_css .='color: '.esc_attr($traveller_agency_logo_title_color).' !important;';
        $traveller_agency_theme_css .='}';
    }

    $traveller_agency_logo_tagline_color = get_theme_mod('traveller_agency_logo_tagline_color');
    if($traveller_agency_logo_tagline_color != false){
        $traveller_agency_theme_css .='.logo p.site-description, .navbar-brand p{';
            $traveller_agency_theme_css .='color: '.esc_attr($traveller_agency_logo_tagline_color).'  !important;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $traveller_agency_footer_widget_content_alignment = get_theme_mod( 'traveller_agency_footer_widget_content_alignment','Left');
    if($traveller_agency_footer_widget_content_alignment == 'Left'){
        $traveller_agency_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $traveller_agency_theme_css .='text-align: left;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_footer_widget_content_alignment == 'Center'){
        $traveller_agency_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $traveller_agency_theme_css .='text-align: center;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_footer_widget_content_alignment == 'Right'){
        $traveller_agency_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $traveller_agency_theme_css .='text-align: right;';
        $traveller_agency_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $traveller_agency_copyright_content_alignment = get_theme_mod( 'traveller_agency_copyright_content_alignment','Right');
    if($traveller_agency_copyright_content_alignment == 'Left'){
        $traveller_agency_theme_css .='.footer-menu-left{';
        $traveller_agency_theme_css .='text-align: left;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_copyright_content_alignment == 'Center'){
        $traveller_agency_theme_css .='.footer-menu-left{';
            $traveller_agency_theme_css .='text-align: center;';
        $traveller_agency_theme_css .='}';
    }else if($traveller_agency_copyright_content_alignment == 'Right'){
        $traveller_agency_theme_css .='.footer-menu-left{';
            $traveller_agency_theme_css .='text-align: right;';
        $traveller_agency_theme_css .='}';
    }