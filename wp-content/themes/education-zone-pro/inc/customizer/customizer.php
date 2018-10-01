<?php
/**
 * Education Zone Pro Theme Customizer.
 *
 * @package education_zone_Pro
 */

function education_zone_pro_modify_sections( $wp_customize ){

	$wp_customize->get_section( 'title_tagline' )->panel = 'education_zone_pro_header_setting';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->remove_section("colors");
    $wp_customize->remove_section("background_image");

	if ( version_compare( $GLOBALS['wp_version'], '4.7', '>=' ) ){
        $wp_customize->get_section( 'custom_css' )->panel = 'education_zone_pro_custom_code_panel';
    }

    if ( version_compare( get_bloginfo('version'),'4.9', '>=') ) {
		$wp_customize->get_section( 'static_front_page' )->title = __( 'Static Front Page', 'education-zone-pro' );
    }

}
add_action( 'customize_register', 'education_zone_pro_modify_sections' );


/* Option list of all course */	
$education_zone_pro_options_courses = array();
$education_zone_pro_options_courses_obj = get_posts( 'posts_per_page=-1&post_type=course' );
$education_zone_pro_options_courses[''] = __( 'Choose Course', 'education-zone-pro' );
foreach ( $education_zone_pro_options_courses_obj as $education_zone_pro_courses ) {
	$education_zone_pro_options_courses[$education_zone_pro_courses->ID] = $education_zone_pro_courses->post_title;
}

/* Option list of all team */	
$education_zone_pro_options_team = array();
$education_zone_pro_options_team_obj = get_posts( 'posts_per_page=-1&post_type=team' );
$education_zone_pro_options_team[''] = __( 'Choose Team', 'education-zone-pro' );
foreach ( $education_zone_pro_options_team_obj as $education_zone_pro_team ) {
	$education_zone_pro_options_team[$education_zone_pro_team->ID] = $education_zone_pro_team->post_title;
}

/* Option list of all event */	
$education_zone_pro_options_event = array();
$education_zone_pro_options_event_obj = get_posts( 'posts_per_page=-1&post_type=event' );
$education_zone_pro_options_event[''] = __( 'Choose Event', 'education-zone-pro' );
foreach ( $education_zone_pro_options_event_obj as $education_zone_pro_event ) {
	$education_zone_pro_options_event[$education_zone_pro_event->ID] = $education_zone_pro_event->post_title;
}
/* Option list of all categories */
$education_zone_pro_args = array(
   'type'                     => 'post',
   'orderby'                  => 'name',
   'order'                    => 'ASC',
   'hide_empty'               => 1,
   'hierarchical'             => 1,
   'taxonomy'                 => 'category'
); 
$education_zone_pro_option_categories = array();
$education_zone_pro_category_lists = get_categories( $education_zone_pro_args );
$education_zone_pro_option_categories[''] = __( 'Choose Category', 'education-zone-pro' );
foreach( $education_zone_pro_category_lists as $education_zone_pro_category ){
    $education_zone_pro_option_categories[$education_zone_pro_category->term_id] = $education_zone_pro_category->name;
}

   
$education_zone_pro_panels   = array( 'header', 'slider', 'home', 'social', 'typography', 'custom' );
$education_zone_pro_sections = array( 'info', 'demo', 'general', 'blog', 'post-page', 'post-meta', 'breadcrumb', 'styling', 'sidebar', 'footer', 'contact', 'team', 'event', 'course', 'performance' );

$education_zone_pro_home_arr = array( 'info', 'welcome', 'courses', 'events', 'CTA', 'choose', 'team', 'testimonial', 'blog', 'gallery', 'subscription', 'sort' );    



$education_zone_pro_sub_section = array(
    'header'     => array( 'layout', 'misc' ),
    'slider'     => array( 'options', 'content' ),
    'home'       => $education_zone_pro_home_arr,
    'social'     => array( 'links', 'share'),
    'typography' => array( 'body', 'title', 'post', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
);

foreach( $education_zone_pro_panels as $p ){
    require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach( $education_zone_pro_sections as $s ){
    require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}

foreach( $education_zone_pro_sub_section as $k => $v ){
    foreach( $v as $w ){        
        require get_template_directory() . '/inc/customizer/panels/' . $k . '/' . $w . '.php';
    }
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function education_zone_pro_customize_preview_js() {
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'education_zone_pro_customizer', get_template_directory_uri() . '/js' . $build . '/customizer' . $suffix . '.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'education_zone_pro_customize_preview_js' );

/**
 * Configuration sample for the Kirki Customizer
 */
function education_zone_pro_configuration_sample_styling( $config ) {

    //$config['logo_image']   = get_template_directory_uri() . '/images/logo.png';
    $config['description']  = __( 'Education Zone Pro : A Pro theme of Education Zone.', 'education-zone-pro');
    $config['color_accent'] = '#3b9ad7';
    $config['color_back']   = '#d5e9f6';
    $config['disable_loader'] = true;

    return $config;

}
add_filter( 'kirki/config', 'education_zone_pro_configuration_sample_styling' );

/**
 * If you need to include Kirki in your theme,
 * then you may want to consider adding the translations here
 * using your textdomain.
 * 
 * If you're using Kirki as a plugin this is not needed.
 */
add_filter( 'kirki/my_config/l10n', function( $l10n ) {

	$l10n['background-color']      = esc_attr__( 'Background Color', 'education-zone-pro' );
	$l10n['background-image']      = esc_attr__( 'Background Image', 'education-zone-pro' );
	$l10n['no-repeat']             = esc_attr__( 'No Repeat', 'education-zone-pro' );
	$l10n['repeat-all']            = esc_attr__( 'Repeat All', 'education-zone-pro' );
	$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', 'education-zone-pro' );
	$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', 'education-zone-pro' );
	$l10n['inherit']               = esc_attr__( 'Inherit', 'education-zone-pro' );
	$l10n['background-repeat']     = esc_attr__( 'Background Repeat', 'education-zone-pro' );
	$l10n['cover']                 = esc_attr__( 'Cover', 'education-zone-pro' );
	$l10n['contain']               = esc_attr__( 'Contain', 'education-zone-pro' );
	$l10n['background-size']       = esc_attr__( 'Background Size', 'education-zone-pro' );
	$l10n['fixed']                 = esc_attr__( 'Fixed', 'education-zone-pro' );
	$l10n['scroll']                = esc_attr__( 'Scroll', 'education-zone-pro' );
	$l10n['background-attachment'] = esc_attr__( 'Background Attachment', 'education-zone-pro' );
	$l10n['left-top']              = esc_attr__( 'Left Top', 'education-zone-pro' );
	$l10n['left-center']           = esc_attr__( 'Left Center', 'education-zone-pro' );
	$l10n['left-bottom']           = esc_attr__( 'Left Bottom', 'education-zone-pro' );
	$l10n['right-top']             = esc_attr__( 'Right Top', 'education-zone-pro' );
	$l10n['right-center']          = esc_attr__( 'Right Center', 'education-zone-pro' );
	$l10n['right-bottom']          = esc_attr__( 'Right Bottom', 'education-zone-pro' );
	$l10n['center-top']            = esc_attr__( 'Center Top', 'education-zone-pro' );
	$l10n['center-center']         = esc_attr__( 'Center Center', 'education-zone-pro' );
	$l10n['center-bottom']         = esc_attr__( 'Center Bottom', 'education-zone-pro' );
	$l10n['background-position']   = esc_attr__( 'Background Position', 'education-zone-pro' );
	$l10n['background-opacity']    = esc_attr__( 'Background Opacity', 'education-zone-pro' );
	$l10n['on']                    = esc_attr__( 'ON', 'education-zone-pro' );
	$l10n['off']                   = esc_attr__( 'OFF', 'education-zone-pro' );
	$l10n['all']                   = esc_attr__( 'All', 'education-zone-pro' );
	$l10n['cyrillic']              = esc_attr__( 'Cyrillic', 'education-zone-pro' );
	$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', 'education-zone-pro' );
	$l10n['devanagari']            = esc_attr__( 'Devanagari', 'education-zone-pro' );
	$l10n['greek']                 = esc_attr__( 'Greek', 'education-zone-pro' );
	$l10n['greek-ext']             = esc_attr__( 'Greek Extended', 'education-zone-pro' );
	$l10n['khmer']                 = esc_attr__( 'Khmer', 'education-zone-pro' );
	$l10n['latin']                 = esc_attr__( 'Latin', 'education-zone-pro' );
	$l10n['latin-ext']             = esc_attr__( 'Latin Extended', 'education-zone-pro' );
	$l10n['vietnamese']            = esc_attr__( 'Vietnamese', 'education-zone-pro' );
	$l10n['hebrew']                = esc_attr__( 'Hebrew', 'education-zone-pro' );
	$l10n['arabic']                = esc_attr__( 'Arabic', 'education-zone-pro' );
	$l10n['bengali']               = esc_attr__( 'Bengali', 'education-zone-pro' );
	$l10n['gujarati']              = esc_attr__( 'Gujarati', 'education-zone-pro' );
	$l10n['tamil']                 = esc_attr__( 'Tamil', 'education-zone-pro' );
	$l10n['telugu']                = esc_attr__( 'Telugu', 'education-zone-pro' );
	$l10n['thai']                  = esc_attr__( 'Thai', 'education-zone-pro' );
	$l10n['serif']                 = _x( 'Serif', 'font style', 'education-zone-pro' );
	$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', 'education-zone-pro' );
	$l10n['monospace']             = _x( 'Monospace', 'font style', 'education-zone-pro' );
	$l10n['font-family']           = esc_attr__( 'Font Family', 'education-zone-pro' );
	$l10n['font-size']             = esc_attr__( 'Font Size', 'education-zone-pro' );
	$l10n['font-weight']           = esc_attr__( 'Font Weight', 'education-zone-pro' );
	$l10n['line-height']           = esc_attr__( 'Line Height', 'education-zone-pro' );
	$l10n['font-style']            = esc_attr__( 'Font Style', 'education-zone-pro' );
	$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', 'education-zone-pro' );
	$l10n['top']                   = esc_attr__( 'Top', 'education-zone-pro' );
	$l10n['bottom']                = esc_attr__( 'Bottom', 'education-zone-pro' );
	$l10n['left']                  = esc_attr__( 'Left', 'education-zone-pro' );
	$l10n['right']                 = esc_attr__( 'Right', 'education-zone-pro' );
	$l10n['color']                 = esc_attr__( 'Color', 'education-zone-pro' );
	$l10n['add-image']             = esc_attr__( 'Add Image', 'education-zone-pro' );
	$l10n['change-image']          = esc_attr__( 'Change Image', 'education-zone-pro' );
	$l10n['remove']                = esc_attr__( 'Remove', 'education-zone-pro' );
	$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', 'education-zone-pro' );
	$l10n['select-font-family']    = esc_attr__( 'Select a font-family', 'education-zone-pro' );
	$l10n['variant']               = esc_attr__( 'Variant', 'education-zone-pro' );
	$l10n['subsets']               = esc_attr__( 'Subset', 'education-zone-pro' );
	$l10n['size']                  = esc_attr__( 'Size', 'education-zone-pro' );
	$l10n['height']                = esc_attr__( 'Height', 'education-zone-pro' );
	$l10n['spacing']               = esc_attr__( 'Spacing', 'education-zone-pro' );
	$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', 'education-zone-pro' );
	$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', 'education-zone-pro' );
	$l10n['light']                 = esc_attr__( 'Light 200', 'education-zone-pro' );
	$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', 'education-zone-pro' );
	$l10n['book']                  = esc_attr__( 'Book 300', 'education-zone-pro' );
	$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', 'education-zone-pro' );
	$l10n['regular']               = esc_attr__( 'Normal 400', 'education-zone-pro' );
	$l10n['italic']                = esc_attr__( 'Normal 400 Italic', 'education-zone-pro' );
	$l10n['medium']                = esc_attr__( 'Medium 500', 'education-zone-pro' );
	$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', 'education-zone-pro' );
	$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', 'education-zone-pro' );
	$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', 'education-zone-pro' );
	$l10n['bold']                  = esc_attr__( 'Bold 700', 'education-zone-pro' );
	$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', 'education-zone-pro' );
	$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', 'education-zone-pro' );
	$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', 'education-zone-pro' );
	$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', 'education-zone-pro' );
	$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', 'education-zone-pro' );
	$l10n['invalid-value']         = esc_attr__( 'Invalid Value', 'education-zone-pro' );

	return $l10n;

} );

/**
 * Change the URL that will be used by Kirki
 * to load its assets in the customizer.
 */
if ( ! function_exists( 'education_zone_pro_kirki_update_url' ) ) {
    function education_zone_pro_kirki_update_url( $config ) {
        $config['url_path'] = get_template_directory_uri() . '/inc/kirki/';
        return $config;
    }
}
add_filter( 'kirki/config', 'education_zone_pro_kirki_update_url' );