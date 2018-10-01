<?php
/**
 * 
 * Why Choose Us Section
*/ 
          
$title       = get_theme_mod( 'education_zone_pro_why_choose_title' );
$description = get_theme_mod( 'education_zone_pro_why_choose_content' );
$post_one    = get_theme_mod( 'education_zone_pro_why_choose_post_one' );
$post_two    = get_theme_mod( 'education_zone_pro_why_choose_post_two' );
$post_three  = get_theme_mod( 'education_zone_pro_why_choose_post_three' );
$post_four   = get_theme_mod( 'education_zone_pro_why_choose_post_four' );

$choose_posts = array( $post_one, $post_two, $post_three, $post_four );
$choose_posts = array_diff( array_unique( $choose_posts ), array('') );

$args = array(
            'post_type' => array( 'post', 'page'),
            'post__in'   => $choose_posts,
            'orderby'   => 'post__in',
            'ignore_sticky_posts' => true,
        );
        
$qry = new WP_Query( $args );
?>
<section class="choose-us">
    <div class="container">

        <?php if( $title || $description ){ ?>
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

        if( $choose_posts && $qry->have_posts() ){ ?>
            <div class="row">
            <?php  
            while( $qry->have_posts() ){ 
                $qry->the_post(); ?>
                <div class="col">
                    <?php 
                    if(has_post_thumbnail()){ ?>
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail"> 
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php 
                    } 
                    ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php 
                        if( has_excerpt() ){
                            the_excerpt();        
                        }else{
                            echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), 120, '...', false, false ) ) ) );        
                        }
                    ?>
                </div>
                <?php 
            }
            wp_reset_postdata(); 
            ?>
            </div>
            <?php 
        } 
        ?>
    </div>
</section>