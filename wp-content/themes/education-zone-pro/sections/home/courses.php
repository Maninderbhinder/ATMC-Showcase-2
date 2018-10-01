<?php
/**
 * Courses Section
*/
 
$title       = get_theme_mod( 'education_zone_pro_courses_section_title' );
$description = get_theme_mod( 'education_zone_pro_courses_section_content' );
$post_one    = get_theme_mod( 'education_zone_pro_courses_post_one' );
$post_two    = get_theme_mod( 'education_zone_pro_courses_post_two' );
$post_three  = get_theme_mod( 'education_zone_pro_courses_post_three' );
$post_four   = get_theme_mod( 'education_zone_pro_courses_post_four' );
$readmore    = get_theme_mod( 'education_zone_pro_courses_readmore', __( 'Learn More', 'education-zone-pro' ) );
$view_all    = get_theme_mod( 'education_zone_pro_courses_viewall_label', __( 'View All Projects', 'education-zone-pro' ) );
$link        = get_theme_mod( 'education_zone_pro_courses_viewall_link' );

$courses_post = array( $post_one, $post_two, $post_three, $post_four );
$courses_post = array_diff( array_unique( $courses_post ), array('') );

$args = array(
        'post_type'  => 'course',
        'post__in'   => $courses_post,
        'orderby'   => 'post__in',
        );

$qry = new WP_Query( $args );
?>
<section class="featured-courses">
    <div class="container">
    	<?php if( $title || $description ){ ?>
    	<header class="header-part">
    		<?php 
                if( $title ) echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>';
    		      
                if( $description ) echo wpautop( wp_kses_post( $description ) );
    		?>
    	</header>
        <?php } ?>
    	
        <?php if( $projects_post && $qry->have_posts() ){ ?>
            <ul>
            <?php           
                while( $qry->have_posts() ){ 
                    $qry->the_post(); ?>
                    <li>
                    <?php if(has_post_thumbnail()){ ?>
            			<div class="image-holder">
            				<?php the_post_thumbnail( 'education-zone-pro-featured-project' ); ?>
            				<div class="text">
            					<span><?php the_title(); ?></span>
            				</div>
            				<div class="description">
            					<h2><?php the_title(); ?></h2>
            					    <?php 
                                        if( has_excerpt() ){
                                            the_excerpt();        
                                        }else{
                                            echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), 100, '...', false, false ) ) ) );        
                                        }
                                    ?>
            					<a href="<?php the_permalink(); ?>" class="learn-more"><?php echo esc_html( $readmore ); ?></a>
            				</div>
            			</div>
        			<?php } ?>
                    </li>
    		<?php } 
                wp_reset_postdata();
            ?>
            </ul>
            <?php 
            if( $view_all && $link ){ ?>
                <a href="<?php echo esc_url( $link ); ?>" class="learn-more"><?php echo esc_html( $view_all ); ?></a>
        <?php } }  ?>
    </div>
</section>