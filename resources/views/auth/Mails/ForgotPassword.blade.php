<html>
    <head>
    <link rel="stylesheet" href="{{URL::asset('assets/auth/mail.css')}}">
    </head>
    <body>
    <h1>Forgot Password Email</h1>
    <p>You Can reset password from here</p>
    <a href="{{ route('password.reset', $token) }}">Reset Password</a>
    </body>
</html>


