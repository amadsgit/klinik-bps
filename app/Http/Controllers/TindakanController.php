<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $tindakan = Tindakan::when($search, function ($query) use ($search) {
            $query->where('nama_tindakan', 'like', "%{$search}%")
                ->orWhere('keterangan', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('tindakan.index', compact('tindakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tindakan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'tarif'         => 'required|numeric|min:0',
            'keterangan'    => 'nullable|string',
        ], [
            'nama_tindakan.required' => 'Nama tindakan wajib diisi.',
            'tarif.required'         => 'Tarif wajib diisi.',
            'tarif.numeric'          => 'Tarif harus berupa angka.',
        ]);

        Tindakan::create($validated);

        return redirect()
            ->route('tindakan.index')
            ->with('success', 'Data tindakan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tindakan $tindakan)
    {
        return view('tindakan.show', compact('tindakan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tindakan $tindakan)
    {
        return view('tindakan.edit', compact('tindakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tindakan $tindakan)
    {
        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'tarif'         => 'required|numeric|min:0',
            'keterangan'    => 'nullable|string',
        ], [
            'nama_tindakan.required' => 'Nama tindakan wajib diisi.',
            'tarif.required'         => 'Tarif wajib diisi.',
            'tarif.numeric'          => 'Tarif harus berupa angka.',
        ]);

        $tindakan->update($validated);

        return redirect()
            ->route('tindakan.index')
            ->with('success', 'Data tindakan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tindakan $tindakan)
    {
        $tindakan->delete();

        return redirect()
            ->route('tindakan.index')
            ->with('success', 'Data tindakan berhasil dihapus.');
    }
}