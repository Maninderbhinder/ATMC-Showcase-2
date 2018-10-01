<?php
/**
 * Template Name: Courses Page
 *
 * @package Education Zone Pro
 */

get_header(); 
$excerpt_char = get_theme_mod( 'education_zone_pro_post_no_of_char', 200 ); //From Customizer
$course_order = get_theme_mod( 'education_zone_pro_course_order', 'date' );


 while( have_posts() ): the_post();
?>
<div class="template-courses">
	<?php the_content(); ?>
     <div class="cat-posts">
     <?php 
            $args = array(
                'taxonomy'      => 'course-category',
                'orderby'       => 'name', 
                'order'         => 'ASC',
            );                
            $terms = get_terms( $args );
            if( $terms ){
            ?>
            <ul class="cat-nav filter-button-group">        
                <li data-filter="*" class="is-active"><a href="#"><?php echo esc_html_e( 'All', 'education-zone-pro' ); ?></a></li>
                <?php
                    foreach( $terms as $t ){
                        echo '<li data-filter=".' . esc_attr( $t->slug ) .  '"><a href="#">' . esc_html( $t->name ) . '</a></li>';
                    } 
                ?>
            </ul>            
            <?php
            }
        ?>

        <?php $course_args = array( 
            'post_type' => 'course', 
            'post_status' => 'publish', 
            'posts_per_page' => -1,
        );
            if( $course_order == 'menu_order' ){
                $course_args['orderby'] = 'menu_order title';            
                $course_args['order']   = 'ASC';
            }
            $course_qry = new WP_Query( $course_args );
            if( $course_qry->have_posts() ){
        ?>
        <ul class="post-lists">
        <?php
                while( $course_qry->have_posts() ){
                    $course_qry->the_post();
                    $terms = get_the_terms( get_the_ID(), 'course-category' );
                    $s = '';
                    $i = 0;
                    if( $terms ){
                        foreach( $terms as $t ){
                            $i++;
                            $s .= $t->slug;
                            if( count( $terms ) > $i ){
                                $s .= ' ';
                            }
                        }
                    }  ?>
		
			<li class="<?php echo esc_attr( $s );?>">
				<article class="post">
				   <?php if( has_post_thumbnail() ){ ?>

					<a href="<?php the_permalink(); ?>" class="post-thumbnail">
					<?php the_post_thumbnail( 'education-zone-pro-course' ); ?>
					</a>
					<?php } ?>
					<div class="text">
						<header class="entry-header">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</header>
						<div class="entry-content">
					     
					        <?php echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), $excerpt_char, '...', false, false ) ) ) ); ?> 

						</div>
					</div>
				</article>
			</li>
			<?php } ?>
		</ul>
	<?php } ?>
	</div>
</div>

<?php  endwhile;
get_footer(); ?>