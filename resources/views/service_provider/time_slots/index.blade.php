@extends('service_provider.layouts.app')
@section('content')

                       
                   <div class="container"> 
                   <div class="user_table pt-5">
                       <div class="box box-danger">
                         
                           <div class="row">
                               <div class="col-6 py-3"><div class="dataTables_length" id="datatables-orders_length"><label>Show <select name="datatables-orders_length" aria-controls="datatables-orders" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
                           <div class="col-6 py-3 serch_mobile"><div id="datatables-orders_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatables-orders"></label></div></div></div>
                           <div class="box-body table-responsive">
                              <table id="myTable" class="table table-striped table-bordered display" style="width:100%">
                                 <thead>
                                    <tr>
                                        <th>Time Slot ID</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Avilability</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                             
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($timeSlots as $slot)
                                 <tr>
                                    <td>#{{$slot->id}}</td>
                                    <td>{{$slot->start_time}}</td>
                                    <td>{{$slot->end_time}}</td>
                                    <td>
                                       <span>
                                       @if($slot->is_available == 0)
                                       <span class="badge badge-warning" >Not Available</span>
                                       @else
                                       <span class="badge badge-success">Available</span>
                                       @endif
                                       </span>
                                    </td>
                                    <td>
                                       <span>
                                       @if($slot->status == 0)
                                          <span class="badge badge-warning" >Inactive</span>
                                       @else
                                       <span class="badge badge-success" >Active</span>
                                  

                                       @endif
                                       </span>
                                    </td>
                                    <td>{{date('d-m-Y', strtotime($slot->created_at))}}</td>
                                  
                                    <td>
                                       <a href="{{route('service_provider.edit_time_slot', $slot->id)}}" class="btn btn-primary">Edit</a>
                                       <a href="{{route('service_provider.delete_time_slot', $slot->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                             
                                 </tr>
                                 @endforeach
                                 @if(count($timeSlots) == 0)
                                 <tr>
                                    <td colspan="6" class="text-center">No time slots found</td>
                                 </tr>
                                 @endif
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