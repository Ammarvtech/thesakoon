@extends('admin.layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
    <div class="user_table py-4">
        <div class="box box-danger">
         
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
           <form action="{{route('admin.add_master')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">

                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                    <div class="form-group form-box">
                       <input type="text" name="name" class="form-control" placeholder="First Name" aria-label="Full Name">
                       @error('name')
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                 </div>
          
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                    <div class="form-group form-box">
                       <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Last Name" >
                       @error('email')
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                 </div>

                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                    <div class="form-group
                       form-box">
                      
                       <input type="file" name="image" class="form-control" placeholder="Image" aria-label="Last Name">
                       @error('image')
                          <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                    <div class="form-group
                    form-box">
                    <input type="password" name="image" class="form-control" placeholder="Password" aria-label="Last Name">
                    @error('password')
                          <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                 </div>
      
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                    <div class="form-group
                        form-box">
                        <input type="text" name="address" class="form-control" placeholder="Address" aria-label="Last Name">
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
                    
                      <select name="working_days[]" class="form-control select2" multiple>
                          <option value="">Select Working Days</option>
                          <option value="1">Monday</option>
                           <option value="2">Tuesday</option>
                           <option value="3">Wednesday</option>
                           <option value="4">Thursday</option>
                           <option value="5">Friday</option>
                           <option value="6">Saturday</option>
                           <option value="7">Sunday</option>
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
                  <input type="time" name="start_time" class="form-control">
                  @error('start_time')
                         <span class="text-danger">{{$message}}</span>
                   @enderror
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xx-3 txtGrp ">
               <div class="form-group
                   form-box">
                  <label for="start_time">End Time</label>
                  <input type="time" name="end_time" class="form-control">
                  @error('end_time')
                         <span class="text-danger">{{$message}}</span>
                   @enderror
               </div>
            </div>
           

              </div>
              <div class="row">
            

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
