 <nav aria-label="breadcrumb">
     <div class="container">
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="{{ route('site.home') }}">
                     <i class="fas fa-home"></i> Home</a></li>
             <li class="breadcrumb-item"><a href="shop.html">
                     <i class="fal fa-angle-right"></i> Shop</a></li>
             <li class="breadcrumb-item active" aria-current="page">
                 <i class="fal fa-angle-right"></i>
                 @yield('sub_page')
             </li>
         </ol>
     </div>
 </nav>
