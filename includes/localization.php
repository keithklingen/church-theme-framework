<?php
/**
 * Localization Functions
 */

/**
 * Load Theme Textdomain
 *
 * Language file should go in wp-content/languages/themes/textdomain-locale.mo.
 * This keeps translation from being updated when theme is updated.
 * 
 * See http://core.trac.wordpress.org/changeset/22346
 */

add_action( 'after_setup_theme', 'ctc_load_theme_textdomain' );
 
function ctc_load_theme_textdomain() {

	// By default, this loads locale.mo from theme's directory
	// Secondarily, it loads wp-content/languages/themes/textdomain-locale.mo (much better for updates)
	load_theme_textdomain( 'church-theme' );

}

/**
 * Use theme's translation file for framework text
 *
 * Church Theme Framework's textdomain is 'ct-framework' while the theme's is the same as its own directory.
 * This makes it so one translation file can be used for both textdomains.
 *
 * Thank you to Justin Tadlock: https://github.com/justintadlock/hybrid-core/blob/master/functions/i18n.php
 */

add_filter( 'gettext', 'ctc_gettext', 1, 3 );

function ctc_gettext( $translated, $text, $domain ) {

	// Framework textdomain?
	if ( 'ctc-framework' == $domain ) {

		// Use theme's translation
		$translations = get_translations_for_domain( CTC_TEMPLATE ); // theme's directory name
		$translated = $translations->translate( $text );

	}

	return $translated;

}
