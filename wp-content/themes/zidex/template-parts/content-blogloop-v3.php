<?php 
// BLOGLOOP-V3

// THUMBNAIL
$post_img = '';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'zidex_blog_900x550' );
if ($thumbnail_src) {
    $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.esc_attr(the_title_attribute( 'echo=0' )).'" />';
    $post_col = 'col-md-12';
}else{
    $post_col = 'col-md-12 no-featured-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post col-md-12 list-view blogloop-v3 blogloop-no-flex'); ?> > 
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
                <!-- POST TITLE -->
                <h3 class="post-name text-center">
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
                
                <!-- POST METAS (DATE / TAGS / AUTHOR / COMMENTS) -->
                <div class="post-category-comment-date text-center">
                    <!-- POST META: DATE -->
                    <span class="post-date">
                        <a title="<?php the_title_attribute() ?>" href="<?php echo esc_url(get_the_permalink()); ?>">
                            <i class="icon-calendar"></i>
                            <?php echo esc_html(get_the_date()); ?>
                        </a>
                    </span>
                    <!-- POST META: TAGS -->
                    <span class="post-tags">
                        <?php echo get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i>', ', ' ); ?>
                    </span>
                </div>

                <!-- POST CONTENT / EXCERPT -->
                <div class="post-excerpt text-center">
                    <?php
                        /* translators: %s: Name of current post */
                        the_excerpt();
                    ?>
                    <div class="clearfix"></div>

                    <p>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-link">
                            <?php echo esc_html__( 'Continue Reading', 'zidex' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="clearfix"></div>

                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zidex' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>