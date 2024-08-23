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
                                        <th>Service ID</th>
                                        <th>Service Name</th>
                                        <th>Service Time</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        
                                        <th>Action</th>
                             
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($services as $service)
                                 <tr>
                                    <td>#{{$service->id}}</td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->time}} Minutes</td>
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
                                  
                                    <td>
                                       <a href="{{route('service_provider.edit_service', $service->id)}}" class="btn btn-primary">Edit</a>
                                       @if($service->is_active == 1)
                                          <a href="{{route('service_provider.delete_service', $service->id)}}" class="btn btn-danger">Delete</a>
                                       @else
                                          <a href="{{route('service_provider.restore_service', $service->id)}}" class="btn btn-success">Restore</a>
                                       @endif
                             
                                       <!-- @if($service->status == 0)
                                          <a href="{{route('service_provider.approve_service', $service->id)}}" class="btn btn-success">Approve</a>
                                       @endif
       -->
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