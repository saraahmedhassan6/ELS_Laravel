<!doctype html>
<html lang="en">
  <head>
    <title>@yield('Title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layouts.head')
  </head>
  <body>
  @include('layouts.main-header')
  @yield('Content')
  @include('layouts.footer')
  @include('layouts.footer-scripts')
  </body>
</html>