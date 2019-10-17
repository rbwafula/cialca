function tfa_popitup(url) {
    newwindow = window.open(url, 'name', 'height=400,width=650');
    if (window.focus) {
        newwindow.focus()
    }
    return false;
}

(function ($) {
    var urlParams = new URLSearchParams(window.location.search);
    var myParam = urlParams.get('vc_editable');

    $(function () {
        //All the frontend js for the plugin 
        if (!myParam) {
            tfaInitSlider('.tfa-tweets-slider-wrapper',false);
        }

    });//document.ready close
    $(window).load(function () {
        if (!myParam) {
            tfaInitTicker('.tfa-pro-ticker-main-wrapper',false);
        }
    });

    
}(jQuery));


function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function tfaInitSlider(target,vc_editor,$=jQuery){
	$(target).each(function () {
            var controls = $(this).data('slideControls');
            var auto = $(this).data('autoSlide');
            var slide_duration = $(this).data('slideDuration');
            var adaptive_height = $(this).data('adaptive');
            var mode = $(this).data('mode');
            $(this).bxSlider({
                auto: auto,
                adaptiveHeight:adaptive_height,
                controls: controls,
                pause: slide_duration,
                pager: false,
                speed: 1500,
                slideMargin:10,
                mode:mode
            });
        });
    if (vc_editor) {
        $('.tfa-init-slider').remove();
    }
}

function tfaInitTicker(target,vc_editor,$=jQuery){
    $(target).each(function () {
            var ticker_speed = $(this).attr('data-ticker-speed');
            var mouse_pause = $(this).attr('data-mouse-pause');
            var up_id = $(this).parent().find('.tfa-ticker-up').attr('id');
            var down_id = $(this).parent().find('.tfa-ticker-down').attr('id');
            var direction = $(this).attr('data-direction');
            var visible = $(this).attr('data-visible');
            var transition_speed = parseInt($(this).attr('data-transition-speed'));

            $(this).easyTicker({
                direction: direction,
                easing: 'swing',
                speed: transition_speed,
                interval: ticker_speed,
                height: 'auto',
                visible: visible,
                mousePause: mouse_pause,
                controls: {
                    up: '#'+up_id,
                    down: '#'+down_id

                }
            });
        });
    if (vc_editor) {
        $('.tfa-init-ticker').remove();
    }
}