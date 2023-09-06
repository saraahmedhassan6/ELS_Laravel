<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ResetPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.Passwords.ForgotPassword');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
    
        $token = Str::random(64);
        $expiration = Carbon::now()->addHour();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => $expiration,
        ]);

        Mail::send('Auth.Mails.ForgotPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->input('email'));
            $message->subject('Reset Password');
        });

        return back()->with('SentEmail', 'We have sent an email with reset password instructions.');
    }

    public function showResetForm($token)
    {
        return view('auth.Passwords.ForgotPasswordLink',['token'=>$token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $passwordResetToken = DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->where('token', $request->token)
            ->where('created_at', '>', now())
            ->first();

        if (!$passwordResetToken) {
            return back()->with('error', 'Invalid or expired token');
        }

        User::where('email', $request->input('email'))
            ->update(['password' => Hash::make($request->input('password'))]);

        DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->delete();

        return redirect('/login')->with('message', 'Your password has been changed.');
    }
}


