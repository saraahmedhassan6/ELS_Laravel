@extends('layouts.app')

@section('AuthTitle')
Login
@endsection

@section('AuthContent')
    <h1>Welcome Back</h1>
    <p>Enter your email and password to sign in</p>
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="email" class="auth_label">Email</label>
                </td>
            </tr>
            <tr>
                <td >
                    <input id="email" type="email" name ="email" placeholder="Email" class="auth_input" autofocus required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </td>                      
            </tr>
                                

            <tr>
                <td>
                    <label for="password" class="auth_label">Password</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input id="password" type="password" name ="password" placeholder="Password" class="auth_input" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td>
                    <label for="remember" class="auth_remember_label">
                        Remember Me
                    </label>
                    <input class="auth_remember_input" type="checkbox" name="remember" id="remember" >    
                </td>
                                   
            </tr>
            <tr>
                <td>          
                    <a  href="{{ route('password.request') }}">
                        Forgot my Password?
                    </a>
                </td>
            </tr>

            <tr>
                <td>
                    <button type="submit">
                        Sign in
                    </button>
                                        
                </td>
            </tr>
        </table>
    </form>
@endsection
