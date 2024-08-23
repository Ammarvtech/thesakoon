@extends('service_provider.layouts.app')
@section('content')
                       
<div class="container">
    <div class="user_table">
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
           <form action="{{route('service_provider.add_time_slot')}}" method="post">
              @csrf
              <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6">
                    <div class="form-group form-box">
                         <input type="time" name="start_time" class="form-control" placeholder="Start Time" aria-label="First Name" value="{{old('start_time')}}">
                         @error('start_time')
                           <span class="text-danger">{{$message}}</span>
                         @enderror
                    </div>
                 </div>
          
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                    <div class="form-group form-box">
                         <input type="time" name="end_time" class="form-control" placeholder="End Time" aria-label="Last Name" value="{{old('end_time')}}">
                         @error('end_time')
                           <span class="text-danger">{{$message}}</span>
                         @enderror
                    </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp ">
                    <div class="form-group form-box">
                         <select name="status" class="form-control" aria-label="Last Name">
                           <option value="">Select Status</option>
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                         </select>
                         @error('status')
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
     
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
   let table = new DataTable('#myTable');
   
</script>
@endsection