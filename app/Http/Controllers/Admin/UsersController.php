<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'roles' => User::rolesList(),
            'statuses' => User::statusesList()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', Rule::in(User::rolesList())],
            'active' => ['required', 'boolean', Rule::in(0,1)]
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->active = $request->active;

        $user->save();

        return redirect(route('admin.users.index'))->with('success', 'User successful added');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => User::rolesList(),
            'statuses' => User::statusesList()
        ]);
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', Rule::in(User::rolesList())],
            'active' => ['required', 'boolean', Rule::in(0,1)]
        ]);

        $user->name = $request->name;
        $user->role = $request->role;
        $user->active = $request->active;

        $user->save();

        return redirect(route('admin.users.index'))->with('success', 'User successful added');
    }
}
