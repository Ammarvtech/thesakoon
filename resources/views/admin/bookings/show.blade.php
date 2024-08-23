@extends('admin.layouts.app')
@section('content')
                   <div class="container"> 
                   <div class="user_table pt-5">
                       <div class="box box-danger">
                           <div class="box-header">
                               <h4 class="box-title pull-left">Booking Details #{{$booking->id}}</h4>
                           </div>
                           <div class="row" style="background: #f7efef;border-radius: 16px;">
                                <div class="col-6 py-3">
                                   <p> <strong> Booking ID:</strong> #{{$booking->id}} </p>
                                   <p> <strong> Customer Name:</strong> {{$booking->first_name . ' ' . $booking->last_name}} </p>
                                    <p> <strong> Customer Email:</strong> {{$booking->email}} </p>
                                    <p> <strong> Customer Phone:</strong> {{$booking->phone}} </p>
                                    <p> <strong> Booking Day:</strong> 
                                        @if($booking->day == '1')
                                            Monday
                                        @elseif($booking->day == '2')
                                            Tuesday
                                        @elseif($booking->day == '3')
                                            Wednesday
                                        @elseif($booking->day == '4')
                                            Thursday
                                        @elseif($booking->day == '5')
                                            Friday
                                        @elseif($booking->day == '6')
                                            Saturday
                                        @else
                                            Sunday
                                        @endif
                                    </p>
                                    <p> <strong> Booking Time:</strong> {{$booking->time}} </p>
                                    <p> <strong> Booking Price:</strong> PKR {{$booking->price}} </p>
                                    <p> <strong> Booking Status:</strong> 
                                        @if($booking->status == '0')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($booking->status == '1')
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6 py-3">
                                    <p> <strong> Service Name: </strong> {{$booking->service->name}} </p>
                                    <p> <strong> Service Price: </strong> PKR {{$booking->service->price}} </p>
                                    <p> <strong> Master Name: </strong> {{$booking->master->name}} </p>
                 
                                    <p> 
                                        <strong> Saloon Name: </strong>
                                        @php 
                                            // $master = User::find($booking->master->id);
                                            $master = App\Models\User::where('parent_id',$booking->master->id)->first();
                                        @endphp
                                         {{$master?->name ?? 'N/A'}}
                                    </p>
                                 </div>
                           </div>
                       </div>
                   </div>
     
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
   let table = new DataTable('#myTable');
   
</script>
@endsection