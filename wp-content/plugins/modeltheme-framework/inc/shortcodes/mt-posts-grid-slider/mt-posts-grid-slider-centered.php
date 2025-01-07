<?php 


/**

||-> Shortcode: BlogPost01

*/
function modeltheme_posts_grid_slider_centered($params, $content) {
    extract( shortcode_atts( 
        array(
            'posts_query' => '',
            'animation'           =>'',
            'columns'             =>''
        ), $params ) );


      $output = '';

      if (is_array($posts_query)) {
          $posts_query['post_status'] = 'publish';
      }else {
          $posts_query .= '|post_status:publish';
      }

      if (function_exists('vc_build_loop_query')) {
          list($query_args, $loop) = vc_build_loop_query($posts_query);
          $loop = new WP_Query($query_args);
      }else {
          $query_args = array('posts_per_page' => 10, 'ignore_sticky_posts' => 1);
          // just display first 10 posts if the user came directly to this shortcode
          $loop = new WP_Query($query_args);
      }


      // Loop through the posts and do something with them.
      if ($loop->have_posts()) :

          $output .= '<div id="mt_posts_carousel_big_centered" class="owl-carousel mt-posts-carousel-centered mt-posts-carousel-big-'.uniqid().'">';
            while ($loop->have_posts()) : $loop->the_post();
                $output .= '<article id="post-big-' . get_the_ID() . '" class="' . join(' ', get_post_class('', get_the_ID())) . '">';
                    $output .= '<div class="mt-post-image">';
                      $output .= get_the_post_thumbnail(get_the_ID(), 'zidex_post_wide_full');

                      $output .= '<div class="mt_posts_carousel_big_centered-group">';
                        $output .= '<div class="mt_posts_carousel_big_centered-inner text-center">';
                          $output .= '<div class="group-meta">'.esc_attr__('Date: ', 'modeltheme').'<span>'. get_the_date().'</span></div>';
                          $output .= '<h3 class="mt-post-title">';
                            $output .= '<a href="' . get_permalink() . '" title="' . esc_attr(get_the_title()) . '" rel="bookmark">' . esc_attr(get_the_title()) . '</a>';
                          $output .= '</h3>';
                          if (get_the_tags()) {
                          $output .= '<div class="group-meta">'.esc_attr__('Tags: ', 'modeltheme'). get_the_term_list( get_the_ID(), 'post_tag', '', ' | ' ).'</div>';
                          }
                        $output .= '</div>';
                      $output .= '</div>';

                    $output .= '</div>';
                $output .= '</article>';
            endwhile;
            wp_reset_postdata();
          $output .= '</div>';

      endif;

    return $output;
}
add_shortcode('mt_posts_grid_slider_centered', 'modeltheme_posts_grid_slider_centered');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


    vc_map( array(
     "name" => esc_attr__("MT - Blog Posts Grid Slider Centered", 'modeltheme'),
     "base" => "mt_posts_grid_slider_centered",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
            "group" => "Options",
            'type' => 'loop',
            'param_name' => 'posts_query',
            'heading' => __('Posts query', 'modeltheme'),
            'value' => 'size:10|order_by:date',
            'settings' => array(
                'size' => array(
                    'hidden' => false,
                    'value' => 10,
                ),
                'order_by' => array('value' => 'date'),
                'post_type' => array(
                    'hidden' => false,
                ),
            ),
            'description' => __('Create WordPress loop, to populate content from your site.', 'modeltheme'),
            'admin_label' => true
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Items Per Row"),
           "param_name" => "columns",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('1 columns')     => 'col-sm-12',
            esc_attr__('2 columns')     => 'col-sm-6',
            esc_attr__('3 columns')     => 'col-sm-4'
           )
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