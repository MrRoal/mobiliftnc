<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Panel', 'zidex' ),
        'page_title'           => esc_html__( 'Theme Panel', 'zidex' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'zidex_redux',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        
        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.WordPress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon' => get_template_directory_uri().'/images/svg/theme-panel-menu-icon.svg', // Specify a custom URL to an icon
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
        'show_options_object'       => false,

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__( 'Theme Support', 'zidex'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://themeforest.net/downloads'),
        'title' => esc_html__( 'Rate this theme', 'zidex'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.com'),
        'title' => esc_html__( 'ModelTheme.com', 'zidex'),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => esc_url('https://www.facebook.com/modeltheme'),
        'title' => esc_html__('Like us on Facebook', 'zidex'),
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://twitter.com/modeltheme'),
        'title' => esc_html__('Follow us on Twitter', 'zidex'),
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__('Submit a Ticket', 'zidex'),
        'icon'  => 'el el-cog'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.com/'),
        'title' => esc_html__('ModelTheme Website', 'zidex'),
        'icon'  => 'el el-globe'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( '', $v );
    } else {
        $args['intro_text'] = '';
    }

    // Add content after the form.
    $args['footer_text'] = '';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'zidex' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'zidex' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'zidex' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'zidex' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'zidex' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */




    function zidex_get_page_by_post_name($post_name, $output = OBJECT, $post_type = 'post' ){
        global $wpdb;
        $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type= %s", $post_name, $post_type ) );

        if ( $page ) return get_post( $page, $output );

        return null;
    }
    add_action('init','zidex_get_page_by_post_name');

    /*
     *
     * ---> START SECTIONS
     *
     */


    include_once(get_template_directory(). '/redux-framework/modeltheme-config.arrays.php');
    include_once(get_template_directory(). '/redux-framework/modeltheme-config.responsive.php');
    /**
    ||-> SECTION: General Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General Settings', 'zidex' ),
        'id'    => 'mt_general',
        'icon'  => 'el el-icon-wrench'
    ));
    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'zidex' ),
        'id'         => 'mt_general_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_breadcrumbs',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Breadcrumbs %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_breadcrumbs_delimitator',
                'type'     => 'text',
                'title'    => esc_html__('Breadcrumbs delimitator', 'zidex'),
                'subtitle' => esc_html__('Set a breadcrumbs delimitator.', 'zidex'),
                'desc'     => esc_html__('For example: "/", "-" or "->"', 'zidex'),
                'default'  => '/'
            ),
            array(
                'id' => 'mt_breadcrumbs_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Breadcrumbs image', 'zidex'),
                'subtitle' => esc_html__('(Only for Posts and non-pages). For pages, this image can be set as featured image.', 'zidex'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/breadcrumbs.jpg'),
            ),
            array(
                'id'       => 'mt_body_global_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Global Background', 'zidex' ),
                'subtitle' => esc_html__( 'Default: #fff', 'zidex' ),
                'default'  => '#ffffff',
            ),
        ),
    ));
    // Back to Top
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Back to Top Button', 'zidex' ),
        'id'         => 'mt_general_back_to_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_backtotop_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Back to Top Button Status', 'zidex'),
                'subtitle' => esc_html__('Enable or disable "Back to Top Button"', 'zidex'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_backtotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Backgrond', 'zidex'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'zidex'),
                'validate' => 'color',
                'default' => '#ffb716',
            ),
            array(
                'id'       => 'mt_backtotop_bg_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Backgrond - Hover', 'zidex'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'zidex'),
                'validate' => 'color',
                'default' => '#151515',
            ),
            array(
                'id'       => 'mt_backtotop_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Icon Color', 'zidex'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'zidex'),
                'validate' => 'color',
                'default' => '#fff',
            ),
            array(
                'id'       => 'mt_backtotop_text_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Icon Color - Hover', 'zidex'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'zidex'),
                'validate' => 'color',
                'default' => '#fff',
            ),

        ),
    ));

    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Preloader', 'zidex' ),
        'id' => 'mt_general_preloader',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'mt_divider_preloader_status',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Page Preloader Status %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_preloader_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Enable Page Preloader', 'zidex'),
                'subtitle' => esc_html__('Enable or disable page preloader', 'zidex'),
                'default'  => false,
            ),
            array(
                'id'   => 'mt_divider_preloader_styling',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Page Preloader Styling %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(         
                'id'       => 'mt_preloader_bg_color',
                'type'     => 'background',
                'title'    => esc_html__('Page Preloader Backgrond', 'zidex'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'zidex'),
                'output' => array(
                    'body .zidex_preloader_holder'
                )
            ),
            array(
                'id'       => 'mt_preloader_color',
                'type'     => 'color',
                'title'    => esc_html__('Preloader color:', 'zidex'), 
                'subtitle' => esc_html__('Default: #ffffff', 'zidex'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
        ),
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebars', 'zidex' ),
        'id'         => 'mt_general_sidebars',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_sidebars',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Generate Infinite Number of Sidebars %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_dynamic_sidebars',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Sidebars', 'zidex' ),
                'subtitle' => esc_html__( 'Use the "Add More" button to create unlimited sidebars.', 'zidex' ),
                'add_text' => esc_html__( 'Add one more Sidebar', 'zidex' ),
                'default'   => array(
                    'Burger Sidebar',
                    'Sidebar 2'
                ),
            ),
        ),
    ));

    /**
    ||-> SECTION: Styling Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Styling Settings', 'zidex' ),
        'id'    => 'mt_styling',
        'icon'  => 'el el-icon-magic'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Global Fonts', 'zidex' ),
        'id'         => 'mt_styling_global_fonts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_googlefonts',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Import Infinite Google Fonts %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_google_fonts_select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => esc_html__('Import Google Font Globally', 'zidex'), 
                'subtitle' => esc_html__('Select one or multiple fonts', 'zidex'),
                'desc'     => esc_html__('Importing fonts made easy', 'zidex'),
                'options'  => $google_fonts_list,
                'default'  => array(
                    'Montserrat:200,300,400,500,600,700,800,900',
                    'Oswald:300,regular,700,latin-ext,latin'
                ),
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Skin color', 'zidex' ),
        'id'         => 'mt_styling_skin_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_predefined_skin',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Select a Predefined Skin %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_predefined_skin',
                'type'     => 'palette',
                'title'    => esc_html__( 'Predefined Skin', 'zidex' ),
                'default'  => 'skin_yellow3',
                'palettes' => array(
                    'skin_blue'  => array(
                        '#3498db',
                        '#2980b9',
                        '#454646',
                    ),
                    'skin_blue2'  => array(
                        '#483ca8',
                        '#3e3492',
                        '#454646',
                    ),
                    'skin_black'  => array(
                        '#252525',
                        '#4f4f4f',
                        '#454646',
                    ),
                    'skin_black_blue'  => array(
                        '#374b9f',
                        '#2d2d2d',
                        '#454646',
                    ),
                    'skin_turquoise'  => array(
                        '#1abc9c',
                        '#16a085',
                        '#454646',
                    ),
                    'skin_green'  => array(
                        '#2ecc71',
                        '#27ae60',
                        '#454646',
                    ),
                    'skin_purple'  => array(
                        '#9b59b6',
                        '#8e44ad',
                        '#454646',
                    ),
                    'skin_yellow'  => array(
                        '#f1c40f',
                        '#f39c12',
                        '#454646',
                    ),
                    'skin_orange'  => array(
                        '#e67e22',
                        '#d35400',
                        '#454646',
                    ),
                    'skin_red'  => array(
                        '#e74c3c',
                        '#c0392b',
                        '#454646',
                    ),
                    'skin_gray'  => array(
                        '#95a5a6',
                        '#7f8c8d',
                        '#454646',
                    ),
                    'skin_yellow2'  => array(
                        '#ffd600',
                        '#e5c000',
                        '#454646',
                    ),
                    'skin_yellow3'  => array(
                        '#151515',
                        '#ffb716',
                        '#454646',
                    ),
                )
            ),
            array(
                'id'   => 'mt_divider_main_colors',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Custom Skin Colors & Backgrounds %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_enable_custom_skin',
                'type'     => 'switch',
                'title'    => esc_html__( 'Custom Skin Colors', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Custom Skin Colors (These color pickers will replace the default or predefined color palletes.)', 'zidex' ),
                'default'  => 0,
                'on'       => 'Enable',
                'off'      => 'Disable',
            ),

            array(
                'id'       => 'mt_style_main_backgrounds_color',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color', 'zidex'), 
                'subtitle' => esc_html__('Default: #151515', 'zidex'),
                'default'  => '#151515',
                'validate' => 'color',
                'required' => array( 'mt_enable_custom_skin', '=', '1' ),
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color (hover)', 'zidex'), 
                'subtitle' => esc_html__('Default: #ffb716', 'zidex'),
                'default'  => '#ffb716',
                'validate' => 'color',
                'required' => array( 'mt_enable_custom_skin', '=', '1' ),
            ),
            array(
                'id'       => 'mt_style_semi_opacity_backgrounds',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Semitransparent blocks background', 'zidex' ),
                'subtitle' => esc_html__( 'Default: rgba(255, 183, 22, 0.85)', 'zidex' ),
                'default'  => array(
                    'color' => '#ffb716',
                    'alpha' => '.85'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu',
                ),
                'mode'     => 'background',
                'required' => array( 'mt_enable_custom_skin', '=', '1' ),
            ),
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Nav Menu', 'zidex' ),
        'id'         => 'mt_styling_nav_menu',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'   => 'mt_divider_nav_menu_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Nav Menu Hover / Layout %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_nav_hover_variant',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Navigation Hover / Layout', 'zidex' ),
                'options'  => array(
                    'navstyle-v1' => array(
                        'alt' => esc_html__('Navstyle #1', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_01.png'
                    ),
                    'navstyle-v2' => array(
                        'alt' => esc_html__('Navstyle #2', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_02.png'
                    ),
                    'navstyle-v3' => array(
                        'alt' => esc_html__('Navstyle #3', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_03.png'
                    ),
                    'navstyle-v4' => array(
                        'alt' => esc_html__('Navstyle #4', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_04.png'
                    ),
                    'navstyle-v5' => array(
                        'alt' => esc_html__('Navstyle #5', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_05.png'
                    ),
                    'navstyle-v6' => array(
                        'alt' => esc_html__('Navstyle #6', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_06.png'
                    ),
                    'navstyle-v7' => array(
                        'alt' => esc_html__('Navstyle #7', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_07.png'
                    ),
                    'navstyle-v8' => array(
                        'alt' => esc_html__('Navstyle #8', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/navhovers/navhover_08.png'
                    ),
                ),
                'default'  => 'navstyle-v1'
            ),


            array(
                'id'   => 'mt_divider_nav_menu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Menus Styling %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_nav_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Text Color', 'zidex'), 
                'subtitle' => esc_html__('Default: #ffffff', 'zidex'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar .menu-item > a,
                                .navbar-nav .search_products a,
                                .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus,
                                .navbar-default .navbar-nav > li > a,
                                .navstyle-v1.header2 #navbar .menu > .menu-item > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Hover Text Color', 'zidex'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'zidex'),
                'default'  => '#ffb716',
                'validate' => 'color',
                'output' => array(
                    'color' => 'body #navbar .menu-item.selected > a, 
                                body #navbar .menu-item:hover > a, 
                                .navstyle-v1.header3 #navbar .menu > .menu-item:hover > a,
                                .navstyle-v1.header2 #navbar .menu > .menu-item:hover > a',
                )
            ),
            array(
                'id'   => 'mt_divider_nav_submenu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Submenus Styling %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_nav_submenu_background',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Background Color', 'zidex'), 
                'subtitle' => esc_html__('Default: #fff', 'zidex'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar .sub-menu, .navbar ul li ul.sub-menu',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Text Color', 'zidex'), 
                'subtitle' => esc_html__('Default: #252525', 'zidex'),
                'default'  => '#252525',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Hover Background Color', 'zidex'), 
                'subtitle' => esc_html__('Default: transparent', 'zidex'),
                'default'  => 'transparent',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Hover Text Color', 'zidex'), 
                'subtitle' => esc_html__('Default: #ffb716', 'zidex'),
                'default'  => '#ffb716',
                'validate' => 'color',
                'output' => array(
                    'color' => 'body #navbar ul.sub-menu li a:hover',
                )
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'zidex' ),
        'id'         => 'mt_styling_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_4',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Body Font family %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'          => 'mt_body_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Body Font family', 'zidex'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'line-height'  => false,
                'font-weight'  => false,
                'font-size'   => false,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_5',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Headings %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'          => 'mt_heading_h1',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H1 Font family', 'zidex'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '36px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h2',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H2 Font family', 'zidex'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '30px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h3',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H3 Font family', 'zidex'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '24px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h4',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H4 Font family', 'zidex'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '18px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h5',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H5 Font family', 'zidex'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '14px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h6',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H6 Font family', 'zidex'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '12px', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_6',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Inputs & Textareas Font family %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'                => 'mt_inputs_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Inputs Font family', 'zidex'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for inputs and textareas', 'zidex'),
                'default'           => array(
                    'font-family'       => 'Montserrat', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_7',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Buttons Font family %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'                => 'mt_buttons_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Buttons Font family', 'zidex'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for buttons', 'zidex'),
                'default'           => array(
                    'font-family'       => 'Montserrat', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_8',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Nav Menu Font family %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'                => 'mt_nav_menu_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Nav Menu Font family', 'zidex'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => true,
                'line-height'       => true,
                'font-weight'       => true,
                'font-size'         => true,
                'font-style'        => false,
                'subsets'           => false,
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for nav menu', 'zidex'),
                'default'           => array(
                    'font-family' => 'Oswald', 
                    'font-size' => '18px', 
                    'google'      => true
                ),
            ),

        ),
    ));

    /**
    ||-> SECTION: Responsive Typography
    */
    Redux::setSection( $opt_name, $responsive_headings);


    /**
    ||-> SECTION: Header Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Header Settings', 'zidex' ),
        'id'    => 'mt_header',
        'icon'  => 'el el-icon-arrow-up'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header - General', 'zidex' ),
        'id'         => 'mt_header_general',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_generalheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Global Header Options %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_header_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Header layout', 'zidex' ),
                'options'  => array(
                    'header1' => array(
                        'alt' => esc_html__('Header #1', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/1.png'
                    ),
                    'header2' => array(
                        'alt' => esc_html__('Header #2', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/2.png'
                    ),
                    'header3' => array(
                        'alt' => esc_html__('Header #3', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/3.png'
                    ),
                    'header4' => array(
                        'alt' => esc_html__('Header #4', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/4.png'
                    ),
                ),
                'default'  => 'header2'
            ),
            array(         
                'id'       => 'mt_header_main_background',
                'type'     => 'background',
                'title'    => esc_html__('Header (main-header) - background', 'zidex'),
                'subtitle' => esc_html__('Default color: #151515', 'zidex'),
                'output'      => array('header','.navbar-default'),
                'default'  => array(
                    'background-color' => '#151515',
                )
            ),

            array(
                'id'       => 'mt_is_nav_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Navigation Menu?', 'zidex'),
                'subtitle' => esc_html__('Enable or disable "sticky positioned navigation menu".', 'zidex'),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'zidex' ),
                'off'      => esc_html__( 'Disabled', 'zidex' )
            ),
            array(
                'id'   => 'mt_divider_header_stat',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Search Icon Settings(from header) %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_header_is_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon Status', 'zidex'),
                'subtitle' => esc_html__('Enable or Disable Search Icon".', 'zidex'),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'zidex' ),
                'off'      => esc_html__( 'Disabled', 'zidex' )
            ),
            array(
                'id'       => 'mt_header_is_search_custom_styling',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon - Custom Styling?', 'zidex'),
                'subtitle' => esc_html__('Enable or Disable Custom Styling for Search Icon".', 'zidex'),
                'default'  => false,
                'on'       => esc_html__( 'Yes - Add Custom Colors', 'zidex' ),
                'off'      => esc_html__( 'No - Keep Predefined Colors', 'zidex' )
            ),
            array(
                'id'       => 'mt_header_search_color',
                'type'     => 'color',
                'title'    => esc_html__('Search Icon Color', 'zidex'), 
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'mt_header_is_search_custom_styling', '=', true ),
            ),
            array(
                'id'       => 'mt_header_search_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Search Icon Color - Hover', 'zidex'), 
                'default'  => '#ffd600',
                'validate' => 'color',
                'required' => array( 'mt_header_is_search_custom_styling', '=', true ),
            ),
            array(
                'id'   => 'mt_divider_header_info_1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info First</h3>', 'zidex' )
            ),
            array(
                'id'       => 'mt_divider_header_info_1_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 1 Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 1', 'zidex' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_1_media_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Media Type', 'zidex' ),
                'subtitle' => esc_html__( 'Choose to enter text or upload an image icon or select a font icon', 'zidex' ),
                'options'  => array(
                    'font_awesome'      => esc_html__( 'Font Icon', 'zidex' ),
                    'media_image'       => esc_html__( 'Media Image', 'zidex' ),
                    'text_title'        => esc_html__( 'Text Title', 'zidex' )
                ),
                'default'  => 'text_title',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_1_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 1', 'zidex'),
                'options'  => $icons,
                'default'  => 'fa fa-phone',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','font_awesome') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_1_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'zidex'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','media_image') 
                ),
                'default' => array('url' => esc_url(get_template_directory_uri().'/images/working_time1.png')),
            ),
            array(
                'id' => 'mt_divider_header_info_1_text_1',
                'type' => 'text',
                'title' => esc_html__('Title for Header Info 1', 'zidex'),
                'subtitle' => esc_html__('Type title for Header Info 1', 'zidex'),
                'default' => 'Call Us:',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','text_title') 
                ), 
            ),
            array(
                'id' => 'mt_divider_header_info_1_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info First - Value', 'zidex'),
                'subtitle' => esc_html__('Type header info first value', 'zidex'),
                'default' => 'Work: Mon-Sat: 8 Am- 5 Pm',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_1_heading2',
                'type' => 'text',
                'title' => esc_attr__('Header Info First - Second Value', 'zidex'),
                'subtitle' => esc_attr__('Type header info first value', 'zidex'),
                'default' => 'Saturday & Sunday - Closed',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info Second</h3>', 'zidex' )
            ),
            array(
                'id'       => 'mt_divider_header_info_2_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 2 Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 2', 'zidex' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_2_media_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Media Type', 'zidex' ),
                'subtitle' => esc_html__( 'Choose to enter text or upload an image icon or select a font icon', 'zidex' ),
                'options'  => array(
                    'font_awesome'      => esc_html__( 'Font Icon', 'zidex' ),
                    'media_image'       => esc_html__( 'Media Image', 'zidex' ),
                    'text_title'        => esc_html__( 'Text Title', 'zidex' )
                ),
                'default'  => 'text_title',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_2_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 2', 'zidex'),
                'options'  => $icons,
                'default'  => 'fa fa-envelope',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','font_awesome') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_2_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'zidex'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','media_image') 
                ),
                'default' => array('url' => esc_url(get_template_directory_uri().'/images/working_location1.png')),
            ),
            array(
                'id' => 'mt_divider_header_info_2_text_2',
                'type' => 'text',
                'title' => esc_html__('Title for Header Info 2', 'zidex'),
                'subtitle' => esc_html__('Type title for Header Info 2', 'zidex'),
                'default' => 'Address:',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','text_title') 
                ), 
            ),
            array(
                'id' => 'mt_divider_header_info_2_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info Second - Value', 'zidex'),
                'subtitle' => esc_html__('Type header info second value', 'zidex'),
                'default' => 'Phone: +07 554 332 322',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_2_heading2',
                'type' => 'text',
                'title' => esc_attr__('Header Info Second - Second Value', 'zidex'),
                'subtitle' => esc_attr__('Type header info second value', 'zidex'),
                'default' => 'contact@zidex.com',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Header Info Third %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_divider_header_info_3_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info 3 Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Info 3', 'zidex' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_3_media_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Media Type', 'zidex' ),
                'subtitle' => esc_html__( 'Choose to enter text or upload an image icon or select a font icon', 'zidex' ),
                'options'  => array(
                    'font_awesome'      => esc_html__( 'Font Icon', 'zidex' ),
                    'media_image'       => esc_html__( 'Media Image', 'zidex' ),
                    'text_title'        => esc_html__( 'Text Title', 'zidex' )
                ),
                'default'  => 'text_title',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_3_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_html__('Icon for Header Info 3', 'zidex'),
                'options'  => $icons,
                'default'  => 'fa fa-clock-o',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','font_awesome') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_3_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Upload Image Icon', 'zidex'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','media_image') 
                ),
                'default' => array('url' => esc_url(get_template_directory_uri().'/images/working_phone.png')),
            ),
            array(
                'id' => 'mt_divider_header_info_3_text_3',
                'type' => 'text',
                'title' => esc_html__('Title for Header Info 3', 'zidex'),
                'subtitle' => esc_html__('Type title for Header Info 3', 'zidex'),
                'default' => 'Schedule:',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','text_title') 
                ), 
            ),
            array(
                'id' => 'mt_divider_header_info_3_heading1',
                'type' => 'text',
                'title' => esc_html__('Header Info Third - Value', 'zidex'),
                'subtitle' => esc_html__('Type header info third value', 'zidex'),
                'default' => 'New York',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_3_heading2',
                'type' => 'text',
                'title' => esc_attr__('Header Info Third - Second Value', 'zidex'),
                'subtitle' => esc_attr__('Type header info third value', 'zidex'),
                'default' => '221 Avenue Street',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),





            array(
                'id'   => 'mt_header_button',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Header Button %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_header_button_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Button Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Button', 'zidex' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),

            array(
                'id' => 'mt_header_button_text',
                'type' => 'text',
                'title' => esc_attr__('Header Button Text', 'zidex'),
                'subtitle' => esc_attr__('Type Header Button Status value', 'zidex'),
                'default' => 'Rental',
                'required' => array( 'mt_header_button_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_header_button_url',
                'type' => 'text',
                'title' => esc_html__('Header Button URL', 'zidex'),
                'subtitle' => esc_html__('Type your Header Button url.', 'zidex'),
                'validate' => 'url',
                'default' => '',
                'required' => array( 'mt_header_button_status', '=', '1' )
            )

        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo &amp; Favicon', 'zidex' ),
        'id'         => 'mt_header_logo',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_logo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Logo Settings %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id' => 'mt_logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo image', 'zidex'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
            ),
            array(
                'id'        => 'mt_logo_max_width',
                'type'      => 'slider',
                'title'     => esc_html__('Logo Max Width', 'zidex'),
                'subtitle'  => esc_html__('Use the slider to increase/decrease max size of the logo.', 'zidex'),
                'desc'      => esc_html__('Min: 5px, max: 1000px, step: 5px, default value: 200px', 'zidex'),
                "default"   => 200,
                "min"       => 5,
                "step"      => 5,
                "max"       => 1000,
                'display_value' => 'label'
            ),
            array(
                'id'   => 'mt_divider_favicon',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Favicon Settings %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id' => 'mt_favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Favicon url', 'zidex'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Use the upload button to import media.', 'zidex'),
                'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),
            )
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Top Bar', 'zidex' ),
        'id'         => 'mt_header_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_top',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Header Top Bar %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_header_top_bar_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Top Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Top', 'zidex' ),
                'desc'     => esc_html__( 'This Option Will Enable/Disable Header Top Bar', 'zidex' ),
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'zidex' ),
                'off'      => esc_html__( 'Disabled', 'zidex' ),
            ),
            array(         
                'id'       => 'mt_header_top_bg',
                'type'     => 'background',
                'title'    => esc_html__('Header Top Bar - background', 'zidex'),
                'subtitle' => esc_html__('Default color: transparent', 'zidex'),
                'output'      => array('header .top-header'),
                'default'  => array(
                    'background-color' => 'rgba(21,21,21,.4)',
                )
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Fixed Sidebar Menu', 'zidex' ),
        'id'         => 'mt_header_fixed_sidebar_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_fixed_headerstatus',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Status %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Burger Sidebar Menu Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Burger Sidebar Menu Status', 'zidex' ),
                'desc'     => esc_html__( 'This Option Will Enable/Disable The Navigation Burger + Sidebar Menu triggered by the burger menu', 'zidex' ),
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'zidex' ),
                'off'      => esc_html__( 'Disabled', 'zidex' ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_custom_styling',
                'type'     => 'switch', 
                'title'    => esc_html__('Burger Sidebar Menu - Custom Styling?', 'zidex'),
                'subtitle' => esc_html__('Enable or Disable Custom Styling for Burger Sidebar Menu Icon".', 'zidex'),
                'default'  => false,
                'on'       => esc_html__( 'Yes - Add Custom Colors', 'zidex' ),
                'off'      => esc_html__( 'No - Keep Predefined Colors', 'zidex' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Burger Sidebar Menu Color', 'zidex'), 
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'mt_header_fixed_sidebar_menu_custom_styling', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Burger Sidebar Menu Color - Hover', 'zidex'), 
                'default'  => '#ffb716',
                'validate' => 'color',
                'required' => array( 'mt_header_fixed_sidebar_menu_custom_styling', '=', true ),
            ),
            array(
                'id'   => 'mt_divider_fixed_header',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Other Options %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_bgs',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sidebar Menu Background', 'zidex' ),
                'subtitle' => esc_html__( 'Default: #202020', 'zidex' ),
                'default'   => array(
                    'color'     => '#202020',
                    'alpha'     => '1'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu'
                ),
                // These options display a fully functional color palette.  Omit this argument
                // for the minimal color picker, and change as desired.
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Texts Color', 'zidex'), 
                'default'  => '#000000',
                'validate' => 'color'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_site_title_status',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Title or Logo', 'zidex' ),
                'subtitle' => esc_html__( 'Choose what to show on fixed sidebar', 'zidex' ),
                'desc'     => esc_html__( 'Choose Between Site Title or Site Logo', 'zidex' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'site_title' => 'Title',
                    'site_logo' => 'Logo',
                    'site_nothing' => 'Disable This Feature'
                ),
                'default'  => 'site_logo'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Fixed Sidebar Menu - Sidebar', 'zidex' ),
                'subtitle' => esc_html__( 'Select Sidebar.', 'zidex' ),
                'default'   => 'sidebar-1',

            ),
            

        ),
    ) );

    /**

    ||-> SECTION: Footer Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer Settings', 'zidex' ),
        'id'    => 'mt_footer',
        'icon'  => 'el el-icon-arrow-down'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer General', 'zidex' ),
        'id'         => 'mt_footer_general',
        'subsection' => true,
        'fields'     => array(
            array(         
                'id'       => 'mt_footer_general_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer - background', 'zidex'),
                'subtitle' => esc_html__('Footer background with image or color.', 'zidex'),
                'output'      => array('footer'),
            ),
        ),
    ));


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Top Rows', 'zidex' ),
        'id'         => 'mt_footer_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_footer_top',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Footer Top Rows %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(         
                'id'       => 'mt_footer_top_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (top) - background', 'zidex'),
                'subtitle' => esc_html__('Footer background with image or color.', 'zidex'),
                'output'      => array('footer .footer-top'),
                'default'  => array(
                    'background-color' => '#fff',
                )
            ),
            array(
                'id'        => 'mt_footer_top_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Top Text Color', 'zidex' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'zidex' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'zidex' ),
                'output'    => array('color' => 'footer .footer-top .widget-title'),
                'default'   => array(
                    'color'     => '#252525',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'   => 'mt_divider_footer_row1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Footer Rows - Row #1 %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_footer_row_1',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #1 - Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 1', 'zidex' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_1_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'zidex' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                    'column_5_2_2_3' => array(
                        'alt' => esc_html__('Footer 5 + 2 + 2 + 3', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5_2_2_3.png'
                    ),
                    'column_2_10' => array(
                        'alt' => esc_html__('Footer 1 + 1', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2_10.png'
                    ),
                ),
                'default'  => 'column_2_10',
                'required' => array( 'mt_footer_row_1', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_1_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Padding', 'zidex'),
                'subtitle'       => esc_html__('Choose the spacing for the first row from footer.', 'zidex'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '30px', 
                    'padding-bottom'  => '30px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_1margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Margin', 'zidex'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'zidex'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_1border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #1 - Borders', 'zidex'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'zidex'),
                'output'   => array('.footer-row-1'),
                'all'      => false,
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '0', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Footer Rows - Row #2 %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_footer_row_2',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #2 - Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 2', 'zidex' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_2_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'zidex' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                    'column_5_2_2_3' => array(
                        'alt' => esc_html__('Footer 5 + 2 + 2 + 3', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5_2_2_3.png'
                    ),
                    'column_2_10' => array(
                        'alt' => esc_html__('Footer 1 + 1', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2_10.png'
                    ),
                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_2', '=', '1' ),
            ),
            array(
                'id'             => 'footer_row_2_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Padding', 'zidex'),
                'subtitle'       => esc_html__('Choose the spacing for the second row from footer.', 'zidex'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_2margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Margin', 'zidex'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'zidex'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_2border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #2 - Borders', 'zidex'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'zidex'),
                'output'   => array('.footer-row-2'),
                'all'      => false,
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Footer Rows - Row #3 %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_footer_row_3',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #3 - Status', 'zidex' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 3', 'zidex' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_3_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #3 - Layout', 'zidex' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                    'column_5_2_2_3' => array(
                        'alt' => esc_html__('Footer 5 + 2 + 2 + 3', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5_2_2_3.png'
                    ),
                    'column_2_10' => array(
                        'alt' => esc_html__('Footer 1 + 1', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2_10.png'
                    ),
                ),
                'default'  => '1',
                'required' => array( 'mt_footer_row_3', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_3_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Padding', 'zidex'),
                'subtitle'       => esc_html__('Choose the spacing for the third row from footer.', 'zidex'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '40px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_3margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Margin', 'zidex'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'zidex'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_3border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #3 - Borders', 'zidex'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'zidex'),
                'output'   => array('.footer-row-3'),
                'all'      => false,
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#5b50b1', 
                    'border-style'  => 'solid', 
                    'border-top'    => '1px', 
                    'border-right'  => '0', 
                    'border-bottom' => '1px', 
                    'border-left'   => '0',
                )
            )
        ),
    ));



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Bottom Bar', 'zidex' ),
        'id'         => 'mt_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_footer_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Text', 'zidex'),
                'default' => '<span class="copyright_left">'.esc_html__('Zidex Theme by ModelTheme. All Rights Reserved','zidex').'</span><span class="copyright_right">'.esc_html__('Elite Author on ThemeForest','zidex').'</span>',
            ),
            array(         
                'id'       => 'mt_footer_bottom_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (bottom) - background', 'zidex'),
                'subtitle' => esc_html__('Footer background with image or color.', 'zidex'),
                'output'      => array('footer .footer-div-parent'),
                'default'  => 'transparent',
            ),
            array(
                'id' => 'mt_logo_footer',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo image footer', 'zidex'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/logo-light.png'),
            ),
            array(
                'id'        => 'mt_footer_bottom_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Bottom Text Color', 'zidex' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'zidex' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'zidex' ),
                'output'    => array('color' => 'footer .footer .widget-title, .copyright_left, .copyright_right'),
                'default'   => array(
                    'color'     => '#666666',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
        ),
    ));



    /**

    ||-> SECTION: Contact Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Contact Settings', 'zidex' ),
        'id'    => 'mt_contact',
        'icon'  => 'el el-icon-map-marker-alt'
    ));
    // GENERAL
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Contact', 'zidex' ),
        'id'         => 'mt_contact_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_contact_phone',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'zidex'),
                'subtitle' => esc_html__('Contact phone number displayed on the contact us page.', 'zidex'),
                'default' => '+07 554 332 322'
            ),
            array(
                'id' => 'mt_contact_phone_2',
                'type' => 'text',
                'title' => esc_html__('Second Phone Number', 'zidex'),
                'subtitle' => esc_html__('Contact phone number displayed on the contact us page.', 'zidex'),
                'default' => '+07 554 332 333'
            ),
            array(
                'id' => 'mt_contact_email',
                'type' => 'text',
                'title' => esc_html__('Email', 'zidex'),
                'subtitle' => esc_html__('Contact email displayed on the contact us page., additional info is good in here.', 'zidex'),
                'validate' => 'email',
                'msg' => 'custom error message',
                'default' => 'contact@example.com'
            ),
            array(
                'id' => 'mt_contact_email_2',
                'type' => 'text',
                'title' => esc_html__('Second Email', 'zidex'),
                'subtitle' => esc_html__('Contact email displayed on the contact us page., additional info is good in here.', 'zidex'),
                'validate' => 'email',
                'msg' => 'custom error message',
                'default' => 'office@example.com'
            ),
            array(
                'id' => 'mt_contact_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'zidex'),
                'subtitle' => esc_html__('Enter your contact address', 'zidex'),
                'default' => 'Sierra Lane Tampa, FL 33604'
            )
        ),
    ));
    
    // MAILCHIMP
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Mailchimp', 'zidex' ),
        'id'         => 'mt_contact_mailchimp',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_mailchimp_apikey',
                'type' => 'text',
                'title' => esc_html__('Mailchimp apiKey', 'zidex'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your apiKey', 'zidex'),
                'default' => 'da1175811870557923759df1b4258d0a-us9'
            ),
            array(
                'id' => 'mt_mailchimp_listid',
                'type' => 'text',
                'title' => esc_html__('Mailchimp listId', 'zidex'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your listId', 'zidex'),
                'default' => '7ffd6ecdde'
            ),
            array(
                'id' => 'mt_mailchimp_data_center',
                'type' => 'text',
                'title' => esc_html__('Mailchimp form datacenter', 'zidex'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your form datacenter', 'zidex'),
                'default' => 'us9'
            )
        ),
    ));



    /**
    ||-> SECTION: Blog Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog Settings', 'zidex' ),
        'id'    => 'mt_blog',
        'icon'  => 'el el-icon-comment'
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Archive', 'zidex' ),
        'id'         => 'mt_blog_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Blog List Layout %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_blogloop_variant',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Blog Loop Design', 'zidex' ),
                'options'  => array(
                    'blogloop-v1' => array(
                        'alt' => esc_html__('Blogloop v1', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v1.png'
                    ),
                    'blogloop-v2' => array(
                        'alt' => esc_html__('Blogloop v2', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v2.png'
                    ),
                    'blogloop-v3' => array(
                        'alt' => esc_html__('Blogloop v3', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v3.png'
                    ),
                    'blogloop-v4' => array(
                        'alt' => esc_html__('Blogloop v4', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v4.png'
                    ),
                    'blogloop-v5' => array(
                        'alt' => esc_html__('Blogloop v4', 'zidex'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/blogloops/blogloop-v5.png'
                    ),
                ),
                'default'  => 'blogloop-v2'
            ),
            array(
                'id'       => 'mt_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Blog List Layout', 'zidex' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'zidex' ),
                'options'  => array(
                    'mt_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_blog_right_sidebar'
            ),
            array(
                'id'       => 'mt_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Blog List Sidebar', 'zidex' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'zidex' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_blog_layout', '!=', 'mt_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Blog List Elements %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id' => 'mt_blog_post_title',
                'type' => 'text',
                'title' => esc_html__('Blog Post Title', 'zidex'),
                'subtitle' => esc_html__('Enter the text you want to display as blog post title.', 'zidex'),
                'default' => 'All Blog Posts'
            ),

        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Post', 'zidex' ),
        'id'         => 'mt_blog_single_pos',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_single_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Single Blog List Layout %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_single_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Single Blog List Layout', 'zidex' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'zidex' ),
                'options'  => array(
                    'mt_single_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_single_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_single_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'zidex' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_single_blog_fullwidth'
            ),
            array(
                'id'       => 'mt_single_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Single Blog List Sidebar', 'zidex' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'zidex' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_single_blog_layout', '!=', 'mt_single_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_single_blog_typo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Single Blog Post Font family %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'          => 'mt_single_post_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Blog Post Font family', 'zidex'),
                'subtitle'    => esc_html__( 'Default color: #666666; Font-size: 16px; Line-height: 25px;', 'zidex' ),
                'google'      => true, 
                'font-size'   => true,
                'line-height' => true,
                'color'       => true,
                'font-backup' => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'font-weight'  => true,
                'font-style'  => false,
                'subsets'     => false,
                'units'       =>'px',
                'default'     => array(
                    'color' => '#666666', 
                    'font-size' => '16px',
                    'line-height' => '25px', 
                    'text-align' => 'left',
                    'font-family' => 'Montserrat', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_single_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Other Single Post Elements %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_post_featured_image',
                'type'     => 'switch', 
                'title'    => esc_html__('Single post featured image.', 'zidex'),
                'subtitle' => esc_html__('Show or Hide the featured image from blog post page.".', 'zidex'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_related_posts',
                'type'     => 'switch', 
                'title'    => esc_html__('Related Posts', 'zidex'),
                'subtitle' => esc_html__('Enable or disable related posts', 'zidex'),
                'default'  => false,
            ),
            array(
                'id'       => 'mt_enable_post_navigation',
                'type'     => 'switch', 
                'title'    => esc_html__('Post Navigation', 'zidex'),
                'subtitle' => esc_html__('Enable or disable post navigation', 'zidex'),
                'default'  => false,
            ),
            array(
                'id'       => 'mt_enable_authorbio',
                'type'     => 'switch', 
                'title'    => esc_html__('About Author', 'zidex'),
                'subtitle' => esc_html__('Enable or disable "About author" section on single post', 'zidex'),
                'default'  => false,
            ),
        ),
    ));
    


    /**
    ||-> SECTION: Social Media Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Social Media Settings', 'zidex' ),
        'id'    => 'mt_social_media',
        'icon'  => 'el el-icon-myspace'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'zidex' ),
        'id'         => 'mt_social_media_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Global Social Links %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id' => 'mt_social_telegram',
                'type' => 'text',
                'title' => esc_html__('Telegram URL', 'zidex'),
                'subtitle' => esc_html__('Type your Telegram url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_fb',
                'type' => 'text',
                'title' => esc_html__('Facebook URL', 'zidex'),
                'subtitle' => esc_html__('Type your Facebook url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_tw',
                'type' => 'text',
                'title' => esc_html__('Twitter username', 'zidex'),
                'subtitle' => esc_html__('Type your Twitter username.', 'zidex'),
                'default' => ''
            ),
            array(
                'id' => 'mt_social_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest URL', 'zidex'),
                'subtitle' => esc_html__('Type your Pinterest url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_skype',
                'type' => 'text',
                'title' => esc_html__('Skype Name', 'zidex'),
                'subtitle' => esc_html__('Type your Skype username.', 'zidex'),
                'default' => ''
            ),
            array(
                'id' => 'mt_social_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram URL', 'zidex'),
                'subtitle' => esc_html__('Type your Instagram url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_youtube',
                'type' => 'text',
                'title' => esc_html__('YouTube URL', 'zidex'),
                'subtitle' => esc_html__('Type your YouTube url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble URL', 'zidex'),
                'subtitle' => esc_html__('Type your Dribbble url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_gplus',
                'type' => 'text',
                'title' => esc_html__('Google+ URL', 'zidex'),
                'subtitle' => esc_html__('Type your Google+ url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_linkedin',
                'type' => 'text',
                'title' => esc_html__('LinkedIn URL', 'zidex'),
                'subtitle' => esc_html__('Type your LinkedIn url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_deviantart',
                'type' => 'text',
                'title' => esc_html__('Deviant Art URL', 'zidex'),
                'subtitle' => esc_html__('Type your Deviant Art url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_digg',
                'type' => 'text',
                'title' => esc_html__('Digg URL', 'zidex'),
                'subtitle' => esc_html__('Type your Digg url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_flickr',
                'type' => 'text',
                'title' => esc_html__('Flickr URL', 'zidex'),
                'subtitle' => esc_html__('Type your Flickr url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_stumbleupon',
                'type' => 'text',
                'title' => esc_html__('Stumbleupon URL', 'zidex'),
                'subtitle' => esc_html__('Type your Stumbleupon url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_tumblr',
                'type' => 'text',
                'title' => esc_html__('Tumblr URL', 'zidex'),
                'subtitle' => esc_html__('Type your Tumblr url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo URL', 'zidex'),
                'subtitle' => esc_html__('Type your Vimeo url.', 'zidex'),
                'validate' => 'url',
                'default' => ''
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Floating Social Button', 'zidex' ),
        'id'         => 'mt_social_media_settings_fixed_social_btn',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links_footer',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Floating Social Button %2$s', 'zidex' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_fixed_social_btn_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Enable Floating Social Button', 'zidex'),
                'subtitle' => esc_html__('Enable or disable Floating Social Button', 'zidex'),
                'default'  => false,
            ),
            array(
                'id'       => 'mt_fixed_social_btn_social_select',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Social Media url to show', 'zidex' ),
                'subtitle' => esc_html__( 'Url/Icon can be set from Social Media tab - on Theme Panel', 'zidex' ),
                'options'  => array(
                    'telegram'      => esc_html__( 'Telegram Link/Icon', 'zidex' ),
                    'facebook'      => esc_html__( 'Facebook Link/Icon', 'zidex' ),
                    'twitter'      => esc_html__( 'Facebook Link/Icon', 'zidex' ),
                    'pinterest'      => esc_html__( 'Pinterest Link/Icon', 'zidex' ),
                    'skype'      => esc_html__( 'Skype Link/Icon', 'zidex' ),
                    'instagram'      => esc_html__( 'Instagram Link/Icon', 'zidex' ),
                    'youtube'      => esc_html__( 'YouTube Link/Icon', 'zidex' ),
                    'dribbble'      => esc_html__( 'Dribbble Link/Icon', 'zidex' ),
                    'googleplus'      => esc_html__( 'Google+ Link/Icon', 'zidex' ),
                    'linkedin'      => esc_html__( 'LinkedIn Link/Icon', 'zidex' ),
                    'deviantart'      => esc_html__( 'LinkedIn Link/Icon', 'zidex' ),
                    'digg'      => esc_html__( 'Digg Link/Icon', 'zidex' ),
                    'flickr'      => esc_html__( 'Flickr Link/Icon', 'zidex' ),
                    'stumbleupon'      => esc_html__( 'Stumbleupon Link/Icon', 'zidex' ),
                    'tumblr'      => esc_html__( 'Tumblr Link/Icon', 'zidex' ),
                    'vimeo'      => esc_html__( 'Vimeo Link/Icon', 'zidex' ),
                ),
                'default'  => 'telegram',
                'required' => array( 'mt_fixed_social_btn_status', '=', '1' ),
            ),
        ),
    ));
    /*
     * <--- END SECTIONS
     */
