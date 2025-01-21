<?php
	
$adventure_travelling_tp_theme_css = '';


$adventure_travelling_tp_color_option = get_theme_mod('adventure_travelling_tp_color_option');

if($adventure_travelling_tp_color_option != false){
$adventure_travelling_tp_theme_css .='.wc-block-cart__submit-container a,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.search-box i,.prev.page-numbers, .next.page-numbers,.page-numbers,#theme-sidebar button[type="submit"], #footer button[type="submit"],span.meta-nav,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#comments input[type="submit"],button[type="submit"],.error-404 [type="submit"],.headerbox,.main-navigation ul ul,.more-btn a,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,.blog-info,#slider-post .owl-nav i:hover,.site-info, #theme-sidebar .wp-block-search .wp-block-search__label:before,#theme-sidebar h3:before, #theme-sidebar h1.wp-block-heading:before, #theme-sidebar h2.wp-block-heading:before, #theme-sidebar h3.wp-block-heading:before,#theme-sidebar h4.wp-block-heading:before, #theme-sidebar h5.wp-block-heading:before, #theme-sidebar h6.wp-block-heading:before, .social-media i,.search-box i,.offer-box i.fas.fa-play,#slider-post .owl-nav i, nav.woocommerce-MyAccount-navigation ul li:hover, .toggle-nav i,#slider-post .owl-nav i{';
$adventure_travelling_tp_theme_css .='background-color: '.esc_attr($adventure_travelling_tp_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_color_option != false){
$adventure_travelling_tp_theme_css .='.box-info i,#theme-sidebar h3, #theme-sidebar h1.wp-block-heading, #theme-sidebar h2.wp-block-heading, #theme-sidebar h3.wp-block-heading,#theme-sidebar h4.wp-block-heading, #theme-sidebar h5.wp-block-heading, #theme-sidebar h6.wp-block-heading, .offer-box h3 a:hover, .slider-content-box h1 a:hover, .logo h1 a:hover, .logo p a:hover,a.added_to_cart.wc-forward,a,.box-content a, #footer li a:hover, #theme-sidebar .textwidget a,  .comment-body a, .entry-content a, .entry-summary a,.main-navigation a:hover,#theme-sidebar h3,#theme-sidebar a:hover,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,.slider-content-box i, #theme-sidebar .tagcloud a:hover,p.wp-block-tag-cloud a:hover, .post_tag a:hover, #theme-sidebar .widget_tag_cloud a:hover, #theme-sidebar .wp-block-search .wp-block-search__label, #footer .tagcloud a:hover, #footer p.wp-block-tag-cloud a:hover, .offer-box i{';
$adventure_travelling_tp_theme_css .='color: '.esc_attr($adventure_travelling_tp_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_color_option != false){
$adventure_travelling_tp_theme_css .='.page-box,#theme-sidebar section, #travel-offer h2:after{';
    $adventure_travelling_tp_theme_css .='border-bottom-color: '.esc_attr($adventure_travelling_tp_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_color_option != false){
$adventure_travelling_tp_theme_css .='.page-box,#theme-sidebar section{';
$adventure_travelling_tp_theme_css .='border-left-color: '.esc_attr($adventure_travelling_tp_color_option).'!important;';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_color_option != false){
$adventure_travelling_tp_theme_css .='.wp-block-tag-cloud a:hover,.readmore-btn a, .search_inner form.search-form,#static-blog h3, #theme-sidebar .tagcloud a:hover,p.wp-block-tag-cloud a:hover, .post_tag a:hover, #theme-sidebar .widget_tag_cloud a:hover, #footer .tagcloud a:hover, #footer p.wp-block-tag-cloud a:hover{';
$adventure_travelling_tp_theme_css .='border-color: '.esc_attr($adventure_travelling_tp_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}
// preloader
$adventure_travelling_tp_preloader_color1_option = get_theme_mod('adventure_travelling_tp_preloader_color1_option');

if($adventure_travelling_tp_preloader_color1_option != false){
$adventure_travelling_tp_theme_css .='.center1{';
	$adventure_travelling_tp_theme_css .='border-color: '.esc_attr($adventure_travelling_tp_preloader_color1_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_preloader_color1_option != false){
$adventure_travelling_tp_theme_css .='.center1 .ring::before{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_preloader_color1_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}

$adventure_travelling_tp_preloader_color2_option = get_theme_mod('adventure_travelling_tp_preloader_color2_option');

if($adventure_travelling_tp_preloader_color2_option != false){
$adventure_travelling_tp_theme_css .='.center2{';
	$adventure_travelling_tp_theme_css .='border-color: '.esc_attr($adventure_travelling_tp_preloader_color2_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_preloader_color2_option != false){
$adventure_travelling_tp_theme_css .='.center2 .ring::before{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_preloader_color2_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}

$adventure_travelling_tp_preloader_bg_color_option = get_theme_mod('adventure_travelling_tp_preloader_bg_color_option');

if($adventure_travelling_tp_preloader_bg_color_option != false){
$adventure_travelling_tp_theme_css .='.loader{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_preloader_bg_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}

$adventure_travelling_tp_footer_bg_color_option = get_theme_mod('adventure_travelling_tp_footer_bg_color_option');


if($adventure_travelling_tp_footer_bg_color_option != false){
$adventure_travelling_tp_theme_css .='#footer{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_footer_bg_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}
$adventure_travelling_footer_widget_image = get_theme_mod('adventure_travelling_footer_widget_image');
	if($adventure_travelling_footer_widget_image != false){
		$adventure_travelling_tp_theme_css .='#footer{';
			$adventure_travelling_tp_theme_css .='background: url('.esc_attr($adventure_travelling_footer_widget_image).');';
		$adventure_travelling_tp_theme_css .='}';
	}

	//Font Weight
$adventure_travelling_menu_font_weight = get_theme_mod( 'adventure_travelling_menu_font_weight','500');
if($adventure_travelling_menu_font_weight == '100'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 100;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '200'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 200;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '300'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 300;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '400'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 400;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '500'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 500;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '600'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 600;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '700'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 700;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '800'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 800;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '900'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 900;';
$adventure_travelling_tp_theme_css .='}';
}