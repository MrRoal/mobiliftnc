<header class="header3">

  <?php if (zidex_redux('mt_header_top_bar_status') == true) { ?>
    <div class="row top-header">
      <div class="navbar-collapse actions collapse container">
        <div class="row">
          
          <div class="header-nav-actions col-md-2">
            <?php if(zidex_redux('mt_header_is_search') == true){ ?>
              <a href="<?php echo esc_url('#'); ?>" class="mt-search-icon">
                <i class="fa fa-search" aria-hidden="true"></i>
              </a>
            <?php } ?>
          </div>

          <div class="col-md-8">
            <ul class="social-links social-links-labels text-center">
              <?php if ( zidex_redux('mt_social_fb') && zidex_redux('mt_social_fb') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_fb') ) ?>"><i class="fa fa-facebook"></i> <?php echo esc_html__('Facebook','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_tw') && zidex_redux('mt_social_tw') != '' ) { ?>
                  <li><a href="https://twitter.com/<?php echo esc_attr( zidex_redux('mt_social_tw') ) ?>"><i class="fa fa-twitter"></i> <?php echo esc_html__('Twitter','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_gplus') && zidex_redux('mt_social_gplus') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i> <?php echo esc_html__('Google+','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_youtube') && zidex_redux('mt_social_youtube') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_youtube') ) ?>"><i class="fa fa-youtube"></i> <?php echo esc_html__('YouTube','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_pinterest') && zidex_redux('mt_social_pinterest') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_pinterest') ) ?>"><i class="fa fa-pinterest"></i> <?php echo esc_html__('Pinterest','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_linkedin') && zidex_redux('mt_social_linkedin') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_linkedin') ) ?>"><i class="fa fa-linkedin"></i> <?php echo esc_html__('LinkedIn','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_skype') && zidex_redux('mt_social_skype') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_skype') ) ?>"><i class="fa fa-skype"></i> <?php echo esc_html__('Skype','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_instagram') && zidex_redux('mt_social_instagram') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_instagram') ) ?>"><i class="fa fa-instagram"></i> <?php echo esc_html__('Instagram','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_dribbble') && zidex_redux('mt_social_dribbble') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_dribbble') ) ?>"><i class="fa fa-dribbble"></i> <?php echo esc_html__('Dribbble','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_deviantart') && zidex_redux('mt_social_deviantart') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_deviantart') ) ?>"><i class="fa fa-deviantart"></i> <?php echo esc_html__('DeviantArt','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_digg') && zidex_redux('mt_social_digg') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_digg') ) ?>"><i class="fa fa-digg"></i> <?php echo esc_html__('Digg','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_flickr') && zidex_redux('mt_social_flickr') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_flickr') ) ?>"><i class="fa fa-flickr"></i> <?php echo esc_html__('Flickr','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_stumbleupon') && zidex_redux('mt_social_stumbleupon') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_stumbleupon') ) ?>"><i class="fa fa-stumbleupon"></i> <?php echo esc_html__('StumbleUpon','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_tumblr') && zidex_redux('mt_social_tumblr') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_tumblr') ) ?>"><i class="fa fa-tumblr"></i> <?php echo esc_html__('Tumblr','zidex'); ?></a></li>
              <?php } ?>
              <?php if ( zidex_redux('mt_social_vimeo') && zidex_redux('mt_social_vimeo') != '' ) { ?>
                  <li><a href="<?php echo esc_url( zidex_redux('mt_social_vimeo') ) ?>"><i class="fa fa-vimeo-square"></i> <?php echo esc_html__('Vimeo','zidex'); ?></a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="col-md-2 text-right right-side-social-actions">
            <!-- ACTIONS BUTTONS GROUP -->
            <div class="pull-right actions-group">
              <?php if(zidex_redux('mt_header_fixed_sidebar_menu_status') == true) { ?>
                <!-- MT BURGER -->
                <div id="mt-nav-burger">
                  <?php echo '<img src="'.esc_url(get_template_directory_uri() . '/images/svg/menu_burger_right.svg').'" alt="'.esc_attr__('Nav', 'zidex').'" />'; ?>
                </div>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  <?php } ?>
  

  <div class="logo-infos">
    <div class="row">
      <!-- BOTTOM BAR -->
      <div class="container">
        <div class="row">

          <!-- LEFT SIDE HOLDER -->
          <div class="col-md-4 ">
          </div>

          <!-- LOGO HOLDER -->
          <div class="navbar-header col-md-4 text-center">
            <?php 

            $custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
            $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
            $custom_logo_url = get_post_meta( get_the_ID(), 'smartowl_header_custom_logo', true );

            if($custom_header_activated == 'yes' && isset($custom_logo_url) && !empty($custom_logo_url)) { ?>

              <h1 class="logo">
                  <a href="<?php echo esc_url(get_site_url()); ?>">
                      <img src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                  </a>
              </h1>

            <?php } else {

              if(zidex_redux('mt_logo','url')){ ?>
                <h1 class="logo">
                    <a href="<?php echo esc_url(get_site_url()); ?>">
                        <img src="<?php echo esc_url(zidex_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                    </a>
                </h1>
              <?php }else{ ?>
                <h1 class="logo no-logo">
                    <a href="<?php echo esc_url(get_site_url()); ?>">
                      <?php echo esc_html(get_bloginfo()); ?>
                    </a>
                </h1>
              <?php } ?>
            <?php } ?>

            <!-- NAVIGATION BURGER MENU -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          </div>

          <!-- RIGHT SIDE HOLDER -->
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
      <div class="row">
        <!-- NAV MENU -->
        <div id="navbar" class="navbar-collapse collapse col-md-12">
          <ul class="menu nav navbar-nav nav-effect nav-menu">
            <?php
              if ( has_nav_menu( 'primary' ) ) {
                $defaults = array(
                  'menu'            => '',
                  'container'       => false,
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => 'menu',
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => false,
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '%3$s',
                  'depth'           => 0,
                  'walker'          => ''
                );

                $defaults['theme_location'] = 'primary';

                wp_nav_menu( $defaults );
              }else{
                echo '<p class="no-menu text-right">';
                  echo esc_html__('Primary navigation menu is missing.', 'zidex');
                echo '</p>';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>