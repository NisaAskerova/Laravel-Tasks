<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
       return view('user.register');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'requires',
            'email'=>'required',
            'password'=>'reuired|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        $user->roles()->attach($request->role_ids);

        return redirect()->route('user.index')->with('success', 'User created and roles assigned successfully!');

    }
    public function index(){
        $users=User::all();
        return redirect()->route('user.index', compact('users'));

    }
    public function me()
    {
        $user = null;
        if (auth()->check()) {

            $user = auth()->user();
        }
        return view('user.profile', compact('user'));
    }
    public function home(){
        return view('user.home');
    }
}
