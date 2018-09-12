$(function () {
    // ------------------------------------------------------- //
    // Multi Level dropdowns
    // ------------------------------------------------------ //
    $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).siblings().toggleClass("show");


        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

    });


    // ------------------------------------------------------- //
    // Collapse Map
    // ------------------------------------------------------ //
    $('.collapse-map').on('click', function () {
        $('.map-holder').slideToggle('fast');
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $(this).text('Toggle Map');
        } else {
            $(this).text('Collapse Map');
        }
    });


    // ------------------------------------------------------- //
    // Search Filter Button
    // ------------------------------------------------------ //
    $('.more-filters').on('click', function () {
        $('.all-options').toggleClass('d-none');
    });


    // ------------------------------------------------------- //
    // Navbar Toggler Button
    // ------------------------------------------------------- //
    $('.navbar .navbar-toggler').on('click', function () {
        $(this).toggleClass('active');
    });


    // ------------------------------------------------------- //
    // Search Features Button
    // ------------------------------------------------------ //
    $('.toggle-features').on('click', function () {
        $('.features').toggleClass('d-none');

        if ($('.features').hasClass('d-none')) {
            $('.toggle-features').html('Show Features <i class="fa fa-angle-down"></i>');
        } else {
            $('.toggle-features').html('Hide Features <i class="fa fa-angle-up"></i>');
        }
    });


    // ------------------------------------------------------- //
    // Bootstrap Select initialization
    // ------------------------------------------------------ //
    $('.selectpicker').selectpicker();


    // ------------------------------------------------------- //
    // Search Popup
    // ------------------------------------------------------ //
    $('a.search-btn').on('click', function () {
        $('.search-area').addClass('is-visible');
    });
    $('.search-area .close-btn').on('click', function () {
        $('.search-area').removeClass('is-visible');
    });


    // ------------------------------------------------------- //
    // Scroll To Top Button
    // ------------------------------------------------------ //
    $('#scrollTopButton').on('click', function () {
        $('body, html').animate({scrollTop: 0}, 1000);
    });


    // ------------------------------------------------------- //
    // Navbar
    // ------------------------------------------------------ //
    var c = 0, currentScrollTop = 0;
    $(window).on('scroll', function () {

        if ($(window).scrollTop() >= 1000) {
            $('#scrollTopButton').fadeIn();
        } else {
            $('#scrollTopButton').fadeOut();
        }

        var topBarHeight = $('.top-bar').height();

        if ($(window).scrollTop() >= topBarHeight) {
            $('.navbar').addClass('sticky');
            $('body').css('padding-top', (topBarHeight + $('.navbar').height()) + 'px');
        } else {
            $('.navbar').removeClass('sticky');
            $('body').css('padding-top', '0');
        }


        // Navbar functionality
        var a = $(window).scrollTop(), b = $('.navbar').height();

        currentScrollTop = a;
        if (c < currentScrollTop && a > b + b + 300) {
            $('.navbar').addClass("scrollUp");
        } else if (c > currentScrollTop && !(a <= b)) {
            $('.navbar').removeClass("scrollUp");
        }
        c = currentScrollTop;
    });

    // ------------------------------------------------------- //
    // Testimonials Slider
    // ------------------------------------------------------ //
    var swiper = new Swiper('.testimonials-slider', {
            loop: true,
            spaceBetween: 20,
            autoplay: {
                delay: 10000,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            }
        });

    var swiper = new Swiper('.artikel-slider', {
            loop: true,
            autoHeight : true,
            spaceBetween: 15,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            slidesPerView: 4,
            breakpoints: {
                640: {
                  slidesPerView: 1,
                  spaceBetween: 10,
                  height:70,
                },
                320: {
                  slidesPerView: 1,
                  spaceBetween: 5,
                }
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },
        });

    // ------------------------------------------------------- //
    // Agents Slider
    // ------------------------------------------------------ //
    var swiper = new Swiper('.agents-slider', {
            slidesPerView: 3,
            spaceBetween: 20,
            breakpoints: {
               991: {
                   slidesPerView: 1
               }
           },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            }
        });


});
