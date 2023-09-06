@extends('layouts.app')

@section('AuthTitle')
Reset
@endsection

@section('AuthContent')
  <h1>Confirm Password</h1>                  
  <p >Please confirm your password before continuing.</p>
  <form action="{{ route('password.update') }}" method="POST">
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
            <label for="password" class="auth_label">Password</label>
          </td>
        </tr>
        <tr>
          <td>
            <input id="password" name="password" type="password" placeholder="Password" class="auth_input" required>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </td>
      </tr>


      <tr>
          <td>
            <label for="confirm_password" class="auth_label">Confirm Password</label>
          </td>
        </tr>
      <tr>
        <td>
          <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" class="auth_input" required>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit">
            Reset
          </button>                            
        </td>
      </tr>
    </table>
  </form>
@endsection
