<?php
/**
 * Rara Theme custom post and taxonomy definitions.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @package Rara_Theme
 */

/**
 *  Client Course Post Type
*/
if ( ! function_exists('education_zone_pro_course_post_type') ) :
/**
 * Course Post Types
*/
function education_zone_pro_course_post_type() {

	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', 'education-zone-pro' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'education-zone-pro' ),
		'menu_name'             => __( 'Courses', 'education-zone-pro' ),
		'name_admin_bar'        => __( 'Course', 'education-zone-pro' ),
		'archives'              => __( 'Course Archives', 'education-zone-pro' ),
		'attributes'            => __( 'Course Attributes', 'education-zone-pro' ),
		'parent_item_colon'     => __( 'Parent Course:', 'education-zone-pro' ),
		'all_items'             => __( 'All Courses', 'education-zone-pro' ),
		'add_new_item'          => __( 'Add New Course', 'education-zone-pro' ),
		'add_new'               => __( 'Add New', 'education-zone-pro' ),
		'new_item'              => __( 'New Course', 'education-zone-pro' ),
		'edit_item'             => __( 'Edit Course', 'education-zone-pro' ),
		'update_item'           => __( 'Update Course', 'education-zone-pro' ),
		'view_item'             => __( 'View Course', 'education-zone-pro' ),
		'view_items'            => __( 'View Courses', 'education-zone-pro' ),
		'search_items'          => __( 'Search Course', 'education-zone-pro' ),
		'not_found'             => __( 'Not found', 'education-zone-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'education-zone-pro' ),
		'featured_image'        => __( 'Featured Image', 'education-zone-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'education-zone-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'education-zone-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'education-zone-pro' ),
		'insert_into_item'      => __( 'Insert into course', 'education-zone-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this course', 'education-zone-pro' ),
		'items_list'            => __( 'Courses list', 'education-zone-pro' ),
		'items_list_navigation' => __( 'Courses list navigation', 'education-zone-pro' ),
		'filter_items_list'     => __( 'Filter courses list', 'education-zone-pro' ),
	);
	$args = array(
		'label'                 => __( 'Course', 'education-zone-pro' ),
		'description'           => __( 'A Custom Post Type for Courses.', 'education-zone-pro' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'course', $args );

}
add_action( 'init', 'education_zone_pro_course_post_type', 0 );
endif;

if ( ! function_exists( 'education_zone_pro_course_taxonomy' ) ) :
/**
 * Cource Category Taxonomy
*/
function education_zone_pro_course_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Course Categories', 'Taxonomy General Name', 'education-zone-pro' ),
		'singular_name'              => _x( 'Course Category', 'Taxonomy Singular Name', 'education-zone-pro' ),
		'menu_name'                  => __( 'Course Category', 'education-zone-pro' ),
		'all_items'                  => __( 'All Course Categories', 'education-zone-pro' ),
		'parent_item'                => __( 'Parent Course Category', 'education-zone-pro' ),
		'parent_item_colon'          => __( 'Parent Course Category:', 'education-zone-pro' ),
		'new_item_name'              => __( 'New Course Category Name', 'education-zone-pro' ),
		'add_new_item'               => __( 'Add New Course Category', 'education-zone-pro' ),
		'edit_item'                  => __( 'Edit Course Category', 'education-zone-pro' ),
		'update_item'                => __( 'Update Course Category', 'education-zone-pro' ),
		'view_item'                  => __( 'View Course Category', 'education-zone-pro' ),
		'separate_items_with_commas' => __( 'Separate course categories with commas', 'education-zone-pro' ),
		'add_or_remove_items'        => __( 'Add or remove course categories', 'education-zone-pro' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'education-zone-pro' ),
		'popular_items'              => __( 'Popular Course Categories', 'education-zone-pro' ),
		'search_items'               => __( 'Search Course Categories', 'education-zone-pro' ),
		'not_found'                  => __( 'Not Found', 'education-zone-pro' ),
		'no_terms'                   => __( 'No course categories', 'education-zone-pro' ),
		'items_list'                 => __( 'Course Categories list', 'education-zone-pro' ),
		'items_list_navigation'      => __( 'Course Categories list navigation', 'education-zone-pro' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'course-category', array( 'course' ), $args );

}
add_action( 'init', 'education_zone_pro_course_taxonomy', 0 );
endif;

if ( ! function_exists('education_zone_pro_testimonial_post_type') ) :
/**
 * Testimonail Post Types
*/
function education_zone_pro_testimonial_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'education-zone-pro' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'education-zone-pro' ),
		'menu_name'             => __( 'Testimonials', 'education-zone-pro' ),
		'name_admin_bar'        => __( 'Testimonial', 'education-zone-pro' ),
		'archives'              => __( 'Testimonial Archives', 'education-zone-pro' ),
		'attributes'            => __( 'Testimonial Attributes', 'education-zone-pro' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'education-zone-pro' ),
		'all_items'             => __( 'All Testimonials', 'education-zone-pro' ),
		'add_new_item'          => __( 'Add New Testimonial', 'education-zone-pro' ),
		'add_new'               => __( 'Add New', 'education-zone-pro' ),
		'new_item'              => __( 'New Testimonial', 'education-zone-pro' ),
		'edit_item'             => __( 'Edit Testimonial', 'education-zone-pro' ),
		'update_item'           => __( 'Update Testimonial', 'education-zone-pro' ),
		'view_item'             => __( 'View Testimonial', 'education-zone-pro' ),
		'view_items'            => __( 'View Testimonials', 'education-zone-pro' ),
		'search_items'          => __( 'Search Testimonial', 'education-zone-pro' ),
		'not_found'             => __( 'Not found', 'education-zone-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'education-zone-pro' ),
		'featured_image'        => __( 'Featured Image', 'education-zone-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'education-zone-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'education-zone-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'education-zone-pro' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'education-zone-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'education-zone-pro' ),
		'items_list'            => __( 'Testimonials list', 'education-zone-pro' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'education-zone-pro' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'education-zone-pro' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'education-zone-pro' ),
		'description'           => __( 'A Custom Post Type for Testimonial.', 'education-zone-pro' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-testimonial',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'education_zone_pro_testimonial_post_type', 0 );
endif;

if ( ! function_exists('education_zone_pro_team_post_type') ) :
/**
 * Team Post Types 
*/
function education_zone_pro_team_post_type() {

	$labels = array(
		'name'                  => _x( 'Teams', 'Post Type General Name', 'education-zone-pro' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'education-zone-pro' ),
		'menu_name'             => __( 'Teams', 'education-zone-pro' ),
		'name_admin_bar'        => __( 'Team', 'education-zone-pro' ),
		'archives'              => __( 'Team Archives', 'education-zone-pro' ),
		'attributes'            => __( 'Team Attributes', 'education-zone-pro' ),
		'parent_item_colon'     => __( 'Parent Team:', 'education-zone-pro' ),
		'all_items'             => __( 'All Teams', 'education-zone-pro' ),
		'add_new_item'          => __( 'Add New Team', 'education-zone-pro' ),
		'add_new'               => __( 'Add New', 'education-zone-pro' ),
		'new_item'              => __( 'New Team', 'education-zone-pro' ),
		'edit_item'             => __( 'Edit Team', 'education-zone-pro' ),
		'update_item'           => __( 'Update Team', 'education-zone-pro' ),
		'view_item'             => __( 'View Team', 'education-zone-pro' ),
		'view_items'            => __( 'View Teams', 'education-zone-pro' ),
		'search_items'          => __( 'Search Team', 'education-zone-pro' ),
		'not_found'             => __( 'Not found', 'education-zone-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'education-zone-pro' ),
		'featured_image'        => __( 'Featured Image', 'education-zone-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'education-zone-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'education-zone-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'education-zone-pro' ),
		'insert_into_item'      => __( 'Insert into team', 'education-zone-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this team', 'education-zone-pro' ),
		'items_list'            => __( 'Teams list', 'education-zone-pro' ),
		'items_list_navigation' => __( 'Teams list navigation', 'education-zone-pro' ),
		'filter_items_list'     => __( 'Filter teams list', 'education-zone-pro' ),
	);
	$args = array(
		'label'                 => __( 'Team', 'education-zone-pro' ),
		'description'           => __( 'A Custom Post Type for Team.', 'education-zone-pro' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'education_zone_pro_team_post_type', 0 );
endif;

if ( ! function_exists('education_zone_pro_event_post_type') ) :
/**
 * Events Post Types 
*/
function education_zone_pro_event_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'education-zone-pro' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'education-zone-pro' ),
		'menu_name'             => __( 'Events', 'education-zone-pro' ),
		'name_admin_bar'        => __( 'Event', 'education-zone-pro' ),
		'archives'              => __( 'Event Archives', 'education-zone-pro' ),
		'attributes'            => __( 'Event Attributes', 'education-zone-pro' ),
		'parent_item_colon'     => __( 'Parent Event:', 'education-zone-pro' ),
		'all_items'             => __( 'All Events', 'education-zone-pro' ),
		'add_new_item'          => __( 'Add New Event', 'education-zone-pro' ),
		'add_new'               => __( 'Add New', 'education-zone-pro' ),
		'new_item'              => __( 'New Event', 'education-zone-pro' ),
		'edit_item'             => __( 'Edit Event', 'education-zone-pro' ),
		'update_item'           => __( 'Update Event', 'education-zone-pro' ),
		'view_item'             => __( 'View Event', 'education-zone-pro' ),
		'view_items'            => __( 'View Events', 'education-zone-pro' ),
		'search_items'          => __( 'Search Event', 'education-zone-pro' ),
		'not_found'             => __( 'Not found', 'education-zone-pro' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'education-zone-pro' ),
		'featured_image'        => __( 'Featured Image', 'education-zone-pro' ),
		'set_featured_image'    => __( 'Set featured image', 'education-zone-pro' ),
		'remove_featured_image' => __( 'Remove featured image', 'education-zone-pro' ),
		'use_featured_image'    => __( 'Use as featured image', 'education-zone-pro' ),
		'insert_into_item'      => __( 'Insert into event', 'education-zone-pro' ),
		'uploaded_to_this_item' => __( 'Uploaded to this event', 'education-zone-pro' ),
		'items_list'            => __( 'Events list', 'education-zone-pro' ),
		'items_list_navigation' => __( 'Events list navigation', 'education-zone-pro' ),
		'filter_items_list'     => __( 'Filter events list', 'education-zone-pro' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'education-zone-pro' ),
		'description'           => __( 'A Custom Post Type for Event.', 'education-zone-pro' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'education_zone_pro_event_post_type', 0 );
endif;

if ( ! function_exists( 'education_zone_pro_event_taxonomy' ) ) :
/**
 * taxonomy, event category for the post type "event"
 */
function education_zone_pro_event_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Event Categories', 'Taxonomy General Name', 'education-zone-pro' ),
		'singular_name'              => _x( 'Event Category', 'Taxonomy Singular Name', 'education-zone-pro' ),
		'menu_name'                  => __( 'Event Category', 'education-zone-pro' ),
		'all_items'                  => __( 'All Event Categories', 'education-zone-pro' ),
		'parent_item'                => __( 'Parent Event Category', 'education-zone-pro' ),
		'parent_item_colon'          => __( 'Parent Event Category:', 'education-zone-pro' ),
		'new_item_name'              => __( 'New Event Category Name', 'education-zone-pro' ),
		'add_new_item'               => __( 'Add New Event Category', 'education-zone-pro' ),
		'edit_item'                  => __( 'Edit Event Category', 'education-zone-pro' ),
		'update_item'                => __( 'Update Event Category', 'education-zone-pro' ),
		'view_item'                  => __( 'View Event Category', 'education-zone-pro' ),
		'separate_items_with_commas' => __( 'Separate event categories with commas', 'education-zone-pro' ),
		'add_or_remove_items'        => __( 'Add or remove event categories', 'education-zone-pro' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'education-zone-pro' ),
		'popular_items'              => __( 'Popular Event Categories', 'education-zone-pro' ),
		'search_items'               => __( 'Search Event Categories', 'education-zone-pro' ),
		'not_found'                  => __( 'Not Found', 'education-zone-pro' ),
		'no_terms'                   => __( 'No event categories', 'education-zone-pro' ),
		'items_list'                 => __( 'Event Categories list', 'education-zone-pro' ),
		'items_list_navigation'      => __( 'Event Categories list navigation', 'education-zone-pro' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event-category', array( 'event' ), $args );

}
add_action( 'init', 'education_zone_pro_event_taxonomy', 0 );
endif;

if( ! function_exists( 'education_zone_pro_logo_category_filter' ) ) :
/**
 * Function to list logo category filter in admin
*/
function education_zone_pro_logo_category_filter() {

    // only display these taxonomy filters on desired custom post_type listings
    global $typenow;
    
    if( $typenow == 'course' || $typenow == 'event' ){

        // create an array of taxonomy slugs you want to filter by - if you want to retrieve all taxonomies, could use get_taxonomies() to build the list
        if( $typenow == 'course' ){
            $filters = array( 'course-category' );    
        }elseif( $typenow == 'event' ){
            $filters = array( 'event-category' );
        }

        foreach( $filters as $tax_slug ) {
            // retrieve the taxonomy object
            $tax_obj = get_taxonomy( $tax_slug );
            $tax_name = $tax_obj->labels->name;
            
            // Get taxonomy terms and order by name.
            $args = array(
                'orderby' => 'name',
                'hide_empty' => false
            );
                    
            // retrieve array of term objects per taxonomy
            $terms = get_terms( $tax_slug, $args );

            // output html for taxonomy dropdown filter
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            // Default show all.
            printf( '<option value="0">%s</option>', sprintf( __( 'Show All %s', 'education-zone-pro' ), $tax_name ) );

            foreach( $terms as $term ){
                if ( isset( $_GET[ $tax_slug ] ) && $_GET[ $tax_slug ] === $term->slug ) {
                    echo '<option value='. $term->slug . ' selected="selected">' . $term->name .' (' . $term->count .')</option>';
                }else{
                    echo '<option value='. $term->slug . '>' . $term->name .' (' . $term->count .')</option>';
                }
            }
            echo "</select>";
        }
    }
}
add_action( 'restrict_manage_posts', 'education_zone_pro_logo_category_filter' );
endif;