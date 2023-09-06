<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img/favicon.png">
       
        @include('dashboard.layouts.head')
    </head>


  <body class="g-sidenav-show  bg-gray-100">
  @include('dashboard.layouts.main-siderbar')
  @yield('dashContent')
  </body>
  @include('dashboard.layouts.footer-scripts')

</html>

