@extends('frontend.layout.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- side menu -->
<!-- Side-Nav -->
<section>
   <div class="container">
      <div class="row py-5">
         <div class="col-lg-3">
               @include('frontend.partials.user_dashboard_nav')
         </div>
         <div class="col-lg-9">

               <div class="user_table">
                  <div class="box box-danger">
                     <div class="box-header">
                        <h4 class="box-title pull-left">Profile</h4>
                     </div>
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
                     <form action="{{route('user_profile')}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                              <div class="form-group form-box">
                                 <input type="text" name="name" class="form-control" placeholder="First Name" aria-label="Full Name" value="{{$user->name}}">
                                 @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                    
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group form-box">
                                 <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Last Name" value="{{$user->email}}">
                                 @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group form-box">
                                 <input type="text" name="contact" class="form-control" placeholder="Contact" aria-label="Contact" value="{{$user->contact}}">
                                 @error('contact')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group form-box">
                                 <input type="text" name="address" class="form-control" placeholder="Address" aria-label="address" value="{{$user->address}}">
                                 @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                        
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group
                                 form-box">
                                 <label for="start_time">Profile Image</label>
                                 @if($user->image)
                                    <img src="{{asset('images/'.$user->image)}}" class="img-fluid" style="width: 100px; height: 100px;">
                                 @endif
                                 <input type="file" name="image" class="form-control" placeholder="Image" aria-label="Last Name" value="{{$user->image}}">
                                 @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp "></div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group">
                                 <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                 @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group">
                                 <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password">
                                 @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                         
                      
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                              <div class="form-group">
                                 <button type="submit" class="btn-md btn-theme w-100">Submit</button>
                              </div>
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