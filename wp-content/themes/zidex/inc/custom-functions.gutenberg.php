<?php
// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'zidex_add_gutenberg_assets' );
/**
 * Load Gutenberg stylesheet.
 */
function zidex_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'zidex-gutenberg-style', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), false );
    wp_enqueue_style( 
        'zidex-gutenberg-fonts', 
        '//fonts.googleapis.com/css?family=Oswald:300,400,500,600,700|Montserrat:300,400,500,600,700,800,900' 
    ); 
}
?>