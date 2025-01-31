<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {

        // validate
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed'
        ]);

        // register
        User::create($data);

        // login
        // Auth::login($user);

        // redirect
        return redirect()->route('login');

    }

    public function login(Request $request) {

        // validate
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        // login the user
        if(Auth::attempt($data, $request->remember)) {

            $user = Auth::user();
            event(new Registered($user));

            if ($request->subscribe) {
                event(new UserSubscribed($user));
            }


            return redirect()->intended('dashboard');


        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records'
            ]);
        }
    }

    // Verify email notice handler
    public function verifyNotice() {
        return view('auth.verify-email');
    }

    // email verification handler
    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    }

    public function verifyHandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        
        return back()->with('message', 'Verification link sent!');
    }


    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
