<!DOCTYPE html>
<html>
   <head>
      <?php include("includes/common-header.php");?>
      <link rel="stylesheet" href="{{asset('css/serviceprovider_dashboard.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('css/serviceprovider_form.css')}}" type="text/css" />
      <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>
   <style>
    .badge {
        padding: 5px 10px;
        border-radius: 5px;
    }
    .badge-warning {
        background-color: #f0ad4e;
        color: #fff;
    }
    .badge-success {
        background-color: #5cb85c;
        color: #fff;
    }
    .badge-danger {
        background-color: #dc3545;
    }
    .notification_panel{
        position: absolute;
        top: 50px;
        right: 0;
        width: 300px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        display: none;
        height: 400px;
         overflow-y: auto;
    }
      .notification_header{
         padding: 10px;
         border-bottom: 1px solid #f0f0f0;
      }
      .notification_body{
         padding: 10px;
      }
      .notification_item{
         padding: 10px;
         border-bottom: 1px solid #f0f0f0;
      }
      .notification_item span{
         font-size: 12px;
         color: #999;
      }
   .p-0{
      margin: 0px;
   }
   </style>
   <style>
        .btn{
            padding: 0px 14px !important;
            font-size: 13px;
        }
        .custom_bell_icon_count{
           
            top: 0;
            right: 0;
            background-color: red;
            color: #fff;
            padding: 2px 5px;
            border-radius: 50%;
            font-size: 6px;
        }
        .bell_icon{
            position: relative;
        }
    </style>
   <body>
   @php
      $notications = App\Models\Notification::where('user_id', Auth::user()->id)->get();
   @endphp
  <!-- Side-Nav -->

  <section>
    <div class="container-fluid">
        <div class="row">
                @include('admin.partials.sidebar')
                <div class="col-lg-10 p-0">
                    <nav class="navbar navbar-light bg-light justify-content-between py-4 admin_top">
                      <a class="navbar-brand ps-4 nav_a pt-1">{{$page_title}}</a>
                      <div class="nav_notification d-flex justify-content-center align-items-center pt-2">
                        <div>
                           <i class="fa-solid fa-bell px-4" id="notification">
                              @if(count($notications) > 0)
                                 <span class="custom_bell_icon_count">{{count($notications)}}</span>
                              @endif
                           </i>
                       
                        </div>
                        
                        <i class="fa-solid fa-earth-americas ps-4 pe-2"></i>
                        <span class="pe-5">EN</span>
                      </div>
                    </nav>
           
              
                @yield('content')
                                
                <div class="notification_panel">
                  <div class="notification_header">
                    <h5>Notifications</h5>
                  </div>
               
                  <div class="notification_body">
                     @foreach($notications as $notification)
                        <div class="notification_item" @if($notification->is_read == 0) style="background-color: #f0f0f0;" @endif>
                           <a href="{{$notification->link}}">
                              <p 
                                 @if($notification->color) class="p-0 text-{{$notification->color}}" @else class="p-0" @endif
                              >
                              @if($notification->icon) <i class="fa-solid fa-{{$notification->icon}}"></i> @endif
                              {{$notification->title}}</p>
                           </a>
                           <span>{{date('d-m-Y h:i:s', strtotime($notification->created_at))}}</span>
                        </div>
                     @endforeach
                  </div>
                </div>
            </div>  
             
        </div>
    </div>
  </section>

<?php include("includes/common-footer.php");?>

   <!-- Select2 JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <!-- jQuery (required by Select2) -->
   {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
   
   <script>
   $(document).ready(function() {
      $('.select2').select2();
   });
   </script>
<script>
$(function() {
   var Accordion = function(el, multiple) {
      this.el = el || {};
      this.multiple = multiple || false;
       
      var links = this.el.find('.link');

      links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
   }

   Accordion.prototype.dropdown = function(e) {
      var $el = e.data.el;
         $this = $(this),
         $next = $this.next();

      $next.slideToggle();
      $this.parent().toggleClass('open');

      if (!e.data.multiple) {
         $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
      };
   }  

   var accordion = new Accordion($('#accordion'), false);
});

$('#notification').click(function(){
   $('.notification_panel').slideToggle();
});

</script>

   </body>
</html>
