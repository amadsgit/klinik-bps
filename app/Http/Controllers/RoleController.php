<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $role = Role::when($search, function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('role.index', compact('role'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:roles,nama',
            'deskripsi' => 'nullable|string',
        ], [
            'nama.required' => 'Nama role wajib diisi.',
            'nama.string'   => 'Nama role harus berupa teks.',
            'nama.max'      => 'Nama role maksimal 255 karakter.',
            'nama.unique'   => 'Role sudah ada.',
        ]);

        Role::create($validated);

        return redirect()
            ->route('role.index')
            ->with('success', 'Data role berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'nama')->ignore($role->id),
            ],
            'deskripsi' => 'nullable|string',
        ], [
            'nama.required' => 'Nama role wajib diisi.',
            'nama.string'   => 'Nama role harus berupa teks.',
            'nama.max'      => 'Nama role maksimal 255 karakter.',
            'nama.unique'   => 'Role sudah ada.',
        ]);

        $role->update($validated);

        return redirect()
            ->route('role.index')
            ->with('success', 'Data role berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // CEK apakah role dipakai user
        if ($role->users()->count() > 0) {
            return redirect()
                ->route('role.index')
                ->with('error', 'Role tidak dapat dihapus karena masih digunakan oleh user.');
        }

        $role->delete();

        return redirect()
            ->route('role.index')
            ->with('success', 'Data role berhasil dihapus.');
    }
}