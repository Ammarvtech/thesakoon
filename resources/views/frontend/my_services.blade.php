@extends('frontend.layout.app')
@section('content')

<section>
   <div class="container">
      <div class="row py-5">
         <div class="col-lg-3">
               @include('frontend.partials.dashboard_nav')
         </div>
         <div class="col-lg-9">
            <div class="row">
               <div class="user_table">
                  <div class="box box-danger">
                     <div class="box-header">
                        <h4 class="box-title pull-left">My Services</h4>
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
                     </div>
                     <table id="myTable" class="display">
                        <thead>
                           <tr>
                              <th>Service ID</th>
                              <th>Service Name</th>
                              <th>Status</th>
                              <th>Created At</th>
                              @if(Auth::user()->type == 2)
                                 <th>Action</th>
                              @endif
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($services as $service)
                           <tr>
                              <td>#{{$service->id}}</td>
                              <td>{{$service->name}}</td>
                              <td>
                                 <span style="margin-top: 20px;">
                                 @if($service->status == 0)
                                 <span class="badge badge-warning" style="margin-top: 20px;">Pending</span>
                                 @elseif($service->status == 1)
                                 <span class="badge badge-success" style="margin-top: 20px;">Approved</span>
                                 @else
                                 <span class="badge badge-danger" style="margin-top: 20px;">Rejected</span>
                                 @endif
                                 </span>
                              </td>
                              <td>{{date('d-m-Y', strtotime($service->created_at))}}</td>
                              @if(Auth::user()->type == 2)
                              <td>
                                 <a href="{{route('edit_service', $service->id)}}" class="btn btn-primary">Edit</a>
                                 @if($service->is_active == 1)
                                    <a href="{{route('delete_service', $service->id)}}" class="btn btn-danger">Delete</a>
                                 @else
                                    <a href="{{route('restore_service', $service->id)}}" class="btn btn-success">Restore</a>
                                 @endif
                       
                                 @if($service->status == 0)
                                    <a href="{{route('approve_service', $service->id)}}" class="btn btn-success">Approve</a>
                                 @endif

                              </td>
                              @endif
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                   
                  </div>
               </div>
         
            </div>
         </div>
      </div>
   </div>
</section>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
   let table = new DataTable('#myTable');
   
</script>
@endsection