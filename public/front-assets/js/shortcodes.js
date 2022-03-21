/**
    * scrollToTop
    * popupVideo
    * flatOwlCarowsel
    * searchIcon
    * flatCounter
    * flatProgressBar
    * tabs
    * new WOW().init
    * flatAccordion
    * dropdown
    * no_link
    * change_img
    * btnQuantity
    * pageLoad
*/

; (function ($) {

    "use strict";

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var scrollToTop = function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 800) {
                $('#scroll-top').addClass('show');
            } else {
                $('#scroll-top').removeClass('show');
            }
        });

        $('#scroll-top').on('click', function () {
            $("html, body").animate({ scrollTop: 0 }, 1000, 'easeInOutExpo');
            return false;
        });
    };

    new WOW().init();

    var popupVideo = function () {
        if ($().magnificPopup) {
          $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
          });
        }
    };

    var flatOwlCarowsel = function() {
        if ( $().owlCarousel ) {
            $('.themesflat-carousel').each(function(){
                var
                $this = $(this),
                auto = $this.data("auto"),
                item = $this.data("item"),
                item2 = $this.data("item2"),
                item3 = $this.data("item3"),
                item4 = $this.data("item4"),
                loops = $this.data("loop"),
                dots = $this.data("dots"),
                nav = $this.data("nav"),
                margin = Number($this.data("margin"));

                $this.find('.owl-carousel').owlCarousel({
                    margin: margin,
                    navigation : false,
                    pagination: false,
                    autoplay: auto,
                    loop:loops,
                    dots:dots,
                    nav: nav,
                    dotsData: true,
                    animateOut:'fadeOut',
                    autoplayTimeout: 10000,
                    responsive: {
                        0:{
                            items:item4
                        },
                        600:{
                            items:item3
                        },
                        1000:{
                            items:item2
                        },
                        1752:{
                            items:item
                        }
                    }
                });
            });
        }
    };

    var searchIcon = function () {
        $(document).on('click', function(e) {   
            var clickID = e.target.id;   
            if ( ( clickID !== 'input-search' ) ) {
                $('.header-search-form').removeClass('show');                
            } 
        });

        $('.header-search-icon').on('click', function(event){
            event.stopPropagation();
        });

        $('.header-search-form').on('click', function(event){
            event.stopPropagation();
        });        

        $('.header-search-icon').on('click', function (event) {
            if(!$('.header-search-form').hasClass( "show" )) {
                $('.header-search-form').addClass('show');  
                event.preventDefault();                
            }
                
            else
                $('.header-search-form').removeClass('show');
                event.preventDefault();

        });        
  
    };

    var flatCounter = function () {
        if ($(document.body).hasClass("counter-scroll")) {
          var a = 0;
          $(window).scroll(function () {
            var oTop = $(".box").offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
              if ($().countTo) {
                $(".box")
                  .find(".number")
                  .each(function () {
                    var to = $(this).data("to"),
                      speed = $(this).data("speed");
    
                    $(this).countTo({
                      to: to,
                      speed: speed,
                    });
                  });
              }
              a = 1;
            }
          });
        }
    };

    var flatProgressBar = function() {
        if ($('.couter .chart').length > 0) {
            var $pieChart = $('.couter .chart');
            $pieChart.each(function () {
            var $elem = $(this),
                  pieChartSize = $elem.attr('data-size') || "120",
                  pieChartAnimate = $elem.attr('data-animate') || "2100",
                  pieChartWidth = $elem.attr('data-width') || "10",
                  pieChartColor = $elem.attr('data-color') || "#FC477E",
                  pieChartTrackColor = $elem.attr('data-trackcolor') || "rgba(252,71,126,0.1)";
            $elem.find('span, i').css({
                  'width': pieChartSize + 'px',
                  'height': pieChartSize + 'px',
                  'line-height': pieChartSize + 'px'
            });
            $elem.appear(function () {
                $elem.easyPieChart({
                      size: Number(pieChartSize),
                      animate: Number(pieChartAnimate),
                      trackColor: pieChartTrackColor,
                      lineWidth: Number(pieChartWidth),
                      barColor: pieChartColor,
                      scaleColor: false,
                      lineCap: 'round',
                      onStep: function (from, to, percent) {
                          $elem.find('span.percent').text(Math.round(percent));
                      },
                      rotate: 120,
                    });
                });
            });
        };
    };
      
    var tabs = function(){
        $('.flat-tabs').each(function(){
            $(this).find('.content-tab').children().hide();
            $(this).find('.content-tab').children().first().show();
            $(this).find('.menu-tab').children('li').on('click',function(){
                var liActive = $(this).index();
                var contentActive=$(this).siblings().removeClass('active').parents('.flat-tabs').find('.content-tab').children().eq(liActive);
                contentActive.addClass('active').fadeIn("slow");
                contentActive.siblings().removeClass('active');
                $(this).addClass('active').parents('.flat-tabs').find('.content-tab').children().eq(liActive).siblings().hide();
                swiper_tab();
            });
        });
    };

    var flatAccordion = function() {
        var args = {duration: 600};
        $('.flat-toggle .toggle-title.active').siblings('.toggle-content').show();
      
        $('.flat-toggle.enable .toggle-title').on('click', function() {
            $(this).closest('.flat-toggle').find('.toggle-content').slideToggle(args);
            $(this).toggleClass('active');
        }); // toggle 
      
        $('.flat-accordion .toggle-title').on('click', function () {
            if( !$(this).is('.active') ) {
                $(this).closest('.flat-accordion').find('.toggle-title.active').toggleClass('active').next().slideToggle(args);
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            } else {
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            }     
        }); // accordion
    }; 

      var dropdown = function(id){
        var obj = $(id+'.dropdown');
        var btn = obj.find('.btn-selector');
        var dd = obj.find('ul');
        var opt = dd.find('li');
            dd.hide();
            obj.on("click", function() {
                dd.show();
                dd.toggleClass('show');
                $(this).css("z-index",1000);
            })
            
            opt.on("click", function() {
                dd.hide();
                var txt = $(this).text();
                opt.removeClass("active");
                $(this).toggleClass("active");
                btn.text(txt);
            });
    };
    
    var no_link = function(){
        $('a.nolink').on('click', function(e){
          e.preventDefault();
      });
      $('.icon_menu .icon a').on('click', function(e){
        e.preventDefault();
    });
    };

    var change_img = function() {
        $(".img-thumnail img").on("click", function(){
            var selector_img = $(this).data("src");
                $('.img-change').fadeOut(200,function(){
                    $(this).closest('.img-top').find('.img-change').attr('src', selector_img);
                    $('.img-change').fadeIn(200);
                })
        });
    };

    var btnQuantity = function () {
        $('.minus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
        
            if (value > 1) {
                value = value - 1;
            } 
        
        $input.val(value);
        
        });
        
        $('.plus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
        
            if (value > 0) {
                value = value + 1;
            } 
        
            $input.val(value);
        });
    };

    var pageLoad = function () {
        $( window ).on('load',function() {
            $('#preload').delay(600).fadeOut('fast', function () {
                $('body').removeClass('preloading');
            });
        });
    };

    var headerMenu = function () {
        $(".header-menu").on("click", function () {
            $(".side-menu__block").addClass("active");
        });

        $(".side-menu__block-overlay,.side-menu__toggler, .scrollToLink").on("click", function (e) {
            $(".side-menu__block").removeClass("active");
            e.preventDefault();
        }
        );
    };

    // Dom Ready
    $(function () {
        scrollToTop();
        popupVideo();
        flatOwlCarowsel();
        searchIcon();
        flatCounter();
        flatProgressBar();
        tabs();
        new WOW().init();
        flatAccordion();
        dropdown('#artworks');
        no_link();
        change_img();
        btnQuantity();
        headerMenu();
        pageLoad();
    });

})(jQuery);
