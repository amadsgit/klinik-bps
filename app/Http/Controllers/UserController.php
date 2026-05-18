<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Mail\UserCreatedMail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::with('role')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ], [
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
            'email.required' => 'Email wajib diisi.',
            'name.required' => 'Nama wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'role_id.required' => 'Role wajib dipilih.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->load('role');

        // kirim email isi akun (termasuk password dari input admin)
        Mail::to($user->email)->send(
            new UserCreatedMail($user, $validated['password'])
        );

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil ditambahkan & email telah dikirim.');
    }

    public function show(User $user)
    {
        $user->load('role');
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'role_id' => 'required|exists:roles,id',
        ], [
            'email.unique' => 'Email sudah digunakan user lain.',
        ]);

        $user->update($validated);

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil dihapus.');
    }
}