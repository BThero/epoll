<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register/phone_number');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $code = fake()->regexify('[a-z0-9]{6,6}');
        $verification_code = VerificationCode::create([
            'code' => $code,
            'phone_number' => $phone_number,
        ]);

        return view('register/verification_code');
    }

    /**
     * Verify a newly created resource in storage.
     */
    public function verify(Request $request)
    {
        $code = $request->input('code');
        $verification_code = VerificationCode::query()->where('code', $code)->select(['code', 'phone_number'])->first();
        if (empty($verification_code)) {
            return view('register/verification_code');
        }
        $phone_number = $verification_code->phone_number;
        $user = User::create([
            'phone_number' => $phone_number,
        ]);

        return view('signed-in/welcome');
    }
}
