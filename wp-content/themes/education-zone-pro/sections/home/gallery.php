<?php 
/**
 * 
 * Gallary Section
*/
$gallery_post      = get_theme_mod('education_zone_pro_gallery_post');
$gallery_as_slider = get_theme_mod( 'education_zone_pro_gallery_as_slider' );

    $gallery_qry = new WP_Query( 
        array(
            'post_type' => array( 'post', 'page'),
            'p'  => $gallery_post,
            'posts_per_page' => -1,
            )
        );

    if( $gallery_post  &&  $gallery_qry->have_posts()){
        
        while( $gallery_qry->have_posts()){ $gallery_qry->the_post(); 
            if( $gallery_as_slider ){ ?>
                <div class="gallery-slider">
                    <h2 class="section-title"><?php the_title(); ?></h2>
                    <div class="slider-gallery">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php }else{ ?>
                <section class="photo-gallery">
                    <div class="container">
                        <div class="header-part">
                            <h2 class="section-title"><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section> 
            <?php 
            }
        } 
        wp_reset_postdata();
    } ?>
