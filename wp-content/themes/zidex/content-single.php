<?php
/**
* Content Single
*/
$prev_post = get_previous_post();
$next_post = get_next_post();

$select_post_layout = get_post_meta( get_the_ID(), 'select_post_layout', true );
$select_post_sidebar = get_post_meta( get_the_ID(), 'select_post_sidebar', true );

$sidebar = 'sidebar-1';
if ( function_exists('modeltheme_framework')) {
    if (isset($select_post_sidebar) && $select_post_sidebar != '') {
        $sidebar = $select_post_sidebar;
    }else{
        $sidebar = zidex_redux('mt_single_blog_layout_sidebar');
    }
}

$image_size = 'zidex_news_shortcode_1000x500';
$cols = 'col-md-12 vc_col-sm-12';
$sidebars_lr_meta = array("left-sidebar", "right-sidebar");
if (isset($select_post_layout) && in_array($select_post_layout, $sidebars_lr_meta)) {
    $cols = 'col-md-8 vc_col-sm-8 status-meta-sidebar';
}elseif(isset($select_post_layout) && $select_post_layout == 'no-sidebar'){
    $cols = 'col-md-12 vc_col-sm-12 status-meta-fullwidth';
    $image_size = 'zidex_post_wide';
}else{
    if(class_exists( 'ReduxFrameworkPlugin' )){
        $sidebars_lr_panel = array("mt_single_blog_left_sidebar", "mt_single_blog_right_sidebar");
        if (in_array(zidex_redux('mt_single_blog_layout'), $sidebars_lr_panel)) {
            $cols = 'col-md-8 vc_col-sm-8 status-panel-sidebar';
        }else{
            $cols = 'col-md-12 vc_col-sm-12 status-panel-no-sidebar';
            $image_size = 'zidex_post_wide';
        }
    }
}
if (!is_active_sidebar($sidebar)) {
    $cols = "col-md-12";
}
$breadcrumbs_on_off             = get_post_meta( get_the_ID(), 'breadcrumbs_on_off',               true );

?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php 
        if ( function_exists('modeltheme_framework')) {
            if (isset($breadcrumbs_on_off) && $breadcrumbs_on_off == 'yes') {
                echo wp_kses_post(zidex_header_title_breadcrumbs());
            }elseif(isset($breadcrumbs_on_off) && $breadcrumbs_on_off == ''){
                echo wp_kses_post(zidex_header_title_breadcrumbs());
            }
        }else{
            echo wp_kses_post(zidex_header_title_breadcrumbs());
        }
    ?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding spacing_mobile_40 spacing_tablets_60'); ?>>
    <div class="container">
       <div class="row">

            <?php if (isset($select_post_layout) && $select_post_layout == 'left-sidebar') { ?>
                <div class="col-md-4 vc_col-sm-4 sidebar-content sidebar-left">
                    <?php if (is_active_sidebar($sidebar)) { ?>
                        <?php dynamic_sidebar($sidebar); ?>
                    <?php } ?>
                </div>
            <?php }else{ ?>
                <?php if (isset($select_post_layout) && $select_post_layout == 'inherit') { ?>
                    <?php if(class_exists( 'ReduxFrameworkPlugin' )){ ?>
                        <?php if ( zidex_redux('mt_single_blog_layout') == 'mt_single_blog_left_sidebar') { ?>
                            <div class="col-md-4 vc_col-sm-4 sidebar-content sidebar-left">
                                <?php if (is_active_sidebar($sidebar)) { ?>
                                    <?php dynamic_sidebar($sidebar); ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

            <!-- POST CONTENT -->
            <div class="<?php echo esc_attr($cols); ?> main-content">

                <div class="content">

	                <!-- HEADER -->
	                <div class="article-header">
	                    <div class="article-details">

	                        <?php 
                            // MAIN FEATURED IMAGE
                            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), esc_html($image_size) ); 
	                        if($thumbnail_src) {
                                echo '<img class="main-featured-image" src="'.esc_url($thumbnail_src[0]).'" alt="'.esc_attr(the_title_attribute( 'echo=0' )).'" /> ';
                            } ?>

	                        <div class="clearfix"></div>
	                    </div>
	                </div>
	                <!-- CONTENT -->
	                <div class="article-content">

	                	<div class="post-category-comment-date">

                            <?php if (get_the_tags()) { ?>
                                <span class="single-post-tags">
                                    <?php echo get_the_term_list( get_the_ID(), 'post_tag', '', ', ' ); ?>
                                </span>
                                <span class="post-separator"> | </span>
                            <?php } ?>

                            <!-- POST META: DATE -->
                            <?php if (get_the_date()) { ?>
                                <span class="post-date">
                                     <span class="post-date-list"><?php echo esc_html(get_the_time(get_option('date_format'),get_the_ID())); ?></span><span class="post-separator"> | </span>
                                </span>
                            <?php } ?>


                            <span class="post-categories">
                                <?php echo wp_kses_post(get_the_term_list( get_the_ID(), 'category', '', ', ' )); ?>
                            </span> 

                        </div>

                        <h2 class="post-title">
                            <?php echo esc_html(get_the_title()); ?>
                        </h2>
                        <div class="post-content">
	                    <?php the_content(); ?>
                        </div>
	                    <div class="clearfix"></div>

	                    <?php
	                        wp_link_pages( array(
	                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zidex' ),
	                            'after'  => '</div>',
	                        ) );
	                    ?>


	                    <!-- AUTHOR BIO -->
	                    <?php if ( zidex_redux('mt_enable_authorbio') ) { ?>

	                        <?php   
	                        $avatar = get_avatar( get_the_author_meta('email'), '80', get_the_author() );
	                        $has_image = '';
	                        if( $avatar !== false ) {
	                            $has_image .= 'no-author-pic';
	                        }
	                        ?>
	                        
	                        <div class="author-bio relative <?php echo esc_attr($has_image); ?>">
	                            <div class="author-thumbnail col-md-6 vc_col-sm-6">
	                                <div class="pull-left">
	                                    <div class="author-name">
	                                        <span class="author"><?php echo esc_html__(' Author: ','zidex'); ?></span>
                                            <a class="name" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo get_the_author(); ?></a>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="single-post-share col-md-6">
	                                <?php
                                        if(function_exists('modeltheme_framework')){
                                            echo do_shortcode('[mt_sharer tooltip_placement="top"]');
                                        }
                                    ?>
	                            </div>

	                        </div>
	                    <?php } ?>


	                    <div class="clearfix"></div>

	                    <!-- COMMENTS -->
	                    <?php
	                        // If comments are open or we have at least one comment, load up the comment template
	                        if ( comments_open() || get_comments_number() ) {
	                            comments_template();
	                        }
	                    ?>
                        <div class="clearfix"></div>
	                </div>
	            </div>
            </div>

            <?php 
            if(class_exists( 'ReduxFrameworkPlugin' )){ ?>
                <?php if (isset($select_post_layout) && $select_post_layout == 'right-sidebar') { ?>
                    <div class="col-md-4 vc_col-sm-4 sidebar-content sidebar-right">
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <?php dynamic_sidebar($sidebar); ?>
                        <?php } ?>
                    </div>
                <?php }elseif(isset($select_post_layout) && $select_post_layout == 'inherit') { ?>
                    <?php if ( zidex_redux('mt_single_blog_layout') == 'mt_single_blog_right_sidebar') { ?>
                        <div class="col-md-4 vc_col-sm-4 sidebar-content sidebar-right">
                            <?php if (is_active_sidebar($sidebar)) { ?>
                                <?php dynamic_sidebar($sidebar); ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php }elseif(isset($select_post_layout) && $select_post_layout == ''){ ?>
                    <div class="col-md-4 vc_col-sm-4 sidebar-content sidebar-right">
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <?php dynamic_sidebar($sidebar); ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
</article>


<div class="row post-details-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 vc_col-sm-12">
                <?php if ( zidex_redux('mt_enable_related_posts') ) { ?>

                <div class="clearfix"></div>
                <div class="related-posts sticky-posts">
                    <?php
                    global  $post;  
                    $orig_post = $post;  
                    $tags = wp_get_post_tags($post->ID);  
                    ?>

                    <h2 class="heading-bottom"><?php esc_html_e('You Might Also Like', 'zidex'); ?></h2>
                    <div class="row">
                        <?php
                        $args=array(  
                            'post__not_in'          => array($post->ID),  
                            'posts_per_page'        => 3, // Number of related posts to display.  
                            'ignore_sticky_posts'   => 1  
                        );  

                        $my_query = new wp_query( $args );  

                        while( $my_query->have_posts() ) {  
                            $my_query->the_post(); 
                        
                        ?>  
                            <div class="col-md-4 vc_col-sm-4 post">
                                <div class="related_blog_custom">
                                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'zidex_related_post_pic500x300' ); ?>
                                    <?php if($thumbnail_src){ ?>
                                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="relative">
                                        <?php if($thumbnail_src) { ?>
                                            <img src="<?php echo esc_url($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php esc_attr(the_title_attribute()); ?>" />
                                        <?php } ?>
                                    </a>
                                    <?php } ?>
                                    <div class="related_blog_details">
                                        <h4 class="post-name"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h4>
                                        <div class="post-author"><?php echo esc_html__('Posted by ','zidex'); ?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a> - <?php echo esc_html(get_the_date()); ?></div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                        } ?>
                    </div>
                </div>
                    <?php 
                    wp_reset_postdata();  
                    ?>  

                <?php } ?>



                <div class="clearfix"></div> 
                <?php if ( zidex_redux('mt_enable_post_navigation') ) { ?>
                    <div class="prev-next-post">
                        <?php if(get_previous_post()){ ?>
                        <div class="col-md-6 vc_col-sm-6 prev-post text-left">
                            <a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
                                <i class="icon-arrow-left-circle"></i> <span><?php echo esc_html__( 'Previous Post', 'zidex' ); ?></span>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if(get_next_post()){ ?>
                        <div class="col-md-6 vc_col-sm-6 next-post text-right">
                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                                <span><?php echo esc_html__( 'Next Post', 'zidex' ); ?></span> <i class="icon-arrow-right-circle"></i>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>