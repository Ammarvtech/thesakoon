@extends('admin.layouts.app')
@section('content')
    <style>
        .badge-danger {
            background-color: #dc3545;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-success {
            background-color: #28a745;
        }
    </style>
    <div class="container-fluid">
        <div class="d-flex pt-5 mobile_flex row">
            <div class="col-sm-12 col-xl-3 col-md-6 col-lg-3  jr-s init me-0">
                <div class="d-flex hg-s">
                    <div class="icon_s">
                        <i class="fa-solid fa-user me-3"></i>
                    </div>
                    <div class="span_s pt-2">
                        <h5 class="mb-0">{{ $totalBookings }}</h5>
                        <span>Total Bookings</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-3 col-md-6 col-lg-3  jr-s init me-0">
                <div class="d-flex hg-s">
                    <div class="icon_s">
                        <i class="fa-solid fa-user me-3"></i>
                    </div>
                    <div class="span_s pt-2">
                        <h5 class="mb-0">Rs:{{ $totalEarnings }}</h5>
                        <span>Total Earnings</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="user_table pt-5">
            <div class="box box-danger">
                <div class="box-header">
                    <h4 class="box-title pull-left">Filters</h4>
                </div>
                <form action="{{ route('admin.dashboard') }}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="status">Saloon</label>
                            <select name="saloon" id="saloon" class="form-control">
                                <option value="">Select Saloon</option>
                                @foreach ($salons as $salon)
                                    <option value="{{ $salon->id }}" @if (request()->saloon == $salon->id) selected @endif>
                                        {{ $salon->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="status">From Date</label>
                            <input type="date" name="from" class="form-control" placeholder="From Date"
                                value="{{ request()->from }}">
                        </div>
                        <div class="col-md-4">
                            <label for="status">To Date</label>
                            <input type="date" name="to" class="form-control" placeholder="To Date"
                                value="{{ request()->to }}">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="0" @if (request()->status == 0) selected @endif>Pending
                                    </option>
                                    <option value="1" @if (request()->status == 1) selected @endif>Approved
                                    </option>
                                    <option value="2" @if (request()->status == 2) selected @endif>Rejected
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary mt-4" style="padding: 10px 20px;">Filter</button>
                        </div>
                    </div>
                </form>

                <div class="box-header">
                    <h4 class="box-title pull-left">Recent Bookings</h4>
                </div>

                <div class="box-body table-responsive">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Saloon Name</th>
                                <th>Service Name</th>
                                <th>Customer Name</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>Booking Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>#{{ $booking->id }}</td>
                                    <td>
                                        @php
                                            $user = App\Models\User::where('id', $booking->user_id)->first();
                                        @endphp
                                        {{ $user?->parent?->name ?? 'N/A' }}
                                    </td>
                                    <td>{{ $booking->service->name }}</td>
                                    <td>{{ $booking->customer->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($booking->time)) }}</td>
                                    <td>{{ date('h:i A', strtotime($booking->time)) }}</td>

                                    <td>Rs:{{ $booking->price }}</td>
                                    <td>
                                        <span>
                                            @if ($booking->status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($booking->status == 1)
                                                <span class="badge badge-success">Approved</span>
                                            @else
                                                <span class="badge badge-danger">Rejected</span>
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

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">


        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>
    @endsection
