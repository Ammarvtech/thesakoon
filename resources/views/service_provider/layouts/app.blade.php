<!DOCTYPE html>
<html>
   <head>
      <?php include("includes/common-header.php");?>
      <link rel="stylesheet" href="{{asset('css/serviceprovider_dashboard.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('css/serviceprovider_form.css')}}" type="text/css" />
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
   </style>
   <style>
        .btn{
            padding: 0px 14px !important;
            font-size: 13px;
        }
    </style>
   <body>
  <!-- Side-Nav -->
  <section>
    <div class="container-fluid">
        <div class="row">
                @include('service_provider.partials.sidebar')
                <div class="col-lg-10 p-0">
                    <nav class="navbar navbar-light bg-light justify-content-between py-4 admin_top">
                      <a class="navbar-brand ps-4 nav_a pt-1">{{$page_title}}</a>
                      <div class="nav_notification d-flex justify-content-center align-items-center pt-2">
                        <i class="fa-solid fa-bell px-4"></i>
                        <i class="fa-solid fa-earth-americas ps-4 pe-2"></i>
                        <span class="pe-5">EN</span>
                      </div>
                    </nav>
           
              
                @yield('content')
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

</script>

   </body>
</html>
