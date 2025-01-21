<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'travel_vlogger_after_setup_theme' );
function travel_vlogger_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'travel-vlogger-featured-image', 2000, 1200, true );
    add_image_size( 'travel-vlogger-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function travel_vlogger_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'travel-vlogger' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'travel-vlogger' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'travel-vlogger' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'travel-vlogger' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'travel-vlogger' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'travel-vlogger' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'travel-vlogger' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-vlogger' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'travel-vlogger' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-vlogger' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'travel-vlogger' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-vlogger' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'travel-vlogger' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-vlogger' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'travel_vlogger_widgets_init' );

// enqueue styles for child theme
function travel_vlogger_enqueue_styles() {

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // owl-carousel
    wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'travel-vlogger-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'travel-vlogger-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('adventure-travelling-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('adventure-travelling-child-style', get_stylesheet_directory_uri() .'/style.css', array('adventure-travelling-style'));

    require get_theme_file_path( '/tp-theme-color.php' );
    wp_add_inline_style( 'adventure-travelling-child-style',$adventure_travelling_tp_theme_css );

    wp_enqueue_script('owl.carousel-js', esc_url( get_theme_file_uri() ) . '/assets/js/owl.carousel.js',array('jquery'),'2.3.4',     TRUE);

    wp_enqueue_script('travel-vlogger-custom-js', esc_url( get_theme_file_uri() ) . '/assets/js/travel-vlogger-custom.js',array('jquery'),'2.3.4',TRUE
    );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );

    $adventure_travelling_body_font_family = get_theme_mod('adventure_travelling_body_font_family', '');

    $adventure_travelling_heading_font_family = get_theme_mod('adventure_travelling_heading_font_family', '');

    $adventure_travelling_menu_font_family = get_theme_mod('adventure_travelling_menu_font_family', '');

    $adventure_travelling_tp_theme_css = '
        body{
            font-family: '.esc_html($adventure_travelling_body_font_family).' !important;
        }
        .more-btn a{
            font-family: '.esc_html($adventure_travelling_body_font_family).'!important;
        }
        h1,.logo h1{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h2{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h3{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h4{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h5{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h6{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        #theme-sidebar .wp-block-search .wp-block-search__label{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        .menubar{
            font-family: '.esc_html($adventure_travelling_menu_font_family).'!important;
        }
    ';
    wp_add_inline_style('adventure-travelling-child-style', $adventure_travelling_tp_theme_css);

}
add_action('wp_enqueue_scripts', 'travel_vlogger_enqueue_styles');

function travel_vlogger_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'travel-vlogger-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'travel_vlogger_admin_scripts' );

require get_theme_file_path( '/customizer/customize-control-toggle.php' );

if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME' ) ) {
    define( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME', esc_html__( 'Travel Vlogger Pro', 'travel-vlogger' ));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_PRO_THEME_URL', esc_url('https://www.themespride.com/products/travel-vlogger-wordpress-theme'));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_FREE_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_FREE_THEME_URL', 'https://www.themespride.com/products/free-vlogger-wordpress-theme' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/travel-vlogger-lite/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DOCS_URL', 'https://page.themespride.com/demo/docs/travel-vlogger-lite/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DEMO_THEME_URL' ) ) {
	define( 'ADVENTURE_TRAVELLING_DEMO_THEME_URL', 'https://page.themespride.com/travel-vlogger-pro/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_RATE_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_RATE_THEME_URL', 'https://wordpress.org/support/theme/travel-vlogger/reviews/#new-post' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/travel-vlogger/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}


function travel_vlogger_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}
function travel_vlogger_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function travel_vlogger_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function travel_vlogger_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo travel_vlogger_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'travel_vlogger_posts_column_views' );
add_action( 'manage_posts_custom_column', 'travel_vlogger_posts_custom_column_views' );


define('TRAVEL_VLOGGER_CREDIT',__('https://www.themespride.com/products/free-vlogger-wordpress-theme','travel-vlogger') );
if ( ! function_exists( 'travel_vlogger_credit' ) ) {
    function travel_vlogger_credit(){
        echo "<a href=".esc_url(TRAVEL_VLOGGER_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('adventure_travelling_footer_text',__('Travel Vlogger WordPress Theme','travel-vlogger')))."</a>";
    }
}



