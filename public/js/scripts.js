$(document).ready(function() {
    $('.Slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        fade: true,
        cssEase: 'linear',
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false
    });

    $('.Logos').slick({
      dots: false,
      arrows: false,
      autoplay: true,
      pauseOnHover: false,
      autoplaySpeed: 6000,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      //slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });

    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }        
    });

    var offsets = [];

    function setOffsets() {
        offsets = [];
        
        $.each($('[data-sticky]'), function(i, v) {
            offsets.push($(v).offset().top);
        });
    }

    function setStickys() {
        var $top = $(window).scrollTop();

        $.each($('[data-sticky]'), function(i, v) {
            if($top >= offsets[i]) {
                if(! ($('.cloned').length > 0)) {
                    $(v).clone().removeAttr('data-sticky').addClass('cloned').insertBefore($(v));
                }
                
                $(v).not('.cloned').addClass('sticky');
            } else {
                $('.cloned').remove();
                $(v).removeClass('sticky');
            }
        });
    }

    var positions = [];
    $.each($('[data-scroller]'), function(i, v) {
        $(v).click(function(e) {
            e.preventDefault();

            slug = $(v).attr('data-scroller');
            offset = $(v).attr('data-scroller-offset')
                ?  $(v).attr('data-scroller-offset')
                : 0;

            pos = $('a[name="' + slug + '"]').offset().top;

            $('html, body').stop(true, true).animate({
                scrollTop: (parseInt(pos) + parseInt(offset))
            }, 1000);
        })
    });

    $(window).on('resize', function() {
        setOffsets();
        setStickys();
    });

    $(window).on('scroll', function() {
        setStickys();
    });

    setOffsets();
    setStickys();










    /** match heights **/
    function matchHeights() {
        heightElements = [];

        $.each($('[data-match-height]'), function(i, v) {
            var _elClass = ($(v).attr('data-match-height'));

            if($.inArray(_elClass, heightElements) == -1) {
                heightElements.push(_elClass);
            }
        });
       

        $.each(heightElements, function(a, k) {
            var largest = false;

            if(k.length > 1) {
                $.each($('.' + k), function(i, v) {
                    $(v).css({
                        height: 'auto'
                    });

                    var $h = $(v).height();

                    if (!largest || largest < $h) {
                        largest = $h;
                    }
                });

                $.each($('.' + k), function(i, v) {
                    //console.log(largest);
                    $(v).height(largest);
                });
            }
        });
    }
        
    heightsReady = false;
    $(window).load(function() {
        heightsReady = true;
        matchHeights();
    });
    $(window).resize(function() {
        if(heightsReady) {
            matchHeights();
        }
    });



    
    $('.Mobile__button').click(function(e) {
        e.preventDefault();

        $nav = $('.Mobile__nav');

        if($nav.is(':visible')) {
            $($nav.slideUp('fast'));
        } else {
            $($nav.slideDown('fast'));
        }
    });
});