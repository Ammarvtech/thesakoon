@extends('frontend.layout.app')
@section('content')

<section>
   <div class="container">
      <div class="row py-5">
         <div class="col-lg-3">
               @include('frontend.partials.dashboard_nav')
         </div>
         <div class="col-lg-9">

               <div class="user_table">
                  <div class="box box-danger">
                     <div class="row">
                        <div class="box-header">
                           <h4 class="box-title pull-left">Add New Service</h4>
                        </div>
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
                     <form action="{{route('add_service')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                              <div class="form-group form-box">
                                   <label for="name">Service Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Service Name" aria-label="Full Name" value="{{old('name')}}">
                                 @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
               
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                               <div class="form-group">
                                  <label for="time">Service Time (e.g 30 mins)</label>
                                  <input type="number" name="time" class="form-control" placeholder="Service Time" aria-label="Full Name" value="{{old('time')}}">
                                  @error('time')
                                     <span class="text-danger">{{$message}}</span>
                                  @enderror
                               </div> 
                             </div>  
                    
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group form-box">
                                   <label for="price">Service Price</label>
                                 <input type="number" name="price" class="form-control" placeholder="Service Price" aria-label="Last Name" value="{{old('price')}}">
                                 @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group form-box">
                               <label for="image">Service Image</label>
                                 <input type="file" name="image" class="form-control" placeholder="Service Image" aria-label="Last Name" value="{{old('image')}}">
                                 @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
            
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                              <div class="form-group form-box">
                               <label for="description">Service Description</label>
                                 <textarea name="description" class="form-control" placeholder="Service Description" aria-label="Last Name" value="{{old('description')}}" rows="5" style="height: 155px;"></textarea>
                                 @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
          
                           
                        </div>
                        <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp"></div>
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