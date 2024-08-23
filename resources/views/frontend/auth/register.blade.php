@extends('frontend.layout.app')
@section('content')
<section>
   <div class="login tab-box">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-6 col-md-12 form-section">
                   <div class="login-inner-form">
                       <div class="details">
                           {{-- <a href="{{url('/')}}" class="login_title">
                                Barber Shop
                           </a> --}}
                           <h3>Create new Account</h3>
                           <form
                               action="{{route('register')}}" 
                               method="POST"
                              >
                              @csrf
                               <div class="form-group form-box">
                                   <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Full Name" value="{{old('name')}}">
                    
                                     @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                     @enderror
                               </div>
                               <div class="form-group form-box">
                                   <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{old('email')}}">
                                   @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                     @enderror
                               </div>
                               <div class="form-group form-box">
                                   <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter your password" aria-label="Password" value="{{old('password')}}">
                                   @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                     @enderror
                                
                               </div>
                                <div class="form-group form-box">
                                   <input type="password" name="confirm_password" class="form-control" autocomplete="off" placeholder="Confirm Password" aria-label="Password" value="{{old('password')}}">
                                     @error('confirm_password')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror

                               </div>
                                <div class="form-group form-box">
                                   <select class="form-select" aria-label="Default select example" name="type" value="{{old('type')}}">
                                    
                                       <option value="0" selected>Customer</option>
                                       <option value="1">Master</option>
                                       <option value="2">Salon</option>
                                   </select>
                                   @error('type')
                                        <span class="text-danger">{{$message}}</span>
                                     @enderror
                               </div>
                               <div class="form-group">
                                   <button type="submit" class="btn-md btn-theme w-100">Register Now</button>
                               </div>
                               <p>Already a member?<a href="{{route('login')}}"> Login here</a></p>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-lg-6 col-md-12 bg-img">
                   <div class="informeson">
                       {{-- <div class="btn-section">
                           <a href="#" class="link-btn">Login</a>
                           <a href="#" class="link-btn active">Register</a>
                       </div> --}}
                       <h1>Welcome to Barber Shop</h1>
                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
                       {{-- <div class="social-list">
                           <a href="#" class="facebook-bg">
                              <i class="fa-brands fa-facebook-f"></i>
                           </a>
                           <a href="#" class="twitter-bg">
                              <i class="fa-brands fa-twitter"></i>
                           </a>
                           <a href="#" class="google-bg">
                              <i class="fa-brands fa-google"></i>
                           </a>
                           <a href="#" class="linkedin-bg">
                              <i class="fa-brands fa-linkedin-in"></i>
                           </a>
                       </div> --}}
                   </div>
               </div>
           </div>
       </div>
   </div>
   
   </section>
@endsection

