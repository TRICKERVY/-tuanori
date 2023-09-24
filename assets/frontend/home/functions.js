(function($){
    var slBner = {
        init: function () {
            slBner.events();
        },
        events: function () {
            $('.sabner').swiper({
                preventClicks: false,
                paginationClickable: true,
                pagination: '.sabner .swiper-pagination',
                nextButton: '.sabner .swiper-button-next',
                prevButton: '.sabner .swiper-button-prev',
                spaceBetween: 5,
    autoplay: 5000,
    speed: 800,

                centeredSlides: true,
                autoplayDisableOnInteraction: true
            });
        }
    };

    var slSpmore = {
        init: function () {
            slSpmore.events();
        },
        events: function () {
            $('.sattmore').swiper({
                preventClicks: false,
                paginationClickable: true,
                nextButton: '.sattmore .swiper-button-next',
                prevButton: '.sattmore .swiper-button-prev',
                spaceBetween: 16,
                slidesPerView: 4,
                breakpoints: {
                    992: {
                        slidesPerView: 3
                    },
                    768: {
                        slidesPerView: 2
                    },
                    373: {
                        slidesPerView: 1
                    }
                }
            });
        }
    };

    $(document).ready(function () {
        if ($("#modal-ads").length > 0) {
            $('#modal-ads').modal('show');
        }

        if ($(".sabner").length > 0) {
            slBner.init();
        }

        if ($(".sattmore").length > 0) {
            slSpmore.init();
        }

        $('.sa-imn').click(function(){
            $('.sa-menu').toggleClass('sa-mnshow');
        });

        $('.sa-filic').click(function(){
            $('.sa-fillter').toggleClass('sa-filshow');
        });



        var imgTt = $('.sa-ptbtn').attr('data-src');
        $('[data-toggle="tooltip"]').tooltip({
            container: 'body',
            template: '<div class="tooltip sa-ttboxs"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            title: "<img src='" + imgTt + "' alt=''>",
            html: true
        });

        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 70) {
                $('.sa-header').addClass('sa-hdfix');
            } else {
                $('.sa-header').removeClass('sa-hdfix');
            }
        });

	});
    $(window).on("load",function(){
        //$(".mcustomscrollbar").mCustomScrollbar();
    });

})(window.jQuery);
