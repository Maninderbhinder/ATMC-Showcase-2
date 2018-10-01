<?php
/**
 * 
 * Team Section
*/ 
          
$title       = get_theme_mod( 'education_zone_pro_team_title' );
$description = get_theme_mod( 'education_zone_pro_team_content' );
$post_one    = get_theme_mod( 'education_zone_pro_team_post_one' );
$post_two    = get_theme_mod( 'education_zone_pro_team_post_two' );
$post_three  = get_theme_mod( 'education_zone_pro_team_post_three' );
$view_all    = get_theme_mod( 'education_zone_pro_team_viewall_label', __( 'View All Team', 'education-zone-pro' ) );
$link        = get_theme_mod( 'education_zone_pro_team_viewall_link' );


$team_posts = array( $post_one, $post_two, $post_three );
$team_posts = array_diff( array_unique( $team_posts ), array('') );

$args = array(
            'post__in'   => $team_posts,
            'post_type' => 'team',
            'orderby'   => 'post__in',
            'ignore_sticky_posts' => true,
        );
        
$qry = new WP_Query( $args );
?>


<div class="team-section">
    <div class="container">
        <?php 
        if( $title || $description ){ ?>

            <header class="header-part">
                  <?php 
                if( $title ){
                    echo '<h2 class="section-title">';
                    echo esc_html( $title ); 
                    echo '</h2>';
                }
            
                if($description){
                    echo wpautop( wp_kses_post( $description ) );
                }
                ?>
            </header>
        <?php } 

        if( $team_posts && $qry->have_posts() ){ ?>
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
                            <?php }else{
                                
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
                wp_reset_postdata(); 
                ?>
            </div>
            <?php 
            if( $view_all && $link ){ ?>
                <div class="btn-holder"><a href="<?php echo esc_url( $link ); ?>" class="learn-more"><?php echo esc_html( $view_all ); ?></a></div>
        <?php }
         } ?>
    </div>
</div>