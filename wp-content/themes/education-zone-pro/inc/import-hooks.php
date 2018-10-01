<?php
/**
 * Education Zone Pro Template Hooks.
 *
 * @package Education_Zone_Pro 
 */
 
/** Import content data*/
if ( ! function_exists( 'education_zone_pro_import_files' ) ) :
function education_zone_pro_import_files() {
    return array(
        array(
            'import_file_name'             => 'Default Demo',
            'import_file_url'              => 'https://raratheme.com/wp-content/uploads/2018/06/educationzonepro.xml',
            'import_widget_file_url'       => 'https://raratheme.com/wp-content/uploads/2018/06/educationzonepro.wie',
            'import_customizer_file_url'   => 'https://raratheme.com/wp-content/uploads/2018/06/educationzonepro.dat',
            'import_preview_image_url'     => get_template_directory() .'/screenshot.png',
            'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'education-zone-pro' ),
        ),
    );       
}
add_filter( 'rrdi/import_files', 'education_zone_pro_import_files' );
endif;

/** Programmatically set the front page and menu */
if ( ! function_exists( 'education_zone_pro_after_import' ) ) :
function education_zone_pro_after_import( $selected_import ) {
 
    if ( 'Default Demo' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary   = get_term_by('name', 'Primary', 'nav_menu');
        $secondary = get_term_by('name', 'Quick Links', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary'   => $primary->term_id, 
              'secondary' => $secondary->term_id 
             ) 
        );
 
       /** Set Front page */
       $page = get_page_by_path('home'); /** This need to be slug of the page that is assigned as Front page */
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
       }
       
       /** Blog Page */
        $postpage = get_page_by_path('blog'); /** This need to be slug of the page that is assigned as Posts page */
        if( $postpage ){
            $post_pgid = $postpage->ID;
            
            update_option( 'page_for_posts', $post_pgid );
        }
        
    }
     
}
add_action( 'rrdi/after_import', 'education_zone_pro_after_import' );
endif;

function education_zone_pro_import_msg(){
    return __( 'Before you begin, make sure all recommended plugins are activated.', 'education-zone-pro' );
}
add_filter( 'rrdi_before_import_msg', 'education_zone_pro_import_msg' );