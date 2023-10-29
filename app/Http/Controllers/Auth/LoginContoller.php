<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginContoller extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function approve(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function verify(Request $request)
    {
        $user = User::where('phone', $request->phone)
            ->where('verification_code', $request->code)
            ->first();

        if ($user) {
            // تأیید موفقیت‌آمیز
            $user->is_verified = true;
            $user->verification_code = null;
            $user->save();

            return response()->json(['message' => 'Verification successful']);
        }

        // تأیید ناموفق
        return response()->json(['message' => 'Invalid verification code'], 400);
    }
}
