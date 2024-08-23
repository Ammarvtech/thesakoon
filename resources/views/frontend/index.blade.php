@extends('frontend.layout.app')
@section('content')

<div class="container-fluid mt-4 px-4">
   <div class="inner-services text-center">
      <p class="mb-0">Our Service Providers</p>
   </div>
   <h3 class="services-text">Best Service Providers</h3>
   <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="carousel carousel-showmanymoveone slide" id="itemslider">
         <div class="carousel-inner">
         @foreach($companies as $key => $company)
           <div class="item <?php if($key == 0) echo 'active'; ?>">
             <div class="col-xs-12 col-sm-6 col-md-2">
               <a href="{{route('company_detail', $company->id)}}">
                  <img src="{{asset('images/'.$company->image)}}" class="img-responsive center-block" style="border-radius: 10px;">
               </a>
               <div class="mt-4">
                  <h4 class="text-center">{{$company->name}}</h4>
                  <h5 class="text-center">
                     <i class="fa fa-map-marker"></i>
                     {{substr($company->address, 0, 50);}}</h5>
               </div>
             </div>
           </div>
         @endforeach
 
         </div>
 
         <div id="slider-control">
         <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left" class="img-responsive"></a>
         <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right" class="img-responsive"></a>
       </div>
       </div>
     </div>
   </div>
 </div>

<!-- Team  us -->
<section class="py-lg-5">
    <div class="inner-services text-center">
       <p class="mb-0">Our Services</p>
    </div>
    <h3 class="services-text">Best services you can find here</h3>
      <div class="container">
         <div class="row pt-2 pt-lg-4">
         @foreach($services as $service)

           <div class="col-md-6 col-lg-3 col-sm-6 mt-2">
              <div class="fw-team list-item product_item shadow">
                 <div class="fw-team-image">
                     <?php
                        $url = parse_url($service->image);
                     ?>
                     @if(isset($url['scheme']))
                        <img class="w-100" src="{{$service->image}}" alt="{{$service->name}}">
                     @else
                        <img class="w-100" src="{{asset('images/'.$service->image)}}" alt="{{$service->name}}">     
                     @endif   
                 </div>
                 <div class="fw-team-inner p-4">
                       <h4>{{$service->name}}</h4>
                       <p class="card_description">{{ substr($service->description, 0, 80)}}</p>
                       <div class="d-flex justify-content-between">
                           <span>Rs {{$service->price}}</span>
                           <div class="detail_btn">
                              <a 
                                 href="{{route('book_service', $service->id)}}"
                                 >Book Now</a>
                           </div>
                       </div>
                 </div>
              </div>
           </div>

         @endforeach
      </div>
      </div>
</section>
<!-- about us -->
<div class="container py-lg-5">
    <div class="inner-services text-center">
       <p class="mb-0">ABOUT US</p>
    </div>
    <h3 class="services-text">We Are Here Get Chance to Avail <br>Our Offers</h3>
    <div class="row pt-lg-5">
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
<!-- break point -->
<section class="contact mt-1 mt-sm-1 mt-lg-3 footer_bg">
   <div class="contact-info container-fluid py-4">
      <div class="row justify-content-center">
         <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4 col-md-6">
            <div class="inner-box  p-lg-4 h-lg-auto mb align-items-center d-flex justify-content-center">
               <div class="row mobile_call">
                  <div class=" col-xs-3 col-sm-3 col-xxl-3 me-0 text-sm-center text-top mt-xxl-3 ">
                    <i class="fa-solid fa-phone mb-3 icons d-flex justify-content-center"></i>
                  </div>
                  <div class=" col-xs-9 col-sm-9 col-xxl-9 p-0 align-items-center d-flex justify-content-center">
                    <ul class="ps-2 call_list  mb-0">
                        <li><h3 class="text-white mb-0">Call Now</h3></li>
                        <li><a href="" aria-label="uan number" class="text-white "> 111-222-084</a></li>
                    </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4 col-md-6  mt-lg-3 justify-content-center d-flex">
            <div class="inner-box  p-4 h-lg-auto mb align-items-center d-flex justify-content-center">
               <div class="row">
                  <div class="col-12 col-xxl-12 p-0  d-flex justify-content-center align-items-center">
                    <h3 class="text-white booking_req">Lets Request a shedule for <br>Free Booking</h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4 col-md-6  mt-lg-3 justify-content-center d-flex">
            <div class="inner-box  p-4 h-lg-auto mb align-items-center  justify-content-center d-flex">
               <div class="row">
                  <div class="col-12 col-xxl-12 p-0  d-flex justify-content-center align-items-center strip_btn">
                     <a href="#">Contact Us<i class="fa fa-chevron-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- cutomer section -->
<section class="pb-5 mt-4 ">
    <div class="inner-services text-center">
       <p class="mb-0">CUSTOMER SAYS</p>
    </div>
    <h3 class="services-text">What our customer says</h3>
<div class="container pt-5">
      <div class="owl-carousel gallery-carousel">
         <div class="item">
            <div class="cutomer-card p-4">
              <div class="row"> 
               <div class="col-lg-1 col-sm-1 customer_img">
                  <div class="testimonial_img">
                  <img src="images/team3.jpg">
               </div>
            </div>
               <div class="col-lg-11 col-sm-11">
                    <p class="card-text text-white pe-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <ul class="ps-0 d-flex customer_list mb-0">
                     <li class="text-white pe-2" style="border-right: 1px solid #fff;">Customer Name</li>
                     <li class="text-white ps-2">Profession</li>
                    </ul>
               </div>
             </div>
           </div>
         </div>
         <div class="item">
            <div class="cutomer-card p-4">
              <div class="row"> 
               <div class="col-lg-1 col-sm-1 customer_img">
                   <div class="testimonial_img">
                  <img src="images/team4.jpg">
               </div>
            </div>
               <div class="col-lg-11 col-sm-11">
                    <p class="card-text text-white pe-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <ul class="ps-0 d-flex customer_list mb-0">
                     <li class="text-white pe-2" style="border-right: 1px solid #fff;">Customer Name</li>
                     <li class="text-white ps-2">Profession</li>
                    </ul>
               </div>
             </div>
           </div>
         </div>
      
      <div class="item">
            <div class="cutomer-card p-4">
              <div class="row"> 
               <div class="col-lg-1 col-sm-1 customer_img">
                   <div class="testimonial_img">
                  <img src="images/team2.jpg">
               </div>
               </div>
               <div class="col-lg-11 col-sm-11">
                    <p class="card-text text-white pe-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <ul class="ps-0 d-flex customer_list mb-0">
                     <li class="text-white pe-2" style="border-right: 1px solid #fff;">Customer Name</li>
                     <li class="text-white ps-2">Profession</li>
                    </ul>
               </div>
             </div>
           </div>
         </div>
      </div>
</div>
</section>
<style>
a.nav-link {
    color: white !important;
}
</style>
@endsection