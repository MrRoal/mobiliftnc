<?php 


/**

||-> Shortcode: BlogPost02

*/
function modeltheme_shortcode_blogpost02($params, $content) {
    extract( shortcode_atts( 
        array(
            'posts_query' 	      => '',
            'animation'           =>'',
            'items_per_row'              =>''
        ), $params ) );


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
		$loop = new WP_Query($query_args);
	}


    $html = '';



	if ($loop->have_posts()) :

	    $html .= '<div class="blog-posts simple-posts blog-posts-shortcode-v2 blog-posts-shortcode wow '.$animation.'">';
		    $html .= '<div class="row">';

	        while ($loop->have_posts()) : $loop->the_post();

		        #thumbnail
		        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'zidex_news_shortcode_1000x550' );
		        
		        $content_post   = get_post(get_the_ID());
		        $content        = $content_post->post_content;
		        $content_quote        = $content_post->post_content;
		        $content        = apply_filters('the_content', $content);
		        $content        = str_replace(']]>', ']]&gt;', $content);

		        if ($thumbnail_src) {
		            $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.esc_attr(get_the_title()).'" />';
		            $post_col = 'col-md-12';
		        }else{
		            $post_col = 'col-md-12 no-featured-image';
		            $post_img = '';
		        }


	        	if(get_post_format(get_the_ID()) == 'quote'){
					$html .= '<article class="single-post list-view '.$items_per_row.'"> 
					    <div class="blog_custom title-n-excerpt">
					        <!-- POST DETAILS -->
					        <div class="post-details">
					            <div class="post-details-holder">
					                <!-- POST CONTENT / EXCERPT -->
				                    <div class="post-excerpt row">'.$content_quote.'</div>
					            </div>
					        </div>
					    </div>
					</article>';
	        	}else{

		        	$html.='<article class="single-post list-view '.$items_per_row.'">
		        			<div class="blog_custom">';
		                      	$html.='<!-- POST THUMBNAIL -->';
		                      	$html.='<div class="col-md-12 post-thumbnail">';
		                        	$html.='<a class="relative" href="'.get_permalink().'">'.$post_img;
		            				$html.='</a>';
		            			$html.='</div>';

		                      $html.='<!-- POST DETAILS -->
		                      <div class="post-details '.$post_col.'">

		                        <div class="title-n-excerpt">
		                          <div class="post-category-comment-date row">


		                              <!-- POST META: TAGS -->';
		                              if (get_the_tags()) {
		                              $html.='<span class="post-tags">
		                              		<span class="post-tags-list">'. get_the_term_list( get_the_ID(), 'post_tag', '', ', ' ).'</span><span class="post-separator">|</span>
		                              </span>';
		                          	  }

		                              '<!-- POST META: DATE -->';
		                              $html.='<span class="post-date">
		                                  <span class="post-date-list">'.esc_html(get_the_time(get_option('date_format'),get_the_ID())).'</span><span class="post-separator">|</span>
		                              </span>';


									  '<!-- POST META: AUTHOR -->';
		                          	  $html.='<span class="author">
		                          	  		 '. esc_html__( 'Post by: ', 'modeltheme' ).'<a href="'.esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )).'">'.esc_html(get_the_author()).'</a></span>';
	                              $html.='</div>


		                          <h3 class="post-name row">
		                            <a href="'.get_permalink().'" title="'. esc_attr(get_the_title()) .'">'. get_the_title() .'</a>
		                          </h3>
              				      <!-- POST CONTENT / EXCERPT -->
				                	<div class="post-excerpt"><p>'.strip_tags(modeltheme_excerpt_limit(get_the_excerpt(), 35)).' [...]'.'
				                  </p></div>

				                  <div class="clearfix"></div>
				                    <div>
				                        <a href="'.esc_url(get_the_permalink()) .'" class="more-link">
				                            '. esc_html__( 'Read more', 'modeltheme' ).'
				                        </a>
				                    </div>
				                    <div class="clearfix"></div>

		                        </div>
		                      </div>
		                    </div>';
		        	$html.='</article>';
		        }
            endwhile;
            wp_reset_postdata();

		    $html .= '</div>';
	    $html .= '</div>';

	endif;


    return $html;
}
add_shortcode('blogpost02', 'modeltheme_shortcode_blogpost02');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  $post_category_tax = get_terms('category');
  $post_category = array();
  $post_category['All Posts from all categories'] = '';
  foreach ( $post_category_tax as $term ) {
    $post_category[$term->name] = $term->slug;
  }

    vc_map( array(
     "name" => esc_attr__("MT - Blog Posts List", 'modeltheme'),
     "base" => "blogpost02",
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
            "heading" => esc_attr__("Posts per Row", 'modeltheme'),
            "param_name" => "items_per_row",
            "std" => '',
            "description" => "",
            "value" => array(
                esc_attr__('1 / Row', 'modeltheme')     => 'col-md-12 normal-h',
                esc_attr__('2 / Row', 'modeltheme')        => 'col-md-6 medium-h',
                esc_attr__('3 / Row', 'modeltheme')     => 'col-md-4 small-h',
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