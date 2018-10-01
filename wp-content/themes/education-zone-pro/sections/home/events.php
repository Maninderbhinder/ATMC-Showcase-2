<?php
/**
 * News & Events Section
*/ 
$news_title       = get_theme_mod( 'education_zone_pro_news_section_title' );
$news_description = get_theme_mod( 'education_zone_pro_news_section_content' );
$news_cat         = get_theme_mod( 'education_zone_pro_news_post_cat' );

$news_readmore      = get_theme_mod( 'education_zone_pro_news_readmore', __( 'View All News', 'education-zone-pro' ) );
$news_more_link     = get_theme_mod( 'education_zone_pro_news_readmore_link' );

$events_title       = get_theme_mod( 'education_zone_pro_events_section_title' );
$events_description = get_theme_mod( 'education_zone_pro_events_section_content' );
$events_cat         = get_theme_mod( 'education_zone_pro_event_categories' );

$readmore           = get_theme_mod( 'education_zone_pro_events_readmore', __( 'View All Events', 'education-zone-pro' ) );
$readmore_link      = get_theme_mod( 'education_zone_pro_events_readmore_link' );

$today = current_time( 'Y-m-d' );


$args_one = array(
        'post_type'  => 'post',
        'cat' => $news_cat,
        'ignore_sticky_posts' => true,
        'posts_per_page' => '2'
        );

$news_qry = new WP_Query( $args_one );
if( $events_cat ){
	$args_two = array(
        'post_type'  => 'event',
        'posts_per_page' => '2',
        'tax_query' => array(
			array(
				'taxonomy' => 'event-category',
				'field'    => 'term_id',
				'terms'    => $events_cat,
			),
		),
		'meta_query' => array(
		    'relation' => 'AND',
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
}else{
	$args_two = array(
        'post_type'  => 'event',
        'posts_per_page' => '2',
        'meta_query' => array(
		        'relation' => 'AND',
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
}

$events_qry = new WP_Query( $args_two );
?>

<section class="news-category">
	<div class="container">
		<div class="row">
			<div class="col">
			<?php 
				if( $news_title || $news_description ){ ?>
					<header class="header-part">
					    <?php 
					    if( $news_title ) echo '<h2 class="section-title">' . esc_html( $news_title ) . '</h2>';
					    		      
					    if( $news_description ) echo wpautop( wp_kses_post( $news_description ) );
					    ?>
					</header>
			<?php } 

				if( $news_qry->have_posts() ){
	                     
	                while( $news_qry->have_posts() ){ 
	                    $news_qry->the_post(); 
					?>
						<article class="post">
						    <?php 
						    if( has_post_thumbnail() ){ ?>
								<a href="<?php the_permalink(); ?>" class="post-thumbnail">
								    <?php the_post_thumbnail( 'education-zone-pro-events' ); ?>
								</a>
							<?php } ?>
							<div class="text">
								<span class="posted-on"><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date( '' ) ); ?></a></span>
								<header class="entry-header">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="entry-meta">
										<span><i class="fa fa-user" aria-hidden="true"></i>
											<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_author() ); ?></a>
										</span>
										<?php 
										if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
								            echo '<span><i class="fa fa-comment-o"></i>';
								            comments_popup_link( esc_html__( 'Leave a comment', 'education-zone-pro' ), esc_html__( '1 Comment', 'education-zone-pro' ), esc_html__( '% Comments', 'education-zone-pro' ) );
								            echo '</span>';
	        							}                           ?>
									</div>
								</header>
								<div class="entry-content">
								    <?php 
								    if( has_excerpt() ){
	                                    the_excerpt();    
							        }else{
		                                echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), 50, '...', false, false ) ) ) );
		                            }  
		                            ?>
								</div>
							</div>
						</article>
					<?php }
				    wp_reset_postdata();
				    if( $news_readmore&& $news_more_link ){ ?>
						<a href="<?php echo esc_url( $news_more_link ); ?>" class="more-btn"><?php echo esc_html( $news_readmore); ?></a>
				    <?php 
					} 
				} ?>
			</div>

            <?php 
            ?> 
			<div class="col right">
			    <?php 
				if( $events_title || $events_description ){ ?>
					<header class="header-part">
						<?php 
						if( $events_title ) echo '<h2 class="section-title">' . esc_html( $events_title ) . '</h2>';
						    		      
						if( $events_description ) echo wpautop( wp_kses_post( $events_description ) );
				?>
					</header>
				<?php 
				} 
                if(  $events_qry->have_posts() ){

				    while( $events_qry->have_posts() ){ 
	                    $events_qry->the_post();

	                    $location   = get_post_meta( $post->ID, '_education_zone_pro_event_location' , true ); 
						$start_date = get_post_meta( $post->ID, '_education_zone_pro_event_start_date', true );
                        $end_date   = get_post_meta( $post->ID, '_education_zone_pro_event_end_date', true ); 
                        $today      = date( 'M d, y' );
						$today      = strtotime( $today );
                        
                        ?>
							    <article class="post">
			                        <?php 
								    if( has_post_thumbnail() ){ ?>
										<a href="<?php the_permalink(); ?>" class="post-thumbnail">
										    <?php the_post_thumbnail( 'education-zone-pro-events' ); ?>
										</a>
									<?php } ?>							
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
										        	echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), 50, '...', false, false ) ) ) );
										        } 
										    ?>
									    </div>
							        </div>
						        </article>		
				    <?php }
				    wp_reset_postdata();
				    if( $readmore && $readmore_link ){ ?>
					    <a href="<?php echo esc_url( $readmore_link ); ?>" class="more-btn"><?php echo esc_html( $readmore ); ?></a>
			    <?php } } ?>
			</div>
		</div>
    </div>
</section>