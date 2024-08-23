@extends('frontend.layout.app')
@section('content')
<link rel="stylesheet" href="{{url('/css/service.css')}}" type="text/css" />
<section>
   <div class="sub_banner py-3 py-md-4 py-lg-5">
       <div class="sub_banner_contant">
       <h3>Book Now</h3>
           <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
               <div class="container d-flex">
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                       <li class="breadcrumb-item"><a href="{{route('services')}}">Service</a></li>
                       <li class="breadcrumb-item active" aria-current="page">Book Now</li>
                   </ol>    
               </div><!-- End .container -->
           </nav>
       </div>
   </div>
   <div class="container py-5">
       <div class="inner-services text-center">
          <p class="mb-0">Make an Appointment</p>
       </div>
       <h3 class="services-text">The features that makes your <br> services unique</h3>
           <div class="row pt-4">
            @foreach($services as $service)
               <div class="col-md-6 col-lg-3 col-sm-6">
                  <div class="fw-team list-item product_item shadow">
                     <div class="fw-team-image">
                        <img class="w-100" src="{{asset('images/'.$service->image)}}" alt="{{$service->name}}">
                     </div>
               
                     <div class="fw-team-inner p-4">
                        <p>{{$service->user->parent->name}}</p>
                        <h4>{{$service->name}}</h4>
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
           <div class="row pt-lg-5">
              <div class="pagination justify-content-center pe-0 mt-4">
               {{-- <nav aria-label="Page navigation example">
              
                  <ul class="pagination paging"><li class="active"><a class="disabledPageNo">1</a></li><li><a href="#" class="pageNo">2</a></li><li><a href="#" class="pageNo">3</a></li><li><a href="#" class="pageNo">4</a></li><li class="disabled"><a href="#">...</a></li><li><a href="#" class="pageNo">9</a></li></ul>            
               
            </nav> --}}

               {{$services->links()}}
         </div>
           </div>
   </div> 
   </section>
   
@endsection