{{-- <header>
   <nav>
       <div class="nav-wrapper teal lighten-2 valign-wrapper">
           <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
           <a href="#" class="brand-logo valign">@yield('title')</a>
       </div>
   </nav>

</header> --}}
{{-- /Header --}}

{{-- Header2 --}}
<header class="navbar-fixed">
   <nav class="nav-top red lighten-1 z-depth-2">
       <div class="container">
           <div class="nav-wrapper">
               <a href="#" class="brand-logo">@yield('title')</a>
           </div>
       </div>
   </nav>
   <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a></div>
   {{-- SideBar --}}
        @include('layouts.sidebar')
   {{-- /SideBar --}}
</header>
