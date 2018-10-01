<?php
/**
 * Template Name: Team Page
 *
 * @package Education Zone Pro
 */

get_header();
$team_order = get_theme_mod( 'education_zone_pro_team_order', 'date' );

  while ( have_posts() ) : the_post();

?>
	<div class="template-team">
	    <div class="team-section">
			<div class="container">
				<?php the_content(); 
				   
	                $args = array(
	                    'post_type'      => 'team',
	                    'post_status'    => 'publish',
	                    'posts_per_page' => -1,
	                );
	                if( $team_order == 'menu_order' ){
				        $args['orderby'] = 'menu_order title';            
				        $args['order']   = 'ASC';
				    }
	                
	                $qry = new WP_Query( $args );
	                
	                if( $qry->have_posts() ){ ?>

	                    <div class="row">

	                        <?php
	                        while( $qry->have_posts() ){
	                            $qry->the_post();

			                    $designation = get_post_meta( get_the_ID(), '_education_zone_pro_team_designation', true );
			                    $facebook    = get_post_meta( get_the_ID(), '_education_zone_pro_team_facebook', true );
			                    $twitter     = get_post_meta( get_the_ID(), '_education_zone_pro_team_twitter', true );
			                    $linkedin    = get_post_meta( get_the_ID(), '_education_zone_pro_team_linkedin', true );
			                    $youtube     = get_post_meta( get_the_ID(), '_education_zone_pro_team_youtube', true );
			                    $instagram   = get_post_meta( get_the_ID(), '_education_zone_pro_team_instagram', true );
			                    $gplus       = get_post_meta( get_the_ID(), '_education_zone_pro_team_gplus', true );
	                        ?>
								 <div class="col">
			                        <div class="holder">
			                            <?php 
			                            if( has_post_thumbnail() ){ ?>
			                                <div class="img-holder">
			                                <?php the_post_thumbnail( 'education-zone-pro-team' ); ?>
			                                </div>
			                            <?php 
			                            }else{
			                                
			                            } ?>
			                            
			                            <div class="text-holder">
			                                <strong class="name"><?php the_title(); ?></strong>
			                                <span class="designation"><?php echo esc_html( $designation ); ?></span>
			                                <?php the_content(); ?>
			                                <?php 
			                                if( $facebook || $twitter || $youtube || $gplus || $linkedin || $instagram ){ ?>
			                                    <ul class="social-networks">
			                                        <?php if( $facebook ){?>
			                                        <li><a href="<?php echo esc_url( $facebook ); ?>" class="fa fa-facebook-square" target="_blank"></a></li>
			                                        <?php } if( $twitter ){ ?>
			                                        <li><a href="<?php echo esc_url( $twitter ); ?>" class="fa fa-twitter" target="_blank"></a></li>
			                                        <?php } if( $youtube ){ ?>
			                                        <li><a href="<?php echo esc_url( $youtube );?>" class="fa fa-youtube" target="_blank"></a></li>
			                                        <?php } if( $gplus ){ ?>
			                                        <li><a href="<?php echo esc_url( $gplus );?>" class="fa fa-google-plus" target="_blank"></a></li>
			                                        <?php } if( $instagram ){ ?>
			                                        <li><a href="<?php echo esc_url( $instagram ); ?>" class="fa fa-instagram" target="_blank"></a></li>
			                                        <?php } if( $linkedin ){ ?>
			                                        <li><a href="<?php echo esc_url( $linkedin ); ?>" class="fa fa-linkedin-square" target="_blank"></a></li>
			                                        <?php } ?>
			                                    </ul>
			                                <?php } ?>
			                            </div>
			                        </div>
			                    </div>
	                        <?php
	                        }
	                        ?>
	                    </div>
				    <?php 
	                    wp_reset_postdata();
	                }
				    ?>
			</div>
        </div>	
	</div>

<?php 
 endwhile;

get_footer(); ?>