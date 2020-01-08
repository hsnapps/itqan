<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function viewUser(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $data = $request->except(['_token', 'role', 'id']);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('1234'),
            'department' => $request->department,
            'section' => $request->section,
        ]);
        foreach ($request->role as $role) {
            $user->roles()->attach($role);
        }
        return redirect()->route('admin.users.edit', [
            'user' => $user
        ])->with('success', __('admin.user.saved'));
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        
        $data = $request->except(['_token', 'role', 'id']);
        $user->update($data);
        $user->roles()->detach(Role::all());
        foreach ($request->role as $role) {
            $user->roles()->attach($role);
        }

        return back()->with('success', __('admin.user.saved'));
    }

    public function deleteUser(Request $request)
    {
        User::destroy($request->id);
        return redirect()->route('admin.users')->with('success', __('admin.user.deleted'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:4|confirmed',
        ]);

        $user = User::findOrFail($request->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('success', __('admin.user.password_changed'));
    }
}
