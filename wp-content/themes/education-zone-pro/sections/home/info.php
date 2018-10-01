<?php
/**
 * Info Section
*/
?>
<section class="information">
    <div class="container">
        <?php
            //$excerpt_char = get_theme_mod( 'education_zone_pro_post_no_of_char', 200 ); //From Customizer
            $info_type    = get_theme_mod( 'education_zone_pro_info_type', 'post' );
            $post_one     = get_theme_mod( 'education_zone_pro_info_post_one' ); 
            $post_two     = get_theme_mod( 'education_zone_pro_info_post_two' ); 
            $post_three   = get_theme_mod( 'education_zone_pro_info_post_three' ); 
            $post_four    = get_theme_mod( 'education_zone_pro_info_post_four' ); 
            $info_row     = get_theme_mod( 'education_zone_pro_info' ); 
           
            $info_posts = array( $post_one, $post_two, $post_three, $post_four );
            $info_posts = array_diff( array_unique( $info_posts ), array('') );
            if( $info_posts ){
            ?>
            <ul class="thumb-text">
                <?php
                if( $info_type == 'post' && $info_posts ){     
                
                    $args = array(
                        'post_type'           => array( 'post', 'page' ),
                        'post_status'         => 'publish',
                        'posts_per_page'      => -1,                    
                        'post__in'            => $info_posts, 
                        'orderby'             => 'post__in',
                        'ignore_sticky_posts' => true

                    );
                    
                    $info_qry = new WP_Query( $args );
                    if( $info_qry->have_posts() ){ 
                        $i = 1;
                        while( $info_qry->have_posts() ){ 
                            $info_qry->the_post();?> 
                            <li>
                                <div class="box-<?php echo esc_attr( $i );?>">
                                    <?php if( has_post_thumbnail() ){ ?>
                                    <span><?php the_post_thumbnail( 'thumbnail' ); ?></span>
                                    <?php } ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php 
                                        if( has_excerpt() ){
                                            the_excerpt();        
                                        }else{
                                            echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), 100, '...', false, false ) ) ) );        
                                        }
                                    ?>
                                </div>
                            <?php 
                            $i++; 
                        }
                        wp_reset_postdata();
                    }
                }elseif( $info_type == 'custom' && $info_row ){ 
                    $i = 1;
                    foreach( $info_row as $info ){ ?>

                        <li>
                            <div class="box-<?php echo esc_attr( $i );?>">
                                <?php 
                                if( $info['thumbnail'] ){
                                    $image = wp_get_attachment_image_src( $info['thumbnail'] );
                                    if( $image ){ ?>
                                        <span><img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php esc_attr( $info['title'] ); ?>" /></span>
                                    <?php 
                                    }
                                }
                                ?>
                                <h3>
                                    <?php 
                                    if( $info['link'] ) echo '<a href=" ' . esc_url( $info['link'] ) . ' " >';
                                      if( $info['title'] ) echo  esc_html( $info['title'] );
                                    if( $info['link'] )  echo '</a>'; ?>
                                </h3>

                                <?php if( $info['content'] ) echo wpautop( wp_kses_post( $info['content'] ) ); ?>
                            </div>
                        <!-- </li> -->
                 
                    <?php 
                    $i++;
                    }
                  }
                ?>
            </ul>
            <?php } ?>
    </div>
</section>
