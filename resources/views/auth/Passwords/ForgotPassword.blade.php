@extends('layouts.app')

@section('AuthTitle')
Forgot Password
@endsection

@section('AuthContent')
  <h1>Forgot Your Password?</h1>
  <p >PLease confirm your email address below and we will send you verfication code</p>
  <form action="{{ route('password.email') }}" method="POST">
    @csrf
    <table>
      <tr>
        <td>
        <label for="email" class="auth_label">Email</label>
        </td>
      </tr>

      <tr>
        <td>
          <input id="email" name ="email" type="email" placeholder="Email" class="auth_input" autofocus required>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror 
        </td>                      
      </tr>
      <tr>
        <td>
          <button type="submit">
            Send
          </button>                            
        </td>
      </tr>
    </table>
  </form>
@endsection
