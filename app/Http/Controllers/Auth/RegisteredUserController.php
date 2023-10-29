<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $verificationCode = mt_rand(100000, 999999);

        // ارسال کد تأیید به شماره تلفن کاربر
        $this->sendVerificationCode($request->phone, $verificationCode);

        // ذخیره کد تأیید در جدول کاربر
        $user->verification_code = $verificationCode;
        $user->save();
        return $user;
    }
        // بقیه قسمت‌ها را در اینجا قرار دهید


    private function sendVerificationCode($phoneNumber, $code)
    {
        $twilioSid = config('services.twilio.sid');
        $twilioToken = config('services.twilio.token');
        $twilioPhoneNumber = config('services.twilio.from');

        $client = new user($twilioSid, $twilioToken);

        $client->messages->create(
            $phoneNumber,
            [
                'from' => $twilioPhoneNumber,
                'body' => "Your verification code is: $code",
            ]
        );


        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
