@extends('frontend.layout.app')
@section('content')
   <link rel="stylesheet" href="{{ url('/css/detail.css') }}" type="text/css" />
   <link rel="stylesheet" href="{{ url('/css/booking_deatil.css') }}" type="text/css" />
   <style>
      .badge-success {
         background-color: #5cb85c;
         color: #fff;
      }
   </style>
    <section class="bg-light">

        {{-- <h3 class="services-text">We Are Here Get Chance to Avail <br>Our Offers</h3> --}}
        {{-- <div class="bb_logo text-center pt-lg-3">
      <img src="{{ asset('images/logo.png') }}">
   </div> --}}
        <div class="detail_page py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="page-holder">
                            <ul id="vertical">
                              @foreach ($company->images as $image)
                                <li data-thumb="{{ asset('images/' . $image->image) }}">
                                    <img src="{{ asset('images/' . $image->image) }}" />
                                </li>
                              @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="product-details">
                
                            <div class="product-price">
                              <i class="fas fa-map-marker-alt"></i>
                                {{ $company->address }}
                            </div>
                            <h1 class="product-title">  {{ $company->name }}</h1>

                            <div class="product-content">
                                <p>{{ $company->detail }}</p>
                            </div>
                            <h6 class="mt-4">STAFFERS</h6>
                            <div class="detail_price py-3 d-flex" style="overflow: auto;width: 100%;">
                              
                                 @foreach($company->staff as $staff)
                                    <div>
                                          <img src="{{ asset('images/' . $staff->image) }}" height="75" width="100">
                                          <p class="text-small text-center">{{ $staff->name }}</p>
                                    </div>
                                 @endforeach
                            </div>
                            <h6 class="mt-4">CONTACT & BUISINESS HOURS</h6>
                            <div class="detail_price py-3 d-flex justify-content-between">
                              <p class="text-small"><i class="fas fa-phone-alt"></i>{{ $company->contact }}</p>
                              <a href="tel:{{ $company->contact }}" class="pricing me-4">Call Now</a>  
                            </div>
                 
                        </div>
                    </div>
                   
                        <div class="col-md-8">
                         
                            <div class="container-fluid justify-content-center align-items-center d-flex ">
                                <div class="col-lg-12 col-sm-12 shadow"  style="height: 500px;overflow: auto;">
                                    <div class="detail_card mt-4">
                                        @foreach ($allServices as $service)
                                            <div class="row shadow mt-2">
                                                <div class="col-md-3 col-lg-3 listing_img">
                                                    <img src="{{ asset('images/' . $service->image) }}" class="w-100 h-100"
                                                        alt="...">
                                                </div>
                                                <div class="col-md-9 col-lg-9">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $service->name }}</h4>
                                                        <p class="card-text mb-0">{{ $service->description }}</p>
                                                        <ul class="ps-0 d-flex pt-3 mb-0">
                                                            <img src="{{ asset('images/' . $service->user->image) }}"
                                                                height="75" width="100">
                                                            <li class="ceo_xyz ms-3 ">
                                                                <span>{{ $service->user->name }}</span>member of
                                                                <br>{{ $service->user->parent->name }}
                                                            </li>
                                                        </ul>
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="price_tag"><a class="pricing ms-3">Rs
                                                                    {{ $service->price }}</a></h6>
                                                            <div class="d-flex">
                                                               <h6 class="price_tag"><a class="pricing ms-3">
                                                                     {{ $service->time }} Mins</a></h6>
                                                               <h6 class="price_tag">
                                                                  <a class="pricing ms-3"   href="{{route('book_service', $service->id)}}">
                                                                        Book Now</a></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(count($allServices) == 0)
                                          <div class="text-center">
                                             <p><i class="fas fa-exclamation-triangle text-red"></i>
                                                No Services Available</p>
                                          </div>
                                       @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-details">
                           <div class="detail_card mt-4 shadow">
                              <?php
                                 $working_days = [];
                                 if(!empty($company->working_days)){
                                 $working_days = json_decode($company->working_days);
                                 }
                              ?>
                              <div class="detail_price py-3 px-4 d-flex justify-content-between">
                                 <p class="text-md">Monday</p>
                                 @if(in_array('1', $working_days)) 
                                    <span class="badge badge-success mt-2">{{date('h:i A', strtotime($company->start_time))}} - {{date('h:i A', strtotime($company->end_time))}}</span></span>
                                 @else
                                    <span class="badge badge-warning mt-2">Close</span>
                                 @endif
                              </div>
                              <div class="detail_price py-3 px-4 d-flex justify-content-between">
                                 <p class="text-md">Tuesday</p>
                                 @if(in_array('2', $working_days)) 
                                    <span class="badge badge-success mt-2">{{date('h:i A', strtotime($company->start_time))}} - {{date('h:i A', strtotime($company->end_time))}}</span></span>
                                 @else
                                    <span class="badge badge-warning mt-2">Close</span>
                                 @endif
                              </div>
                              <div class="detail_price py-3 px-4 d-flex justify-content-between">
                                 <p class="text-md">Wednesday</p>
                                 @if(in_array('3', $working_days)) 
                                    <span class="badge badge-success mt-2">{{date('h:i A', strtotime($company->start_time))}} - {{date('h:i A', strtotime($company->end_time))}}</span>
                                 @else
                                    <span class="badge badge-warning mt-2">Close</span>
                                 @endif
                              </div>
                              <div class="detail_price py-3 px-4 d-flex justify-content-between">
                                 <p class="text-md">Thursday</p>
                                 @if(in_array('4', $working_days)) 
                                    <span class="badge badge-success mt-2">{{date('h:i A', strtotime($company->start_time))}} - {{date('h:i A', strtotime($company->end_time))}}</span></span>
                                 @else
                                    <span class="badge badge-warning mt-2">Close</span>
                                 @endif
                              </div>
                              <div class="detail_price py-3 px-4 d-flex justify-content-between">
                                 <p class="text-md">Friday</p>
                                 @if(in_array('5', $working_days)) 
                                    <span class="badge badge-success mt-2">{{date('h:i A', strtotime($company->start_time))}} - {{date('h:i A', strtotime($company->end_time))}}</span></span>
                                 @else
                                    <span class="badge badge-warning mt-2">Close</span>
                                 @endif
                              </div>
                              <div class="detail_price py-3 px-4 d-flex justify-content-between">
                                 <p class="text-md">Saturday</p>
                                 @if(in_array('6', $working_days)) 
                                    <span class="badge badge-success mt-2">{{date('h:i A', strtotime($company->start_time))}} - {{date('h:i A', strtotime($company->end_time))}}</span></span>
                                 @else
                                    <span class="badge badge-warning mt-2">Close</span>
                                 @endif
                              </div>
                              <div class="detail_price py-3 px-4 d-flex justify-content-between">
                                 <p class="text-md">Sunday</p>
                                 @if(in_array('7', $working_days)) 
                                    <span class="badge badge-success mt-2">{{date('h:i A', strtotime($company->start_time))}} - {{date('h:i A', strtotime($company->end_time))}}</span></span>
                                 @else
                                    <span class="badge badge-warning mt-2">Close</span>
                                 @endif
                              </div>
                           </div>
                        </div>
                </div>
    </section>
    <script>
      $(document).ready(function () {
                  $('#vertical').lightSlider({
                      gallery: true,
                      item: 1,
                      vertical: true,
                      verticalHeight: 425,
                      vThumbWidth: 75,
                      thumbItem: 5,
                      thumbMargin: 2,
                      slideMargin: 2,
                      speed:1000,
                      time:200,
                      auto:true,
                      loop:true,
                  });
              });
            </script>
@endsection
