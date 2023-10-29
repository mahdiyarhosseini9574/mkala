<?php

namespace App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\User\StoreUserService;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends ApiBaseController
{
    /**
     * @param UserRequest $request
     * @param StoreUserService $service
     * @return mixed
     */
    public function register(UserRequest $request, StoreUserService $service)
    {
        $user = $service->handle($request->validated());
        return $user->createToken('mkala')->plainTextToken;
    }











    // پردازش فرم تأیید کد احراز
    public function verify(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'verification_code' => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user && $user->verification_code == $request->verification_code) {
            // کد احراز معتبر است، ادامه عملیات مورد نیاز
            return redirect()->intended('/dashboard');
        }

        // کد احراز نامعتبر است، بازگشت به فرم تأیید کد با پیغام خطا
        return back()->withErrors(['verification_code' => 'Invalid verification code']);
    }




    public function login(Request $request)
    {
        if (\Auth::attempt(['email'=>$request->email,'password' => $request->password])){
            $user = \Auth::user();
            $success['token'] = $user->createToken('mkala')->plainTextToken;
            $success['name']  = $user->name;
            return $this->successResponse($success);
        }else
        {
            return "email or password is incorrect";
        }
    }

}
