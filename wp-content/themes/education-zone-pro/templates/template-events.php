<?php
/**
 * Template Name: Events Page
 *
 * @package Education Zone Pro
 */

get_header(); 
$event_order = get_theme_mod( 'education_zone_pro_event_order', 'date' );
$excerpt_char = get_theme_mod( 'education_zone_pro_post_no_of_char', 200 ); //From Customizer

   while ( have_posts() ) : the_post();
?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="template-events">
					<?php 
					the_content(); 
	                $today = current_time( 'Y-m-d' );

                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;	               
                    $args  = array(
		                'post_type'      => 'event',
		                'post_status'    => 'publish',
		                'posts_per_page' => '5',
		                'paged'          => $paged,
		                'meta_query' => array(
		                	        'relation' => 'OR',
									array(
										'key'     => '_education_zone_pro_event_start_date',
										'value'   =>  $today,
										'compare' => '>=',
										'type'    => 'DATE'
									),
									array(
										'key'     => '_education_zone_pro_event_end_date',
										'value'   => $today,
										'compare' => '>=',
										'type'    => 'DATE'
									),
								),
		            );
		            if( $event_order == 'menu_order' ){
				        $args['orderby'] = 'menu_order title';            
				        $args['order']   = 'ASC';
				    }
		                
		            $events_qry = new WP_Query( $args );
	                if( $events_qry->have_posts() ){

					    while( $events_qry->have_posts() ){ 
		                    $events_qry->the_post();

                            $location   = get_post_meta( $post->ID, '_education_zone_pro_event_location', true );
							$start_date = get_post_meta( $post->ID, '_education_zone_pro_event_start_date', true );
                            $end_date   = get_post_meta( $post->ID, '_education_zone_pro_event_end_date', true );
                            ?>
									<article class="post">
					                    <?php 
										if( has_post_thumbnail() ){ ?>
										    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
												<?php the_post_thumbnail( 'education-zone-pro-events' ); ?>
											</a>
										<?php 
										} ?>							
										<div class="text">
											<header class="entry-header">
												<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<div class="entry-meta">
												<?php 
												    if( $start_date ): ?>
														<span>
														    <i class="fa fa-calendar-o" aria-hidden="true"></i>
														    <a href="<?php the_permalink(); ?>">
														        <?php echo esc_html( $start_date );
														        if( $end_date ){ 
														            echo ' - ' . esc_html( $end_date ); 
														        }?>
														    </a>
														</span>
												<?php 
												    endif;

												    if( $location ){ ?><span><i class="fa fa-map-marker" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"><?php echo esc_html( $location ); ?></a></span><?php } ?>
												</div>
											</header>

											<div class="entry-content">
												<?php 
												if( has_excerpt() ){
		                                            the_excerpt();    
								                }else{
								                    echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), $excerpt_char, '...', false, false ) ) ) );  
								                } ?>
											</div>

											<div class="entry-footer">
												<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'education-zone-pro'); ?></a>
											</div>

										</div>
									</article>
								<?php 
	                    }
                         ?>
                        <nav class="navigation pagination" role="navigation">
                        <?php 
						$big = 999999999; // need an unlikely integer

						echo paginate_links( array(
							'prev_text'  => __( '&Lt;', 'education-zone-pro' ),
	                        'next_text'  => __( '&Gt;', 'education-zone-pro' ),
							'base'       => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'     => '?paged=%#%',
							'current'    => max( 1, get_query_var('paged') ),
							'total'      => $events_qry->max_num_pages
						) ); ?>
						</nav>
                        <?php 
	                    wp_reset_postdata();
	                    }else{
	                    	get_template_part( 'template-parts/content', 'none' );
	                    	} ?>   
				</div>
			</main>
		</div>
<?php
    endwhile;
get_sidebar(); 
get_footer(); ?>