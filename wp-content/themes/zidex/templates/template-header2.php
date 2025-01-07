<header class="header2">
  <div class="logo-infos">
    <div class="row">
      <!-- BOTTOM BAR -->
      <div class="container">
        <div class="row row-0">

          <!-- LOGO -->
          <div class="navbar-header col-md-3">
            <!-- NAVIGATION BURGER MENU -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

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
          </div>

          <div class="col-md-9 mobile-hide tablet-hide">
            <div class="header-infos header-light-holder">



              <?php if(zidex_redux('mt_header_button_status') == true){ ?>
                <!-- HEADER BUTTON -->
                <div class="text-center header-button pull-right">
                  <div class="header-button-labels pull-left">
                    <a href="<?php echo esc_html(zidex_redux('mt_header_button_url')); ?>" class="button"><?php echo esc_html(zidex_redux('mt_header_button_text')); ?></a>
                  </div>
                </div>
                <!-- // HEADER BUTTON -->
              <?php } ?>




              <?php if(zidex_redux('mt_divider_header_info_1_status') == true){ ?>
                <!-- HEADER INFO 1 -->
                <div class="text-center header-info-group pull-right <?php echo esc_attr(zidex_redux('mt_divider_header_info_1_media_type')); ?>">
                  <div class="header-info-icon pull-left">
                    <?php if(zidex_redux('mt_divider_header_info_1_media_type') == 'font_awesome'){ ?>
                      <i class="<?php echo esc_attr(zidex_redux('mt_divider_header_info_1_faicon')); ?>"></i>
                    <?php }elseif(zidex_redux('mt_divider_header_info_1_media_type') == 'media_image'){ ?>
                      <img src="<?php echo esc_url(zidex_redux('mt_divider_header_info_1_image_icon','url')); ?>" alt="<?php echo esc_attr('Image Header Info', 'zidex'); ?>" />
                    <?php }elseif(zidex_redux('mt_divider_header_info_1_media_type') == 'text_title'){ ?>
                      <p class="header_text_title"><strong><?php echo esc_html(zidex_redux('mt_divider_header_info_1_text_1')); ?></strong>
                    <?php } ?>
                  </div>
                  <div class="header-info-labels pull-left">
                    <p><?php echo esc_html(zidex_redux('mt_divider_header_info_1_heading1')); ?></p>
                    <div class="clearfix"></div>
                    <p><?php echo esc_html(zidex_redux('mt_divider_header_info_1_heading2')); ?></p>
                  </div>
                </div>
                <!-- // HEADER INFO 1 -->
              <?php } ?>

              <?php if(zidex_redux('mt_divider_header_info_2_status') == true){ ?>
                <!-- HEADER INFO 2 -->
                <div class="text-center header-info-group pull-right <?php echo esc_attr(zidex_redux('mt_divider_header_info_2_media_type')); ?>">
                  <div class="header-info-icon pull-left">
                    <?php if(zidex_redux('mt_divider_header_info_2_media_type') == 'font_awesome'){ ?>
                      <i class="<?php echo esc_attr(zidex_redux('mt_divider_header_info_2_faicon')); ?>"></i>
                    <?php }elseif(zidex_redux('mt_divider_header_info_2_media_type') == 'media_image'){ ?>
                      <img src="<?php echo esc_url(zidex_redux('mt_divider_header_info_2_image_icon','url')); ?>" alt="<?php echo esc_attr('Image Header Info', 'zidex'); ?>" />
                    <?php }elseif(zidex_redux('mt_divider_header_info_2_media_type') == 'text_title'){ ?>
                      <p class="header_text_title"><strong><?php echo esc_html(zidex_redux('mt_divider_header_info_2_text_2')); ?></strong>
                    <?php } ?>
                  </div>
                  <div class="header-info-labels pull-left">
                    <p><?php echo esc_html(zidex_redux('mt_divider_header_info_2_heading1')); ?></p>
                    <div class="clearfix"></div>
                    <p><?php echo esc_html(zidex_redux('mt_divider_header_info_2_heading2')); ?></p>
                  </div>
                </div>
                <!-- // HEADER INFO 2 -->
              <?php } ?>

              <?php if(zidex_redux('mt_divider_header_info_3_status') == true){ ?>
                <!-- HEADER INFO 3 -->
                <div class="text-center header-info-group pull-right <?php echo esc_attr(zidex_redux('mt_divider_header_info_3_media_type')); ?>">
                  <div class="header-info-icon pull-left">
                    <?php if(zidex_redux('mt_divider_header_info_3_media_type') == 'font_awesome'){ ?>
                      <i class="<?php echo esc_attr(zidex_redux('mt_divider_header_info_3_faicon')); ?>"></i>
                    <?php }elseif(zidex_redux('mt_divider_header_info_3_media_type') == 'media_image'){ ?>
                      <img src="<?php echo esc_url(zidex_redux('mt_divider_header_info_3_image_icon','url')); ?>" alt="<?php echo esc_attr('Image Header Info', 'zidex'); ?>" />
                    <?php }elseif(zidex_redux('mt_divider_header_info_3_media_type') == 'text_title'){ ?>
                      <p class="header_text_title"><strong><?php echo esc_html(zidex_redux('mt_divider_header_info_3_text_3')); ?></strong>
                    <?php } ?>
                  </div>
                  <div class="header-info-labels pull-left">
                    <p><?php echo esc_html(zidex_redux('mt_divider_header_info_3_heading1')); ?></p>
                    <div class="clearfix"></div>
                    <p><?php echo esc_html(zidex_redux('mt_divider_header_info_3_heading2')); ?></p>
                  </div>
                </div>
                <!-- // HEADER INFO 3 -->
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
      <div class="row row-0">
        <!-- NAV MENU -->
        <div id="navbar" class="navbar-collapse collapse col-md-10">
          <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
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
        <div class="col-md-2 right-side-social-actions">
          <!-- ACTIONS BUTTONS GROUP -->
          <div class="pull-right actions-group">
            <?php if(zidex_redux('mt_header_fixed_sidebar_menu_status') == true) { ?>
              <!-- MT BURGER -->
              <div class="nav-burger">
	              <div id="mt-nav-burger">
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	                <span></span>
	              </div>
              </div>
            <?php } ?>

            <?php if(zidex_redux('mt_header_is_search') == true){ ?>
              <!-- SEARCH ICON -->
              <div class="nav-search">
	              <a href="<?php echo esc_url('#'); ?>" class="mt-search-icon">
	                <i class="fa fa-search" aria-hidden="true"></i>
	              </a>
              </div>
            <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </nav>
</header>