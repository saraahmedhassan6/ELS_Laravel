<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('AuthTitle')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('assets/CSS/auth/app.css')}}">

        <!-- Scripts -->
    </head>
    <body >
        <div id="app">
            <main class="py-4" >
                <div class="container" >
                    <div class="row ">
                        <div class="col-md-6 ">
                            <div class="card" style="border-radius:20px;border:none;box-shadow: 0 5px 6px rgba(0, 0, 0, 0.2);margin-top:80px;margin-left:60px;width:400px;background-color:white">
                                <div class="card-body">
                                    @yield('AuthContent')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>