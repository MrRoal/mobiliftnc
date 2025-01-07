<?php

// JOB DATE
$date_current = time(); // or your date as well
$date_post = strtotime(get_post_meta( get_the_ID(), 'mt_job_listing_expiry_date', true ));
$date = $date_post - $date_current;
$date = floor($date/(60*60*24));
if ($date >= 0) {
    $date_text = esc_html__('This Job Position Expires in ', 'zidex') . esc_html($date) . esc_html__(' Days', 'zidex');
}else{
    $date_text = esc_html__('Thank you for your interest! We already found the right person!', 'zidex');
}

$cf7_form_id = get_post_meta( get_the_ID(), 'mt_job_cf7_id', true );
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php 
    echo wp_kses_post(zidex_header_title_breadcrumbs());
?>


<!-- BEGIN ARTICLE -->
<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
    <div class="container">
       <div class="row">

            <!-- POST CONTENT -->
            <div class="col-md-12 main-content">
                <!-- HEADER -->
                <div class="article-header">
                    <div class="article-details">
                        <h3 class="post-name"><?php echo get_the_title(); ?></h3>
                        <p class="job_descriptions">
                            <?php if ($date >= 0) { ?>
                                <span>
                                    <i class="icon-people"></i> <?php echo get_post_meta( get_the_ID(), 'mt_job_spaces_available', true ) . esc_html__(' Available Spaces','zidex'); ?>
                                </span>
                                <span>
                                    <i class="icon-calendar"></i> <?php echo esc_html__('Expire on ','zidex') . get_post_meta( get_the_ID(), 'mt_job_listing_expiry_date', true ); ?>
                                </span>
                            <?php }else{ ?>
                                <span>
                                    <i class="icon-close"></i> <?php echo esc_html__('Expired Listing','zidex'); ?>
                                </span>
                            <?php } ?>
                            <span>
                                <i class="icon-location-pin"></i> <?php echo get_post_meta( get_the_ID(), 'mt_job_location', true ); ?>
                            </span>
                            <span>
                                <i class="icon-briefcase"></i> <?php echo get_post_meta( get_the_ID(), 'mt_job_company_name', true ); ?>
                            </span>
                        </p>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="article-content">
                    
                    <?php the_content(); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?php echo get_post_meta( get_the_ID(), 'mt_job_ideal_candidate', true ); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo get_post_meta( get_the_ID(), 'mt_job_benefits', true ); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>


                    <?php if (isset($cf7_form_id) && !empty($cf7_form_id)) { ?>
                        <!-- Button trigger modal -->
                        <p class="text-center apply_now_btn">
                            <button data-toggle="modal" data-target="#apply_now" class="job-apply-btn vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-square vc_btn3-style-flat vc_btn3-icon-right vc_btn3-color-info">
                            <?php echo esc_html__('Apply for this Job','zidex'); ?> <i class="icon-cursor"></i></button>
                        </p>
                        <!-- Modal -->
                        <div class="modal fade" id="apply_now" tabindex="-1" role="dialog" aria-labelledby="apply_now_label">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icon-close icons"></i></span></button>
                                        <h3 class="modal-title" id="apply_now_label"><?php echo esc_html__('Apply for: ','zidex') . get_the_title(); ?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($cf7_form_id).'" title="Jobs"]'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- COMMENTS -->
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>