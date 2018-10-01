<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Education_Zone_Pro
 */

if( ! function_exists( 'education_zone_pro_doctype_cb' ) ) :
/**
 * Doctype Declaration
*/
function education_zone_pro_doctype_cb(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;

if( ! function_exists( 'education_zone_pro_head' ) ) :
/**
 * Before wp_head
*/
function education_zone_pro_head(){ ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;

if( ! function_exists( 'education_zone_pro_fb_page_box' ) ) :
/**
 * Callback to add Facebook Page Plugin JS
*/
function education_zone_pro_fb_page_box(){
    if( is_active_widget( false, false, 'education_zone_pro_facebook_page_widget' ) ){ ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <?php }
}
endif;

if( ! function_exists( 'education_zone_pro_page_start' ) ) :
/**
 * Page Start
*/
function education_zone_pro_page_start(){
    ?>
    <div id="page" class="site">
    <?php
}
endif;

if( ! function_exists( 'education_zone_pro_dynamic_header' ) ) :
/**
 * Dynamic Header 
*/
function education_zone_pro_dynamic_header(){
    
    $header_array = array( 'one', 'two', 'three', 'four', 'five', 'six' );
    $header = get_theme_mod( 'education_zone_pro_header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'header/' . $header );
    } 
}
endif;

if( ! function_exists( 'education_zone_pro_page_header' ) ) :
/**
 * After Header
 *
 */
function education_zone_pro_page_header() {
    if( ! is_page_template('templates/template-home.php') ){
    ?>
    <div class="page-header">
        <div class="container">
    
            <?php
            
            if( is_archive() ) the_archive_title( '<h1 class="page-title">', '</h1>' ); 
            
            if( is_search() ){ 
                global $wp_query;    
                ?>
                <h1 class="page-title"><?php printf( esc_html__( '%1$s Result for "%2$s"', 'education-zone-pro' ), $wp_query->found_posts, get_search_query() ); ?></h1>                
                <?php                
            }
            
            if( is_home() ){ ?>
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            <?php 
            }
            
            if( is_page() ){
                the_title( '<h1 class="page-title">', '</h1>' );
            }

            if( is_singular( 'event' ) ){
                the_title( '<h1 class="page-title">', '</h1>' );
            }
            
            if( is_404() ){ ?>
                <h1 class="page-title"><?php echo esc_html__( '404 Error - Page not Found', 'education-zone-pro' ); ?></h1>
            <?php                
            }
        
           do_action( 'education_zone_pro_breadcrumbs' ); ?>
        
        </div>
    </div>
   
<?php } // end education_zone_pro_page_header()
}
endif;



if( ! function_exists( 'education_zone_pro_breadcrumb' ) ) :
/**
 * Custom Bread Crumb
 *
 * @link http://www.qualitytuts.com/wordpress-custom-breadcrumbs-without-plugin/
 */
function education_zone_pro_breadcrumb() {
    
 global $post;
    
    $post_page   = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front  = get_option( 'show_on_front' ); //What to show on the front page
    $delimiter   = get_theme_mod( 'education_zone_pro_breadcrumb_separator', __( '>', 'education-zone-pro' ) ); // delimiter between crumbs
    $home        = get_theme_mod( 'education_zone_pro_breadcrumb_home_text', __( 'Home', 'education-zone-pro' ) ); // text for the 'Home' link
    $before      = '<span class="current">'; // tag before the current crumb
    $after       = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'education_zone_pro_ed_breadcrumb' ) ){
        
        echo '<div id="crumbs"><a href="' . esc_url( home_url() ) . '">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
        if( is_home() && ! is_front_page() ){
            
            echo $before . esc_html( single_post_title( '', false ) ) . $after;
            
        }elseif( is_category() ){
            
            $thisCat = get_category( get_query_var( 'cat' ), false );
            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '">' . esc_html( $p->post_title ) . '</a> ';  
            }
            
            if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
            echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
        
        }elseif( is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
        
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );    
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                    }
                }
            }           
            echo $before . esc_html( $current_term->name ) . $after;
            
        } elseif( is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
                return;
            }
            $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
    
            if ( ! $_name ) {
                $product_post_type = get_post_type_object( 'product' );
                $_name = $product_post_type->labels->singular_name;
            }
            echo $before . esc_html( $_name ) . $after;
            
        }elseif( is_tag() ){
            
            echo $before . esc_html( single_tag_title( '', false ) ) . $after;
     
        }elseif( is_author() ){
            
            global $author;
            $userdata = get_userdata( $author );
            echo $before . esc_html( $userdata->display_name ) . $after;
     
        }elseif( is_search() ){
            
            echo $before . esc_html__( 'Search Results for "', 'education-zone-pro' ) . esc_html( get_search_query() ) . esc_html__( '"', 'education-zone-pro' ) . $after;
        
        }elseif( is_day() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo $before . esc_html( get_the_time( 'd' ) ) . $after;
        
        }elseif( is_month() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo $before . esc_html( get_the_time( 'F' ) ) . $after;
        
        }elseif( is_year() ){
            
            echo $before . esc_html( get_the_time( 'Y' ) ) . $after;
    
        } elseif ( is_single() && !is_attachment() ) {
            
            if( is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                /** NEED TO CHECK THIS PORTION WHILE INTEGRATION WITH WOOCOMMERCE */
                if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                        }
                    }
                    echo ' <a href="' . esc_url( get_term_link( $main_term ) ) . '">' . esc_html( $main_term->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                
                echo $before . esc_html( get_the_title() ) . $after;
                
            }elseif( get_post_type() != 'post' ){ //For Custom Post Type
                 
                if( ( get_post_type() != 'team' ) && ( get_post_type() != 'testimonial' ) && ( get_post_type() != 'course' ) && ( get_post_type() != 'event' ) ){ //excluding archive for our CPTs.
                  
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo '<a href="' . esc_url( home_url( '/' . $slug['slug'] . '/' ) ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                echo $before . esc_html( get_the_title() ) . $after;
                
            }else{ //For Post
                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '">' . esc_html( $p->post_title ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';  
                }
                
                if( is_array( $cat_object ) ){ //Getting category hierarchy if any
        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object )
                    {
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term = $key;
                            $potential_parent = $object->term_id;
                        }
                    }
                    
                    $cat = $cat_object[$use_term];
              
                    $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                    $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats ); //NEED TO CHECK THIS
                    echo $cats;
                }
    
                echo $before . esc_html( get_the_title() ) . $after;
                
            }
        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            
            $post_type = get_post_type_object( get_post_type() );
            echo $before . esc_html( $post_type->labels->singular_name ) . $after;
        
        }elseif( is_attachment() ){
            
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID ); 
            if( $cat ){
                $cat = $cat[0];
                echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo  $before . esc_html( get_the_title() ) . $after;
        
        }elseif( is_page() && !$post->post_parent ){
            
            echo $before . esc_html( get_the_title() ) . $after;
    
        }elseif( is_page() && $post->post_parent ){
            
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while( $parent_id ){
                $page = get_page( $parent_id );
                $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo $breadcrumbs[$i];
                if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
        
        }elseif ( is_404() ){
            echo $before . esc_html__( '404 Error - Page not Found', 'education-zone-pro' ) . $after;
        }
        
        if( get_query_var('paged') ) echo __( ' (Page', 'education-zone-pro' ) . ' ' . get_query_var('paged') . __( ')', 'education-zone-pro' );
        
        echo '</div>';
        
        
    }
   
} // end education_zone_pro_breadcrumb()
endif;
if( ! function_exists( 'education_zone_pro_slider' ) ) : 
/**
 * Callback for Banner Slider 
 */
function education_zone_pro_slider(){

    if( is_front_page() && get_theme_mod( 'education_zone_pro_ed_slider' ) ){
    
        $slider_caption    = get_theme_mod( 'education_zone_pro_slider_caption', '1' );
        $slider_type       = get_theme_mod( 'education_zone_pro_slider_type', 'post' ); 
        $slider_post_one   = get_theme_mod( 'education_zone_pro_slider_post_one' );
        $slider_post_two   = get_theme_mod( 'education_zone_pro_slider_post_two' );
        $slider_post_three = get_theme_mod( 'education_zone_pro_slider_post_three' );
        $slider_post_four  = get_theme_mod( 'education_zone_pro_slider_post_four' );
        $slider_post_five  = get_theme_mod( 'education_zone_pro_slider_post_five' );
        $slider_cat        = get_theme_mod( 'education_zone_pro_slider_cat' );
        $slider_slides     = get_theme_mod( 'education_zone_pro_slider_slides' );
        $slider_readmore   = get_theme_mod( 'education_zone_pro_slider_readmore', __( 'Learn More', 'education-zone-pro' ) );
        $slider_full_img   = get_theme_mod( 'education_zone_pro_slider_full_image' );
        
        $slider_posts      = array( $slider_post_one, $slider_post_two, $slider_post_three, $slider_post_four, $slider_post_five );
        $slider_posts      = array_diff( array_unique( $slider_posts ), array('') );

        // Banner options
        $title               = get_theme_mod( 'education_zone_pro_banner_title', __( 'Better Education for a Better World', 'education-zone-pro' ) );
        $description         = get_theme_mod( 'education_zone_pro_banner_description', __( 'Maecenas perspiciatis eleifend mollitia esse etiam rem harum? Sunt incididunt, sollicitudin earum anim quidem laoreet nibh, facilisis eiusmod!', 'education-zone-pro' ) );
        $link_one_label      = get_theme_mod( 'education_zone_pro_banner_link_one_label', __( 'Get Started Now', 'education-zone-pro' ) );
        $link_one_url        = get_theme_mod( 'education_zone_pro_banner_link_one_url', '#' );
        $link_two_label      = get_theme_mod( 'education_zone_pro_banner_link_two_label', __( 'Enquiry', 'education-zone-pro' ) );
        $link_two_url        = get_theme_mod( 'education_zone_pro_banner_link_two_url', '#' );
        $class               = has_header_video() ? ' video-banner' : '';

        
        if( $slider_full_img ){
            $img_size = 'full';
        }else{
            $img_size = 'education-zone-pro-banner';
        }

        if( 'static_banner' == $slider_type ){ 
                                                                             
            echo '<div id="banner_section" class="banner">';

                if( has_custom_header() ){

                    echo '<div class="banner-wrapper'. esc_attr( $class ).'">';
                    the_custom_header_markup(); ?>                                                                
                    <div class="banner-text">
                        <div class="container">
                            <div class="text">
                                <?php
                                    if ( $title || $description ){
                                        if ( $title ) echo '<h2 class="title">'. esc_html( $title ).'</h2>';
                                        if ( $description ) echo '<p class="wow">'. esc_html( $description ) .'</p>';
                                    }

                                    if ( ( $link_one_label && $link_one_url ) || ( $link_two_label && $link_two_url ) ) {
                                        ?>
                                        <div class="btn-holder">
                                            <?php
                                                if ( $link_one_label && $link_one_url ) echo  '<a href="'. esc_url( $link_one_url ) .'" class="btn-free-inquiry">'. esc_html( $link_one_label ) .'</a>'; 
                                                if ( $link_two_label && $link_two_url ) echo '<a href="'. esc_url( $link_two_url ) .'" class="btn-view-service">'. esc_html( $link_two_label ) .'</a>';
                                            ?>
                                        </div>
                                    <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div><!-- .banner-wrapper -->
                <?php } ?>
            </div><!-- .banner -->
        <?php
        }elseif( $slider_type == 'post' || $slider_type == 'cat' ){

            $args = array(); // Initialize an empty array

            if( $slider_type == 'post' && $slider_posts ){
                $args = array( 
                    'post_type'           => array( 'post', 'page' ),
                    'post_status'         => 'publish',
                    'posts_per_page'      => -1,                    
                    'post__in'            => $slider_posts, 
                    'orderby'             => 'post__in',
                    'ignore_sticky_posts' => true
                );
            }elseif ( $slider_type == 'cat' && $slider_cat ) {
                $args = array( 
                    'post_type'           => 'post', 
                    'post_status'         => 'publish',
                    'posts_per_page'      => -1,                    
                    'cat'                 => $slider_cat,
                    'ignore_sticky_posts' => true
                );
            }

            if( ! empty( $args ) ){

                $qry = new WP_Query( $args );
                
                if( $qry->have_posts() ){ ?>
                    <div id="banner_section" class="banner">
                        <div id="banner-slider" class="owl-carousel owl-theme">
                            <?php
                            while( $qry->have_posts() ){
                                $qry->the_post();
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), $img_size );
                            ?>
                                <?php if( has_post_thumbnail() ){?>
                                <div>
                                    <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>" />
                                    <?php if( $slider_caption ){ ?>
                                    <div class="banner-text">
                                        <div class="container">
                                            <div class="text">                                              
                                                <span><?php the_title(); ?></span>
                                                <?php if( $slider_readmore ){ ?>
                                                <a class="course-link" href="<?php the_permalink(); ?>"><?php echo esc_html( $slider_readmore );?></a>
                                                <?php } ?>                                        
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();       
            }else{
                echo '<div class="banner"></div>';
            } 
            //end of post / category  slider            
        }elseif( $slider_type == 'custom' && $slider_slides ){ //end of post and cat slider ?>
            <div id="banner_section" class="banner">
                <div id="banner-slider" class="owl-carousel owl-theme">
                    <?php
                    foreach( $slider_slides as $slides ){
                        if( $slides['thumbnail'] ){
                            $image = wp_get_attachment_image_src( $slides['thumbnail'], $img_size );
                            if( $image ){
                            ?>

                            <div>
                                <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php esc_attr( $slides['title'] ); ?>" />
                                <?php if( $slider_caption && ( $slides['title'] || ( $slides['link'] && $slider_readmore ) ) ){ ?>
                                <div class="banner-text">
                                    <div class="container">
                                        <div class="text">
                                            <?php 
                                            if( $slides['title'] ) echo '<span>' . esc_html( $slides['title'] ) . '</span>';
                                            if( $slides['link'] && $slider_readmore ){ ?>
                                            <a href="<?php echo esc_url( $slides['link'] ); ?>" class="course-link"><?php echo esc_html( $slider_readmore ); ?></a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>                                
                                <?php }?>
                            </div>
                            <?php        
                            }        
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }else{
            echo '<div class="banner"></div>';
        } // end of custom slider  
        
    }
   
}
endif;


if( ! function_exists( 'education_zone_pro_content_start' ) ) :
/**
 * Content Start
*/
function education_zone_pro_content_start(){
 
    if( !is_page_template( 'templates/template-home.php' ) ){ 
        $sidebar = education_zone_pro_sidebar( true ); 
        $class = is_404() ? 'not-found' : 'row' ;    
        ?>
        <div id="content" class="site-content">
            <div class="container"> 
            <?php if( $sidebar || is_404() ): ?>
                <div class="<?php echo esc_attr( $class ); ?>"> 
            <?php endif; ?>             
    <?php 
    } 
}
endif;
if( ! function_exists( 'education_zone_pro_page_content_image' ) ) :
/**
 * Page Featured Image
 * 
 * @since 1.0.1
*/
function education_zone_pro_page_content_image(){

    if( has_post_thumbnail() && get_theme_mod( 'education_zone_pro_ed_featured_image', '1' ) )
    
    education_zone_pro_sidebar( true ) ? the_post_thumbnail( 'education-zone-pro-image' ) : the_post_thumbnail( 'education-zone-pro-image-full' );    

}
endif;

if( ! function_exists( 'education_zone_pro_post_content_image' ) ) :
/**
 * Post Featured Image
 * 
 * @since 1.0.1
*/
function education_zone_pro_post_content_image(){
    
    $blog_layout  = get_theme_mod( 'education_zone_pro_blog_layout', 'default' ); //From Customizer
    $img_size     = '';
    
    if( $blog_layout == 'round' || $blog_layout == 'square' ) {
        $img_size = 'education-zone-pro-layout-post';
    }else{
        $img_size = education_zone_pro_sidebar( true ) ? 'education-zone-pro-image' : 'education-zone-pro-image-full';
    }

    if( has_post_thumbnail() ){
        
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        
            the_post_thumbnail( $img_size );   

        echo '</a>';        
    }
}
endif;

if( ! function_exists( 'education_zone_pro_tag_share' ) ) :
/**
 * Displays Post Tags and Sharing buttons
*/
function education_zone_pro_tag_share(){
    $ed_share = get_theme_mod( 'education_zone_pro_ed_social_sharing' );
    $shares   = get_theme_mod( 'education_zone_pro_social_share' );    
    ?>
    <div class="tag-share">
        <?php 
        
            education_zone_pro_cat_tag();

            if( $ed_share && $shares ){ ?>
                <ul class="share-links">
                <?php 
                    esc_html_e( 'Share:', 'education-zone-pro' ); 
                    foreach( $shares as $share ){
                        education_zone_pro_get_social_share( $share );
                    }  
                ?>
                </ul>
                <?php 
            } 
        ?>
    </div>
    <?php        
} 
endif;


if( ! function_exists( 'education_zone_pro_post_author' ) ) :
/**
 * Author Bio
 * 
*/
function education_zone_pro_post_author(){
    if( get_theme_mod( 'education_zone_pro_ed_author_bio', '1' ) && get_the_author_meta( 'description' ) ){
    ?>
    <div class="author-section">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 105 ); ?>
        <div class="text">
            <span class="name"><?php echo esc_html( get_the_author() ); ?></span>
            <?php echo wpautop( wp_kses_data( get_the_author_meta( 'description' ) ) ); ?>
        </div>
    </div>
    <?php  
    }  
}
endif;

if( ! function_exists( 'education_zone_pro_get_comment_section' ) ) :
/**
 * Comment template
 * 
 * @since 1.0.1
*/
function education_zone_pro_get_comment_section(){
    // If comments are open or we have at least one comment, load up the comment template.
    if ( get_theme_mod( 'education_zone_pro_ed_comments', '1' ) && ( comments_open() || get_comments_number() ) ) :
        comments_template();
    endif;
}
endif;


if( ! function_exists( 'education_zone_pro_content_end' ) ) :
/**
 * Content End
*/
function education_zone_pro_content_end(){
    if( ! is_page_template( array( 'templates/template-home.php' ) ) ){

        $sidebar = education_zone_pro_sidebar( true ); 
        if( $sidebar )  echo '</div>'; /* .row */ ?>
            </div><!-- #content -->
        </div><!-- .container -->
    <?php    
    }
}
endif;

if( ! function_exists( 'education_zone_pro_footer_start' ) ) :
/**
 * Footer Start
*/
function education_zone_pro_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
        <div class="container">
    <?php
}
endif;

if( ! function_exists( 'education_zone_pro_footer_top' ) ) :
/**
 * Footer Top
*/
function education_zone_pro_footer_top(){
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) { ?>
        <div class="widget-area">
            <div class="row">
                    
                <?php if( is_active_sidebar( 'footer-one') ) { ?>
                    <div class="col"><?php dynamic_sidebar( 'footer-one' ); ?></div>                        
                <?php } ?> 
                    
                <?php if( is_active_sidebar( 'footer-two') ) { ?>
                    <div class="col"><?php dynamic_sidebar( 'footer-two' ); ?></div>                        
                <?php } ?> 
                    
                <?php if( is_active_sidebar( 'footer-three') ) { ?>
                    <div class="col"><?php dynamic_sidebar( 'footer-three' ); ?></div>                        
                <?php } ?>
                                        
                </div>
            </div>
    <?php } 
}
endif;

if( ! function_exists( 'education_zone_pro_footer_credit' ) ) :
/**
 * Footer Credits 
*/
function education_zone_pro_footer_credit(){ 

    $ed_social_link   = get_theme_mod( 'education_zone_pro_ed_social_footer' ); // From customizer
    $footer_copyright = get_theme_mod( 'education_zone_pro_footer_copyright' );
    $ed_author_link   = get_theme_mod( 'education_zone_pro_ed_author_link' );
    $ed_wp_link       = get_theme_mod( 'education_zone_pro_ed_wp_link' ); 
    $text = ''; ?>

    <div class="site-info"> 
        <?php 
        if( $ed_social_link ) education_zone_pro_get_social_links(); 

        if( $footer_copyright ){
        $text .= '<span>' .wp_kses_post( education_zone_pro_apply_footer_shortcode( $footer_copyright ) ) . '</span>';
        }else{
            $text .= '<span>';
            $text .=  esc_html__( 'Copyright &copy;', 'education-zone-pro' ) . esc_html( date_i18n('Y') ); 
            $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.</span>';
        }

        if( ! $ed_author_link || ! $ed_wp_link ) $text .= '<span class="by">';
    
        if( ! $ed_author_link ){
            $text .= '<a href="' . esc_url( 'http://raratheme.com/wordpress-themes/education-zone-pro/' ) .'" rel="author" target="_blank">' . esc_html__( 'Education Zone Pro by Rara Theme', 'education-zone-pro' ) . '</a>. ';
        }
        
        if( ! $ed_wp_link ){
            $text .= sprintf( esc_html__( 'Powered by: %s', 'education-zone-pro' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'education-zone-pro' ) ) .'" target="_blank">WordPress.</a>' );
        }
        
        if( ! $ed_author_link || ! $ed_wp_link ) $text .= '</span>'; 
        
        echo apply_filters( 'education_zone_pro_footer_text', $text );

        if ( function_exists( 'the_privacy_policy_link' ) ) {
            the_privacy_policy_link( '<span class="policy_link">', '</span>');
        }

        ?>
    
    </div>

    <?php 
}
endif;

if( ! function_exists( 'education_zone_pro_footer_end' ) ) :
/**
 * Footer End
*/
function education_zone_pro_footer_end(){
    ?>
    </div>
    </footer><!-- #colophon -->
    <?php
}
endif;

if( ! function_exists( 'education_zone_pro_back_to_top' ) ) :
/**
 * Back to Top
*/
function education_zone_pro_back_to_top(){
    ?>
    <div id="rara-top"><i class="fa fa-angle-up"></i></div>
    <?php
}
endif;

if( ! function_exists( 'education_zone_pro_page_end' ) ) :
/**
 * Page End
*/
function education_zone_pro_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;

if( ! function_exists( 'education_zone_pro_apply_footer_shortcode' ) ) :
    /**
     * Function to add shortcode in footer content
     */
    function education_zone_pro_apply_footer_shortcode( $string ) {
        if ( empty( $string ) ) {
            return $string;
        }
        $search = array( '[the-year]', '[the-site-link]' );
        $replace = array(
            date_i18n( __( 'Y', 'education-zone-pro' ) ),
            '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>',
        );
        $string = str_replace( $search, $replace, $string );
        return $string;
    }
endif;