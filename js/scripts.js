import slick from '../node_modules/slick-carousel/slick/slick.js';
import Masonry from '../node_modules/masonry-layout/dist/masonry.pkgd.js';
import featherlight from '../node_modules/featherlight/release/featherlight.min.js';

(function ($, root, undefined) {

    $(function () {

        'use strict';

        var $window = $(window);
        var $body = $('body');




        // mobile menu button
        var $menu_button = $('#menu_button');
        var $nav = $('nav');
        $menu_button.on('click', function(e){
            e.preventDefault();
            $nav.toggleClass('visible');
        });

        // if press escape key, hide menu
        $(document).on('keydown', function(e){
            if(e.keyCode == 27 ){
                $nav.removeClass('visible');
            }
        })



        // accordions
        var $single_accordions = $('.single_accordion');
        $single_accordions.on('click', function(e){
            var $this = $(this);
            $single_accordions.removeClass('active_accordion');
            $this.addClass('active_accordion');
        });
        $single_accordions.first().addClass('active_accordion');


        // match height footer columns
        var $footer_columns = $('.footer_column');
        var $max_footer_column_height = 0;
        $footer_columns.each( function() {
            var $this = $(this);
            var $height = $this.innerHeight()
            if ( $height > $max_footer_column_height ) {
                $max_footer_column_height = $height;
            }
        });
        $('img', $footer_columns).css({'height' : $max_footer_column_height});



        // START OF CAROUSEL
        // var $slidesToShow = 1;
        // if ($window.width() > 768 ) {
        //     $slidesToShow = 3;
        // }
        $('.carousel').slick({
           // options
           infinite: true,
           accessibility: true,
           slidesToShow: 1,
           slidesToScroll: 1,
           prevArrow: '<div class="slick-prev">&lt;</div>',
           nextArrow: '<div class="slick-next">&gt;</div>',
           autoplay: true,
           pauseOnHover: true,
           autoplaySpeed: 4000,
           adaptiveHeight: true
       });
        // END OF CAROUSEL



        // resize white header text bg on event single page
        var $event_header_text = $('.event_header_text');
        var $event_header_text_bg = $('.event_header_text_bg');
        function recalculateEventHeaderHeight(text, bg) {
            // - 20 to counteract padding
            bg.css({'height' : text.outerHeight() - 20  });
        }
        recalculateEventHeaderHeight($event_header_text, $event_header_text_bg);
        $window.on('resize', function(){
            recalculateEventHeaderHeight($event_header_text, $event_header_text_bg);
        })


        // SHOW YOUTUBE VIDEOS IN SLIDER
        if (typeof $video_urls !== 'undefined' ) {
            setTimeout(  function() {
                for (var vi = 0; vi < $video_urls.length; vi++) {
                    var $video = $video_urls[vi];
                    var $youtube_id = youtubeIDFromUrl( $video.video );
                    if ($youtube_id) {
                        var $html_id = 'video_' + vi.toString();
                        new YT.Player( $html_id, {
                            height: '390',
                            width: '640',
                            videoId: $youtube_id,
                             events: {
                               'onStateChange': onPlayerStateChange
                             }
                        });
                    }
                }

            }, 1000);

        }


        function onPlayerStateChange(event) {
             if (event.data == YT.PlayerState.PLAYING ) {
                 // stop slick form autoplaying if user decides to play video
                var $c =  $('.carousel');
                if ($c.length) {
                    $c.slick('slickSetOption', 'autoplay', false, true);
                }
            }

        }

        function youtubeIDFromUrl($url) {
            var $id = false;
            var $v = $url.split('v=');
            if ($v.length > 1) {
                var $g = $v[1];
                var $h = $g.split('&');
                if ($h.length > 0) {
                    $id = $h[0];
                }
            }
            return $id;
        }


        //
        // //MASONRY GALLERY
        // var grid = document.querySelector('.masonry_gallery');
        // setTimeout( function(){
        //     var msnry = new Masonry( grid, {
        //       itemSelector: '.grid_item'
        //     });
        // }, 500 );
        //
        // //END OF MASONRY GALLERY
        //
        //
        //
        //
        //

        //
        //
        // // MAP
        // // MEMBERS MAP
        // if (typeof map_location != 'undefined') {
        //
        //     var map_theme = [{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#C5E3BF"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#D1D1B8"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#C6E2FF"}]}];
        //
        //     var map_options = {
        //         zoom: 15,
        //         mapTypeControl: true,
        //         scrollwheel: false,
        //         draggable: true,
        //         navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        //         mapTypeId: google.maps.MapTypeId.ROADMAP,
        //         styles: map_theme
        //     };
        //
        //
        //     var location_map_container = $('#map_container');
        //     location_map_container.css({
        //         width : '100%'
        //     })
        //
        //     var location_map = new google.maps.Map(location_map_container.get(0), map_options);
        //     var latlng = new google.maps.LatLng(  map_location.lat, map_location.lng   );
        //     var infowindow = new google.maps.InfoWindow({content: ''});
        //     var marker = new google.maps.Marker({
        //         position: latlng,
        //         map: location_map,
        //         optimized: false
        //     });
        //
        //     marker.addListener('click', function(){
        //         infowindow.setContent( map_location.title );
        //         infowindow.open(location_map, this);
        //     })
        //
        //     location_map.setCenter( latlng );
        //
        //
        //
        // };
        // // END OF MAP
        //






    });

})(jQuery, this);
