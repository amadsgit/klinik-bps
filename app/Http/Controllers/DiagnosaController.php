<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Diagnosa::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('kode_icd', 'like', "%$search%")
                ->orWhere('nama_diagnosa', 'like', "%$search%")
                ->orWhere('deskripsi', 'like', "%$search%");
            });
        }

        $diagnosa = $query->latest()->paginate(10);

        return view('diagnosa.index', compact('diagnosa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diagnosa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_icd'      => 'required|string|max:20|unique:diagnosa,kode_icd',
            'nama_diagnosa' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        Diagnosa::create([
            'kode_icd'      => $request->kode_icd,
            'nama_diagnosa' => $request->nama_diagnosa,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('diagnosa.index')
            ->with('success', 'Data diagnosa berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $diagnosa = Diagnosa::findOrFail($id);

        return view('diagnosa.edit', compact('diagnosa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $diagnosa = Diagnosa::findOrFail($id);

        $request->validate([
            'kode_icd'      => 'required|string|max:20|unique:diagnosa,kode_icd,' . $id,
            'nama_diagnosa' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        $diagnosa->update([
            'kode_icd'      => $request->kode_icd,
            'nama_diagnosa' => $request->nama_diagnosa,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('diagnosa.index')
            ->with('success', 'Data diagnosa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy($id)
    {
        $diagnosa = Diagnosa::findOrFail($id);
        $diagnosa->delete();

        return redirect()->route('diagnosa.index')
            ->with('success', 'Data diagnosa berhasil dihapus.');
    }
}