<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


 public function store(Request $request){
    User::query()->create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password
    ]);
return redirect()->route('user.create');

// instance yaradaraq
// $user=new User();
// $user->name=$request->name;
// $user->email=$request->email;
// $user->password=$request->password;
// $user->save();
}

public function create(){
    $users= User:: select([
        'id', 'name', 'email'
    ])->orderByDesc('created_at')
    ->get();
    return view('user.create', compact('users'));
}

public function delete($id){
    $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.create');
    
}

}

