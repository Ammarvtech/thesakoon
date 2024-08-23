@extends('admin.layouts.app')
@section('content')
                   <div class="container-fluid"> 
                   <div class="user_table pt-5">
                       <div class="box box-danger">
       
                           <div class="row">
                               <div class="col-6 py-3"><div class="dataTables_length" id="datatables-orders_length"><label>Show <select name="datatables-orders_length" aria-controls="datatables-orders" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
                           <div class="col-6 py-3 serch_mobile"><div id="datatables-orders_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatables-orders"></label></div></div></div>
                           <div class="box-body table-responsive">
                              <table id="myTable" class="table table-striped table-bordered display" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th>Booking ID</th>
                                       <th>Service Name</th>
                                       <th>Customer Name</th>
                                       <th>Booking Date</th>
                                       <th>Booking Time</th>
                                       <th>Booking Price</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($bookings as $booking)
                                    <tr>
                                       <td>#{{$booking->id}}</td>
                                       <td>{{$booking->service->name}}</td>
                                       <td>{{$booking->customer->name}}</td>
                                       <td>{{date('d-m-Y', strtotime($booking->time))}}</td>
                                       <td>{{date('h:i A', strtotime($booking->time))}}</td>
                               
                                       <td>{{$booking->price}}</td>
                                       <td>
                                          <span >
                                          @if($booking->status == 0)
                                          <span class="badge badge-warning" >Pending</span>
                                          @elseif($booking->status == 1)
                                          <span class="badge badge-success" >Approved</span>
                                          @else
                                          <span class="badge badge-danger">Rejected</span>
                                          @endif
                                          </span>
                                       </td>
                                        <td>
                                            <a href="{{route('admin.view_booking', $booking->id)}}" class="btn btn-primary">View</a>
                                            <a href="{{route('admin.delete_booking', $booking->id)}}" class="btn btn-danger">Delete</a>
                                            <!-- <a href="{{route('admin.edit_booking', $booking->id)}}" class="btn btn-primary">Edit</a> -->
                                            @if($booking->status == 1)
                                            <a href="{{route('admin.delete_booking', $booking->id)}}" class="btn btn-danger">Delete</a>
                                            @else
                                            <!-- <a href="{{route('admin.restore_booking', $booking->id)}}" class="btn btn-success">Restore</a> -->
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                       </div>
                   </div>
     
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
   let table = new DataTable('#myTable');
   
</script>
@endsection