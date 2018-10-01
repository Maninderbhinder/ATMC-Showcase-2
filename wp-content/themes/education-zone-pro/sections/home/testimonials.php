<?php 
/**
 * 
 * Testimonial Section
*/

$title       = get_theme_mod( 'education_zone_pro_testimonial_section_title' );
$description = get_theme_mod( 'education_zone_pro_testimonial_section_content' );
$number      = get_theme_mod( 'education_zone_pro_testimonial_number', '3' );
$bg_image    = get_theme_mod( 'education_zone_pro_testimonial_background_image' );
$view_all    = get_theme_mod( 'education_zone_pro_testimonial_viewall_label', __( 'View All Testimonial', 'education-zone-pro' ) );
$link        = get_theme_mod( 'education_zone_pro_testimonial_viewall_link' );
 ?>

<section class="student-stories" <?php if( $bg_image ) echo 'style="background: url(' . $bg_image . '); background-size: cover; background-repeat: no-repeat; background-position: center;"'; ?>>
    <div class="image-wrapper">
    	<div class="container">

            <?php 
            if( $title || $description){ ?>
    			<div class="header-part">
    				<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                    <?php 
                    if($description){
                        echo wpautop( wp_kses_post( $description ) );
                    } ?>
                </div>
    	    <?php 
            }
            
            $args = array(
                'posts_per_page' => $number,
                'post_type' => 'testimonial', 
                'ignore_sticky_posts' => true,              
            );		  
    		  
            $qry = new WP_Query( $args );
            if( $qry->have_posts() ){ ?>
                <div class="testimonial-slide owl-carousel">
                    <?php 
                    while( $qry->have_posts() ){ $qry->the_post(); ?>
                        <div>
                            <blockquote>
                                <?php the_content(); ?>
                                <cite>
                                    <div class="text">
                                        <?php if(has_post_thumbnail()) the_post_thumbnail( 'education-zone-pro-testimonial' ); ?>
                                        <span><?php the_title(); ?></span>
                                    </div>
                                </cite>
                            </blockquote>
                        </div class="item">
                    <?php 
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <?php 
                if( $view_all && $link ){ ?>
                    <div class="btn-holder"><a href="<?php echo esc_url( $link ); ?>" class="learn-more"><?php echo esc_html( $view_all ); ?></a></div>
            <?php } 
            } 
            ?>        
        </div>
    </div>
</section>
