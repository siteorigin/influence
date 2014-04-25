/**
 * Main theme Javascript - (c) Greg Priday, freely distributable under the terms of the GPL 2.0 license.
 */
jQuery(function($){

    // The menu button
    var menuShown = false;
    $('a#main-menu-button').click(function(e){
        e.preventDefault();
        $('body').toggleClass('display-main-menu');

        if(typeof siteoriginSlider != 'undefined') {
            var slider = $('#under-masthead-slider .sow-slider-images');

            // This is a slight hack to prevent graphics glitching in the menu in Chrome
            slider.find('.sow-slider-image img').css('opacity', 0.99).animate({opacity: 1}, 500);

            var interval = setInterval(function(){
                $(window).resize();
            }, 10);

            setTimeout(function(){
                $(window).resize();
                clearInterval(interval);
            }, 500);
        }
    });

    $('#main-menu .main-menu-close').click(function(e){
        e.preventDefault();
        $('a#main-menu-button').click();
    });

    // This handles resizing the logo image if there is one when we scroll down
    var siteLogo = $('#masthead .site-title img');
    if(siteLogo.length) {
        var siteLogoSize = {
            'width' : Number(siteLogo.attr('width')),
            'height' : Number(siteLogo.attr('height'))
        };
        siteLogoSize.ratio = siteLogoSize.width / siteLogoSize.height;

        $(window).scroll(function(){
            var top = $(window).scrollTop();
            var multiplier = 1 - Math.min(0.5, top / siteLogoSize.height / 8);

            siteLogo.css({
                'height' : siteLogoSize.height * multiplier,
                'width' : siteLogoSize.height * multiplier * siteLogoSize.ratio
            });
        }).scroll();
    }

    // Add a top margin to images in a SiteOrigin slider widget slides
    $('#under-masthead-slider .sow-slider-base ul.sow-slider-images img').each(function(){
        $(this).css('padding-top', $('#masthead').outerHeight() );
    });

    // Reposition the arrows in the slider for SO slider widget
    $('#under-masthead-slider .sow-slider-base .sow-slide-nav').each(function(){
        var $$ = $(this);
        $$.css('margin-top', -$$.height()/2 + $('#masthead').outerHeight());
    });


    if(typeof siteoriginSlider != 'undefined') {

        var positionSliderNav = function(el, speed){
            var $$ = $(el);
            var $n = $$.closest('.sow-slider-base').find('.sow-slide-nav');

            $n.animate({'top': ( $$.outerHeight() - $('#masthead').outerHeight() ) / 2 }, speed );
        };
        $('#under-masthead-slider').on({
            'cycle-before': function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag){
                positionSliderNav(incomingSlideEl, optionHash.speed);
            },
            'cycle-initialized': function(event, optionHash){
                positionSliderNav(optionHash.slides[0], 0);
            }
        }, '.sow-slider-images');

        // Reposition the navigation arrows in the slider
        $(window).resize(function(){
            positionSliderNav($('#under-masthead-slider .cycle-slide-active'), 0);
        });

    }

    /* Setup fitvids for entry content and panels */
    $('.entry-content, .entry-content .panel, .post-video' ).fitVids();
});