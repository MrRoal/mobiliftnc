<?php 
class Modeltheme_Instagram_Feed {

    /**
     * Get things started
     */
    public function __construct() {

        add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
        add_shortcode('mt_instagram_feed', array($this, 'mt_instagram_feed_shortcode'));
        add_action('init', array($this, 'map_vc_element'));

    }

    function load_scripts() {
        wp_enqueue_script( 'instafeed', plugin_dir_url( __FILE__ ) . 'instafeed.min.js', array('jquery'), '1.0.0', true );
    }

    /**
    ||-> Shortcode: toggle
    */
    public function mt_instagram_feed_shortcode($params,  $content = NULL) {
        extract( shortcode_atts( 
            array(
                'hashtag'                     =>''
            ), $params ) 
        );

        $html = '';
        $html .= '<div id="instafeed" class="mt_instagram_feed_shortcode"></div>';
        // $html .= "<script>
        //             var userFeed = new Instafeed({
        //                 get: 'tagged',
        //                 tagName: 'travel',
        //                 clientId: '02b47e1b98ce4f04adc271ffbd26611d',
        //                 accessToken: '4087253986.54da896.b87b07b1088d4bf4a220eac9ca3e7ba5',
        //                 resolution: 'standard_resolution',
        //                 template: '<a href=\"{{link}}\" target=\"_blank\" id=\"{{id}}\"><img src=\"{{image}}\" /></a>',
        //                 sortBy: 'most-recent',
        //                 limit: 4,
        //                 links: false
        //             });
        //             userFeed.run();
        //           </script>";

        
        return $html;
    }

    /**
    ||-> Map Shortcode in Visual Composer with: vc_map();
    */
    function map_vc_element(){
        if (function_exists("vc_map")) {
            vc_map( array(
                "name" => esc_attr__("MT - Instagram Feed", 'modeltheme'),
                "base" => "mt_instagram_feed",
                "content_element" => true,
                "show_settings_on_create" => true,
                "icon" => "smartowl_shortcode",
                "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
                "js_view" => 'VcColumnView',
                "is_container" => true,
                "params" => array(
                    array(
                    	"group" => "General Options",
                        "type" => "textfield",
                        "heading" => __("Hashtag", "modeltheme"),
                        "param_name" => "hashtag",
                        "description" => __("Get Instagram Feed by Hashtag / Username")
                    ),
                ),
            ) );
        }
    }
}


// Initialize Element Class
if (class_exists('Modeltheme_Instagram_Feed')) {
    new Modeltheme_Instagram_Feed();
}
?>