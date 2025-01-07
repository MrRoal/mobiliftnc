<?php 
// BLOGLOOP-V2

// THUMBNAIL
$post_img = '';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'zidex_news_shortcode_1000x700' );
if ($thumbnail_src) {
    $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.esc_attr(the_title_attribute( 'echo=0' )).'" />';
    $post_col = 'col-md-12';
}else{
    $post_col = 'col-md-12 no-featured-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post col-md-12 list-view blogloop-v2 blogloop-no-flex'); ?> > 
    <div class="blog_custom">
        
        <?php /*POST THUMBNAIL*/ ?>
        <?php if ($post_img) { ?>
            <!-- POST THUMBNAIL -->
            <div class="post-thumbnail">
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="relative">
                    <?php echo wp_kses_post($post_img); ?>
                </a>
            </div>
        <?php } ?>

        <!-- POST DETAILS -->
        <div class="post-details">
            <div class="post-details-holder">
                <!-- POST METAS (DATE / TAGS / AUTHOR / COMMENTS) -->
                <div class="post-category-comment-date row">

                    <!-- POST META: TAGS -->
                    <?php if (get_the_tags()) { ?>
                            <span class="post-tags-list"><?php echo get_the_term_list( get_the_ID(), 'post_tag', '', ', ' ); ?></span><span class="post-separator">|</span>
                    <?php } ?>

                    <!-- POST META: DATE -->
                    <?php if (get_the_date()) { ?>
                        <span class="post-date">
                            <span class="post-date-list"><?php echo esc_html(get_the_time(get_option('date_format'),get_the_ID())); ?></span><span class="post-separator">|</span>
                        </span>
                    <?php } ?>

                    <!-- POST META: AUTHOR -->
                    <span class="author">
                        <?php echo esc_html__( 'Post by: ', 'zidex' ); ?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a>
                    </span>
                </div>

                <!-- POST TITLE -->
                <h3 class="post-name row">
                    <a title="<?php the_title_attribute() ?>" href="<?php echo esc_url(get_the_permalink()); ?>">
                        <?php if(is_sticky(get_the_ID())){ ?>
                            <!-- STICKY POST LABEL -->
                            <span class="post-sticky-label">
                                <i class="fa fa-bookmark"></i>
                            </span>
                        <?php } ?>
                        <!-- POST TITLE -->
                        <?php the_title() ?>
                    </a>
                </h3>

                <!-- POST CONTENT / EXCERPT -->
                <div class="post-excerpt row">
                    <?php the_excerpt() ?>
                    
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zidex' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>
                <div class="clearfix"></div>
                <div>
                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-link">
                        <?php echo esc_html__( 'Read more', 'zidex' ); ?>
                    </a>
                </div>
                <div class="clearfix"></div>        
            </div>
        </div>
    </div>
</article>