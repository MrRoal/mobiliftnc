<?php

/**

||-> Shortcode: Title and Subtitle

*/
function modeltheme_heading_title_subtitle_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'title'                         => '',
            'subtitle'                      => '',
            'title_color'                   => '',
            'title_colorpicker'             => '',
            'subtitle_color'                => '',
            'subtitle_colorpicker'          => '',
            'align_title'                   => '',
            'subtitle_position'             => '',
            'title_subtitle_style_variant'  => '',
            'animation'                     => ''
        ), $params ) ); 

    if ($title_subtitle_style_variant == "title_subtitle_style_v1") {
        $stylesheet_title = '';
        if ($title_colorpicker) {
            $stylesheet_title = 'color: '.$title_colorpicker.';';
        }
        $stylesheet_subtitle = '';
        if ($subtitle_colorpicker) {
            $stylesheet_subtitle = 'color: '.$subtitle_colorpicker.';';
        }

        $content = '<div class="title-subtile-holder  animateIn '.$align_title.' '.$title_subtitle_style_variant.'" data-animate="'.$animation.'">';
        $content .= '<h1 style="'.$stylesheet_title.'" class="section-title '.$title_color.'">'.$title.'</h1>';
        $content .= '<h1 style="'.$stylesheet_title.'" class="section-title absolute section-title-opacity">'.$title.'</h1>';
        $content .= '<div style="'.$stylesheet_subtitle.'" class="section-subtitle '.$subtitle_color.'">'.$subtitle.'</div>';
        $content .= '</div>';
        return $content;

    } else if($title_subtitle_style_variant == "title_subtitle_style_v2"){
        $stylesheet_title = '';
        if ($title_colorpicker) {
            $stylesheet_title = 'color: '.$title_colorpicker.';';
        }
        $stylesheet_subtitle = '';
        if ($subtitle_colorpicker) {
            $stylesheet_subtitle = 'color: '.$subtitle_colorpicker.';';
        }

        $content = '<div class="title-subtile-holder  animateIn '.$align_title.' '.$title_subtitle_style_variant.' '.$subtitle_position.'" data-animate="'.$animation.'">';
        $content .= '<h1 style="'.$stylesheet_title.'" class="section-title '.$title_color.'">'.$title.'</h1>';
        if (!empty($subtitle)) {
            $content .= '<div style="'.$stylesheet_subtitle.'" class="section-subtitle '.$subtitle_color.'">'.$subtitle.'</div>';
        }
        $content .= '</div>';
        return $content;
    }

}
add_shortcode('heading_title_subtitle', 'modeltheme_heading_title_subtitle_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
            "name" => esc_attr__("MT - Heading with Title and Subtitle", 'modeltheme'),
            "base" => "heading_title_subtitle",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Section title", 'modeltheme' ),
                    "param_name" => "title",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Section subtitle", 'modeltheme'),
                    "param_name" => "subtitle",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "group" => "Options",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Subtitle Alignment", 'modeltheme'),
                    "param_name" => "align_title",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Align elements center', 'modeltheme')     => 'text_center',
                        esc_attr__('Align elements right', 'modeltheme')     => 'text_right',
                        esc_attr__('Align elements left', 'modeltheme')     => 'text_left',
                    )
                ),
                array(
                    "group" => "Options",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Style Variant", 'mtlistings'),
                    "param_name" => "title_subtitle_style_variant",
                    "std" => '',
                    "description" => "",
                    "value" => array(
                        esc_attr__('Style 1', 'modeltheme')         => 'title_subtitle_style_v1',
                        esc_attr__('Style 2', 'modeltheme')         => 'title_subtitle_style_v2',
                    )
                ),
                array(
                    "group" => "Options",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Subtitle Position", 'modeltheme'),
                    "param_name" => "subtitle_position",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Subtitle in right', 'modeltheme')     => 'subtitle_right',
                        esc_attr__('Subtitle above', 'modeltheme')        => 'subtitle_above',
                    ),
                    "dependency" => array(
                       'element' => 'title_subtitle_style_variant',
                       'value' => array( 'title_subtitle_style_v2' ),
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Title Color", 'modeltheme'),
                    "param_name" => "title_color",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Light color title for dark section', 'modeltheme')     => 'light_title',
                        esc_attr__('Dark color title for light section', 'modeltheme')     => 'dark_title',
                        esc_attr__('Custom Color', 'modeltheme')     => 'custom_color'
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "colorpicker",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Title Custom Color", 'modeltheme'),
                    "param_name" => "title_colorpicker",
                    "description" => "",
                    'dependency' => array(
                        'element' => 'title_color',
                        'value' => 'custom_color',
                    ),
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Subtitle Color", 'modeltheme'),
                    "param_name" => "subtitle_color",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Light color subtitle for dark section', 'modeltheme')     => 'light_subtitle',
                        esc_attr__('Dark color subtitle for light section', 'modeltheme')     => 'dark_subtitle',
                        esc_attr__('Custom Color', 'modeltheme')     => 'custom_color'
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "colorpicker",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Subtitle Custom Color", 'modeltheme'),
                    "param_name" => "subtitle_colorpicker",
                    "description" => "",
                    'dependency' => array(
                        'element' => 'subtitle_color',
                        'value' => 'custom_color',
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_attr__("Animation", 'modeltheme'),
                    "param_name" => "animation",
                    "std" => '',
                    "holder" => "div",
                    "class" => "",
                    "description" => "",
                    "value" => $animations_list,
                    "group" => "Animation"
                )              
            )
        )
    );
}