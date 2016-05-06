/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;

// init wow.js http://mynameismatthieu.com/WOW/docs.html
wow = new WOW(
  {
    boxClass:     'wow',      // default
    animateClass: 'animated', // default
    offset:       200,          // default
    mobile:       true,       // default
    live:         true        // default
  }
)
wow.init();





/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function




(function( $ ){

        $.fn.boxTemoignage = function(){

          if ( !$(this).length) return false;

          window.onresize = function(){ location.reload(); }
          
            // Variables + Cache objects
          $.each($(this), function(){

            var $this = $(this);
            
            var $this_imgTemoignage      = $this.find('.imgTemoignage'),
                $this_fleche_right       = $this.find('.fleche_right'),
                $this_fleche_rightImg    = $this_fleche_right.find('img'),
                $this_ruban_bleu         = $this.find('.ruban_bleu'),
                $this_temoignageOver     = $this.find('.temoignageOver'),
                $this_temoignage_don     = $this.find('.temoignage_don'),
                $this_bout_ruban         = $this.find('.bout_ruban'),
                $this_bout_rubanImg      = $this_bout_ruban.find('img');

            var imgHeight         = $this_imgTemoignage.height(),
                flecheHeight      = $this_fleche_rightImg.height(),
                rubanHeight       = $this_ruban_bleu.height() + flecheHeight/2,
                rubanPos          = imgHeight - flecheHeight/2,
                containerHeight   = imgHeight + rubanHeight,
                temoignageHeight  = $this_temoignageOver.height();

                $this.css({'height':containerHeight -20 });
                $this_temoignage_don.css({'top':rubanPos, 'height':rubanHeight });
                $this_temoignageOver.height(0).show();

                if ( temoignageHeight > imgHeight ) $this_temoignageOver.css({'overflow-y':'scroll'});

                $this_fleche_right.toggle(function(){
                      $this_fleche_rightImg.animateRotate(0, 180, function(){
                          $this_fleche_right.animate({ 'margin-top':0 });
                          $this_temoignage_don.animate({'top': -flecheHeight/2});
                          $this_temoignageOver.animate({'height': containerHeight - rubanHeight});
                          $this_bout_ruban.animate({'bottom':'-12px' }).css({'top':'auto'});
                          $this_bout_rubanImg.animate({'margin-top':'-12px', 'margin-bottom':0});
                      });   

                    }, function(){
                        $this_fleche_rightImg.animateRotate(180, 0, function(){
                            $this_temoignageOver.animate({'height': 0});
                            $this_temoignage_don.animate({'top': rubanPos}); 
                            $this_fleche_right.animate({ 'margin-top':-flecheHeight/2 });    
                            $this_bout_ruban.animate({'bottom':'auto', 'top':'-12px'});
                            $this_bout_rubanImg.animate({'margin-top':0, 'margin-bottom':'-12px'});
                        });
                });
          });
          //return $this;
        }


})( jQuery );

/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

          /*
           * Let's fire off the gravatar function
           * You can remove this if you don't need it
          */
        //loadGravatars();

        $.fn.extend({
            animateCss: function (animationName, _callBackFunction) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                $(this).addClass('animated ' + animationName).one(animationEnd, _callBackFunction);
                //$(this).removeClass('animated ' + animationName);
            }
        });


        /// Header animation /////
        $('._layerTxt').animateCss('slideInRight');
        $('._layerTxtLeft').animateCss('slideInLeft');


        /////// Témoignages /////////

        var animCitation = function(){
            if ( $(window).scrollTop() > 20) return false;
            window.scrollTo(0, 0);
            $('body').css({'position': 'fixed','overflow-y': 'scroll'});

            $('._layerTxt').animateCss('slideOutLeft');

            $('._layerCitation').css('visibility','visible').animateCss('slideInRight', function() {

                $(window).off("scroll", animCitation);
                $('body').css({'position': 'relative','overflow-y': 'auto'});
            });

            $('#masterLayer img').addClass('filtre');
                        

        }

        if ( $('body').hasClass( "page-template-page-Temoignage")  ){
          $(window).scroll(animCitation);
        }
          

        ///////    End Témoignages    /////////////////


          /// vidéo président 

          $("#videoPresident img").click(function(){
            $('#videoPlayer').show();
            var _vid = $('#videoPlayer').children("iframe")[0].src;
            $('#videoPlayer').children("iframe")[0].src += "&autoplay=1";
            //$(this).unbind("click");
            $(".closeVid").click(function(){
              $('#videoPlayer').hide();
              $('#videoPlayer').children("iframe")[0].src = _vid;
            });
          });


          //////// carrousel //////////////

          $('#carousel1, #carousel2').flexslider({
            animation: "slide",
            slideshow: false
          });

          $('#carouselNiveau3').flexslider({
            animation: "slide",
            video: true,  
            slideshow: false
          });
    

    ////////////// menu ////////////

    $('#menu-item-188, .vertical-nav').click(function(){
      $('.vertical-nav').slideToggle();
    });



    //Set la hauteur des box égal.
    var resizeBoxHeight = function(){

      $(".squareBox").each(function(){
        $(this).height( $(this).width() );
        $(this).children(".imgH100").height( $(this).height()+4 );
      });

      $(".tiersBox").each(function(){
        $(this).height( $(this).previous().height() );
      });

      $(".boxTextOver").each(function(){
        $(this).height( $(this).parent().height() );
      });

      

    }
    window.onresize = resizeBoxHeight;
    resizeBoxHeight();


    $(".showBoxOver").click(function(){ $(this).next(".boxTextOver").show();  });
    $(".closeBoxOver").click(function(){ $(this).parent(".boxTextOver").hide();  });
    $(".lien_niveau3").click(function(){ window.location = $(this).find(".next").attr("href");  });


    //anim box Temoignage - page liste donateurs

    $.fn.animateRotate = function(startAngle, endAngle, complete){
        return this.each(function(){
            var elem = $(this);

            $({deg: startAngle}).animate({deg: endAngle}, {
                /*duration: duration,
                easing: easing,*/
                step: function(now){
                    elem.css({
                      '-moz-transform':'rotate('+now+'deg)',
                      '-webkit-transform':'rotate('+now+'deg)',
                      '-o-transform':'rotate('+now+'deg)',
                      '-ms-transform':'rotate('+now+'deg)',
                      'transform':'rotate('+now+'deg)'
                    });
                },
                complete: complete || $.noop
            });
        });
    };

    

    $('.wrap_temoignage_don').boxTemoignage();

//window.resize();
}); /* end of as page load scripts */


