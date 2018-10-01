<?php
/**
 * Education Zone functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Education_Zone_Pro
 */

//define theme version
if ( !defined( 'EDUCATION_ZONE_PRO_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'EDUCATION_ZONE_PRO_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/custom-functions.php';
/**
 * Implement the WordPress Hooks.
 */
require get_template_directory() . '/inc/wp-hooks.php';

/**
 ** Custom template functions for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the template hooks.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
* If Kirki is not already installed, use the included version
*/
if ( ! class_exists( 'Kirki' ) ) {    
    require get_template_directory() . '/inc/kirki/kirki.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * WooCommerce Related funcitons
*/
if( is_woocommerce_activated() )
require get_template_directory() . '/inc/woocommerce-functions.php';


/**
 * Typography Functions
*/
require get_template_directory() . '/inc/typography-functions.php';

/**
 * Dynamic Styles
*/
require get_template_directory() . '/css/style.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * CPT
 */
require get_template_directory() . '/inc/cpt/custom-post.php';

/**
 * Meta Box.
 */
require get_template_directory() . '/inc/cpt/metabox.php';

/**
 * Performance Features.
 */
require get_template_directory() . '/inc/performance.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Shortcodes
*/
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Plugin Recomendation
*/
require_once get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Demo Import
*/
require get_template_directory() . '/inc/import-hooks.php';