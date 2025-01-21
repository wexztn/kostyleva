/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-traveller_agency_options-';
		
		// Label
		function traveller_agency_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'traveller_agency_scroll_hide' || id === 'traveller_agency_preloader_hide' || id === 'traveller_agency_sticky_header' || id === 'traveller_agency_products_per_row') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'traveller_agency_woocommerce_product_sale' || id === 'traveller_agency_woocommerce_related_product_show_hide') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'traveller_agency_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'traveller_agency_phone' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'traveller_agency_slider_setting' || id === 'traveller_agency_email_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Best Destination

			if ( id === 'traveller_agency_latest_destination_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'traveller_agency_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'traveller_agency_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'traveller_agency_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'traveller_agency_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'traveller_agency_show_hide_footer' || id === 'traveller_agency_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-traveller_agency_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

	    // Site Identity
		traveller_agency_customizer_label( 'custom_logo', 'Logo Setup' );
		traveller_agency_customizer_label( 'site_icon', 'Favicon' );

		// General Setting
		traveller_agency_customizer_label( 'traveller_agency_scroll_hide', 'Scroll To Top' );
		traveller_agency_customizer_label( 'traveller_agency_preloader_hide', 'Preloader' );
		traveller_agency_customizer_label( 'traveller_agency_sticky_header', 'Sticky Header');
		traveller_agency_customizer_label( 'traveller_agency_products_per_row', 'Woocommerce Settings' );
		traveller_agency_customizer_label( 'traveller_agency_woocommerce_product_sale', 'Woocommerce Product Sale' );
		traveller_agency_customizer_label( 'traveller_agency_woocommerce_related_product_show_hide', 'Woocommerce Related Products' );

		// Colors
		traveller_agency_customizer_label( 'traveller_agency_theme_color', 'Theme Color' );
		traveller_agency_customizer_label( 'background_color', 'Colors' );
		traveller_agency_customizer_label( 'background_image', 'Image' );

		//Header Image
		traveller_agency_customizer_label( 'header_image', 'Header Image' );

		// Header
		traveller_agency_customizer_label( 'traveller_agency_phone', 'Phone' );

		//Slider
		traveller_agency_customizer_label( 'traveller_agency_slider_setting', 'Slider' );
		traveller_agency_customizer_label( 'traveller_agency_email_text', 'Email' );
		
		// Best Destination
		traveller_agency_customizer_label( 'traveller_agency_latest_destination_setting', 'Best Destination' );

		//Post Setting
		traveller_agency_customizer_label( 'traveller_agency_post_page_title', 'Post Setting' );

		// Single Post Setting
		traveller_agency_customizer_label( 'traveller_agency_single_post_thumb', 'Single Post Setting' );
		traveller_agency_customizer_label( 'traveller_agency_single_post_comment_title', 'Single Post Comment' );

		//Footer
		traveller_agency_customizer_label( 'traveller_agency_show_hide_footer', 'Footer' );
		traveller_agency_customizer_label( 'traveller_agency_show_hide_copyright', 'Copyright' );

		// Page Setting
		traveller_agency_customizer_label( 'traveller_agency_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
