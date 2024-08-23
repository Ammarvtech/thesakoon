@extends('frontend.layout.app')
@section('content')
<link rel="stylesheet" href="{{url('/css/about-us.css')}}" type="text/css" />
    <div class="container py-5">
        <div class="inner-services text-center">
        <p class="mb-0">ABOUT US</p>
        </div>
        <h3 class="services-text">We Are Here Get Chance to Avail <br>Our Offers</h3>
        <div class="row pt-2 pt-lg-5">
        <div class="col-lg-6 col-sm-12">
                <div class="about-img-wrap-three">
                <img decoding="async" src="images/about_barber.png" alt="" data-aos="fade-down-right" data-aos-delay="0" class="aos-init aos-animate">
                <img decoding="async" src="images/p5.jpg" alt="" data-aos="fade-left" data-aos-delay="400" class="aos-init aos-animate">
                <div class="experience-wrap aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="title">25 <span>Years</span></h2>
                    <p>Of Experience in This Finance Advisory Company.</p>
                </div>
                </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="about_btn">Get to know us</div>
            <h3 class="about-text">We are here for you get chance <br>to avail our offers</h3>
            <p class="about_paragrph mb-0 pt-2">This a website for barber shop that provides features and services <br>for its users This a website for barber shop that provides features and services for its users</p>
            <ul class="ps-0 about_list " >
                <li class="pt-3"><i class="fa-solid fa-arrow-right me-3"></i>100% better result</li>
                <li class="pt-3"><i class="fa-solid fa-arrow-right me-3"></i>100% better result</li>
                <li class="pt-3"><i class="fa-solid fa-arrow-right me-3"></i>100% better result</li>
            </ul>
            <p class="about_paragrph mb-0 pt-2">This a website for barber shop that provides features and services <br>for its users</p>
            <ul class="ps-0 d-flex pt-3" >
                <img src="images/about_author.png">
                <li class="ceo_xyz ms-3 "><span>markz xyz</span>ceo of <br>xyz barber shop</li>
            </ul>
        </div>
    </div>
    </div>

@endsection

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
    margin: 10,
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