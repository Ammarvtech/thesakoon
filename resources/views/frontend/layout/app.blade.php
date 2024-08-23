<html>
    <head>
        <title>The Sakoon - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/slick_slider.css') }}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/register.css') }}" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{url('/css/user-dashboard.css')}}" type="text/css" />

        <!-- Latest compiled and minified CSS -->
      <!-- https://xstore.8theme.com/demos/hosting/-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




    </head>
    <body>
            @include('frontend.partials.common-header')
            @include('frontend.partials.header')
            @if(Request::is('/'))
                @include('frontend.partials.slider')
            @endif
       
            @yield('content')
            @include('frontend.partials.footer')
            {{-- @include('frontend.partials.common-footer') --}}
            <!--Jquery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
            <!-- Bootstrap JavaScript Libraries -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
            integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
            integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <!-- Owl Carousel -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

            <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Terminal-Text-Typing-Effect-typed-js/js/typed.js"></script>
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>   


                  

            <script>
            $(document).ready(function() {
            $("#cart").on("click", function() {
               $(".shopping-cart").fadeToggle("fast");
            });
            });
            </script>


    </body>
   
    <script>
        $(function() {
           var Accordion = function(el, multiple) {
              this.el = el || {};
              this.multiple = multiple || false;
               
              var links = this.el.find('.link');
        
              links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
           }
        
           Accordion.prototype.dropdown = function(e) {
              var $el = e.data.el;
                 $this = $(this),
                 $next = $this.next();
        
              $next.slideToggle();
              $this.parent().toggleClass('open');
        
              if (!e.data.multiple) {
                 $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
              };
           }  
        
           var accordion = new Accordion($('#accordion'), false);
        });
        
     </script>
     <script>
        $('#home_slider').owlCarousel({
           loop: true,
           animateOut: 'fadeOut', 
           interval: 2000,
           slideTransition: 'linear',
           dots: false,
           nav: false,
           mouseDrag: false,
           autoplay: true,
           responsive: {
                 0: {
                    items: 1
                 },
                 600: {
                    items: 1
                 },
                 1000: {
                    items: 1
                 }
           }
    
        });
     </script>
    <script>
    $('.gallery-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3500,
    margin: 8,
    nav: true,
    dots: false,
    responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 2 }} ,
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
    });
    $('.portfolio-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3500,
    margin: 45,
    nav: true,
    dots: false,
    responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 3 }} ,
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
    });
    </script>
       <!-- Select2 JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <!-- jQuery (required by Select2) -->
   {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
   
   <script>
   $(document).ready(function() {
      $('.select2').select2();
   });
   </script>
   <script>
      $(document).ready(function(){

         $('#itemslider').carousel({ interval: 3000 });

         $('.carousel-showmanymoveone .item').each(function(){
         var itemToClone = $(this);

         for (var i=1;i<6;i++) {
         itemToClone = itemToClone.next();

         if (!itemToClone.length) {
         itemToClone = $(this).siblings(':first');
         }

         itemToClone.children(':first-child').clone()
         .addClass("cloneditem-"+(i))
         .appendTo($(this));
         }
      });
      });

   </script>
</html>
