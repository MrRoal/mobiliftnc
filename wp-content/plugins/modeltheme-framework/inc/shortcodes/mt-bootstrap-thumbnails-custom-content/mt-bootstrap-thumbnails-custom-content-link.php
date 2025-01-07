<?php

/**

||-> Shortcode: Thumbnails Custom Content Link

*/
function modeltheme_thumbnails_custom_content_link_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'image'         => '',
            'heading'       => '',
            'description'   => '',
            'active'        => '',
            'add_url'       => '',
            'el_class'      => '',
            'content_align' => '',
            'animation'     => ''
        ), $params ) ); 
    $thumb      = wp_get_attachment_image_src($image, "large");
    $thumb_src  = $thumb[0]; 
    $content = '';
    $content .= '<a href="'.$add_url.'" class="mt_thumbnails_custom_content_link '.$el_class.'">';
        $content .= '<div class="mt_thumbnails_custom_content_link_content" data-animate="'.$animation.'" style="text-align:'.$content_align.'">';
            $content .= '<img data-holder-rendered="true" src="'.$thumb_src.'" data-src="'.$thumb_src.'" alt="'.$heading.'">';
            $content .= '<div class="caption">';
                if (!empty($heading)) {
                    $content .= '<h3>'.$heading.'</h3>';  
                }
                if (!empty($description)) {
                    $content .= '<p>'.$description.'</p>';
                }
            $content .= '</div>';
        $content .= '</div>';
    $content .= '</a>';
    return $content;
}
add_shortcode('thumbnails_custom_content_link', 'modeltheme_thumbnails_custom_content_link_shortcode');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
        "name" => esc_attr__("MT - Thumbnails custom content link", 'modeltheme'),
        "base" => "thumbnails_custom_content_link",
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
                "value" => esc_attr__( "Thumbnail label", 'modeltheme' ),
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
                "heading" => esc_attr__( "Add URL", 'modeltheme' ),
                "param_name" => "add_url",
                "value" => "#",
                "description" => ""
            ),
            array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_attr__("Content Alignment:", 'modeltheme'),
               "param_name" => "content_align",
               "std" => '',
               "value" => array(
                    esc_attr__('Left', 'modeltheme')    => 'left',
                    esc_attr__('Center', 'modeltheme')  => 'center',
                    esc_attr__('Right', 'modeltheme')   => 'right'
               )
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
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "modeltheme"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
            )
        )
    ));
}