<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|integer',
        ]);

        // İstifadəçinin emailinə görə məlumatları tap
        $user = User::where('email', $request->email)->first();

        // İstifadəçi və OTP uyğun gəldiyi təqdirdə daxil ol
        if ($user && $user->otp == $request->otp) {
            Auth::login($user);

            // OTP dəyərini null et
            $user->otp = null;
            $user->save();

            return redirect()->route('user.index')->with('success', 'OTP doğrulandı və daxil oldunuz.');
        }

        return redirect()->back()->withErrors('Yanlış OTP və ya email.');
    }
}
