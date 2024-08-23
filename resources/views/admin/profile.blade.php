@extends('admin.layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
    <div class="user_table py-4">
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
           <form action="{{route('admin.profile')}}" method="POST"  enctype="multipart/form-data">
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
                    <div class="form-group
                       form-box">
                       @if($user->image)
                          <img src="{{asset('images/'.$user->image)}}" class="img-fluid" style="width: 100px; height: 100px;">
                       @endif
                       <input type="file" name="image" class="form-control" placeholder="Image" aria-label="Last Name" value="{{$user->image}}">
                       @error('image')
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                 </div>
      
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                    <div class="form-group
                        form-box">
                        <input type="text" name="address" class="form-control" placeholder="Address" aria-label="Last Name" value="{{$user->address}}">
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                
              </div>
              <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                  <div class="form-group
                      form-box">
                      <label for="working_days">Working Days</label>
                      <?php
                        $working_days = [];
                        if(!empty($user->working_days)){
                         $working_days = json_decode($user->working_days);
                        }
                      ?>
                      <select name="working_days[]" class="form-control select2" multiple>
                          <option value="">Select Working Days</option>
                          <option value="1" @if(in_array(1, $working_days)) selected @endif>Monday</option>
                           <option value="2" @if(in_array(2, $working_days)) selected @endif>Tuesday</option>
                           <option value="3" @if(in_array(3, $working_days)) selected @endif>Wednesday</option>
                           <option value="4" @if(in_array(4, $working_days)) selected @endif>Thursday</option>
                           <option value="5" @if(in_array(5, $working_days)) selected @endif>Friday</option>
                           <option value="6" @if(in_array(6, $working_days)) selected @endif>Saturday</option>
                           <option value="7" @if(in_array(7, $working_days)) selected @endif>Sunday</option>
                        </select>
                     @error('working_days')
                            <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xx-3 txtGrp ">
               <div class="form-group
                   form-box">
                  <label for="start_time">Start Time</label>
                  <input type="time" name="start_time" class="form-control" value="{{$user->start_time}}">
                  @error('start_time')
                         <span class="text-danger">{{$message}}</span>
                   @enderror
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xx-3 txtGrp ">
               <div class="form-group
                   form-box">
                  <label for="start_time">End Time</label>
                  <input type="time" name="end_time" class="form-control" value="{{$user->end_time}}">
                  @error('end_time')
                         <span class="text-danger">{{$message}}</span>
                   @enderror
               </div>
            </div>
           

              </div>
              <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp "></div>   

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


@endsection
