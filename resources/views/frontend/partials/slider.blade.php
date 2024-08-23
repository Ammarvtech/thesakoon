
<style>
   .banner_video {
   height: 550px;
   display: flex;
   justify-content: center;
   align-items: center;
   }
   #myVideo {
   position: absolute;
   right: 0;
   bottom: 0;
   min-width: 100%;
   min-height: 100%;
   z-index: 0;
   }
   .search-bar-container {
   position: relative;
   width: 100%;
   margin: 20px 0;
   text-align: center;
   }
   .search-bar {
   width: 600px;
   padding: 10px 35px 10px 45px;
   border: 1px solid #ccc;
   border-radius: 5px;
   box-sizing: border-box;
   background-color: #f8f8f8;
   color: #666;
   font-size: 15px;
   height: 50px;
   }
   .search-icon {
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   color: #aaa;
   }
   .banner_search_engin p{font-size: 20px;
   letter-spacing: 0;
   line-height: 24px;text-align: center;color: #fff;margin-bottom: 10px;}
   .search-icon i {
   position: relative;
   left: 15px;
   font-size: 19px;
   color: #444;
   }
   .barber_cat{bottom: 10px;
  left: 0;
  position: absolute;
  width: 100%;
  z-index: 1;}
 .barber_cat .list {
   display: flex;
   flex-direction: row;
   height: 40px;
   justify-content: space-between;
   margin: 0 auto;
   max-width: 1250px;
   list-style: none;
}
.barber_cat .list a{
   border-bottom: 2px solid transparent;
   color: #fff;
   display: inline-block;
   font-size: 15px;
   font-weight: 600;
   line-height: 22px;
   padding-bottom: 0;
   text-decoration: none;
}
.list a:hover {
   border-bottom: 2px solid #fff;
   color: #fff;
}
#myVideo{
   filter: brightness(50%);
}
.menu {
   z-index: 1;
}


</style>
<div class=" shadow">
   <!-- Video Section Start -->
   <div class="position-relative banner_video">
      <video autoplay muted loop id="myVideo">
         <source src="https://booksy-public.s3.amazonaws.com/US.mp4" type="video/mp4">
         Your browser does not support HTML5 video.
      </video>
      <div class="container position-absolute banner_search_engin">
         <div class="row mb-4">
            <div class="type-wrap text-white display-4 fw-bold text-center mb-3">
            <div id="typed-strings" class="">
               <span>Be Brave</span>
               <p>Be Bold</p>
               <p>Be Yourself</p>
            </div>
            <span id="typed" style="white-space:pre;"></span>
         </div>
            <!-- <h1 class="text-white display-4 fw-bold text-center mb-3">Welcome to Shadab Group</h1> -->
            <p>
               Discover and book beauty & wellness professionals near you
            </p>
         </div>
         <div class="search-bar-container">
            <span class="search-icon"><i class="fas fa-search"></i></span>
            <input type="text" placeholder="Search services or businesses" class="search-bar">
         </div>
      </div>
      <div class="barber_cat py-3">
         <div>
            <!----> 
            <ul class="list">
               <li data-v-2c69cb4f="">
                  <a href="#">
                     <div class="name" >
                        Hair Salon
                     </div>
                  </a>
               </li>
               <li>
                   <a href="#">
                     <div class="name" >
                        Barbershop
                     </div>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <div class="name" >
                        Nail Salon
                     </div>
                  </a>
               </li>
               <li>
                   <a href="#">
                     <div class="name" >
                        Skin Care
                     </div>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <div class="name" >
                        Brows &amp; Lashes
                     </div>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <div class="name" >
                        Massage
                     </div>
                  </a>
               </li>
               <li>
                   <a href="#">
                     <div class="name" >
                        Makeup
                     </div>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <div class="name" >
                        Wellness &amp; Day Spa
                     </div>
                  </a>
               </li>
              
            </ul>
         </div>
      </div>
   </div>
   <!-- Video Section End --> 
</div>

 <script>
    document.addEventListener('DOMContentLoaded', function(){

        Typed.new("#typed", {
            stringsElement: document.getElementById('typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: true,
            contentType: 'html', // or text
            // defaults to null for infinite loop
            loopCount: null,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        var resetElement = document.querySelector('.reset');
        if(resetElement) {
            resetElement.addEventListener('click', function() {
                document.getElementById('typed')._typed.reset();
            });
        }

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }

    </script>
