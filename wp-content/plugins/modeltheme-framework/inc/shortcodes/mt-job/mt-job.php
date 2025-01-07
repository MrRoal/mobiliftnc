<?php

/**

||-> Shortcode: Job

*/
function modeltheme_job($params, $content) {
    extract( shortcode_atts( 
        array(
            'image'         => '',
            'heading'       => '',
            'location'      => '',
            'job'           => '',
            'description'   => '',
            'active'        => '',
            'button_url'    => '',
            'button_text'   => '',
            'animation'     => ''
        ), $params ) ); 
    $thumb      = wp_get_attachment_image_src($image, "large");
    $thumb_src  = $thumb[0]; 
    $content = '';
    $content .= '<div class="mt-job animateIn" data-animate="'.$animation.'">';
        $content .= '<div class="mt-job-top">';
            $content .= '<img data-holder-rendered="true" class="col-md-4 padding-left-0" src="'.$thumb_src.'" data-src="'.$thumb_src.'" alt="'.$heading.'">';
            if (!empty($heading)) {
                $content .= '<h3 class="col-md-8">'.$heading.'</h3>';  
            }
            if (!empty($location)) {
                $content .= '<h5 class="col-md-8"><i class="fa fa-map-marker"></i>'.$location.'</h5>';  
            }
        $content .= '</div>';
        $content .= '<div class="mt-job-bottom">';
            if (!empty($job)) {
                $content .= '<h4>'.$job.'</h4>';  
            }
            if (!empty($description)) {
                $content .= '<p>'.$description.'</p>';
            }
            if (!empty($button_text)) {
                $content .= '<a href="'.$button_url.'" class="button" role="button">'.$button_text.'</a>';
            }
        $content .= '</div>';
    $content .= '</div>';
    return $content;
}
add_shortcode('modeltheme_job_content', 'modeltheme_job');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
        "name" => esc_attr__("MT - Job", 'modeltheme'),
        "base" => "modeltheme_job_content",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "icon" => "smartowl_shortcode",
        "params" => array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Image source url", 'modeltheme' ),
                "param_name" => "image",
                "value" => "#",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Heading", 'modeltheme' ),
                "param_name" => "heading",
                "value" => esc_attr__( "Heading label", 'modeltheme' ),
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Location", 'modeltheme' ),
                "param_name" => "location",
                "value" => esc_attr__( "Location label", 'modeltheme' ),
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Job", 'modeltheme' ),
                "param_name" => "job",
                "value" => esc_attr__( "Job label", 'modeltheme' ),
                "description" => ""
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Description", 'modeltheme' ),
                "param_name" => "description",
                "value" => esc_attr__( "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.", 'modeltheme' ),
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Button URL", 'modeltheme' ),
                "param_name" => "button_url",
                "value" => "#",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Button text", 'modeltheme' ),
                "param_name" => "button_text",
                "value" => esc_attr__( "Button", 'modeltheme' ),
                "description" => ""
            ),
            array(
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