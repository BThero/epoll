<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePhoneRequest;
use App\Http\Requests\VerifyPhoneRequest;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function savePhone(SavePhoneRequest $request)
    {
        $phone_number = $request->input('phone_number');
        $code = fake()->regexify('[0-9]{4,4}');
        VerificationCode::create([
            'code' => $code,
            'phone_number' => $phone_number,
        ]);

        return redirect('sign-in/verify/'.$phone_number);
    }

    public function verifyPhone(VerifyPhoneRequest $request)
    {
        $phone_number = $request->input('phone_number');
        $user = User::firstOrCreate([
            'phone_number' => $phone_number,
        ]);
        Auth::login($user);

        return redirect('signed-in');
    }
}
