<!DOCTYPE html>

<html lang="en">

  <head>

    @include('users-view.partial.head')
    @stack('style')
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('users-view.partial.header')
    
    <!-- Page Content -->
    @yield('content')
    <!-- End Page Content -->
    @stack('footer')
    
    {{-- @include('users-view.partial.footer') --}}
    
    @include('users-view.partial.script')
    @stack('script')

  </body>

</html>
