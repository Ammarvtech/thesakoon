@extends('frontend.layout.app')
@section('content')
<section>
   <div class="login tab-box">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-6 col-md-12 form-section">
                   <div class="login-inner-form">
                       <div class="details">
                           <a href="#" class="login_title">
                                The Sakoon
                           </a>
                           <h3>Sign in to your Account</h3>
                           @if(session('error'))
                           <div class="alert alert-danger">
                               {{session('error')}}
                           </div>
                           @endif
                           @if(session('success'))
                           <div class="alert alert-success">
                               {{session('success')}}
                           </div>
                           @endif
                           
                           <form action="{{route('login')}}" method="POST">
                              @csrf
                               <div class="form-group form-box">
                                   <input type="email" name="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                                   @error('email')
                                       <span class="text-danger">{{$message}}</span>
                                     @enderror
                               </div>
                               <div class="form-group form-box">
                                   <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" aria-label="Password">
                                     @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    
                               </div>
                               <div class="form-group form-box checkbox clearfix">
                                   <div class="form-check checkbox-theme">
                                       <input class="form-check-input" type="checkbox" value="" id="termsOfService">
                                       <label class="form-check-label" for="termsOfService">
                                           Remember me
                                       </label>
                                   </div>
                                   <div class="forgot_pass">
                                       <a 
                                          href="{{route('forgot_password')}}"
                                          class="terms">Forget Password</a>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <button type="submit" class="btn-md btn-theme w-100">Login</button>
                               </div>
                               <p>Already a member?<a href="{{route('register')}}"
                                 > Register here</a></p>
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
                       <h1>Welcome to The Sakoon</h1>
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