<?php
/**
 * Template Name: Testimonials Page
 *
 * @package Education Zone Pro
 */

get_header();

    while ( have_posts() ) : the_post();
 ?>
	    <div class="template-testimonials">
		<?php the_content();

		    $args = array(
	            'post_type'      => 'testimonial',
	            'post_status'    => 'publish',
	            'posts_per_page' => -1
	        );        
	        $qry = new WP_Query( $args );        
	        if( $qry->have_posts() ){ ?>
                <div class="testimonial-lists">
	                <?php
	                while( $qry->have_posts() ){
	                    $qry->the_post(); 
	                $designation = get_post_meta( $post->ID, '_education_zone_pro_testimonial_designation' , true ); ?>
			
						<div class="list">
						   <?php 
						    if(has_post_thumbnail()): ?>
								<div class="img-holder">
									<?php the_post_thumbnail( 'education-zone-pro-team' ); ?>
								</div>
							<?php 
							endif; ?>
							<div class="text-holder">
								<blockquote>
									<cite>
										<strong><?php the_title(); ?></strong>
										<span><?php echo esc_html( $designation ); ?></span>
									</cite>
									<?php the_content(); ?>
								</blockquote>
							</div>
						</div>

			        <?php
	                }
	                ?>
                </div>
            <?php   
                wp_reset_postdata();
	        } ?>
	</div>

<?php 
    endwhile;
get_footer(); ?>