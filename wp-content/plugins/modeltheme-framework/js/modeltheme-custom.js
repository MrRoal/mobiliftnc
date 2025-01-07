/*
 Project name:       MODELTHEME
 Project author:     ModelTheme
 File name:          Custom JS
*/





(function ($) {
  'use strict';

  jQuery( document ).ready(function() {
    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> TESTIMONIALS01 SLIDER (Shortcode)
    */

jQuery(".testimonials-container").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : true,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  2],
            [1200,  2],
            [1400,  2],
            [1600,  2]
        ]
    });
    jQuery(".members-container").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        singleItem      : true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   1],
            [700,   1],
            [1000,  1],
            [1200,  1],
            [1400,  1],
            [1600,  1]
        ]
    });
    jQuery(".testimonials-container-1").owlCarousel({
        navigation      : false, // Show next and prev buttons
        navigationText  : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        pagination      : true,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   1],
            [700,   1],
            [1000,  1],
            [1200,  1],
            [1400,  1],
            [1600,  1]
        ]
    });
    jQuery(".testimonials-container-2").owlCarousel({
        navigation      : true, // Show next and prev buttons
        navigationText  : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        pagination      : true,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  2],
            [1200,  2],
            [1400,  2],
            [1600,  2]
        ]
    });
    jQuery(".testimonials-container-3").owlCarousel({
        navigation      : true, // Show next and prev buttons
        navigationText  : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  3],
            [1200,  3],
            [1400,  3],
            [1600,  3]
        ]
    });

    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> TESTIMONIALS02 SLIDER (Shortcode)
    */
    jQuery(".testimonials02-container").owlCarousel({
      navigation      : false, // Show next and prev buttons
      pagination      : true,
      autoPlay        : false,
      slideSpeed      : 700,
      paginationSpeed : 700,
      singleItem      : true
    });


    /*

    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> CLIENTS SLIDER (Shortcode)

    */

    jQuery(".clients_container_shortcode-1").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   1],
            [700,   1],
            [1000,  1],
            [1200,  1],
            [1400,  1],
            [1600,  1]
        ]
    });

    jQuery(".clients_container_shortcode-2").owlCarousel({

        navigatin      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  2],
            [1200,  2],
            [1400,  2],
            [1600,  2]
        ]
    });

    jQuery(".clients_container_shortcode-3").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   2],
            [1000,  3],
            [1200,  3],
            [1400,  3],
            [1600,  3]
        ]
    });

    jQuery(".clients_container_shortcode-4").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   1],
            [600,   2],
            [700,   3],
            [1000,  4],
            [1200,  4],
            [1400,  4],
            [1600,  4]
        ]
    });

    jQuery(".clients_container_shortcode-5").owlCarousel({

        navigatio      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   2],
            [600,   2],
            [700,   5],
            [1000,  5],
            [1200,  5],
            [1400,  5],
            [1600,  5]
        ]
    });

    jQuery(".clients_container_shortcode-6").owlCarousel({
        navigation      : false, // Show next and prev buttons
        pagination      : false,
        autoPlay        : false,
        slideSpeed      : 700,
        paginationSpeed : 700,
        autoPlay : true,
        autoPlayTimeout:10000,
        autoPlayHoverPause:true,
        itemsCustom : [
            [0,     1],
            [450,   2],
            [600,   2],
            [700,   6],
            [1000,  6],
            [1200,  6],
            [1400,  6],
            [1600,  6]
        ]
    });



    /*
    * ||||||||||||||||||||||||||||||||||||||||||||||||||||||||-> SYNCED SLIDER / MAIN HOME
    */
    function bs_fix_vc_full_width_row(){
        var $fullrow = jQuery('[data-vc-full-width="true"]');
        jQuery.each($fullrow, function () {
          jQuery('#mt_posts_carousel_big_centered').owlCarousel({
              // center: true,
              stagePadding: 200,
              items:1,
              loop:true,
              margin:10,
              nav: true,
              navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
              // responsive:{
              //     600:{
              //         items:4
              //     }
              // }
          });
        });
    }

    jQuery(document).on('vc-full-width-row', function () {
        bs_fix_vc_full_width_row();
    });


    var sync1 = jQuery("#mt_posts_carousel_big");
    var sync2 = jQuery("#mt_posts_carousel_small");
    var duration = 300;
    var thumbs = 3;

    // Sync nav
    sync1.on('click', '.owl-next', function () {
        sync2.trigger('next.owl.carousel')
    });
    sync1.on('click', '.owl-prev', function () {
        sync2.trigger('prev.owl.carousel')
    });

    // Start Carousel
    sync1.owlCarousel({
        dots: false,
        loop: true,
        items : 1,
        margin:0,
        nav : true,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
    })
    .on('dragged.owl.carousel', function (e) {
        if (e.relatedTarget.state.direction == 'left') {
            sync2.trigger('next.owl.carousel')
        } else {
            sync2.trigger('prev.owl.carousel')
        }
    });


    sync2.owlCarousel({
        dots: false,
        loop: true,
        items : thumbs,
        margin:0,
        nav : false,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:1,
                nav:true
            },
            1000:{
                items:3,
                nav:true,
            }
        }
    })
    .on('click', '.owl-item', function() {
        var i = $(this).index()-(thumbs+1);
        sync2.trigger('to.owl.carousel', [i, duration, true]);
        sync1.trigger('to.owl.carousel', [i, duration, true]);
    });





    //    var feed = new Instafeed({
    //   get: 'tagged',
    //   tagName: 'themezidex',
    //   clientId: '02b47e1b98ce4f04adc271ffbd26611d',
    //   accessToken: '4087253986.54da896.b87b07b1088d4bf4a220eac9ca3e7ba5',
    //   template: '<div class="mt-ig-item-holder"><a href="{{link}}" class="mt-ig-single-post" target="_blank" id="{{id}}"><img src="{{image}}" /><div class="mt-ig-overlay"><i class="icon-social-instagram icons"></i></div></a></div>',
    //   limit: 8,
    //   resolution: 'low_resolution',
    // });
    // feed.run();







    var sync1 = jQuery("#mt_posts_carousel_big");
    var sync2 = jQuery("#mt_posts_carousel_small");
   
    sync1.owlCarousel({
      singleItem : true,
      mouseDrag : false,
      slideSpeed : 1000,
      navigation: true,
      navigationText  : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
      pagination:false,
      afterAction : syncPosition,
      responsiveRefreshRate : 200,
    });
   
    sync2.owlCarousel({
      items : 3,
      itemsDesktop      : [1199,3],
      itemsDesktopSmall     : [979,3],
      itemsTablet       : [768,3],
      itemsMobile       : [479,3],
      pagination:false,
      responsiveRefreshRate : 100,
      afterInit : function(el){
        el.find(".owl-item").eq(0).addClass("synced");
      }
    });
   
    function syncPosition(el){
      var current = this.currentItem;
      $("#mt_posts_carousel_small")
        .find(".owl-item")
        .removeClass("synced")
        .eq(current)
        .addClass("synced")
      if($("#mt_posts_carousel_small").data("owlCarousel") !== undefined){
        center(current)
      }
    }
   
    $("#mt_posts_carousel_small").on("click", ".owl-item", function(e){
      e.preventDefault();
      var number = $(this).data("owlItem");
      sync1.trigger("owl.goTo",number);
    });
   
    function center(number){
      var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
      var num = number;
      var found = false;
      for(var i in sync2visible){
        if(num === sync2visible[i]){
          var found = true;
        }
      }
   
      if(found===false){
        if(num>sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", num - sync2visible.length+2)
        }else{
          if(num - 1 === -1){
            num = 0;
          }
          sync2.trigger("owl.goTo", num);
        }
      } else if(num === sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", sync2visible[1])
      } else if(num === sync2visible[0]){
        sync2.trigger("owl.goTo", num-1)
      }
      
    }

    // Tabs

    jQuery('.naccs .menu div').click(function(){
      var tab_id = jQuery(this).attr('data-tab');

      jQuery('.naccs .menu div').removeClass('active');
      jQuery('.naccs ul li').removeClass('active');
      jQuery('.naccs .gc--1-of-3').removeClass('active');
      jQuery('.naccs .gc--2-of-3').removeClass('active');

      
      jQuery(this).parent().parent().addClass('active');
      jQuery("#"+tab_id).parent().parent().addClass('active');
      jQuery(this).addClass('active');
      jQuery("#"+tab_id).addClass('active');
    })

















  });
} (jQuery) )
