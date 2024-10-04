<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->active == 0) {
                Auth::logout(); 
                session()->flash('error', 'Your account has been deactivated. Please contact the administrator.');
                return redirect()->route('user.show-login'); 
            }

            if ($user->role === 'admin') { 
                return view('admin.home', compact('user'));
            } else {
                return view('blogs.home', compact('user'));
            }
        }

        return redirect()->back()->withErrors('Invalid credentials');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
$user->save();
        // $otp = rand(100000, 999999); 
        // $user->otp = $otp;
        // $user->otp_expires_at = now()->addMinutes(5);
        
        // try {
        //     Mail::to($user->email)->send(new \App\Mail\SendOTP(['otp' => $otp]));

        // }catch(\Exception $exception){
        //     Log::info($exception->getMessage());
        // }

        // if ($user->save()) {
        //     return view('auth.otp-verify', ['email' => $user->email]);
        // }

        // return redirect()->back()->withErrors('Registration failed.');
        return redirect()->route('user.show-login');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|integer',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            if ($user->otp == $request->otp) {
                if (now()->greaterThan($user->otp_expires_at)) {
                    return redirect()->back()->withErrors('OTP has expired. Please request a new one.');
                }
    
                $user->otp = null;
                $user->otp_expires_at = null;
                $user->save();
    
                // Auth::login($user);
    
                return redirect()->route('user.show-login')->with('success', 'OTP verified successfully. You can now log in.');
            }
        }
    
        return redirect()->back()->withErrors('Invalid OTP');
    }
    

    
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            $otp = rand(100000, 999999); 
            $user->otp = $otp;
            $user->otp_expires_at = now()->addMinutes(10); 
            $user->save();
    
            session(['email' => $request->email]);
    
            return view('auth.otp'); 
        }
    
        return redirect()->route('user.sendOtp')->with('success', 'OTP has been sent. Please check your email.');
    }
    

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.show-login');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }
}
