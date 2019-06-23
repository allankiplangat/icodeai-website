<?php
/**
 * TheSaaS-X functions and definitions
 */

/**
 * TheSaaS-X only works in WordPress 5.0 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.0', '<' ) ) {
	require get_template_directory() . '/include/setup/back-compat.php';
	return;
}



/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/include/setup/theme.php';

/**
 * Create custom css code.
 */
require get_template_directory() . '/include/setup/style.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/include/setup/enqueue.php';

/**
 * Use TGM plugin activation for loading plugins.
 */
require get_template_directory() . '/include/setup/plugin.php';

/**
 * Additional menu configurations.
 */
require get_template_directory() . '/include/setup/menu.php';

/**
 * WooCommerce support.
 */
require get_template_directory() . '/include/setup/wc.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/include/utils/general.php';

/**
 * Utility functions related to the layout, mainly Navbar, Header, and Footer.
 */
require get_template_directory() . '/include/utils/layout.php';

/**
 * Utility functions related to the post and page.
 */
require get_template_directory() . '/include/utils/post.php';

/**
 * One Click Demo Importer plugin support.
 */
require get_template_directory() . '/include/utils/ocdi.php';

/**
 * A nav walker for topbar menus.
 */
require get_template_directory() . '/include/class/the-walker-nav-menu.php';
