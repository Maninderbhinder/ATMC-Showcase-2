<?php
/**
 * Education Zone functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Education_Zone
 */

if ( ! function_exists( 'education_zone_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function education_zone_pro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Education Zone, use a find and replace
	 * to change 'education-zone-pro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'education-zone-pro', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Add excerpt in pages
    add_post_type_support( 'page', 'excerpt' );
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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'education-zone-pro' ),
		'secondary' => esc_html__( 'Secondary', 'education-zone-pro' ),		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'gallery',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'education_zone_pro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );

    add_theme_support( 'custom-header', apply_filters( 'education_zone_pro_custom_header_args', array(
        'default-image'    => get_stylesheet_directory_uri().'/images/banner-image.jpg',
        'width'            => 1920,
        'height'           => 692,
        'header-text'      => false,
        'video'            => true,
    ) ) );

    register_default_headers( array(
        'default-image' => array(
            'url'           => '%s/images/banner-image.jpg',
            'thumbnail_url' => '%s/images/banner-image.jpg',
            'description'   => __( 'Default Header Image', 'education-zone-pro' ),
        ),
    ) );
    
    //Custom Image Sizes
    add_image_size( 'education-zone-pro-banner', 1920, 692, true);
    add_image_size( 'education-zone-pro-image-full', 1140, 458, true);
    add_image_size( 'education-zone-pro-image', 750, 458, true);
    add_image_size( 'education-zone-pro-layout-post', 246, 246, true);
    add_image_size( 'education-zone-pro-featured-post', 275, 275, true);
    add_image_size( 'education-zone-pro-recent-post', 70, 70, true);
    add_image_size( 'education-zone-pro-search-result', 246, 246, true);
    add_image_size( 'education-zone-pro-featured-course', 276, 276, true);
    add_image_size( 'education-zone-pro-testimonial', 125, 125, true);
    add_image_size( 'education-zone-pro-blog-full', 848, 480, true);
    add_image_size( 'education-zone-pro-events', 211, 211, true);
    add_image_size( 'education-zone-pro-team', 360, 455, true);
    add_image_size( 'education-zone-pro-course', 360, 300, true);
    add_image_size( 'education-zone-pro-schema', 600, 60, true);
    
}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function education_zone_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'education_zone_pro_content_width', 750 );
}

/**
 * Enqueue scripts and styles.
 */
function education_zone_pro_scripts() {
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css' . $build . '/font-awesome' . $suffix . '.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/css' . $build . '/animate' . $suffix . '.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri(). '/css' . $build . '/owl.theme.default' . $suffix . '.css' );
    wp_enqueue_style( 'customscrollbar', get_template_directory_uri(). '/css' . $build . '/jquery.mCustomScrollbar' . $suffix . '.css' );
    wp_enqueue_style( 'jquery-sidrlight', get_template_directory_uri(). '/css' . $build . '/jquery.sidr.light' . $suffix . '.css' );  
    wp_enqueue_style( 'odometer', get_template_directory_uri(). '/css' . $build . '/odometer' . $suffix . '.css' );     
    wp_enqueue_style( 'education-zone-pro-style', get_stylesheet_uri(), array(), EDUCATION_ZONE_PRO_THEME_VERSION );
    
    if( is_woocommerce_activated() )
    wp_enqueue_style( 'education-zone-pro-woocommerce-style', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', EDUCATION_ZONE_PRO_THEME_VERSION );
    //Fancy Box
    if( get_theme_mod( 'education_zone_pro_ed_lightbox') ){
        wp_enqueue_style( 'jquery.fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css', '', '2.1.5' );
        wp_enqueue_script( 'jquery.fancybox.pack', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true );
    }
    if( get_theme_mod( 'ed_lazy_load', false ) || get_theme_mod( 'ed_lazy_load_cimage', false ) ) {
        wp_enqueue_script( 'layzr', get_template_directory_uri() . '/js' . $build . '/layzr' . $suffix . '.js', array('jquery'), '2.0.4', true );
    }
    if( is_active_widget( false, false, 'education_zone_pro_flickr_widget' ) )
        wp_enqueue_script( 'jflickrfeed', get_template_directory_uri() . '/js' . $build . '/jflickrfeed' . $suffix . '.js', array('jquery'), EDUCATION_ZONE_PRO_THEME_VERSION, true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js' . $build . '/isotope.pkgd' . $suffix . '.js', array('jquery'), '3.0.1', true );
    wp_enqueue_script( 'masonry' );    
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'matchheight', get_template_directory_uri() . '/js' . $build . '/jquery.matchHeight' . $suffix . '.js', array('jquery'), '0.7.0', true );
    wp_enqueue_script( 'customscroll', get_template_directory_uri() . '/js' . $build . '/jquery.mCustomScrollbar' . $suffix . '.js', array('jquery'), '3.1.5', true );
    wp_enqueue_script( 'sidr', get_template_directory_uri() . '/js' . $build . '/jquery.sidr' . $suffix . '.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js' . $build . '/waypoint' . $suffix . '.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'odometer', get_template_directory_uri() . '/js' . $build . '/odometer' . $suffix . '.js', array( 'jquery' ), EDUCATION_ZONE_PRO_THEME_VERSION, true );
	
    wp_register_script( 'education-zone-pro-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), EDUCATION_ZONE_PRO_THEME_VERSION, true );
    wp_register_script( 'education-zone-pro-ajax', get_template_directory_uri() . '/js' . $build . '/ajax' . $suffix . '.js', array('jquery'), EDUCATION_ZONE_PRO_THEME_VERSION, true );
   
    $slider_auto              = get_theme_mod( 'education_zone_pro_slider_auto', '1' );
    $slider_navigation        = get_theme_mod( 'education_zone_pro_slider_navigation', '1' );
    $slider_stoponhover       = get_theme_mod( 'education_zone_pro_slider_hover', '1' );    
    $slider_loop              = get_theme_mod( 'education_zone_pro_slider_loop', '1' );
    $slider_animation         = get_theme_mod( 'education_zone_pro_slider_animation', 'slide' );
    $sticky_header            = get_theme_mod( 'education_zone_pro_ed_sticky_header' );
    $header_layout            = get_theme_mod( 'education_zone_pro_header_layout', 'one');
    $t_slider_auto            = get_theme_mod( 'education_zone_pro_testimonial_slider_auto', '1' );
    $gallery_as_slider        = get_theme_mod( 'education_zone_pro_gallery_as_slider' );
    $testimonial_slider_speed = get_theme_mod( 'education_zone_pro_testimonial_speed', 1000 );
    
    $array = array(
        'auto'              => esc_attr( $slider_auto ),
        'navigation'        => esc_attr( $slider_navigation ),
        'stoponhover'       => esc_attr( $slider_stoponhover ),
        'loop'              => esc_attr( $slider_loop ),
        'mode'              => esc_attr( $slider_animation ),
        'lightbox'          => esc_attr( get_theme_mod( 'education_zone_pro_ed_lightbox') ),      
        'sticky'            => $sticky_header,
        'header'            => $header_layout,
        't_auto'            => $t_slider_auto,
        'rtl'               => is_rtl(),
        'gallery_as_slider' => $gallery_as_slider,
        't_slider_speed'    => $testimonial_slider_speed
    );
    
    wp_localize_script( 'education-zone-pro-custom', 'education_zone_pro_data', $array );
   
    wp_enqueue_script( 'education-zone-pro-custom' );
    
    $pagination = get_theme_mod( 'education_zone_pro_pagination_type', 'default' );
    $loadmore   = get_theme_mod( 'education_zone_pro_load_more_label', __( 'Load More Posts', 'education-zone-pro' ) );
    $loading    = get_theme_mod( 'education_zone_pro_loading_label', __( 'Loading...', 'education-zone-pro' ) );
    
    if( get_theme_mod( 'education_zone_pro_ed_ajax_search' ) || $pagination == 'load_more' || $pagination == 'infinite_scroll' ){
        
        // Add parameters for the JS
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        
        wp_enqueue_script( 'education-zone-pro-ajax' );
        
        wp_localize_script( 
            'education-zone-pro-ajax', 
            'education_zone_pro_ajax',
            array(
                'url'           => admin_url( 'admin-ajax.php' ),
                'startPage'     => $paged,
                'maxPages'      => $max,
                'nextLink'      => next_posts( $max, false ),
                'autoLoad'      => $pagination,
                'loadmore'      => $loadmore,
                'loading'       => $loading,
                'nomore'        => __( 'No more posts.', 'education-zone-pro' ),
                'plugin_url'    => plugins_url()
             )
        );
    }  
    if ( is_jetpack_activated( true ) ) {
            wp_enqueue_style( 'tiled-gallery', plugins_url() . '/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.css' );            
    } 
  	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  		wp_enqueue_script( 'comment-reply' );
  	}
}

/**
 * Enqueue google fonts
*/
function education_zone_pro_scripts_styles() {
    wp_enqueue_style( 'education-zone-pro-google-fonts', education_zone_pro_fonts_url(), array(), null );
}

if( ! function_exists( 'education_zone_pro_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
 */
function education_zone_pro_admin_scripts( $hook_suffix ){

    if( function_exists( 'wp_enqueue_media' ) )
    wp_enqueue_media();
    
    wp_enqueue_style( 'education-zone-pro-admin-style', get_template_directory_uri() . '/inc/css/admin.css', array(),
     EDUCATION_ZONE_PRO_THEME_VERSION );
    
    if( in_array( $hook_suffix, array( 'post.php', 'post-new.php' ) ) ){

        $cpt    = 'event';
        $screen = get_current_screen();

        if( is_object( $screen ) && $cpt == $screen->post_type  ){
            wp_enqueue_style( 'jquery-ui-datepicker-style' , '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');
            wp_enqueue_script( 'jquery-ui-datepicker' ); 
            wp_register_script( 'education-zone-pro-admin-js', get_template_directory_uri() . '/inc/js/admin.js', array('jquery'), EDUCATION_ZONE_PRO_THEME_VERSION );
            wp_enqueue_script( 'education-zone-pro-admin-js' ); 
        }
    }
    
}
endif;


if( ! function_exists( 'education_zone_pro_customizer_style_and_script' ) ) :
/** 
 * Registering and enqueuing scripts/stylesheets for Customizer controls.
 */ 
function education_zone_pro_customizer_style_and_script() {
    wp_enqueue_style( 'education-zone-pro-customizer-css', get_template_directory_uri() . '/inc/css/customizer.css' );
    wp_enqueue_script( 'education-zone-pro-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array('jquery'), EDUCATION_ZONE_PRO_THEME_VERSION, true  );
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function education_zone_pro_body_classes( $classes ) {
    
    $blog_layout   = get_theme_mod( 'education_zone_pro_blog_layout', 'default' ); //From Customizer
    $bg_color      = get_theme_mod( 'education_zone_pro_bg_color', '#ffffff' );
    $bg_image      = get_theme_mod( 'education_zone_pro_bg_image' );
    $bg_pattern    = get_theme_mod( 'education_zone_pro_bg_pattern', 'nobg' );
    $bg            = get_theme_mod( 'education_zone_pro_body_bg', 'image' );
    $enable_slider = get_theme_mod( 'education_zone_pro_ed_slider' );
    
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    
    // Adds a class for custom background Color
    if( $bg_color != '#ffffff' ){
        $classes[] = 'custom-background custom-background-color';
    }
    
    // Adds a class for custom background Image
    if( $bg == 'image' && $bg_image ){
        $classes[] = 'custom-background custom-background-image';
    }
    
    // Adds a class for custom background Pattern
    if( $bg == 'pattern' && $bg_pattern != 'nobg' ){
        $classes[] = 'custom-background custom-background-pattern';
    }
    
    if( $blog_layout === 'round' ){
        $classes[] = 'blog-round';
    }
    
    if( $blog_layout === 'square' ){
        $classes[] = 'blog-medium';
    }
    if ( ! $enable_slider ) {
        $classes[] = 'no-slider';
    }
    
    if( is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || ( 'product' === get_post_type() && ! is_search() ) ) && ! is_active_sidebar( 'shop-sidebar' ) ){
        $classes[] = 'full-width';
    }
    
    $classes[] = education_zone_pro_sidebar( false, true );
    
	return $classes;
}

if( ! function_exists( 'education_zone_pro_post_classes' ) ) :
/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function education_zone_pro_post_classes( $classes ) {
    
    $classes[] = 'latest_post';
    
    return $classes;
}
endif;

/**
 * Flush out the transients used in education_zone_pro_categorized_blog.
 */
function education_zone_pro_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'education_zone_pro_categories' );
}

if( ! function_exists( 'education_zone_pro_custom_js' ) ) :
/**
 * Custom JS
*/
function education_zone_pro_custom_js(){
    $custom_script = get_theme_mod( 'education_zone_pro_custom_script' );
    if( $custom_script ){
        echo '<script type="text/javascript">';
        echo wp_strip_all_tags( $custom_script );
        echo '</script>';
    }
}
endif;

if ( ! function_exists( 'education_zone_pro_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function education_zone_pro_excerpt_more() {
	return ' &hellip; ';
}
endif;

if ( ! function_exists( 'education_zone_pro_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function education_zone_pro_excerpt_length( $length ) {
	return 20;
}
endif;

if( ! function_exists( 'education_zone_pro_ajax_search' ) ) :
/**
 * AJAX Search results
 */ 
function education_zone_pro_ajax_search() {
    $query = $_REQUEST['q']; // It goes through esc_sql() in WP_Query
    $search_query = new WP_Query( array( 's' => $query, 'posts_per_page' => 3, 'post_status' => 'publish' )); 
    $search_count = new WP_Query( array( 's' => $query, 'posts_per_page' => -1, 'post_status' => 'publish' ));
    $search_count = $search_count->post_count;
    if ( !empty( $query ) && $search_query->have_posts() ) : 
        
        echo '<ul class="ajax-search-results">';
        while ( $search_query->have_posts() ) : $search_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>   
        <?php
        endwhile;
        echo '</ul>';
        
        echo '<div class="ajax-search-meta"><span class="results-count">'.$search_count.' '.__( 'Results', 'education-zone-pro' ).'</span><a href="'. esc_url( get_search_link( $query ) ) .'" class="results-link">'.__( 'Show all results.', 'education-zone-pro' ).'</a></div>';
    else:
        echo '<div class="no-results">'.__( 'No results found.', 'education-zone-pro' ).'</div>';
    endif;
    
    wp_die(); // this is required to terminate immediately and return a proper response
}
endif;

if( ! function_exists( 'education_zone_pro_exclude_cat' ) ) :
/**
 * Exclude post with Category from blog and archive page. 
*/
function education_zone_pro_exclude_cat( $query ){
    $cat = get_theme_mod( 'education_zone_pro_exclude_categories' );
    
    if( $cat && ! is_admin() && $query->is_main_query() ){
        $cat = array_diff( array_unique( $cat ), array('') );
        if( $query->is_home() || $query->is_archive() ) {
      $query->set( 'category__not_in', $cat );
    }
    }    
}
endif;

if( ! function_exists( 'education_zone_pro_custom_category_widget' ) ) :
/** 
 * Exclude Categories from Category Widget 
*/ 
function education_zone_pro_custom_category_widget( $arg ) {
    $cat = get_theme_mod( 'education_zone_pro_exclude_categories' );
    
    if( $cat ){
        $cat = array_diff( array_unique( $cat ), array('') );
        $arg["exclude"] = $cat;
    }
    return $arg;
}
endif;

if( ! function_exists( 'education_zone_pro_exclude_posts_from_recentPostWidget_by_cat' ) ) :
/**
 * Exclude post from recent post widget of excluded catergory
 * 
 * @link http://blog.grokdd.com/exclude-recent-posts-by-category/
*/
function education_zone_pro_exclude_posts_from_recentPostWidget_by_cat( $arg ){
    
    $cat = get_theme_mod( 'education_zone_pro_exclude_categories' );
   
    if( $cat ){
        $cat = array_diff( array_unique( $cat ), array('') );
        $arg["category__not_in"] = $cat;
    }
    
    return $arg;    
}
endif;

if( ! function_exists( 'education_zone_pro_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function education_zone_pro_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'education-zone-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'education-zone-pro' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'education-zone-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;

if( ! function_exists( 'education_zone_pro_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function education_zone_pro_change_comment_form_defaults( $defaults ){
    
    // Change the "cancel" to "I would rather not comment" and use a span instead
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'education-zone-pro' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    return $defaults;
    
}
endif;

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function education_zone_pro_theme_updater() {
    require( get_template_directory() . '/updater/theme-updater.php' );
}

if( ! function_exists( 'education_zone_pro_og_header' ) ) :
/**
 * Add og meta tags in header for social sharing
*/
function education_zone_pro_og_header() {
    if( is_single() ){
        global $post;
        
        $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
        if( $post_thumbnail_id ){
            $featured_image = wp_get_attachment_image_url( $post_thumbnail_id, 'education-zone-pro-featured-post' );
        }
        
        if( has_excerpt( $post->ID ) ){
            $description = $post->post_excerpt;
        }
        else {
            $description = education_zone_pro_truncate( $post->post_content, 250 );
        }
    
        if( $post_thumbnail_id && $featured_image && $description ){ ?>
            <meta property="og:url"         content="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" />
            <meta property="og:type"        content="article" />
            <meta property="og:title"       content="<?php echo esc_html( $post->post_title )?>" />
            <meta property="og:description" content="<?php echo esc_html( $description ); ?>" />
            <meta property="og:image"       content="<?php echo esc_url( $featured_image ); ?>" />
        <?php
        }
    }
}
endif;


if( ! function_exists( 'education_zone_pro_page_attribute_post' ) ):
/**
 * Add Page attribute in post for post ordering
*/
function education_zone_pro_page_attribute_post(){
    add_post_type_support( 'team', 'page-attributes' );
    add_post_type_support( 'event', 'page-attributes' ); 
    add_post_type_support( 'course', 'page-attributes' );       
}
endif;
add_action( 'init', 'education_zone_pro_page_attribute_post' );

if( ! function_exists( 'education_zone_pro_columns_head' ) ) :
/**
 * Adds a `Featured Image` column header in the item list admin page.
 *
 * @param array $defaults
 * @return array
 */
function education_zone_pro_columns_head( $defaults ){
       
    if( get_post_type() === 'team' ){
        $defaults['menu_order'] = __( 'Order', 'education-zone-pro' );
    }

    if( get_post_type() === 'event' ){
        $defaults['event_order'] = __( 'Order', 'education-zone-pro' );
    }

    if( get_post_type() === 'course' ){
        $defaults['course_order'] = __( 'Order', 'education-zone-pro' );
    }
    
    return $defaults;
}
endif;
add_filter( 'manage_posts_columns', 'education_zone_pro_columns_head' );

if( ! function_exists( 'education_zone_pro_columns_content' ) ) :
/**
 * @param string $column_name The name of the column to display.
 * @param int $post_ID The ID of the current post.
 */
function education_zone_pro_columns_content( $column_name, $post_ID ){
    global $post;
    
    if( $column_name == 'menu_order' ){
        echo $post->menu_order;
    } 
    if( $column_name == 'event_order' ){
        echo $post->menu_order;
    }
    if( $column_name == 'course_order' ){
        echo $post->menu_order;
    }
}
endif;
add_action( 'manage_posts_custom_column', 'education_zone_pro_columns_content', 10, 2 );

if( ! function_exists( 'education_zone_pro_order_column_sortable' ) ) :
/**
* make column sortable
*/
function education_zone_pro_order_column_sortable( $columns ){
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter( 'manage_edit-team_sortable_columns', 'education_zone_pro_order_column_sortable' );
endif;

if( ! function_exists( 'education_zone_pro_event_order_column_sortable' ) ) :
/**
* make column sortable
*/
function education_zone_pro_event_order_column_sortable( $columns ){
    $columns['event_order'] = 'menu_order';
    return $columns;
}
add_filter( 'manage_edit-event_sortable_columns', 'education_zone_pro_event_order_column_sortable' );
endif;

if( ! function_exists( 'education_zone_pro_course_order_column_sortable' ) ) :
/**
* make column sortable
*/
function education_zone_pro_course_order_column_sortable( $columns ){
    $columns['course_order'] = 'menu_order';
    return $columns;
}
add_filter( 'manage_edit-course_sortable_columns', 'education_zone_pro_course_order_column_sortable' );
endif;

if( ! function_exists( 'education_zone_pro_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function education_zone_pro_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'education-zone-pro-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = education_zone_pro_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( education_zone_pro_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => get_permalink( $post->ID )
            ),
            "headline"  => get_the_title( $post->ID ),
            "image"     => array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            ),
            "datePublished" => get_the_time( DATE_ISO8601, $post->ID ),
            "dateModified"  => get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => education_zone_pro_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "publisher" => array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            ),
            "description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
        );

        if ( has_post_thumbnail( $post->ID ) ) :
            $args['image'] = array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            );
        endif;

        if ( ! empty( $custom_logo_id ) ) :
            $args['publisher'] = array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">' , PHP_EOL;
        if ( version_compare( PHP_VERSION, '5.4.0' , '>=' ) ) {
            echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) , PHP_EOL;
        } else {
            echo wp_json_encode( $args ) , PHP_EOL;
        }
        echo '</script>' , PHP_EOL;
    }
}
endif;
add_action( 'wp_head', 'education_zone_pro_single_post_schema' );