<?php
/**
 * The template for displaying the footer.
 *
*/
?>
	

    <?php /* PAGE PRELOADER */ ?>
    <?php
        if (zidex_redux('mt_preloader_status')) {
            echo '<div class="zidex_preloader_holder">
                    <div class="morph-loader">
                        <div></div>
                    </div>
                    <svg id="morph-loaderid" xmlns="http://www.w3.org/2000/svg" version="1.1">
                        <defs>
                            <filter id="morph-loader">
                                <fegaussianblur in="SourceGraphic" stddeviation="15" result="blur"></fegaussianblur>
                                <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 26 -7" result="morph-loader"></fecolormatrix>
                                <feblend in="SourceGraphic" in2="morph-loader"></feblend>
                            </filter>
                        </defs>
                    </svg>
                </div>';
        } 
    ?>

    
    <!-- BEGIN: FLOATING SOCIAL BUTTON -->
    <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
        <?php echo zidex_floating_social_button(); ?>
    <?php } ?>
    <!-- END: FLOATING SOCIAL BUTTON -->

    <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
        <!-- BACK TO TOP BUTTON -->
        <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="<?php echo esc_url('#0'); ?>">
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </a>
    <?php } else { ?>
        <?php if (zidex_redux('mt_backtotop_status') == true) { ?>
            <!-- BACK TO TOP BUTTON -->
            <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="<?php echo esc_url('#0'); ?>">
                <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
            </a>
        <?php } ?>
    <?php } ?>

    <!-- FOOTER -->
    <footer>
        
        <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
            <?php if (is_active_sidebar('before-footer')) { ?>
                <div class="footer-before-content">
                    <?php dynamic_sidebar('before-footer'); ?>
                </div>
            <?php } ?>
        <?php } ?>

        <!-- FOOTER TOP -->
        <div class="row footer-top">
            <div class="container">
            <?php          
                //FOOTER ROW #1
                echo zidex_footer_row1();
                //FOOTER ROW #2
                echo zidex_footer_row2();
                //FOOTER ROW #3
                echo zidex_footer_row3();
             ?>
            </div>
        </div>

        <!-- FOOTER BOTTOM -->
        <div class="footer-div-parent">
            <div class="container footer">
                <div class="container_inner_footer">
                    <div class="row">
                        <div class="col-md-12">
                        	<p class="copyright text-center">
                                <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                                    <?php echo wp_kses_post(zidex_redux('mt_footer_text')); ?>
                                <?php }else{ ?>
                                    <?php echo esc_html__('Zidex Theme by ModelTheme. All Rights Reserved', 'zidex'); ?>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<?php wp_footer(); ?>


</body>
</html>