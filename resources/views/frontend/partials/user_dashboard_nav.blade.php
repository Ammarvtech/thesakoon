<div class="side-navbar navbar-expand-xl navbar-light  active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
  <div class="menu_dp">
     <img src="images/about_author.png">
     <div class="dp_contant">
        <h4>@if(auth()->user()->name){{auth()->user()->name}}@endif</h4>
        <p>@if(auth()->user()->type == 1) Individual @else Company @endif</p>
     </div>
  </div>
  <button class="navbar-toggler toggle_btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <ul id="accordion" class="accordion" >
           <li @if(request()->routeIs('profile') || request()->routeIs('bookings') || request()->routeIs('dashboard')) class="open" @endif class="open" >
              <div class="link"><i class="fa fa-home"></i>Manage Dashboard<i class="fa fa-chevron-down"></i></div>
              <ul style="display: block;" class="submenu" @if(request()->routeIs('profile') || request()->routeIs('bookings') || request()->routeIs('dashboard')) style="display: block;" @endif>
                 <li><a href="{{route('profile')}}">Profile</a></li>
                 <li><a href="{{route('user_dashboard')}}">My Bookings</a></li>
              </ul>
           </li>
       
        </ul>
     </div>
</div>