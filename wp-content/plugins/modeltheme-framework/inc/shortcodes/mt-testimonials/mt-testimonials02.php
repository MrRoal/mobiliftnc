<?php

/**

||-> Shortcode: Testimonials 02

*/

function modeltheme_shortcode_testimonials02($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'                            =>'',
            'number'                               =>''
        ), $params ) );

    $html = '';
    $html .= '<div class="">';
        $html .= '<div class="testimonials-container-2 wow '.$animation.'">';
        $args_testimonials = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'mt_testimonial',
                'post_status'      => 'publish' 
                ); 
        $testimonials = get_posts($args_testimonials);
            foreach ($testimonials as $testimonial) {
                #metaboxes
                $metabox_job_position = get_post_meta( $testimonial->ID, 'job-position', true );
                $metabox_company = get_post_meta( $testimonial->ID, 'company', true );
                $testimonial_id = $testimonial->ID;
                $content_post   = get_post($testimonial_id);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                #thumbnail
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ),'full' );
                
                $html.='<div class="row">';
                  $html.='<div class="item col-md-12 relative">';
                    $html.='<div class="testimonials_all_holder">';
                      $html .= '<div class="testimonial02-text-holder">';
                        $html .= '<div class="testimonial02-content">';
                            $html .= '<div class="testimonial02_text">';
                              $html .= '<div class="testimonial02_rating_titles">';
                                if($thumbnail_src) { 
                                  $html .= '<img src="'. $thumbnail_src[0] . '" class="testimonial-member-img" alt="'. $testimonial->post_title .'" />';
                                }else{ 
                                  $html .= '<img src="http://placehold.it/150x150" class="testimonial-member-img" alt="'. $testimonial->post_title .'" />'; 
                                }
                          $html.='<h4 class="testimonial02_title"><strong>'.$testimonial->post_title .'</strong></h4>';
                                  $html .= '<p class="testimonial02_position no-margin">'.esc_html($metabox_job_position).' <span class="testimonial-company">'.$metabox_company.'</span></p>';
                              $html .= '</div>';
                              $html .= '<div class="clearfix"></div>';

                              $html .= '<div class="testimonial02_text_content"><p class="no-margin">'.strip_tags($content).'</p></div>';
                            $html .= '</div>';
                        $html .= '</div>';
      		            $html .= '</div>';
                    $html .= '</div>';
                  $html .= '</div>';
    	          $html .= '</div>';

            }
        $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('testimonials02', 'modeltheme_shortcode_testimonials02');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
            "name" => esc_attr__("MT - Testimonials Slider", 'modeltheme'),
            "base" => "testimonials02",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                  "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Number of testimonials to show", 'modeltheme'),
                   "param_name" => "number",
                   "value" => "",
                   "description" => ""
                ),
                array(
                  "group" => "Animation",
                   "type" => "dropdown",
                   "heading" => esc_attr__("Animation", 'modeltheme'),
                   "param_name" => "animation",
                   "std" => '',
                   "holder" => "div",
                   "class" => "",
                   "description" => "",
                   "value" => $animations_list
                )
            )
        )
    );
}



?>