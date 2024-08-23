
<style>
    .custom-link{
        cursor: pointer;
        display: block;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }
</style>
<div class="col-lg-2 p-0">
    <div class="side-navbar navbar-expand-xl navbar-light  active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <div class="menu_dp">

         @if(Auth::user()->image)
            <img src="{{asset('images/'.Auth::user()->image)}}" class="img-fluid" style="width: 100px; height: 100px;">
         @endif
            <div class="dp_contant">
                <h4>{{Auth::user()->name}}</h4>
                <p>Admin</p>
            </div>
        </div>  
      <button class="navbar-toggler toggle_btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1"> 
                <ul id="accordion" class="accordion">
                <li>
                    <div class="link">
                        <a href="{{route('admin.dashboard')}}" class="custom-link"><i class="fa fa-home"></i>Dashboard</a>
                    </div>
                </li>
                <li>
                    <div class="link">
                        <i class="fa fa-home"
                        ></i>Saloons<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="{{route('admin.saloons')}}">All Saloons</a></li>
                        <li><a href="{{route('admin.add_saloons')}}">Add Saloons</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link">
                        <i class="fa fa-home"
                        ></i>Masters<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="{{route('admin.masters')}}">All Masters</a></li>
                        <li><a href="{{route('admin.add_master')}}">Add Master</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link">
                        <i class="fa fa-home"
                        ></i>Customers<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="{{route('admin.customers')}}">All Customers</a></li>
                        <li><a href="{{route('admin.customers')}}">Add Customers</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link">
                        <i class="fa fa-home"
                        ></i>Bookings<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="{{route('admin.bookings')}}">All Bookings</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link">
                        <i class="fa fa-home"
                        ></i>Services<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="{{route('admin.services')}}">All Services</a></li>
                        <li><a href="{{route('admin.add_service')}}">Add Service</a></li>
                    </ul>
                </li>  
                <li>
                    <div class="link">
                        <a href="{{route('admin.profile')}}" class="custom-link"><i class="fa fa-user"></i>Profile</a>
                    </div>
                </li>
                <li>
                    <div class="link">
                        <a href="{{route('admin.admin_logout')}}" class="custom-link"><i class="fa fa-user"></i>Logout</a>
                    </div>
                </li>
                </ul>
            </div>
    </div>
</div>