<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**

||-> Shortcode: Testimonials

*/

function modeltheme_shortcode_testimonials($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'             =>'',
            'testimonial01_color'   =>'',
            'number'                =>'',
            'visible_items'         =>'',
            'extra_class'           =>''
        ), $params ) );




    $html = '';
    $html .= '<div class="vc_row">';
        $html .= '<div class="wow '.$animation.' testimonials-shortcode-v1 testimonials-container-'.$visible_items.' '.$extra_class.' owl-carousel owl-theme">';
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
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ),'connection_testimonials_150x150' );
                
                $html.='
                	<div class="item vc_col-md-12 relative">
	                	<div class="testimonial01_item">
                          <div class="testimonail01-content">'.modeltheme_excerpt_limit($content,60).'</div>
                          <div class="testimonial01-img-holder pull-left col-md-6 col-xs-6">
                              <div class="testimonial01-img">';
                              if($thumbnail_src) { 
                                $html .= '<img src="'. $thumbnail_src[0] . '" alt="'. $testimonial->post_title .'" />';
                              }else{ 
                                $html .= '<img src="http://placehold.it/150x150" alt="'. $testimonial->post_title .'" />'; 
                              }
                              $html.='</div>
                          </div>
                          <div class="testimonail01-title col-md-6 col-xs-6"> 
                             <h2 class="name-test">'. $testimonial->post_title .'</h2>
                             <span class="testimonial-position">'. $metabox_job_position .'</span> <span class="testimonial-company">'.$metabox_company.'</span>
                          </div>

		                    </div>
	                </div>';

            }
    $html .= '</div>';

    $html .= '</div>';
    return $html;

}
add_shortcode('testimonials01', 'modeltheme_shortcode_testimonials');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    vc_map( array(
     "name" => esc_attr__("MT - Testimonials Box", 'modeltheme'),
     "base" => "testimonials01",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of testimonials", 'modeltheme' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of testimonials to show.", 'modeltheme' )
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Visible Testimonials per slide", 'modeltheme'),
          "param_name" => "visible_items",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => array(
            '1'   => '1',
            '2'   => '2',
            '3'   => '3'
            )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "heading" => __("Extra class name", "modeltheme"),
          "param_name" => "extra_class",
          "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Testimonial color", 'modeltheme' ),
          "param_name" => "testimonial01_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose testimonial color", 'modeltheme' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
}

?>