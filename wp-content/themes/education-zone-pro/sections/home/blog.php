<?php
/**
 * 
 * Blog Section 
*/ 
    $ed_bdate = get_theme_mod( 'education_zone_pro_ed_blog_date', '1' );
    $title    = get_theme_mod( 'education_zone_pro_blog_section_title' );
    $content  = get_theme_mod( 'education_zone_pro_blog_section_content' );
    $readmore = get_theme_mod( 'education_zone_pro_blog_section_readmore', __( 'Read More', 'education-zone-pro' ) );
    $cat      = get_theme_mod( 'education_zone_pro_exclude_categories' );
    $view_all = get_theme_mod( 'education_zone_pro_blog_viewall_label', __( 'View All Blog', 'education-zone-pro' ) );
    $link     = get_theme_mod( 'education_zone_pro_blog_viewall_link' );


    if( $cat ) $cat = array_diff( array_unique( $cat ), array('') );
     
    $qry = new WP_Query( array( 
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => 1,
        'ignore_sticky_posts' => true,
        'category__not_in'    => $cat,
        'tax_query' => array(
                array(
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => array( 'post-format-gallery' ),
                'operator' => 'NOT IN',
            )
        ),   
    ) ); ?>
    
    <section class="latest-events">
        <div class="container">
        
            <?php 
            if( $title || $content ){ ?>

                <div class="header-part">
                    <?php if( $title ){ ?>
                        <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                    <?php } ?>
                    
                    <?php 
                    if( $content ){ 
                        echo wpautop( wp_kses_post( $content ) );
                    } 
                    ?>
                </div>
            <?php 
            } ?>

        	<div class="row">
        	   <?php 
            
                if( $qry->have_posts() ){
                    while( $qry->have_posts() ){ 
                        $qry->the_post(); ?>
                            <div class="col-1">
                                <article class="post">
                                
                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <?php 
                                        if( has_post_thumbnail() ){
                                            the_post_thumbnail( 'education-zone-pro-blog-full' );
                                        }else{ ?>
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/fallback.png' ); ?>" alt="<?php the_title_attribute(); ?>" />        
                                        <?php 
                                        }
                                        ?>
                                    </a>
                                
                                <div class="image-wrapper">
                                    <div class="text">
                                        <header class="entry-header">
                                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php if( $ed_bdate ){ ?>
                                            <div class="entry-meta">
                                                <span class="posted-on"><i class="fa fa-calendar-o"></i><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date( 'j M, Y' ) ); ?></a></span>
                                                <span class="time"><i class="fa fa-clock-o"></i><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date( 'g:i A' ) ); ?></a></span>
                                            </div>
                                            <?php } ?>
                                        </header>
                                        
                                        <div class="entry-content">
                                        <?php the_excerpt(); ?>
                                        </div>
                                    
                                        <div class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="learn-more"><?php echo esc_html( $readmore ); ?></a>
                                        </div>
                                    </div>
                                </div>
                                </article>
                            </div>
                    <?php 
                    }       
                    wp_reset_postdata(); 
                }
        		
                $args = array( 
            		        'post_type'       => 'post',
            		        'post_status'     => 'publish',
            		        'posts_per_page'  => 4,
            		        'offset'          => 1,
                            'category__not_in'=> $cat,
            		        'tax_query'       => array(
            						array(
            						'taxonomy' => 'post_format',
            						'field'    => 'slug',
            						'terms'    => array( 'post-format-gallery' ),
            						'operator' => 'NOT IN',
            						)),
            		        'ignore_sticky_posts'   => true    
                         );
                
                $qry2 = new WP_Query( $args );
                if( $qry2->have_posts() ){?>
        			<div class="col-2">
        				<ul>
        				<?php while( $qry2->have_posts() ){ $qry2->the_post(); ?>
        					<li>
        						<article class="post">
        							<header class="entry-header">
        								<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        								<?php if( $ed_bdate ){ ?>
                                        <div class="entry-meta">
        									<span><i class="fa fa-calendar-o"></i><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date( 'j M, Y' ) ); ?></a></span>
        								</div>
                                        <?php } ?>
        							</header>
        						</article>
        					</li>
        				<?php }
        				    wp_reset_postdata(); ?>
        				</ul>
        			</div>
        		<?php } ?>
        	</div>
            <?php 
            if( $view_all && $link ){ ?>
                <div class="btn-holder"><a href="<?php echo esc_url( $link ); ?>" class="learn-more"><?php echo esc_html( $view_all ); ?></a></div>
            <?php } ?>
        </div>
    </section>