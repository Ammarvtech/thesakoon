@extends('admin.layouts.app')
@section('content')

<style>
   .p-0{
      margin: 0px !important;
   }
   .filter-btn{
      background-color: #00d5ff;
      border-color: #00d5ff;
      padding: 6px 21px !important;
      margin-top: 5px;
      color: #fff;
   }
   .filters{
      margin-bottom: 20px;
   }
</style>
                   <div class="container-fluid"> 
                   <div class="user_table pt-5">
                       <div class="box box-danger">
                        <div class="row filters">
         
                           <form action="{{route('admin.services')}}" method="GET">
                              <div class="row">
                                 <div class="col-md-3">
                                    <input type="text" name="name" class="form-control" placeholder="Service Name" value="{{request()->name}}">
                                 </div>
                                 <div class="col-md-3">
                                    <select name="status" class="form-control">
                                       <option value="">Select Status</option>
                                       <option value="0" @if(request()->status == 0) selected @endif>Pending</option>
                                       <option value="1" @if(request()->status == 1) selected @endif>Approved</option>
                                       <option value="2" @if(request()->status == 2) selected @endif>Rejected</option>
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <button type="submit" class="btn-md btn-theme w-50">Filter</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                           <div class="row">
                           
                           <div class="box-body table-responsive">
                              <table id="myTable" class="table table-striped table-bordered display" style="width:100%">
                                 <thead>
                                    <tr>
                                        <th width="40%">Service Name & Description</th>
                                        <th>Service Time</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($services as $service)
                                 <tr>
                            
                                    <td>
                                       <span class="p-0">{{$service->name}}</span>
                                       <p class="text-muted text-wrap p-0" 
                                       >{{$service->description}}</p>
                                    </td>
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
                                       <a href="{{route('admin.edit_service', $service->id)}}" class="btn btn-primary">Edit</a>
                                       @if($service->is_active == 1)
                                          <a href="{{route('admin.delete_service', $service->id)}}" class="btn btn-danger">Delete</a>
                                       @else
                                          <a href="{{route('admin.restore_service', $service->id)}}" class="btn btn-success">Restore</a>
                                       @endif
                             
                                       @if($service->status == 0)
                                          <a 
                                             href="{{route('admin.approve_service', $service->id)}}" 
                                             class="btn btn-success"
                                             onclick="return confirm('Are you sure you want to approve this service?')"
                                             >Approve</a>
                                       @endif
                                    </td>
                             
                                 </tr>
                                 @endforeach
                                 @if (count($services) == 0)
                                 <tr>
                                    <td colspan="5" class="text-center">No Service Found</td>
                                 </tr>
                                 @endif
                                 </tbody>
                              </table>
                              
                              <div class="d-flex justify-content-center">
                                 {!! $services->links() !!}
                              </div>
                           </div>
                       </div>
                   </div>
     
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
   let table = new DataTable('#myTable');
   
</script> --}}
@endsection