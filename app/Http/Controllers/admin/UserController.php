<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user',
            'is_active' => 'nullable|boolean',
        ]);

        $user->update([
            'role' => $request->role,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Kullanıcı bilgileri güncellendi.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Kullanıcı silindi.');
    }
}
