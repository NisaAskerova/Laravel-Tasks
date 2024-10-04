<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; 

class AuthController extends Controller
{
    // İstifadəçi girişi
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return view('user.index');
        }
        return redirect()->back()->withErrors('invalid credentials');
    }

    // İstifadəçi qeydiyyatı və OTP generasiyası
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // İstifadəçi məlumatlarını qeyd etmək
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // OTP generasiya etmək (6 rəqəmli təsadüfi ədəd)
        $otp = rand(100000, 999999);
        $user->otp = $otp;

        $user->save();

        // OTP-ni e-poçt vasitəsilə göndərmək
        Mail::to($user->email)->send(new \App\Mail\SendOTP($otp)); // E-poçt vasitəsilə OTP göndərilir

        return redirect()->route('show-login')->with('success', 'Check your email for the OTP.');
    }

    // OTP doğrulama prosesi
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|integer',
        ]);

        // İstifadəçi tapmaq
        $user = User::where('email', $request->email)->first();

        // OTP-ni yoxlamaq
        if ($user && $user->otp == $request->otp) {
            // OTP doğru olduqda istifadəçini giriş etdiririk
            Auth::login($user);

            // OTP-ni sıfırlamaq (bir daha istifadə edilməməsi üçün)
            $user->otp = null;
            $user->save();

            return redirect()->route('user.index');
        }

        return redirect()->back()->withErrors('Invalid OTP');
    }

    // İstifadəçi çıxışı
    public function logout()
    {
        Auth::logout();
        return redirect()->route('show-login');
    }

    // Giriş səhifəsini göstərmək
    public function showLogin()
    {
        return view('auth.login');
    }

    // Qeydiyyat səhifəsini göstərmək
    public function showRegister()
    {
        return view('auth.register');
    }
}
