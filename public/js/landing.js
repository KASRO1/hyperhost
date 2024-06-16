$(document).ready(function() {
    setTimeout(() => {
        $('.preloader').fadeOut();
        wow = new WOW(
            {
                animateClass: 'animated',
                offset: 100,
                callback: function(box) {
                    //console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            }
            );
        wow.init();
    }, 1000);
});

$('.open_mob').click(function() {
    $('.mob_menu').fadeIn();
});
$('.mob_menu .close').click(function() {
    $('.mob_menu').fadeOut();
});


$('.faq .item .arrow').click(function() {
    $(this).parent().toggleClass('active');
    $(this).parent().find('.text').slideToggle();
});


// var $carousel = $('.slider.flags').flickity({
//     cellAlign: 'center',
//     //contain: true,
// });
setTimeout(function() {
    var $carousel = $('main .slider').flickity({
        cellAlign: 'center',
        wrapAround: true,
        autoPlay: 3000,
        draggable: false
    });
}, 1000);
var $carousel2 = $('.slider.tarifs').flickity({
    cellAlign: 'center',
    contain: true,
    draggable: false,
    on: {
        change: function(index) {
            $('#carousel .sel').text(index);
        }
    }
});
var cellElements = $carousel2.flickity('getCellElements')
$('#carousel .els').text(cellElements.length);
$('#carousel .sel').text(1);

$('.slider.flags .slide').click(function() {
    updateTarifs($(this).attr('data-country'));
});
$('.map_block .map-dot').click(function() {
    updateTarifs($(this).attr('data-country'));
});
$('.tabs .tab').click(function() {
    $('.tabs .tab').removeClass('active');
    $(this).addClass('active');
    updateTarifs($('.slider.flags .slide.active').attr('data-country'));
});

function updateTarifs(country) {
    var category = $('.tabs .tab.active')
    $('.slider.flags .slide').removeClass('active');
    $('.slider.flags .slide[data-country="'+country+'"]').addClass('active');
    $('.map_block .map-dot').removeClass('active');
    $('.map_block .map-dot[data-country="'+country+'"]').addClass('active');

    $('.slider.flags').addClass('disabled');
    $('.tabs').addClass('disabled');
    $('.map_block').addClass('disabled');

    $('.tarifs').css('opacity', 0);

    setTimeout(function() {
        $carousel2.flickity('destroy');
        $('.tarifs').html('');

        $.get(
            "/get_tarifs",
            {
              country: $('.slider.flags .slide.active').attr('data-id'),
              category: $('.tabs .tab.active').attr('data-id')
            },
            onAjaxSuccess
          );

          function onAjaxSuccess(data)
          {
            $('.tarifs').html(data);
            $carousel2.flickity({
                cellAlign: 'center',
                contain: true,
                draggable: false,
                on: {
                    change: function(index) {
                        $('#carousel .sel').text(index+1);
                    }
                }
            });
            var cellElements = $carousel2.flickity('getCellElements')
            $('#carousel .els').text(cellElements.length);
            $('#carousel .sel').text(1);

            $('.slider.flags').removeClass('disabled');
            $('.tabs').removeClass('disabled');
            $('.map_block').removeClass('disabled');
            $('.tarifs').css('opacity', 1);
          }
    }, 200);



}

updateTarifs($('.slider.flags .slide.active').attr('data-country'));

$(document).ready(function() {
    setTimeout(() => {
        $('body').removeClass('no-transition');
    }, 500);
});


$('#send').click(function() {
    if($('#name').val() != '' && $('#email').val() != '' && $('#tel').val() != '' && $('#text').val() != '') {
        $('#send').attr('disabled', true);
        $.ajax({
        type: "POST",
        url: '/send',
        data: {
            'name': $('#name').val(),
            'email': $('#email').val(),
            'tel': $('#tel').val(),
            'text': $('#text').val()
        },
        success: function() {
            $('#name').val('')
            $('#email').val('')
            $('#tel').val('')
            $('#text').val('')
            $('#err').text('Заявка успешно отправлена').css('color', '#33d933');
        },
        dataType: 'html'
        });
    } else {
        $('#err').text('Вы заполнили не все поля').css('color', 'red');
        $('#send').attr('disabled', false);
    }
  });


  $('a[href^="#"').on('click', function() {

    let href = $(this).attr('href');

    $('html, body').animate({
        scrollTop: $(href).offset().top
    });
    return false;
});
