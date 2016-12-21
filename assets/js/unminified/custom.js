( function( $ ) {
$(window).load(function(){


/*------------------------------------------------
                BODY
------------------------------------------------*/

  $('body').css({"display":"block"});

/*------------------------------------------------
                END BODY
------------------------------------------------*/

/*------------------------------------------------
                SIDR MENU
------------------------------------------------*/

$('#sidr-left-top-button').sidr({
    name: 'sidr-left-top',
    timing: 'ease-in-out',
    speed: 500,
    side: 'left',
    source: '.left'
});

/*------------------------------------------------
                END SIDR MENU
------------------------------------------------*/

/*------------------------------------------------
                PRELOADER
------------------------------------------------*/

 $('#loader').fadeOut();
 $('#loader-container').fadeOut();

/*------------------------------------------------
                END PRELOADER
------------------------------------------------*/

/*------------------------------------------------
                MENU ACTIVE
------------------------------------------------*/

$('.main-navigation ul li').click(function(){
    $('.main-navigation ul li').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
});

$('.topbar-toggle').click(function(){
    $('#top-bar').toggleClass('open-topbar');
});

/*------------------------------------------------
                END MENU ACTIVE
------------------------------------------------*/

/*------------------------------------------------
                STICKY HEADER
------------------------------------------------*/

$(".search-btn").click(function(){
    $("#search").slideDown("slow");

});

$("#close-search").click(function(){
    $("#search").slideUp("slow");
});
/*------------------------------------------------
                END STICKY HEADER
------------------------------------------------*/

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

 $(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
    $('.backtotop').css({bottom:"25px"});
    } else {
    $('.backtotop').css({bottom:"-100px"});
    }
    });
    $('.backtotop').click(function(){
    $('html, body').animate({scrollTop: '0px'}, 800);
    return false;
});
/*------------------------------------------------
                END BACK TO TOP
------------------------------------------------*/

/*------------------------------------------------
                SLICK SLIDER
------------------------------------------------*/

var slider_effect = $('#main-slider .regular').data('effect');
$('#main-slider .regular').slick({
    cssEase: slider_effect
});

$("#recent-courses-slider .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#recent-news .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#popular-courses .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 421,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#upcoming-events .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#our-partners .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 421,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
});

$("#testimonial-slider .regular").slick({
    fade: true,
    cssEase: 'linear',
    customPaging : function(slider, i) {
        var thumb = $(slider.$slides[i]).data('thumb');
        return '<a><img src="'+thumb+'"></a>';
    },
    responsive: [
    {
      breakpoint: 601,
      settings: {
        dots: false
      }
    }
  ]
});

$("#testimonial-slider .slick-dots").insertAfter('#testimonial-slider .testimonial-contents-wrapper');
$("#testimonial-slider button.slick-prev").insertBefore('#testimonial-slider .slick-dots');
$("#testimonial-slider button.slick-next").insertAfter('#testimonial-slider .slick-dots');

if ($(window).width() < 615 )
{
    $("#testimonial-slider button.slick-prev").insertBefore("#testimonial-slider button.slick-next");
}

/*------------------------------------------------
                END SLICK SLIDER
------------------------------------------------*/

/*------------------------------------------------
                GALLERY PORTFOLIO
------------------------------------------------*/


var $container = $('.portfolio'),
    colWidth = function () {
        var w = $container.width(), 
            columnNum = 1,
            columnWidth = 0;
        if (w > 1200) {
            columnNum  = 3;
        } 
        else if (w > 900) {
            columnNum  = 3;
        } 
        else if (w > 600) {
            columnNum  = 2;
        } 
        else if (w > 300) {
            columnNum  = 1;
        }
        columnWidth = Math.floor(w/columnNum);
        $container.find('.portfolio-item').each(function() {
            var $item = $(this),
                multiplier_w = $item.attr('class').match(/item-w(\d)/),
                multiplier_h = $item.attr('class').match(/item-h(\d)/),
                width = multiplier_w ? columnWidth*multiplier_w[1]-0 : columnWidth-5,
                height = multiplier_h ? columnWidth*multiplier_h[1]*1-5 : columnWidth*0.5-5;
            $item.css({
                width: width,
                height: height
            });
        });
        return columnWidth;
    }

$('.gallery .gallery-item .gallery-icon a').attr('data-lightbox', 'masonry');

/*------------------------------------------------
                END GALLERY PORTFOLIO
------------------------------------------------*/

/*------------------------------------------------
                TABS
------------------------------------------------*/
$('ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('active');
    $('.tab-content').removeClass('active');

    $(this).addClass('active');
    $("#"+tab_id).addClass('active');
});

/*------------------------------------------------
                END TABS
------------------------------------------------*/

});

/*------------------------------------------------
            END JQUERY
------------------------------------------------*/
} )( jQuery );



