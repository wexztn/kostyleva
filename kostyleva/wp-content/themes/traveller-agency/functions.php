<?php
/**
 * Traveller Agency functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Traveller Agency
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Traveller_Agency_Loader.php' );

$Traveller_Agency_Loader = new \WPTRT\Autoload\Traveller_Agency_Loader();

$Traveller_Agency_Loader->traveller_agency_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Traveller_Agency_Loader->traveller_agency_register();

if ( ! function_exists( 'traveller_agency_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function traveller_agency_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'traveller-agency', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('traveller-agency-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','traveller-agency' ),
	        'footer'=> esc_html__( 'Footer Menu','traveller-agency' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'traveller_agency_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_traveller_agency_dismissable_notice', 'traveller_agency_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'traveller_agency_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function traveller_agency_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'traveller_agency_content_width', 1170 );
}
add_action( 'after_setup_theme', 'traveller_agency_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function traveller_agency_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'traveller-agency' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'traveller-agency' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'traveller-agency' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'traveller-agency' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'traveller-agency' ),
		'id'            => 'traveller-agency-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'traveller-agency' ),
		'id'            => 'traveller-agency-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'traveller-agency' ),
		'id'            => 'traveller-agency-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'traveller_agency_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function traveller_agency_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'traveller-agency-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

		wp_enqueue_style( 'traveller-agency-style', get_stylesheet_uri() );
		require get_parent_theme_file_path( '/custom-option.php' );
		wp_add_inline_style( 'traveller-agency-style',$traveller_agency_theme_css );

		wp_style_add_data('traveller-agency-basic-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('traveller-agency-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'traveller_agency_scripts' );

/**
 * Enqueue Preloader.
 */
function traveller_agency_preloader() {

  $traveller_agency_theme_color_css = '';
  $traveller_agency_preloader_bg_color = get_theme_mod('traveller_agency_preloader_bg_color');
  $traveller_agency_preloader_dot_1_color = get_theme_mod('traveller_agency_preloader_dot_1_color');
  $traveller_agency_preloader_dot_2_color = get_theme_mod('traveller_agency_preloader_dot_2_color');
  $traveller_agency_logo_max_height = get_theme_mod('traveller_agency_logo_max_height');

  	if(get_theme_mod('traveller_agency_logo_max_height') == '') {
		$traveller_agency_logo_max_height = '24';
	}

	if(get_theme_mod('traveller_agency_preloader_bg_color') == '') {
		$traveller_agency_preloader_bg_color = '#fff';
	}
	if(get_theme_mod('traveller_agency_preloader_dot_1_color') == '') {
		$traveller_agency_preloader_dot_1_color = '#e79b3d';
	}
	if(get_theme_mod('traveller_agency_preloader_dot_2_color') == '') {
		$traveller_agency_preloader_dot_2_color = '#222222';
	}
	$traveller_agency_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($traveller_agency_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($traveller_agency_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($traveller_agency_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($traveller_agency_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'traveller-agency-style',$traveller_agency_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'traveller_agency_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * TGM
 */
require get_template_directory() . '/inc/recomended-plugins/tgm.php';

/*dropdown page sanitization*/
function traveller_agency_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function traveller_agency_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function traveller_agency_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'traveller_agency_loop_columns');
if (!function_exists('traveller_agency_loop_columns')) {
	function traveller_agency_loop_columns() {
		$columns = get_theme_mod( 'traveller_agency_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'traveller_agency_shop_per_page', 9 );
function traveller_agency_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'traveller_agency_product_per_page', 9 );
	return $cols;
}

function traveller_agency_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function traveller_agency_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function traveller_agency_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function traveller_agency_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Get CSS
 */

function traveller_agency_getpage_css($hook) {
	wp_enqueue_script( 'traveller-agency-admin-script', get_template_directory_uri() . '/inc/admin/js/traveller-agency-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'traveller-agency-admin-script', 'traveller_agency_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_traveller-agency-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'traveller-agency-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'traveller_agency_getpage_css' );

if ( ! defined( 'TRAVELLER_AGENCY_CONTACT_SUPPORT' ) ) {
define('TRAVELLER_AGENCY_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/traveller-agency','traveller-agency'));
}
if ( ! defined( 'TRAVELLER_AGENCY_REVIEW' ) ) {
define('TRAVELLER_AGENCY_REVIEW',__('https://wordpress.org/support/theme/traveller-agency/reviews/#new-post','traveller-agency'));
}
if ( ! defined( 'TRAVELLER_AGENCY_LIVE_DEMO' ) ) {
define('TRAVELLER_AGENCY_LIVE_DEMO',__('https://demo.themagnifico.net/traveller-agency/','traveller-agency'));
}
if ( ! defined( 'TRAVELLER_AGENCY_GET_PREMIUM_PRO' ) ) {
define('TRAVELLER_AGENCY_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/travel-agency-wordpress-theme','traveller-agency'));
}
if ( ! defined( 'TRAVELLER_AGENCY_PRO_DOC' ) ) {
define('TRAVELLER_AGENCY_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/traveller-agency-pro-doc/','traveller-agency'));
}
if ( ! defined( 'TRAVELLER_AGENCY_FREE_DOC' ) ) {
define('TRAVELLER_AGENCY_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/traveller-agency-free-doc/','traveller-agency'));
}

add_action('admin_menu', 'traveller_agency_themepage');
function traveller_agency_themepage(){

	$traveller_agency_theme_test = wp_get_theme();

	$traveller_agency_theme_info = add_theme_page( __('Theme Options','traveller-agency'), __('Theme Options','traveller-agency'), 'manage_options', 'traveller-agency-info.php', 'traveller_agency_info_page' );
}

function traveller_agency_info_page() {
	$traveller_agency_user = wp_get_current_user();
	$traveller_agency_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap traveller-agency-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','traveller-agency'); ?><?php echo esc_html( $traveller_agency_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "traveller-agency"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Traveller Agency , feel free to contact us for any support regarding our theme.", "traveller-agency"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "traveller-agency"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "traveller-agency"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "traveller-agency"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "traveller-agency"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "traveller-agency"); ?></h3>
						<p><?php esc_html_e("If You love Traveller Agency theme then we would appreciate your review about our theme.", "traveller-agency"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "traveller-agency"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "traveller-agency"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "traveller-agency"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "traveller-agency"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","traveller-agency"); ?></h2>
		<div class="traveller-agency-button-container">
			<a target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "traveller-agency"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "traveller-agency"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "traveller-agency"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "traveller-agency"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "traveller-agency"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "traveller-agency"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "traveller-agency"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "traveller-agency"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "traveller-agency"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="traveller-agency-button-container">
			<a target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "traveller-agency"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function traveller_agency_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function traveller_agency_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'traveller_agency_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'traveller-agency'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'traveller-agency'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=traveller-agency-info.php' )); ?>"><?php esc_html_e( 'Get started', 'traveller-agency' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'traveller-agency' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( TRAVELLER_AGENCY_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'traveller-agency' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'traveller_agency_deprecated_hook_admin_notice' );

function traveller_agency_switch_theme() {
    delete_user_meta(get_current_user_id(), 'traveller_agency_dismissable_notice');
}
add_action('after_switch_theme', 'traveller_agency_switch_theme');
function traveller_agency_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'traveller_agency_dismissable_notice', true);
    die();
}