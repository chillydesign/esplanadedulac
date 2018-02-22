import slick from '../node_modules/slick-carousel/slick/slick.js';
import Masonry from '../node_modules/masonry-layout/dist/masonry.pkgd.js';
import featherlight from '../node_modules/featherlight/release/featherlight.min.js';

(function ($, root, undefined) {

    $(function () {

        'use strict';

        var $window = $(window);
        var $body = $('body');

        // START OF PARALLAX
        var $header_image = $('#header_image');
        $window.scroll(function(){
            var windowScroll = $window.scrollTop();
            var translateY = windowScroll * 0.3;
            $header_image.css({'transform': 'translateY(' + translateY + 'px)'  });
        });
        // END OF PARALLAX



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


        //MASONRY GALLERY
        var grid = document.querySelector('.masonry_gallery');
        setTimeout( function(){
            var msnry = new Masonry( grid, {
              itemSelector: '.grid_item'
            });
        }, 500 );

        //END OF MASONRY GALLERY





        // START OF CAROUSEL
        var $slidesToShow = 1;
        if ($window.width() > 768 ) {
            $slidesToShow = 3;
        }
        $('.carousel').slick({
            // options
            infinite: true,
            accessibility: true,
            slidesToShow: $slidesToShow,
            slidesToScroll: 1,
            prevArrow: '<div class="slick-prev">&lt;</div>',
            nextArrow: '<div class="slick-next">&gt;</div>',
            autoplay: true,
            autoplaySpeed: 2000
        });
        // END OF CAROUSEL


        // MAP
        // MEMBERS MAP
        if (typeof map_location != 'undefined') {

            var map_theme = [{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#C5E3BF"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#D1D1B8"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#C6E2FF"}]}];

            var map_options = {
                zoom: 15,
                mapTypeControl: true,
                scrollwheel: false,
                draggable: true,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: map_theme
            };


            var location_map_container = $('#map_container');
            location_map_container.css({
                width : '100%'
            })

            var location_map = new google.maps.Map(location_map_container.get(0), map_options);
            var latlng = new google.maps.LatLng(  map_location.lat, map_location.lng   );
            var infowindow = new google.maps.InfoWindow({content: ''});
            var marker = new google.maps.Marker({
                position: latlng,
                map: location_map,
                optimized: false
            });

            marker.addListener('click', function(){
                infowindow.setContent( map_location.title );
                infowindow.open(location_map, this);
            })

            location_map.setCenter( latlng );



        };
        // END OF MAP







    });

})(jQuery, this);
