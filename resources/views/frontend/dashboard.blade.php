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
               <div class="col-sm-6 col-xl-3 col-md-6 col-lg-3  jr-s init">
                  <div class="intiative_box shadow p-3">
                     <div class="d-flex hg-s">
                        <img src="images/scissors.png" class="">
                     </div>
                     <div class="mt-3 bc-r">
                        <h5>Showing <br>Appointment </h5>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-xl-3 col-md-6 col-lg-3  jr-s init">
                  <div class="intiative_box shadow p-3">
                     <div class="d-flex hg-s">
                        <img src="images/scissors.png" class="">
                     </div>
                     <div class="mt-3 bc-r">
                        <h5>Showing <br>Appointment </h5>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-xl-3 col-md-6 col-lg-3  jr-s init">
                  <div class="intiative_box shadow p-3">
                     <div class="d-flex hg-s">
                        <img src="images/scissors.png" class="">
                     </div>
                     <div class="mt-3 bc-r">
                        <h5>Showing <br>Appointment </h5>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-xl-3 col-md-6 col-lg-3  jr-s init">
                  <div class="intiative_box shadow p-3">
                     <div class="d-flex hg-s">
                        <img src="images/scissors.png" class="">
                     </div>
                     <div class="mt-3 bc-r">
                        <h5>Showing <br>Appointment </h5>
                     </div>
                  </div>
               </div>
               @if(Auth::user()->type == 2)
               <div class="user_table mt-4">
                  <div class="box box-danger">
                     <div class="box-header">
                        <h4 class="box-title pull-left">All Employees (Service Providers)</h4>
                     </div>
                     <table id="myTable" class="display">
                        <thead>
                           <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($allCompanyUsers as $user)
                           <tr>
                              <td>
                                 <img src="{{asset('images/'.$user->image)}}" alt="" style="width: 50px; height: 50px; border-radius: 50%;">
                              </td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                 <span style="margin-top: 20px;">
                                 @if($user->status == 0)
                                 <span class="badge badge-warning" style="margin-top: 20px;">Pending</span>
                                 @elseif($user->status == 1)
                                 <span class="badge badge-success" style="margin-top: 20px;">Approved</span>
                                 @else
                                 <span class="badge badge-danger" style="margin-top: 20px;">Rejected</span>
                                 @endif
                                 </span>
                              </td>
                              <td>
                                 <a href="{{route('delete_user', $user->id)}}" class="btn btn-danger">Delete</a>
                                 <a href="{{route('edit_user', $user->id)}}" class="btn btn-primary">Edit</a>
                              </td>
                             
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                   
                  </div>
               </div>
               @endif
         
            </div>
         </div>
      </div>
   </div>
</section>
@if(Auth::user()->address == null)
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
           <p> Your Profile is not completed yet. Please complete your profile first.</p>
           <a 
            href="{{route('profile')}}" 
            class="btn btn-primary justify-end btn-block"
            ><i class="fa fa-edit"></i> Complete Profile</a>
         </div>
         <div class="modal-footer">
            <button 
               type="button" 
               class="btn btn-default" 
               data-dismiss="modal"
               onclick="hideModal()"
            >Close</button>
         </div>
      </div>
   </div>   
</div>
@endif

<script>
   $(document).ready( function () {
      $('#myModal').modal('show');
   } );
   function showModal(){
      $('#myModal').modal('show');
   }
   function hideModal(){
      $('#myModal').modal('hide');
   }
</script>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
   let table = new DataTable('#myTable');
   
</script>
@endsection