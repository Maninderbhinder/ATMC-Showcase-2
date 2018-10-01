<?php 
get_header();
 
 while( have_posts() ): the_post();
    $event_cat  = get_the_terms( $post->ID, 'event-category' );
    $start_date = get_post_meta( $post->ID, '_education_zone_pro_event_start_date', true );
    $end_date   = get_post_meta( $post->ID, '_education_zone_pro_event_end_date', true );
    $time       = get_post_meta( $post->ID, '_education_zone_pro_event_time', true );
    $location   = get_post_meta( $post->ID, '_education_zone_pro_event_location', true );
    $name       = get_post_meta( $post->ID, '_education_zone_pro_event_name', true );
    $phone      = get_post_meta( $post->ID, '_education_zone_pro_event_phone', true );
    $email      = get_post_meta( $post->ID, '_education_zone_pro_event_email', true );
    $website    = get_post_meta( $post->ID, '_education_zone_pro_event_website', true );
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="event-details">
				<article class="post">
					<?php 
					    if( has_post_thumbnail() ){
						    education_zone_pro_sidebar( true ) ? the_post_thumbnail( 'education-zone-pro-image' ) : the_post_thumbnail( 'education-zone-pro-image-full' ); 
					    }
					if( $start_date || $end_date || $time || $location || $name || $phone || $email || $website  ){
					?>
						<div class="event-info">
						    <?php 
						    if(  $start_date || $end_date || $time || $location ){ ?>
							    <div class="col">
							        <?php 
							        if( $start_date ): ?>
								        <div class="text">
									        <i class="fa fa-calendar-o" aria-hidden="true"></i>
											<div class="right-text">
												<strong><?php echo esc_html__( 'Date','education-zone-pro' ); ?></strong>
												<span>
												<?php 
												    echo esc_html( $start_date ); 
												    if( $end_date ){ 
												            echo ' - ' . esc_html( $end_date ); 
												    }?>
												</span>
											</div>
								        </div>
							        <?php 
							        endif;

								    if( $time ): ?>
										<div class="text">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<div class="right-text">
												<strong><?php echo esc_html__( 'Time','education-zone-pro' ); ?></strong>
												<span><?php echo esc_html( $time ); ?></span>
											</div>
										</div>
									<?php endif;

								    if( $location ): ?>
										<div class="text">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<div class="right-text">
												<strong><?php echo esc_html__( 'Location','education-zone-pro' ); ?></strong>
												<span><?php echo esc_html( $location ); ?></span>
											</div>
										</div>
									<?php endif;

								    if( $event_cat ): ?>
										<div class="text">
											<i class="fa fa-folder" aria-hidden="true"></i>
											<div class="right-text">
												<strong><?php echo esc_html__( 'Category','education-zone-pro' ); ?></strong>
												<?php
												foreach( $event_cat as $cat ){ ?>
												<span><?php echo esc_html( $cat->name ); ?></span>
												<?php } ?>
											</div>
										</div>
								    <?php 
								    endif; ?>

							    </div>
						    <?php 
						    } 

						    if( $name || $phone || $email || $website ){ ?>
								<div class="col">
									<?php if( $name ){ ?>
									<div class="text">
										<i class="fa fa-university" aria-hidden="true"></i>
										<div class="right-text">
											<strong><?php echo esc_html__( 'Organizer','education-zone-pro' ); ?></strong>
											<span class="org-name"><?php echo esc_html( $name ); ?></span>
										</div>
									</div>
								<?php } if( $phone ){ ?>
									<div class="text">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div class="right-text">
							                <strong><?php echo esc_html__( 'Phone','education-zone-pro' ); ?></strong>
											<span><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></span>
										</div>
									</div>
								<?php } if( $email ){ ?>
									<div class="text">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<div class="right-text">
							                <strong><?php echo esc_html__( 'Email','education-zone-pro' ); ?></strong>
											<span><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></span>
										</div>
									</div>
								<?php } if( $website ){ ?>
									<div class="text">
										<i class="fa fa-globe" aria-hidden="true"></i>
										<div class="right-text">
							                <strong><?php echo esc_html__( 'Website','education-zone-pro' ); ?></strong>
											 <span><a href="<?php echo esc_url( $website ); ?>" target="_blank"><?php echo esc_html( $website ); ?></a></span>
										</div>
									</div>
								<?php } ?>
								</div>
							<?php 
							} ?>

						</div>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
		</main>
		
	</div>	

<?php endwhile;
 get_sidebar();
 get_footer(); ?>