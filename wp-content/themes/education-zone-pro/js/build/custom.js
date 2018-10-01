jQuery(document).ready(function($){

  /** Variables from Customizer for Slider settings */
  if( education_zone_pro_data.auto == '1' ){
    var slider_auto = true;
  }else{
    var slider_auto = false;
  }

  if( education_zone_pro_data.navigation == '1' ){
    var slider_navigation = true;
  }else{
    var slider_navigation = false;
  }

  if( education_zone_pro_data.stoponhover == '1' ){
    var stop_on_hover = true;
  }else{
    var stop_on_hover = false;
  }

  if( education_zone_pro_data.loop == '1' ){
    var slider_loop = true;
  }else{
    var slider_loop = false;
  }

  if( education_zone_pro_data.mode == 'slide' ){
    var animation = '';

  }else if( education_zone_pro_data.mode == 'fade' ){
    var animation = 'fadeOut';

  }else if( education_zone_pro_data.mode == 'backSlide' ){
    var animation = 'zoomOutLeft';

  }else if( education_zone_pro_data.mode == 'goDown' ){
    var animation = 'fadeOutDown';

  }else if( education_zone_pro_data.mode == 'fadeUp' ){
    var animation = 'fadeOutUp';
  }else{
    var animation = education_zone_pro_data.mode;
  }	
  if( education_zone_pro_data.rtl == '1' ){
    var rtl = true;
    var mrtl = false;
  }else{
    var rtl = false;
    var mrtl = true;
  }
  /* testimonial */
  if( education_zone_pro_data.t_auto == '1' ){
    var t_slider_auto = true;
  }else{
    var t_slider_auto = false;
  }

  var t_slider_speed = education_zone_pro_data.t_slider_speed;

  $("#banner-slider").owlCarousel({ 
    items               : 1, 
    loop                : slider_loop, // Show next and prev buttons
    autoplay            : slider_auto,
    animateOut          : animation,
    rtl                 : rtl,
    mouseDrag           : false,
    nav                 : slider_navigation,
    autoplayHoverPause  : stop_on_hover,
    dots                : false,
    lazyLoad            : true
  });

  $('.testimonial-slide').owlCarousel({
    items         : 1,
    nav           : true, 
    rtl           : rtl,
    loop          : true,
    autoplaySpeed : t_slider_speed,
    autoplay      : t_slider_auto,
  });

  if( education_zone_pro_data.gallery_as_slider == '1' ){
    $('.gallery-slider .gallery').addClass('owl-carousel');
    $('.gallery').owlCarousel({
      items: 5,
      autoplay: false,
      loop: false,
      nav: true,
      dots: false,
      margin: 30,
      rtl: false,
      autoHeight: true,
      autoHeightClass: 'owl-height',
      mouseDrag: false,
      responsive: {
        0: {
          items: 2,
        }, 
        641 : {
          items: 3,
        }, 
        768 : {
          items: 4,
        }, 
        981 : {
          items: 5,
        }
      }
    });
  }

        // shortcodes slider
        $('#slider').owlCarousel({
          items : 1,
          nav   : true, 
          rtl   : rtl,
          loop  : true,
          margin: 5,
        });

        if( education_zone_pro_data.header == 'three' ){
          var p_side = 'right';
          var s_side = 'right';
        }else if( education_zone_pro_data.header == 'six' || education_zone_pro_data.header == 'one' ){
          var p_side = 'left';
          var s_side = 'right';
        }else{
          var p_side = 'left';
          var s_side = 'left'; 
        }

        $('#responsive-menu-button').sidr({
          name: 'sidr-main',
          source: '#site-navigation',
          side: p_side
        });

        $('#responsive-btn').sidr({
          name: 'sidr-secondary',
          source: '#secondary-navigation',
          side: s_side
        });

        $('.map-section').click(function () {
          $('.map-section iframe').css("pointer-events", "auto");
        });

        $( ".map-section" ).mouseleave(function() {
          $('.map-section iframe').css("pointer-events", "none"); 
        });

        
        /** Lightbox */
        if( education_zone_pro_data.lightbox == '1' ){

          $('.entry-content').find('.gallery-columns-1').find('.gallery-icon > a').attr( 'rel', 'group1' );
          $('.entry-content').find('.gallery-columns-2').find('.gallery-icon > a').attr( 'rel', 'group2' );
          $('.entry-content').find('.gallery-columns-3').find('.gallery-icon > a').attr( 'rel', 'group3' );
          $('.entry-content').find('.gallery-columns-4').find('.gallery-icon > a').attr( 'rel', 'group4' );
          $('.entry-content').find('.gallery-columns-5').find('.gallery-icon > a').attr( 'rel', 'group5' );
          $('.entry-content').find('.gallery-columns-6').find('.gallery-icon > a').attr( 'rel', 'group6' );
          $('.entry-content').find('.gallery-columns-7').find('.gallery-icon > a').attr( 'rel', 'group7' );
          $('.entry-content').find('.gallery-columns-8').find('.gallery-icon > a').attr( 'rel', 'group8' );
          $('.entry-content').find('.gallery-columns-9').find('.gallery-icon > a').attr( 'rel', 'group9' );

          $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").fancybox();

        }

        /* Sticky Menu */ 

        var windowWidth = $(window).width();   
        if( education_zone_pro_data.sticky == '1' && windowWidth >= 992 ){
          var mns = "sticky-menu";
          if( education_zone_pro_data.header == 'three' ){
            hdr = $('.site-header.header-three .header-top').height();
            mn = $(".site-header.header-three .header-m");
          } else if(education_zone_pro_data.header == 'four'){
            hdr = $('.site-header.header-four .header-m').height();
            mn = $(".site-header.header-four .header-bottom");
          } else if(education_zone_pro_data.header == 'five'){
            hdr = $('.site-header.header-five .header-holder').height();
            mn = $(".site-header.header-five .header-bottom");
          } else if(education_zone_pro_data.header == 'six'){
            hdr = $('.site-header.header-six .header-top').outerHeight();
            mn = $(".site-header.header-six .header-bottom");
          } else{
            hdr = $('.site-header .header-holder').height();
            mn = $(".site-header .header-bottom");
          }
          headerBottomheight = $('.site-header .header-bottom').height();
          headertopheight    = $('.site-header.header-three .header-m').height();
          headerFourHeight   = $('.site-header.header-four .header-bottom').outerHeight();
          headerFiveHeight   = $('.site-header.header-five .header-bottom').height();
          headerSixHeight    = $('.site-header.header-six .header-bottom').height(); 

        //mn = $(".site-header .header-bottom");   
        
        $(window).scroll(function() {
          if( $(this).scrollTop() > hdr ) {
            mn.addClass(mns);
            if( education_zone_pro_data.header == 'three' ){
              $('.sticky-holder').css('height', headertopheight);
            } else if( education_zone_pro_data.header == 'four' ) {
              $('.sticky-holder').css('height', headerFourHeight);
            } else if(education_zone_pro_data.header == 'five'){
              $('.sticky-holder').css('height', headerFiveHeight);
            } else if(education_zone_pro_data.header == 'six'){
              $('.sticky-holder').css('height', headerSixHeight);
            }
            else{
              $('.sticky-holder').css('height', headerBottomheight);
            }
          }else {
            mn.removeClass(mns);
            $('.sticky-holder').css('height', 0);
          }
        });
      }

    // Script for back to top
    $(window).scroll(function(){
      if($(this).scrollTop() > 300){
        $('#rara-top').fadeIn();
      }else{
        $('#rara-top').fadeOut();
      }
    });
    
    $("#rara-top").click(function(){
      $('html,body').animate({scrollTop:0},600);
    });
    /* Sticky Menu Ends */  
    if( education_zone_pro_data.gallery_as_slider !== '1' ){
      $('.gallery').imagesLoaded( function() {
        $('.gallery').masonry({
         itemSelector: '.gallery-item',
         isOriginLeft: mrtl             
       });
      });
    }
    
    /****SHORTCODE***/

    $('.rara_accordian .rara_accordian_content').hide(); /**Need to be CSS*/
    $('.rara_accordian:first').children('.rara_accordian_content').show();
    $('.rara_accordian:first').children('.rara_accordian_title').addClass('active');
    $('.rara_accordian_title').click(function(){
      if($(this).hasClass('active')){
      }
      else{
        $(this).parent('.rara_accordian').siblings().find('.rara_accordian_content').slideUp();
        $(this).next('.rara_accordian_content').slideToggle();
        $(this).parent('.rara_accordian').siblings().find('.rara_accordian_title').removeClass('active')
        $(this).toggleClass('active')
      }
    });
    
    $('.rara_toggle.close .rara_toggle_content').hide(); /**Need to be CSS*/
    $('.rara_toggle.open .rara_toggle_title').addClass('active');
    $('.rara_toggle_title').click(function(){
      $(this).next('.rara_toggle_content').slideToggle();
      $(this).toggleClass('active')
    });
    
    $('.rara_tab').hide();/**Need to be CSS*/
    $('.rara_tab_wrap').prepend('<div class="rara_tab_group clearfix"></div>');

    $('.rara_tab_wrap').each(function(){
      $(this).children('.rara_tab').find('.tab-title').prependTo($(this).find('.rara_tab_group'));
      $(this).children('.rara_tab').wrapAll( "<div class='rara_tab_content clearfix' />");
    });

    $('#page').each(function(){
      $(this).find('.rara_tab:first-child').show();
      $(this).find('.tab-title:first-child').addClass('active')
    });

    $('.rara_tab_group .tab-title').click(function(){
      $(this).siblings().removeClass('active');
      $(this).addClass('active');
      $(this).parent('.rara_tab_group ').next('.rara_tab_content').find('.rara_tab').hide();
      var ap_id = $(this).attr('id');
      $(this).parent('.rara_tab_group ').next('.rara_tab_content').find('.'+ap_id).show();
    });    
    /****SHORTCODE***/ 

    /* courses Isotope Filter */
    if( $('.page-template-template-courses').length > 0 ){
        // init Isotope
        var $grid = $('.post-lists').imagesLoaded( function(){  

          $grid.isotope({
              // options
            });

            // filter items on button click
            $('.filter-button-group').on( 'click', 'li', function() {
              $('.filter-button-group li').removeClass('is-active');
              $(this).addClass('is-active');
              var filterValue = $(this).attr('data-filter');
              $grid.isotope({ filter: filterValue });
            });

          });
      }

      /** Header Search form show/hide */
      if( education_zone_pro_data.header !== 'one' ){
        $('html').click(function() {
          $('.example').slideUp();
        });
      }

      $('.site-header .form-section').click(function(event){
        event.stopPropagation();
      });

      $("#search-btn").click(function(){
        $(".example").slideToggle();
        return false 
      });

      // match height
      $('.thumb-text li > div').matchHeight();

      $('.template-courses .cat-posts .post-lists li .text').matchHeight();

      $('.choose-us .col').matchHeight();

      // custom scroll bar
      $(window).on("load",function(){
        $(".team-section .col .text-holder").mCustomScrollbar({
          theme: "dark-thin"
        });
        $(".featured-courses .description").mCustomScrollbar({
          theme: "dark-thin"
        });
      });
    });

