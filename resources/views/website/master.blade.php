{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Winkel</title>
    @include('website.layoutWebsite.header')
  </head>
  <body class="goto-here">
    @include('website.layoutWebsite.menu')
    @yield('content')
    @include('website.layoutWebsite.footer')
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    @include('website.layoutWebsite.bottom')
    @yield('js')
  </body>
</html> --}}


<!doctype html>
<html class="no-js" lang="">
    <head>
        @include('website.layoutWebsite.header')
    </head>
    <body onload="clock()">
        @include('website.layoutWebsite.menu')
        @yield('content')
        @include('website.layoutWebsite.footer')
        @include('website.layoutWebsite.bottom')
        @yield('js')
    </body>
</html>

