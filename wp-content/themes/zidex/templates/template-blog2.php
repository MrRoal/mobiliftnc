<?php
/*
* Template Name: Blog Style 2
*/


get_header(); 


$class = "";

if ( zidex_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "col-md-12";
}elseif ( zidex_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or zidex_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "col-md-8";
}
$blog_page_header = get_post_meta( get_the_ID(), 'blog_page_header', true );

$sidebar = $zidex_redux['mt_blog_layout_sidebar'];


// Theme Init
$theme_init = new zidex_init_class;
?>

<!-- Page content -->

    <?php
    wp_reset_postdata();
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'paged'            => $paged,
    );
    $posts = new WP_Query( $args );
    ?>
    <!-- Blog content -->
    <div class="container blog-posts high-padding">
        
        <h2 class="blog_heading heading-bottom ">
            <?php echo wp_kses_post(zidex_redux('mt_blog_post_title')); ?>
        </h2>
        <div class="row">

            <?php if ( zidex_redux('mt_blog_layout') != '' && zidex_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                    <div class="col-md-4 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">

            <?php if ( $posts->have_posts() ) : ?>
                <?php /* Start the Loop */ ?>
                <div class="row <?php echo esc_attr($theme_init->zidex_blogloop_variant()); ?>">

                    <?php /* Start the Loop */ ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <?php /* Loop - Variant 1 */ ?>
                        <?php get_template_part( 'content', 'blogloop-v2' ); ?>
                    <?php endwhile; ?>

                </div>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>
            
            <div class="clearfix"></div>

            <?php 
            $wp_query = new WP_Query($args);
            global  $wp_query;
            if ($wp_query->max_num_pages != 1) { ?>                
            <div class="modeltheme-pagination-holder col-md-12">           
                <div class="modeltheme-pagination pagination">           
                    <?php the_posts_pagination(); ?>
                </div>
            </div>
            <?php } ?>
            </div>

            <?php if ( zidex_redux('mt_blog_layout') != '' && zidex_redux('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                <div class="col-md-4 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

        </div>
    </div>


<?php
get_footer();
?>