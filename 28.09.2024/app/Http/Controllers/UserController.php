<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role_ids' => 'required|array',
            'password' => 'required|string|min:8', // Password sahəsi üçün validasiya əlavə edin
            'role_ids.*' => 'exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->attach($request->role_ids);

        return redirect()->route('users.index')->with('success', 'User created and roles assigned successfully!');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('user.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',

            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
   


        $user->save();

        $user->roles()->sync($request->input('role_ids'));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
