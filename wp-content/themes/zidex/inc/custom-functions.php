<?php
//GET HEADER TITLE/BREADCRUMBS AREA
if (!function_exists('zidex_header_title_breadcrumbs')) {
    function zidex_header_title_breadcrumbs(){

        $css_inline = '';
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'zidex_breadcrumbs' );
        if ( is_page() || is_singular('mt_job')) {
            if (!empty($thumbnail_src[0])) {
                $css_inline = 'background-image:url('.esc_url($thumbnail_src[0]).');';
            }
        }else{
            // @since v1.5 of the theme - Showing the default image (if is is set) from Redux theme panel;
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                if (zidex_redux('mt_breadcrumbs_image') != '') {
                    $css_inline = 'background-image:url('.esc_url(zidex_redux('mt_breadcrumbs_image','url')).');';
                }
            }
        }

        $html = '';
        $html .= '<div class="header-title-breadcrumb relative">';
            $html .= '<div class="header-title-breadcrumb-overlay text-center" style="'.$css_inline.'">';
                            if ( is_singular('mt_job')) {
                                $html .= '<div class="header-title-breadcrumb-overlay-semitransparent"></div>';
                            }
                    $html .= '<div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">';
                                        if (is_singular('post')) {
                                            $html .= '<h1>'.esc_html__( 'Blog', 'zidex' ) . get_search_query().'</h1>';
                                        }elseif (is_page()) {
                                            $html .= '<h1>'.get_the_title().'</h1>';
                                        }elseif (is_search()) {
                                            $html .= '<h1>'.esc_html__( 'Search Results for: ', 'zidex' ) . get_search_query().'</h1>';
                                        }elseif (is_category()) {
                                            $html .= '<h1>'.esc_html__( 'Category: ', 'zidex' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                                        }elseif (is_tag()) {
                                            $html .= '<h1>'.esc_html__( 'Tag Archives: ', 'zidex' ) . single_tag_title( '', false ).'</h1>';
                                        }elseif (is_author() || is_archive()) {
                                            if (function_exists("is_shop") && is_shop()) {
                                                $html .= '<h1>'.esc_html__( 'Products Shop & Rental', 'zidex' ).'</h1>';
                                            }else{
                                                $html .= '<h1>'.get_the_archive_title().'</h1>';
                                            }
                                        }elseif (is_home()) {
                                            $html .= '<h1>'.esc_html__( 'From the Blog', 'zidex' ).'</h1>';
                                        }elseif (is_singular('mt_job')) {
                                            $date_current = time(); // or your date as well
                                            $date_post = strtotime(get_post_meta( get_the_ID(), 'mt_job_listing_expiry_date', true ));
                                            $date = $date_post - $date_current;
                                            $date = floor($date/(60*60*24));
                                            if ($date >= 0) {
                                                $date_text = esc_html__('This Job Position Expires in ', 'zidex') . esc_html($date) . esc_html__(' Days', 'zidex');
                                            }else{
                                                $date_text = esc_html__('Thank you for your interest! We already found the right person!', 'zidex');
                                            }
                                                
                                            $html .= '<div class="container flex">
                                                        <div class="header-group">
                                                            <h1>'.get_the_title().'</h1>
                                                            <div class="clearfix"></div>
                                                            <p class="job_expire_in text-light">'.wp_kses_post($date_text).'</p>
                                                            <div class="clearfix"></div>
                                                            <div class="job-type">'.get_the_term_list( get_the_ID(), 'mt_job_type', '', ' ' ).'</div>
                                                        </div>
                                                    </div>';
                                        }
                                        if (!is_singular('mt_job')) {
                                            $html .= '<ol class="breadcrumb text-center">'.zidex_breadcrumb().'</ol>';
                                        }

                            $html .= '</div>
                                </div>
                            </div>
                        </div>';

        $html .= '</div>';
        $html .= '<div class="clearfix"></div>';

        return $html;
    }
}



//GET Social Floating button
if (!function_exists('zidex_floating_social_button')) {
    function zidex_floating_social_button(){

        $html = '';
        $link = '';
        $fa_class = '';

        if (zidex_redux('mt_fixed_social_btn_status') == true) {
            if (zidex_redux('mt_fixed_social_btn_social_select') == 'telegram') {
                $link = zidex_redux('mt_social_telegram');
                $fa_class = 'fa fa-telegram';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'facebook') {
                $link = zidex_redux('mt_social_fb');
                $fa_class = 'fa fa-facebook';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'twitter') {
                $link = zidex_redux('mt_social_tw');
                $fa_class = 'fa fa-twitter';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'googleplus') {
                $link = zidex_redux('mt_social_gplus');
                $fa_class = 'fa fa-google-plus';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'youtube') {
                $link = zidex_redux('mt_social_youtube');
                $fa_class = 'fa fa-youtube-play';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'pinterest') {
                $link = zidex_redux('mt_social_pinterest');
                $fa_class = 'fa fa-pinterest-p';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'pinterest') {
                $link = zidex_redux('mt_social_pinterest');
                $fa_class = 'fa fa-pinterest-p';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'linkedin') {
                $link = zidex_redux('mt_social_linkedin');
                $fa_class = 'fa fa-linkedin';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'skype') {
                $link = zidex_redux('mt_social_skype');
                $fa_class = 'fa fa-skype';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'instagram') {
                $link = zidex_redux('mt_social_instagram');
                $fa_class = 'fa fa-instagram';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'dribbble') {
                $link = zidex_redux('mt_social_dribbble');
                $fa_class = 'fa fa-dribbble';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'deviantart') {
                $link = zidex_redux('mt_social_deviantart');
                $fa_class = 'fa fa-deviantart';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'digg') {
                $link = zidex_redux('mt_social_digg');
                $fa_class = 'fa fa-digg';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'flickr') {
                $link = zidex_redux('mt_social_flickr');
                $fa_class = 'fa fa-flickr';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'stumbleupon') {
                $link = zidex_redux('mt_social_stumbleupon');
                $fa_class = 'fa fa-stumbleupon';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'tumblr') {
                $link = zidex_redux('mt_social_tumblr');
                $fa_class = 'fa fa-tumblr';
            }elseif (zidex_redux('mt_fixed_social_btn_social_select') == 'vimeo') {
                $link = zidex_redux('mt_social_vimeo');
                $fa_class = 'fa fa-vimeo';
            }


            $html .= '<a data-toggle="tooltip" data-placement="top" title="'.esc_attr__('Connect on Telegram','zidex').'" class="floating-social-btn" target="_blank" href="'.esc_url($link).'">';
                $html .= '<i class="'.esc_attr($fa_class).'"></i>';
            $html .= '</a>';
        }

        return $html;
    }
}

if ( function_exists( 'modeltheme_framework' ) ) {
    function zidex_dfi_ids($postID){
        global  $dynamic_featured_image;
        $featured_images = $dynamic_featured_image->get_featured_images( $postID );
        //Loop through the image to display your image
        if( !is_null($featured_images) ){
            $medias = array();
            foreach($featured_images as $images){
                $attachment_id = $images['attachment_id'];
                $medias[] = $attachment_id;
            }
            $ids = '';
            $len = count($medias);
            $i = 0;
            foreach($medias as $media){
                if ($i == $len - 1) {
                    $ids .= $media;
                }else{
                    $ids .= $media . ',';
                }
                $i++;
            }
        } 
        return $ids;
    }
}