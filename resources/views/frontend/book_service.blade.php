@extends('frontend.layout.app')
@section('content')
<link rel="stylesheet" href="{{url('/css/booking_deatil.css')}}" type="text/css" />

   <section class="bg-light pt-5">
   <div class="inner-services text-center mb-4">
          <p class="mb-0">Book an Appointment</p>
   </div>
   {{-- <h3 class="services-text">We Are Here Get Chance to Avail <br>Our Offers</h3> --}}
   {{-- <div class="bb_logo text-center pt-lg-3">
      <img src="{{ asset('images/logo.png') }}">
   </div> --}}
   <div class="row">
   <div class="col-md-6">
   <div class="container justify-content-center align-items-center d-flex">
         <div class="col-lg-12 col-sm-12">
         <div class="detail_card shadow">
            <div class="row">
               <div class="col-md-3 col-lg-3 listing_img">
                  <img 
                     src="{{asset('images/'.$service->image)}}"
                     class="w-100 h-100" alt="...">
               </div>
               <div class="col-md-9 col-lg-9">
                  <div class="card-body">
                  <h4 class="card-title">{{$service->name}}</h4>
                  <p class="card-text mb-0">{{$service->description}}</p>
                  <ul class="ps-0 d-flex pt-3 mb-0">
                     <img src="{{asset('images/'.$service->user->image)}}" height="75" width="100">
                     <li class="ceo_xyz ms-3 ">
                        <span>{{$service->user->name}}</span>member of <br>{{$service->user->parent->name}}
                     </li>
                  </ul>
                     <div class="d-flex justify-content-between">
                        <h6 class="price_tag"><a class="pricing ms-3">Rs {{$service->price}}</a></h6>
                        <h6 class="price_tag"><a class="pricing ms-3"> {{$service->time}} Mins</a></h6>
                     </div>
                  </div>
               </div>
            </div>
            </div>
         </div>
   </div>
   </div>
   <div class="col-md-6">
   <div class="container justify-content-center align-items-center d-flex">
      <div class="col-lg-12 col-sm-12 px-xl-5 timing_list">
         <ul class="d-flex time_box ps-0 justify-content-center" style="overflow: auto;">
               @foreach($availableSlots as $key => $slots)
                  @if($key == 1) <li class="day_slot" onclick="selectDay(this)" data-day="{{$key}}"><a href="#">Monday</a></li>
                  @elseif($key == 2) <li class="day_slot" onclick="selectDay(this)" data-day="{{$key}}"><a href="#">Tuesday</a></li>
                     
                  @elseif($key == 3) <li class="day_slot" onclick="selectDay(this)" data-day="{{$key}}"><a href="#">Wednesday</a></li>
                  @elseif($key == 4) <li class="day_slot" onclick="selectDay(this)" data-day="{{$key}}"><a href="#">Thursday</a></li>
                  @elseif($key == 5) <li class="day_slot" onclick="selectDay(this)" data-day="{{$key}}"><a href="#">Friday</a></li>
                  @elseif($key == 6) <li class="day_slot" onclick="selectDay(this)" data-day="{{$key}}"><a href="#">Saturday</a></li>
                  @elseif($key == 7) <li class="day_slot" onclick="selectDay(this)" data-day="{{$key}}"><a href="#">Sunday</a></li>
                  @endif
               @endforeach
         </ul> 
 
         <ul class="d-flex time_box ps-0 justify-content-center" style="overflow: auto;">
            @foreach($availableSlots as $key => $slots)
               @foreach($slots as $slot)
                  <li class="time_slot" onclick="selectSlot(this)" data-slot="{{$slot}}">
                     <a href="javascript:void(0);">
                        {{$slot}}
                     </a>
                  </li>
                 
               @endforeach
               @php break; @endphp
             @endforeach
         </ul>
         <script>
            function selectSlot(e){
               let slot = e.getAttribute('data-slot');   
               document.querySelector('input[name="time"]').value = slot;
               e.style.backgroundColor = 'green';
               // e.style.color = 'black';
               document.querySelectorAll('.time_slot').forEach(function(e){
                  if(e.getAttribute('data-slot') != slot){
                     e.style.backgroundColor = '#1F8EB8';
                     e.style.color = '#fff';
                  }
               });
               document.querySelector('input[name="time"]').value = slot;
            }
            function selectDay(e){
        
               let day = e.getAttribute('data-day');
               e.style.backgroundColor = 'green';
               document.querySelectorAll('.day_slot').forEach(function(e){
                  if(e.getAttribute('data-day') != day){
                     e.style.backgroundColor = '#1F8EB8';
                     e.style.color = '#fff';
                  }
               });
               document.querySelector('input[name="day"]').value = day;
            }
         </script>
    
         <form action="{{route('book_service', $service->id)}}" method="POST">
            @csrf
         @if(session('success'))
            <div class="alert alert-success">
               {{session('success')}}
            </div>
         @endif
         @if(session('error'))
            <div class="alert alert-danger">
               {{session('error')}}
            </div>
         @endif
         @error('day')
         <span class="text-danger">{{$message}}</span>
         @enderror
         @error('time')
         <span class="text-danger">{{$message}}</span>
         @enderror

         <div class="row py-3 submit_field">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 px-xl-3">
               <div class="form-group form-box">
                  <input type="text" name="first_name" class="form-control timer_form" placeholder="First Name" aria-label="Full Name" value="{{ Auth::user()->name }}">
                  @error('first_name')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 px-xl-3 ">
               <div class="form-group form-box">
                  <input type="text" name="last_name" class="form-control timer_form" placeholder="First Name" aria-label="Last Name" value="{{ Auth::user()->name }}">
                  @error('last_name')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 px-xl-3 mt-3">
               <div class="form-group form-box">
                  <input type="text" name="email" class="form-control timer_form" placeholder="First Name" aria-label="Email" value="{{ Auth::user()->email }}">
                  @error('email')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
            </div>
   
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 px-xl-3 mt-3">
               <div class="form-group
                  form-box">
                  <input type="text" name="phone" class="form-control timer_form" placeholder="Mobile" aria-label="Mobile" value="{{ old('phone') }}">
                  @error('phone')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
            </div>
            {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 px-xl-3 mt-3">
               <div class="form-group
                  form-box">
                  <input type="date" name="date" class="form-control timer_form" placeholder="First Name" aria-label="Full Name" value="{{ old('date') }}">
                  @error('date')
                     <span class="text-danger">{{$message}}</span>
                  @enderror

               </div>
            </div> --}}
            <input type="hidden" name="day" value="">
            <input type="hidden" name="time" value="">
            {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 px-xl-3 mt-3">
               <div class="form-group
                  form-box">
                  <input type="time" name="time" class="form-control timer_form" placeholder="First Name" aria-label="Full Name" value="{{ old('time') }}">
                  @error('time')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
            </div> --}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 px-xl-3 mt-3">
               <div class="form-group form-box">
                  <textarea name="notes" class="form-control timer_form" placeholder="Notes" aria-label="Full Name">{{old('notes')}}</textarea>
                  @error('notes')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 px-xl-3">
            <div class="form-group text-center pt-xl-4">
                  <button type="submit" class="btn-md btn-theme w-100">Book Now</button>
            </div>
         </div>
         </form>
         </div>
      </div>
   </div>
   </div>   
   </div>
   </section>
@endsection