/**
 * Main theme Javascript - (c) Greg Priday, freely distributable under the terms of the GPL 2.0 license.
 */
jQuery(function($){

    // The menu button
    var menuShown = false;
    $('#masthead a.main-menu-button').click(function(e){
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
        $('#masthead a.main-menu-button').click();
    });

    // This handles scaling the logo image if there is one when we scroll down
    var siteLogo = $('#masthead .site-title img');
    if(siteLogo.length && siteLogo.eq(0).data('scale') != null) {
        var siteLogoSize = {
            'width' : Number( siteLogo.attr('width') ),
            'height' : Number( siteLogo.attr('height') )
        };
        siteLogoSize.ratio = siteLogoSize.width / siteLogoSize.height;

        var resizeSiteLogo = function(){

            if( $(window).width() >  480 ) {
                var top = $(window).scrollTop();
                var multiplier = 1 - Math.min(0.5, top / siteLogoSize.height / 8);

                siteLogo.css({
                    'height' : siteLogoSize.height * multiplier,
                    'width' : siteLogoSize.height * multiplier * siteLogoSize.ratio
                });
            }
            else {
                // Resize the site logo to the original size
                siteLogo.css( {
                    'height' : siteLogoSize.height,
                    'width' : siteLogoSize.width
                } );
            }
        }
        setTimeout(resizeSiteLogo, 250);
        resizeSiteLogo();
        $(window).scroll(resizeSiteLogo).resize(resizeSiteLogo);
    }

    if(typeof siteoriginSlider != 'undefined') {

        var positionSliderNav = function(el, speed){
            if( !$('body').hasClass('menu-overlap') ) return;

            var $$ = $(el);
            if(!$$.length) return;

            var $n = $$.closest('.sow-slider-base').find('.sow-slide-nav');
            var mh = $('#masthead').outerHeight();

            $n.animate({'top': ( ( $$.outerHeight() - mh ) / 2 ) + mh }, speed );
        };

        $('#under-masthead-slider').on({
            'cycle-before': function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag){
                positionSliderNav( incomingSlideEl, optionHash.speed );
            },
            'cycle-initialized': function(event, optionHash){
                positionSliderNav( optionHash.slides[0], 0 );
            }
        }, '.sow-slider-images');

        // Reposition the navigation arrows in the slider
        $(window).resize(function(){

            if( $('body').hasClass('menu-overlap') ) {
                // Add a top margin to images in a SiteOrigin slider widget slides
                $('#under-masthead-slider ul.sow-slider-images li.sow-slider-image').each(function () {

                    if( $(this).css('background-image') != 'none' ) {
                        $(this).find('img').css('padding-top', $('#masthead').outerHeight());
                    }
                });
            }

            positionSliderNav($('#under-masthead-slider .cycle-slide-active'), 0);

        }).resize();

    }

    // Substitute any retina images
    var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
    if( pixelRatio > 1 ) {
        $('img[data-retina-image]').each(function(){
            var $$ = $(this);
            $$.attr('src', $$.data('retina-image'));

            // If the width attribute isn't set, then lets scale to 50%
            if( typeof $$.attr('width') == 'undefined' ) {
                $$.load( function(){
                    var size = [$$.width(), $$.height()];
                    $$.width(size[0]/2);
                    $$.height(size[1]/2);
                } );
            }
        })
    }

    /* Setup fitvids for entry content and panels */
    $('.entry-content, .entry-content .panel, .post-video' ).fitVids();
});