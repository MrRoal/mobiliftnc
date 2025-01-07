<?php
function zidex_child_scripts() {
    wp_enqueue_style( 'zidex-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'zidex_child_scripts' );
 
//start add for pdf upload brochure on product page
class Advanced_Options {
    private $config = '{"title":"Advanced Options","prefix":"advanced_options_","domain":"advanced-options","class_name":"Advanced_Options","post-type":["product"],"context":"normal","priority":"default","fields":[{"type":"media","label":"Upload Brochure","return":"url","id":"advanced_options_pdf"}]}';

    public function __construct() {
        $this->config = json_decode( $this->config, true );
        add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
        add_action( 'admin_head', [ $this, 'admin_head' ] );
        add_action( 'save_post', [ $this, 'save_post' ] );
    }

    public function add_meta_boxes() {
        foreach ( $this->config['post-type'] as $screen ) {
            add_meta_box(
                sanitize_title( $this->config['title'] ),
                $this->config['title'],
                [ $this, 'add_meta_box_callback' ],
                $screen,
                $this->config['context'],
                $this->config['priority']
            );
        }
    }

    public function admin_enqueue_scripts() {
        global $typenow;
        if ( in_array( $typenow, $this->config['post-type'] ) ) {
            wp_enqueue_media();
        }
    }

    public function admin_head() {
        global $typenow;
        if ( in_array( $typenow, $this->config['post-type'] ) ) {
            ?><script>
                jQuery.noConflict();
                (function($) {
                    $(function() {
                        $('body').on('click', '.rwp-media-toggle', function(e) {
                            e.preventDefault();
                            let button = $(this);
                            let rwpMediaUploader = null;
                            rwpMediaUploader = wp.media({
                                title: button.data('modal-title'),
                                button: {
                                    text: button.data('modal-button')
                                },
                                multiple: true
                            }).on('select', function() {
                                let attachment = rwpMediaUploader.state().get('selection').first().toJSON();
                                button.prev().val(attachment[button.data('return')]);
                            }).open();
                        });
                    });
                })(jQuery);
            </script><?php
        }
    }

    public function save_post( $post_id ) {
        foreach ( $this->config['fields'] as $field ) {
            switch ( $field['type'] ) {
                default:
                    if ( isset( $_POST[ $field['id'] ] ) ) {
                        $sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
                        update_post_meta( $post_id, $field['id'], $sanitized );
                    }
            }
        }
    }

    public function add_meta_box_callback() {
        $this->fields_table();
    }

    private function fields_table() {
        ?><table class="form-table" role="presentation">
            <tbody><?php
                foreach ( $this->config['fields'] as $field ) {
                    ?><tr>
                        <th scope="row"><?php $this->label( $field ); ?></th>
                        <td><?php $this->field( $field ); ?></td>
                    </tr><?php
                }
            ?></tbody>
        </table><?php
    }

    private function label( $field ) {
        switch ( $field['type'] ) {
            case 'media':
                printf(
                    '<label class="" for="%s_button">%s</label>',
                    $field['id'], $field['label']
                );
                break;
            default:
                printf(
                    '<label class="" for="%s">%s</label>',
                    $field['id'], $field['label']
                );
        }
    }

    private function field( $field ) {
        switch ( $field['type'] ) {
            case 'media':
                $this->input( $field );
                $this->media_button( $field );
                break;
            default:
                $this->input( $field );
        }
    }

    private function input( $field ) {
        if ( $field['type'] === 'media' ) {
            $field['type'] = 'text';
        }
        printf(
            '<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
            isset( $field['class'] ) ? $field['class'] : '',
            $field['id'], $field['id'],
            isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
            $field['type'],
            $this->value( $field )
        );
    }

    private function media_button( $field ) {
        printf(
            ' <button class="button rwp-media-toggle" data-modal-button="%s" data-modal-title="%s" data-return="%s" id="%s_button" name="%s_button" type="button">%s</button>',
            isset( $field['modal-button'] ) ? $field['modal-button'] : __( 'Select this file', 'advanced-options' ),
            isset( $field['modal-title'] ) ? $field['modal-title'] : __( 'Choose a file', 'advanced-options' ),
            $field['return'],
            $field['id'], $field['id'],
            isset( $field['button-text'] ) ? $field['button-text'] : __( 'Upload', 'advanced-options' )
        );
    }

    private function value( $field ) {
        global $post;
        if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
            $value = get_post_meta( $post->ID, $field['id'], true );
        } else if ( isset( $field['default'] ) ) {
            $value = $field['default'];
        } else {
            return '';
        }
        return str_replace( '\u0027', "'", $value );
    }

}
new Advanced_Options;
//end add for pdf upload brochure on product page

//start function for view browchure and request quote short code
function view_brochure_quote_product_shortcode() { 
    $view_brochure_link = get_post_meta( get_the_ID(), 'advanced_options_pdf', true );
	$html = "";
	if($view_brochure_link) { 
		$html .= '<a href="'. $view_brochure_link .'" target="_blank" class="button product_type_simple product-advance-btn">View Brochure</a>';
	} 
	$html .= '<a href="'. site_url(). '/shop/leasing/" target="_blank" class="button product_type_simple product-advance-btn">Request Quote</a>';
	
// Output needs to be return
return $html;
} 
// register shortcode
add_shortcode('view_brochure_quote_button', 'view_brochure_quote_product_shortcode');
//end function
?>