<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function showPhone()
    {
        return view('sign-in/phone');
    }

    public function showVerify()
    {
        return view('sign-in/verify');
    }

    public function savePhone(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $code = fake()->regexify('[0-9]{4,4}');
        VerificationCode::create([
            'code' => $code,
            'phone_number' => $phone_number,
        ]);

        return view('sign-in/verify', [
            'phone_number' => $phone_number,
        ]);
    }

    public function verifyPhone(Request $request)
    {
        $code = $request->input('code');
        $phone_number = $request->input('phone_number');

        // Find the matching verification code
        $verification_code = VerificationCode::query()->where(
            ['code' => $code,
                'phone_number' => $phone_number]
        )->select(['code', 'phone_number'])->first();

        // If it was not found, route back to the same page with an error
        if (empty($verification_code)) {
            return view('sign-in/verify');
        }

        // Find the user. If not found, create them
        $user = User::firstOrCreate([
            'phone_number' => $phone_number,
        ]);
        Auth::login($user);

        return redirect('signed-in');
    }
}
