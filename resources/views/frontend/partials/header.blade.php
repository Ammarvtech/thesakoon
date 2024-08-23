         <style>
.shopping-cart ul li {
   list-style: none;
   border-bottom: 1px solid #eee;
}
.badge {
   background-color: #DF0D0D;
   border-radius: 10px;
   color: white;
   display: inline-block;
   font-size: 11px;
   line-height: 1;
   padding: 3px 5px;
   text-align: center;
   vertical-align: middle;
   white-space: nowrap;
   position: relative;
   bottom: 10px;
   right: 5px;
}
 
.shopping-cart {
   margin: 20px 0;
   float: right;
   background: #fff;
   width: 320px;
   border-radius: 3px;
   padding: 20px;
   display: none;
   right: 180px;
   z-index: 11111;
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;
   position: absolute;
   top: 80px;
}

.shopping-cart-header {
  border-bottom: 1px solid #E8E8E8;
  padding-bottom: 15px;
}

.shopping-cart-total {
  float: right;
}

.shopping-cart-items {
  padding-top: 20px;
}

.shopping-cart-items li {
  margin-bottom: 18px;
}

.shopping-cart-items img {
  float: left;
  margin-right: 12px;
}

.item-name {
  display: block;
  padding-top: 10px;
  font-size: 15px;
}
.shopping-cart-items{padding-left: 1rem}
.item-price {
  color: #2E95B4;
  margin-right: 8px;
}

.item-quantity {
   color: #555;
   font-size: 12px;
}
  

.cart-icon {
  color: #2E95B4;
  font-size: 24px;
  margin-right: 7px;
  float: left;
}

.button {
   background: #2E95B4;
   color: white;
   text-align: center;
   padding: 12px;
   text-decoration: none;
   display: block;
   border-radius: 30px;
   font-size: 13px;
   margin: 15px 10px 15px 10px;
   width: 50%;
   font-weight: bold;
}
.button:hover {
  background: #267188;
  color: #fff;
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

.cart_baskt{border: none !important;}
.baskt_btn {display: flex;}



         </style>
         <header>
               <div class="justify-content-center header_new header-transparent">
                  <nav class="navbar navbar-expand-xl navbar-light menu">
                     <div class="container-fluid px-lg-5 px-2 logo_mobile">
                        <a class="navbar-brand" href="{{url('/')}}">
                          <img src="{{ url('images/logo_newb.png') }}" class="header_logo h-100"></a>
                        <button class="navbar-toggler toggle_btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <ul class="navbar-nav  me-auto mb-2 mb-lg-0 ms-auto barber_menu">
                              <li class="nav-item">
                                 <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{route('about')}}">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{route('services')}}">Services</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                              </li>
                           </ul>
                           <div class="srch-ic">
                            <ul>
                              {{-- <li><a href="#" id="cart" class="cart_baskt"><i class="fa fa-shopping-cart"></i><span class="badge">3</span></a></li> --}}
                  
                              @if(Auth::check())
                              <li><a href="{{route('logout')}}" class="book_btn">Logout</a></li>
                                @if(Auth::user()->type == 1)
                                  <li><a href="{{route('service_provider.dashboard')}}" class="book_btn">Master Dashboard</a></li>
                                @else
                                  <li><a href="{{route('dashboard')}}" class="book_btn">Saloon Dashboard</a></li>
                                @endif
                              @else
                              <li><a href="{{route('login')}}" class="book_btn">Login</a></li>
                              <li><a href="{{route('register')}}" class="book_btn">Register</a></li>
                              @endif
                          
                            </ul>
  
</div>
                        </div>
                      
                     </div>
                     <!-- search -->
                  </nav>
            
                  
               </div>

            <!-- slider -->        
</header>
      
    <div class="shopping-cart">
      <div class="shopping-cart-header">
        <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
        <div class="shopping-cart-total">
          <span class="lighter-text">Total:</span>
          <span class="main-color-text">$2,229.97</span>
        </div>
      </div>
      <ul class="shopping-cart-items">
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
          <span class="item-name">Sony DSC-RX100M III</span>
          <span class="item-price">$849.99</span>
          <span class="item-quantity">Quantity: 01</span>
        </li>
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
          <span class="item-name">KS Automatic Mechanic...</span>
          <span class="item-price">$1,249.99</span>
          <span class="item-quantity">Quantity: 01</span>
        </li>
        <li class="clearfix">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
          <span class="item-name">Kindle, 6" Glare-Free To...</span>
          <span class="item-price">$129.99</span>
          <span class="item-quantity">Quantity: 01</span>
        </li>
      </ul>
      <div class="baskt_btn">
      <a href="shopping_cart.php" class="button">View Cart</a>
      <a href="checkout.php" class="button">Checkout</a>
   </div>
    </div>
