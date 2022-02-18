<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mirrors Online Portal </title>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' >

    <link rel="stylesheet" href="{{asset('public/web/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/web/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/web/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/web/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('public/web/css/lightgallery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css">
    <link rel="stylesheet" href="{{asset('public/web/css/font-awesome.min.css')}}">
    <style type="text/css">
        .lSSlideOuter>.lSSlideWrapper.usingCss>ul#imageGallery>li>img, .lSSlideOuter>.lSSlideWrapper.usingCss>ul#imageGallery>li.active>img { width: 100%; }
    </style>
  </head>
<body>
    
        @yield('content')
    
    <script type="text/javascript" src="{{asset('public/web/js/app.js')}}"></script>

     <script type="text/javascript" src="{{asset('public/web/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web/js/bootstrap.min.js')}}"></script>
   
    <script type="text/javascript" src="{{asset('public/web/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web/js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web/js/waypoints-sticky.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web/js/lightslider.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('public/web/js/lightslider.min.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('public/web/js/lightgallery-all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web/js/prettify.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web/js/star.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web/js/zoom-image.js')}}"></script>
    <script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBCOG6E5SOknPmpX-CvDMHYt7h4HoNPDFg'></script>
    <script type="text/javascript" src="{{asset('public/web/js/locationpicker.jquery.min.js')}}"></script>
    
   
    <script type="text/javascript">
        
            // $('.dv_location_for_all').locationpicker({
            //     location: {
            //         latitude: 25.264236,
            //         longitude: 55.329382
            //     },
            //     radius: 300,
            //     /*inputBinding: {
            //         latitudeInput: $('#us3-lat'),
            //         longitudeInput: $('#us3-lon'),
            //         radiusInput: $('#us3-radius'),
            //         locationNameInput: $('#us3-address')
            //     },*/
            //     enableAutocomplete: true,
            //     onchanged: function (currentLocation, radius, isMarkerDropped) {
            //         // Uncomment line below to show alert on each Location Changed event
            //         //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
            //     }
            // });

        </script>
    <script>

        $(function() {
          $(".heart").on("click", function() {
            $(this).toggleClass("is-active-heart");
          });
        });
        function sticky_header(){
            if($('.sticky-header').length){
                var sticky = new Waypoint.Sticky({
                  element: $('.sticky-header')
                })
            }
        }
        function fixed_menu_scroll() {
            var scroll = $(window).scrollTop();
            if(scroll >= 100) {
                $(".dv_drp_menu").css({"top":"47px"});
            } else {
                $(".dv_drp_menu").css({"top":"auto"});
            }
        };
        $(document).ready(function() {
            sticky_header()
            fixed_menu_scroll()
        });
        
        //$('[data-toggle="tooltip"]').tooltip();

       
    </script>
</body>

</html>