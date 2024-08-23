@extends('frontend.layout.app')
@section('content')
<style>
   .badge-success {
      background-color: #28a745;
   }

</style>
<section>
   <div class="container">
      <div class="row py-5">
         <div class="col-lg-3">
               @include('frontend.partials.user_dashboard_nav')
         </div>
         <div class="col-lg-9">
            <div class="row">
               <div class="col-sm-6 col-xl-3 col-md-6 col-lg-3  jr-s init">
                  <div class="intiative_box shadow p-3">
                     <div class="d-flex hg-s">
                        <img src="images/scissors.png" class="">
                     </div>
                     <div class="mt-3 bc-r">
                        <h5>Total Bookings <br> {{$bookings->count()}}</h5>
                     </div>
                  </div>
               </div>
               <div class="user_table mt-4">
                  <div class="box box-danger">
                     <div class="box-header">
                        <h4 class="box-title pull-left">All Bookings ({{$bookings->count()}})</h4>
                     </div>
                     <table id="myTable" class="display">
                        <thead>
                           <tr>
                              <th>Booking ID</th>
                              <th>Saloon Name</th>
                              <th>Service Name</th>
                              <th>Customer Name</th>
                              <th>Notes</th>
                              <th>Booking Date</th>
                              <th>Booking Time</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($bookings as $booking)
                           <tr>
                              <td>#{{$booking->id}}</td>
                              <td>
                                 @php
                                    $user = App\Models\User::where('id',$booking->user_id)->first();
                      

                                 @endphp
                                 {{$user?->parent?->name ?? 'N/A' }}
                              </td>
                              <td>{{$booking->service->name}}</td>
                              <td>{{$booking->customer->name}}</td>
                              <td>{{$booking->notes}}</td>
                              <td>{{date('d-m-Y', strtotime($booking->time))}}</td>
                              <td>{{date('h:i A', strtotime($booking->time))}}</td>
                              <td>
                                 <span style="margin-top: 20px;">
                                 @if($booking->status == 0)
                                 <span class="badge badge-warning" style="margin-top: 20px;">Pending</span>
                                 @elseif($booking->status == 1)
                                 <span class="badge badge-success" style="margin-top: 20px;">Approved</span>
                                 @else
                                 <span class="badge badge-danger" style="margin-top: 20px;">Rejected</span>
                                 @endif
                                 </span>
                              </td>
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