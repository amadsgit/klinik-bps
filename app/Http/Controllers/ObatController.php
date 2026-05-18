<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    /**
     * LIST + SEARCH + PAGINATION
     */
    public function index(Request $request)
    {
        $query = Obat::query();

        // Search nama obat / satuan
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_obat', 'like', '%' . $request->search . '%')
                  ->orWhere('satuan', 'like', '%' . $request->search . '%');
            });
        }

        $obat = $query->latest()->paginate(10)->withQueryString();

        return view('obat.index', compact('obat'));
    }

    /**
     * FORM CREATE
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * STORE DATA
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            /*
            |--------------------------------------------------------------------------
            | DATA OBAT
            |--------------------------------------------------------------------------
            */

            'nama_obat' => 'required|string|max:255|unique:obat,nama_obat',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',

            /*
            |--------------------------------------------------------------------------
            | HARGA
            |--------------------------------------------------------------------------
            */

            'harga_beli' => 'nullable|numeric|min:0',
            'harga_jual' => 'nullable|numeric|min:0',

            /*
            |--------------------------------------------------------------------------
            | STOK & EXPIRED
            |--------------------------------------------------------------------------
            */

            'stok_minimum' => 'nullable|integer|min:0',
            'tanggal_kadaluarsa' => 'nullable|date',

        ]);

        if ($validator->fails()) {

            // cek nama obat duplicate
            if ($validator->errors()->has('nama_obat')) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Nama obat sudah terdaftar');
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan input data obat');
        }

        Obat::create($validator->validated());

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil ditambahkan');
    }

    /**
     * DETAIL OBAT
     */
    public function show(Obat $obat)
    {
        return view('obat.show', compact('obat'));
    }

    /**
     * FORM EDIT
     */
    public function edit(Obat $obat)
    {
        return view('obat.edit', compact('obat'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, Obat $obat)
    {
        $validator = Validator::make($request->all(), [

            /*
            |--------------------------------------------------------------------------
            | DATA OBAT
            |--------------------------------------------------------------------------
            */

            'nama_obat' => 'required|string|max:255|unique:obat,nama_obat,' . $obat->id,
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',

            /*
            |--------------------------------------------------------------------------
            | HARGA
            |--------------------------------------------------------------------------
            */

            'harga_beli' => 'nullable|numeric|min:0',
            'harga_jual' => 'nullable|numeric|min:0',

            /*
            |--------------------------------------------------------------------------
            | STOK & EXPIRED
            |--------------------------------------------------------------------------
            */

            'stok_minimum' => 'nullable|integer|min:0',
            'tanggal_kadaluarsa' => 'nullable|date',

        ]);

        if ($validator->fails()) {

            if ($validator->errors()->has('nama_obat')) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Nama obat sudah digunakan');
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data obat');
        }

        $obat->update($validator->validated());

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil diperbarui');
    }

    /**
     * DELETE (SOFT DELETE)
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()
            ->route('obat.index')
            ->with('success', 'Data obat berhasil dihapus');
    }
}