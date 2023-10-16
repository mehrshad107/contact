(function($){

    /*
        1. Data Background Function
        2. Scroll top button
        3. Offcanvus toggle
        4. Theme Slider Functions
        5. Nice Select
        6. Mobile Menu
        7. Wow Js
        8. Article Hover
        9. Offcanvus
        10. Progressbar
        11. Preloader
        12. Header Sticky
        13. Counter Up
        14. Case Study Hover Function
        15. Magnific Popup
        16. Canvus Menu Toggle
        17. Canvus Menu
        23. mobile menu
    */


    //1. Data Background Set
    $('[data-background]').each(function () {
        $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
    });

    //2. Scroll top button
    $(window).on("scroll", function(){
        var scrollBar = $(this).scrollTop();
        if(scrollBar > 150 ) {
            $(".scroll-top-btn").fadeIn();
        } else {
            $(".scroll-top-btn").fadeOut();
        }
    })
    $(".scroll-top-btn").on("click", function(){
        $("body,html").animate({
            scrollTop: 0
        });
    });


    //3. Offcanvus toggle
    $(".offcanvus-toggle").on("click", function () {
        $(".offcanvus-box").addClass("active");
    });

    $(".offcanvus-close").on("click", function(){
        $(".offcanvus-box").removeClass("active");
    });

    $(document).on("mouseup", function (e) {
        var offCanvusMenu = $(".offcanvus-box");
  
        if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
          $(".offcanvus-box").removeClass("active");
        }
    });

    //4. Theme Slider Functions



     //portfolio slider 
     $(".cr-pf-slider").slick({
        slidesToShow: 1,
        prevArrow: '<button class="prev-arrow"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fas fa-arrow-right"></i></button>',
     });

    $(".cr2-footer-brand-slider").slick({
        slidesToShow: 6,
        arrows: false,
        autoplay: true,
        speed: 700,
        speed: 2500,
        autoplaySpeed: 0,
        cssEase: 'linear',
        responsive: [
            {
                breakpoint: 1200, 
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 992, 
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768, 
                settings: {
                    slidesToShow: 3,
                    cssEase: '',

                }
            },
            {
                breakpoint: 460, 
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $(".cr2-brand-slider").slick({
        slidesToShow: 6,
        arrows: false,
        autoplay: true,
        speed: 2500,
        autoplaySpeed: 0,
        cssEase: 'linear',
        responsive: [
            {
                breakpoint: 1200, 
                settings: {
                    slidesToShow: 5,
                }
            }, 
            {
                breakpoint: 992, 
                settings: {
                    slidesToShow: 4,
                }
            }, 
            {
                breakpoint: 768, 
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    cssEase: '',
                }
            }

        ]
    });



    $(".bp-feature-image-slider").slick({
        slidesToShow: 1,
        autplay: true,
        speed: 700,
        prevArrow: '<button class="prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fa-solid fa-arrow-right"></i></button>'
    });

    $(".related-projects-slider").slick({
        slidesToShow: 3,
        autoplay: true,
        speed: 700,
        arrows: false,
        responsive: [
            {
                breakpoint: 992, 
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576, 
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });







    //hm3 brand slider


    $(".hm5-brand-slider").slick({
        slidesToShow: 5,
        arrows: false,
        autoplay: true,
        speed: 700,
        responsive: [
            {
                breakpoint: 1800, 
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1400, 
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 1100, 
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 650, 
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });




    //5. Nice Select
    $('.nice_select').niceSelect();


    //6. Mobile Menu
    $(".mobile-menu-toggle").on("click", function () {
        $(".mobile-menu").addClass("active");
    });

    $(".mobile-menu .close").on("click", function () {
        $(".mobile-menu").removeClass("active");
    });

    $(".mobile-menu ul li.has-submenu i").each(function () {
        $(this).on("click", function () {
        $(this).siblings('ul').slideToggle();
        $(this).toggleClass("icon-rotate");
        });
    });

    $(document).on("mouseup", function (e) {
        var offCanvusMenu = $(".mobile-menu");

        if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
            $(".mobile-menu").removeClass("active");
        }
    }); 

    //7. wow js
    new WOW().init();

    //8. Article Hover
    $(".article-card").on("mouseover", function(){
        $(this).find("p.description").slideDown();
    });

    $(".article-card").on("mouseleave", function(){
        $(this).find("p.description").slideUp();
    });



    //9. Offcanvus Toggle
    $(".offcanvus-toggle").on("click", function () {
        $(".offcanvus-box").addClass("active");
    });

    $(".offcanvus-close").on("click", function(){
        $(".offcanvus-box").removeClass("active");
    });

    $(document).on("mouseup", function (e) {
        var offCanvusMenu = $(".offcanvus-box");
  
        if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
          $(".offcanvus-box").removeClass("active");
        }
    });

    //10. progressbar
    $(".cr-progress-bar").ProgressBar();

    $('.js-tilt').tilt({
        glare: true,
        maxGlare: .5
    });

    //11. preloader 
    $(window).on("load", function(){
       $(".preloader").fadeOut();
    }); 


    //12. header sticky
    $(window).on("scroll", function(){
        var scrollbarPosition = $(this).scrollTop();

        if ( scrollbarPosition > 150 ) {
            $(".header-sticky").addClass("sticky-on");
        } else {
            $(".header-sticky").removeClass("sticky-on");
        }
    });

    //13. counterup 
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    //14. case study hover function
    $(".case-study-single").each(function(){

        $(this).hover(function(){
            $(this).parents(".case-study-box").find(".case-study-single.active").removeClass("active");
            $(this).addClass("active");
            var case_active = $(this).data("case");
            
            $(".case-study-box img.active").removeClass("active");
            $(".case-study-box ." + case_active + "").addClass("active");
        });

    });

    //15. magnific popup
    $(".video-popup-btn").magnificPopup({
        type: 'iframe'
    });

    //16. canvus menu toggle 
    $(".canvus-menu-toggle").on("click", function(){
        $(".canvus-menu").toggleClass("active");
    }); 

    $(document).on("mouseup", function (e) {
        var offCanvusMenu = $(".canvus-menu");

        if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
            $(".canvus-menu").removeClass("active");
        }
    }); 


    //17. canvus menu
    $(".canvus-menu ul li.has-submenu").each(function () {
        $(this).on("click", function () {
            $(this).children('ul').slideToggle();
        });
    });

    $(".canvus-menu ul li a").each(function(){

        $(this).on("click", function(e){
            if (this.hash !== "") {
                e.preventDefault();

                var hash = this.hash;

                $("html, body").animate({
                    scrollTop: $(hash).offset().top - 300,
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        });
    }); 

    //18. Color Switcher
    $(".color-switcher-btn").on("click", function(){
        $(this).removeClass("active");
        $(".theme-color-switch").addClass("active");
    });

    $(".theme-color-switch .close-switcher").on("click", function(){
        $(".theme-color-switch").removeClass("active");
        $(".color-switcher-btn").addClass("active");
    });

    $(".theme-color-switch .color-list li a:not(.primary)").each(function(){
        $(this).on("click", function(){
            var class_name = $(this).attr("class");

            $(":root").css({
                "--primary-color" : class_name,
            });

            //hero banner
            var hero_banner = 'assets/images/banner/hero-banner-' + class_name + '.jpg';
            var ticker_bg = 'assets/images/shapes/ticker-bg-' + class_name + '.png';
            var hm5_banner = 'assets/images/home-5/section-bg-' + class_name + '.jpg';

            $("body").removeAttr("class");
            $("body").addClass(class_name);

            $(".hero-section").css({
                "background-image" : "url(" + hero_banner +")",
            });

            $(".ticker-section").css({
                "background-image" : "url(" + ticker_bg +")",
            });

            $(".hm5-main-section").css({
                "background-image" : "url(" + hm5_banner + ")",
            });

        }); 
    }); 

    $(".theme-color-switch a.primary").on("click", function(){

        $("body").removeAttr("class");

        $(":root").css({
            "--primary-color" : "#5044EB",
        });

        $(".hero-section").css({
            "background-image" : "url(assets/images/banner/hero-banner.jpg)",
        });

        $(".ticker-section").css({
            "background-image" : "url(assets/images/shapes/ticker-bg.png)",
        });

        $(".hm5-main-section").css({
            "background-image" : "url(assets/images/home-5/section-bg.jpg)",
        });
        
    });

    //19. Side Nagigation
    $(".hm5-sidebar-navigation li a").each(function(){

        $(this).on("click", function(event){
            event.preventDefault();
            $(this).parents(".hm5-sidebar-navigation").find("a.active").removeClass("active");
            $(this).addClass("active");

            var hash_value = $(this.hash);

            $(".hm5-box").removeClass("active");

            hash_value.addClass("active");

        });
       
    }); 

    //20. Index 4 header toggle
    $(".hm4-header-toggle").on("click", function(){
        $(".canvus-menu").toggleClass("active");
    });

    //21. cursor move function
    $("body").on("mousemove", function (n) {
        a.css({
            'left': n.clientX + "px"
        });
        a.css({
            'top': n.clientY + "px"
        });
        b.css({
            'left': n.clientX + "px"
        });
        b.css({
            'top': n.clientY + "px"
        });
        c.css({
            'left': n.clientX + "px"
        });
        c.css({
            'top': n.clientY + "px"
        });
    });
    var a = $("#cursor"),
        b = $("#cursor2"),
        c = $("#cursor3");
    function n(t) {
        b.addClass("hover");
        c.addClass("hover");
    }
    function s(t) {
        b.removeClass("hover");
        c.removeClass("hover");
    }
    s();
    $("a, button").on('mouseover', n);
    $("a, button").on('mouseout', s);



        
        $(".cursor, .cursor2, .cursor3").css({
            "opacity" : "1",
        });




    //22. hm4 project filter
    var $project_grid = $('.hm4-grid').isotope({
        
    });
    $('.hm4-filter-btn-group').on( 'click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $project_grid.isotope({ filter: filterValue });
    });

    $(".hm4-filter-btn-group button").each(function(){
        $(this).on("click", function(){
            $(this).parents(".hm4-filter-btn-group").find("button.active").removeClass("active"); 
            $(this).addClass("active");
        }); 
    });

//23. mobile menu
    jQuery(document).ready(function ($) {
        $("#mayosis-sidemenu li.has-sub>a").on("click", function () {
            $(this).removeAttr("href");
            var z = $(this).parent("li");
            z.hasClass("open")
                ? (z.removeClass("open"), z.find("li").removeClass("open"), z.find("ul").slideUp())
                : (z.addClass("open"),
                    z.children("ul").slideDown(),
                    z.siblings("li").children("ul").slideUp(),
                    z.siblings("li").removeClass("open"),
                    z.siblings("li").find("ul").slideUp());
        }),
            $("#mayosis-sidemenu>ul>li.has-sub>a").append('<span class="holder"></span>');
    })

})(jQuery)