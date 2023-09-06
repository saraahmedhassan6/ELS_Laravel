<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $remember = $request->has('remember');

    $user = User::where('email', $data['email'])->first();

    if ($user && Hash::check($data['password'], $user->password)) {
        if ($remember) {
            $user->setRememberToken(Str::random(60));
            $user->save();
        }
        Auth::login($user);
        return redirect()->intended('/index');
    }

    return redirect()->back()->withInput($request->only('email'))->withErrors([
        'email' => 'Email or Password is Invalid.',
    ]);
}
}
