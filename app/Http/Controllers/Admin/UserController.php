<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if($request->has('searchUser')){
            $search = $request->searchUser;
            $query->where('name', 'LIKE', "%$search%");
        }
        $users = $query->with('roles')->paginate();
        return view('admin.users.index', compact('users'));
    }
    
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => "required|unique:users,email",
            'password' => 'required|min:8||max:15|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.users.index');
    }
    
    public function edit($user)
    {
        $user = User::where('id', $user)->with('roles')->first();
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => "required|unique:users,email,{$user->id}",
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->roles()->sync([$request->rol]);

        return redirect()->route('admin.users.index');
    }

    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();
        return redirect()->route('admin.users.index');

    }
}
