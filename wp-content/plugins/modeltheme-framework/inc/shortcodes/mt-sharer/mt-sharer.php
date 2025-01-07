<?php

/**

||-> Shortcode: Share

*/

function mt_sharer_shortcode($params, $content) {

    extract( shortcode_atts( 
        array(
            'tooltip_placement'                 => '',
        ), $params ) );

    $html = '';
    $html .= '<div class="article-social">
                <ul class="social-sharer">
                    <li class="facebook">
                        <a data-toggle="tooltip" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.facebook.com/share.php?u='.get_permalink().'&amp;title='.get_the_title().'"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="twitter">
                        <a data-toggle="tooltip" data-placement="'.esc_attr($tooltip_placement).'" href="http://twitter.com/home?status='.get_the_title().'+'.get_permalink().'"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="google-plus">
                        <a data-toggle="tooltip" data-placement="'.esc_attr($tooltip_placement).'" href="https://plus.google.com/share?url='.get_permalink().'"><i class="fa fa-google"></i></a>
                    </li>
                </ul>
            </div>';

    return $html;
}

add_shortcode('mt_sharer', 'mt_sharer_shortcode');


?>