<?php

/**

||-> Shortcode: Team

*/
function modeltheme_thumbnails_team($params, $content) {
    extract( shortcode_atts( 
        array(
            'image'             => '',
            'name'              => '',
            'job'               => '',
            'description'       => '',
            'active'            => '',
            'name_color'        => '',
            'job_color'         => '',
            'description_color' => '',
            'background_color'  => '',
            'animation'         => ''
        ), $params ) ); 
    $thumb      = wp_get_attachment_image_src($image, "large");
    $thumb_src  = $thumb[0]; 
    $content = '';
    $content .= '<div class="mt_team animateIn relative" data-animate="'.$animation.'">';
        $content .= '<img data-holder-rendered="true" src="'.$thumb_src.'" data-src="'.$thumb_src.'" alt="'.$name.'">';
        $content .= '<div class="mt_team_content" style="background:'.$background_color.'">';
            if (!empty($name)) {
                $content .= '<h3 style="color:'.$name_color.'">'.$name.'</h3>';  
            }
            if (!empty($job)) {
                $content .= '<p style="color:'.$job_color.'">'.$job.'</p>';
            }
            if (!empty($description)) {
                $content .= '<p style="color:'.$description_color.'">'.$description.'</p>';
            }
        $content .= '</div>';
    $content .= '</div>';
    return $content;
}
add_shortcode('mt_team', 'modeltheme_thumbnails_team');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
        "name" => esc_attr__("MT - Team", 'modeltheme'),
        "base" => "mt_team",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "icon" => "smartowl_shortcode",
        "params" => array(
            array(
                "group" => "Options",
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Image source url", 'modeltheme' ),
                "param_name" => "image",
                "value" => "#",
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Name", 'modeltheme' ),
                "param_name" => "name",
                "value" => esc_attr__( "Team label", 'modeltheme' ),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Job", 'modeltheme' ),
                "param_name" => "job",
                "value" => esc_attr__( "Team label", 'modeltheme' ),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Description", 'modeltheme' ),
                "param_name" => "description",
                "value" => esc_attr__( "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.", 'modeltheme' ),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "dropdown",
                "heading" => esc_attr__("Animation", 'modeltheme'),
                "param_name" => "animation",
                "std" => 'fadeInLeft',
                "holder" => "div",
                "class" => "",
                "description" => "",
                "value" => $animations_list
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Choose custom name color", 'modeltheme' ),
                "param_name" => "name_color",
                "value" => '', //Default color
                "description" => esc_attr__( "Choose text color", 'modeltheme' )
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Choose custom job color", 'modeltheme' ),
                "param_name" => "job_color",
                "value" => '', //Default color
                "description" => esc_attr__( "Choose text color", 'modeltheme' )
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Choose custom description color", 'modeltheme' ),
                "param_name" => "description_color",
                "value" => '', //Default color
                "description" => esc_attr__( "Choose text color", 'modeltheme' )
            ),
            array(
                "group" => "Styling",
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_attr__( "Choose custom background color", 'modeltheme' ),
                "param_name" => "background_color",
                "value" => '', //Default color
                "description" => esc_attr__( "Choose background color", 'modeltheme' )
            )
        )
    ));
}