<?php


/**
 * Register Fonts
 */
function thesaasx_fonts_url() {
	$font_url = '';
	$font_body  = get_theme_mod( 'style_font_body', 'Open Sans' );
	$font_title = get_theme_mod( 'style_font_title', 'Dosis' );

  if ( empty( $font_body ) ) {
	$font_body = 'Open Sans';
  }

  if ( empty( $font_title ) ) {
	$font_title = 'Dosis';
  }

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'thesaasx' ) ) {
		$font_url = add_query_arg( 'family', urlencode( $font_body .':300,400,600,700|'. $font_title .':200,300,400,500,600' ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}


/**
 * Enqueue scripts and styles.
 */
function thesaasx_enqueue_assets() {

	$my_theme = wp_get_theme();
	$version = $my_theme->get( 'Version' );

	// Google fonts.
	//
	wp_enqueue_style( 'thesaasx-fonts', thesaasx_fonts_url(), array(), $version );


	// Plugin styles.
	//
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/vendor/font-awesome/css/font-awesome.min.css' ), array(), $version );
	wp_enqueue_style( 'themify-icons', get_theme_file_uri( '/assets/vendor/themify-icons/themify-icons.css' ), array(), $version );
	wp_enqueue_style( 'et-line', get_theme_file_uri( '/assets/vendor/et-line/style.css' ), array(), $version );
	wp_enqueue_style( 'aos', get_theme_file_uri( '/assets/vendor/aos/aos.css' ), array(), $version );
	wp_enqueue_style( 'jarallax', get_theme_file_uri( '/assets/vendor/jarallax/jarallax.css' ), array(), $version );
	wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/vendor/slick/slick.css' ), array(), $version );



	// Plugin scripts.
	//
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'smoothscroll', get_theme_file_uri( '/assets/vendor/smoothscroll/SmoothScroll.js' ), array( ), $version, true );
	wp_enqueue_script( 'objectfit-polyfill', get_theme_file_uri( '/assets/vendor/objectfit-polyfill/objectFitPolyfill.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'aos', get_theme_file_uri( '/assets/vendor/aos/aos.js' ), array( ), $version, true );
	wp_enqueue_script( 'jquery-countdown', get_theme_file_uri( '/assets/vendor/jquery-countdown/jquery.countdown.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'waypoints', get_theme_file_uri( '/assets/vendor/waypoints/jquery.waypoints.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'countup', get_theme_file_uri( '/assets/vendor/countup/countUp.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'granim', get_theme_file_uri( '/assets/vendor/granim/granim.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'slick', get_theme_file_uri( '/assets/vendor/slick/slick.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'typed', get_theme_file_uri( '/assets/vendor/typed/typed.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'lity', get_theme_file_uri( '/assets/vendor/lity/lity.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'imagesloaded', get_theme_file_uri( '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js' ), array( ), $version, true );
	wp_enqueue_script( 'shufflejs', get_theme_file_uri( '/assets/vendor/shuffle/shuffle.min.js' ), array('imagesloaded'), $version, true );
	wp_enqueue_script( 'jarallax', get_theme_file_uri( '/assets/vendor/jarallax/jarallax.min.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'jarallax-video', get_theme_file_uri( '/assets/vendor/jarallax/jarallax-video.min.js' ), array( 'jquery' ), $version, true );


	// Theme style.
	//
	wp_enqueue_style( 'thesaasx', get_theme_file_uri( '/assets/css/page.min.css' ), array(), $version );

	// Custom style
	$custom_css  = thesaasx_custom_font_style();
	$custom_css .= thesaasx_custom_color_style();
	if ( $custom_css !== '' ) {
		wp_add_inline_style( 'thesaasx', $custom_css );
	}



	// Theme script.
	//
	wp_enqueue_script( 'thesaasx', get_theme_file_uri( '/assets/js/page.min.js' ), array( 'jquery', 'bootstrap' ), $version, true );

	$googleApiKey_escaped = esc_js( get_theme_mod( 'google_api_key', 'AIzaSyDRBLFOTTh2NFM93HpUA4ZrA99yKnCAsto' ) );
	$googleAnalyticsId_escaped = esc_js( get_theme_mod( 'google_analytics_id' ) );
	$googlerecaptchav3_escaped = esc_js( get_theme_mod( 'google_recaptcha3_public' ) );
	$inline_script = "page.config({ googleApiKey: '". $googleApiKey_escaped ."', googleAnalyticsId: '". $googleAnalyticsId_escaped ."', reCaptchaV3SiteKey: '". $googlerecaptchav3_escaped ."', contactFormAction: '". admin_url('admin-ajax.php') ."' });";
	$inline_script .= get_theme_mod( 'additional_script' );
	wp_add_inline_script( 'thesaasx', "jQuery(function($) { ". $inline_script ." });" );


	// Comments
	//
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'thesaasx_enqueue_assets' );




/**
 * Enqueue supplemental block editor assets
 */
function thesaasx_gutenberg_assets() {

	thesaasx_enqueue_assets();

	wp_dequeue_style('thesaasx');
	wp_enqueue_style( 'thesaasx-editor-bleed-fix', get_theme_file_uri( '/assets/css/editor-bleed-fix.min.css' ), false, '1.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'thesaasx_gutenberg_assets' );
