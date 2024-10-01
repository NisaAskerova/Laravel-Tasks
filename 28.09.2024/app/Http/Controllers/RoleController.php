<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create(){
        return view("role.create");
    }

    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $role = Role::create($request->only('name'));
    
        return redirect()->route("roles.index")->with('success', "Role '{$role->name}' created successfully!");
    }
    
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        
        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }
    public function view($id){
        $role=Role::findOrFail($id);
        $users = $role->users;
        return view('role.view', compact('role','users'));
    }
}
