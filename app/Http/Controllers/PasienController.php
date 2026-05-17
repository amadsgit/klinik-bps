<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    /**
     * LIST + SEARCH + PAGINATION
     */
    public function index(Request $request)
    {
        $query = Pasien::query();

        // Search by nama / no_rm
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_rm', 'like', '%' . $request->search . '%');
            });
        }

        $pasien = $query->latest()->paginate(10)->withQueryString();

        return view('pasien.index', compact('pasien'));
    }

    /**
     * FORM CREATE
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * STORE DATA
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            /*
            |--------------------------------------------------------------------------
            | IDENTITAS PASIEN
            |--------------------------------------------------------------------------
            */

            'nik' => 'nullable|digits:16|unique:pasien,nik',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable|string|max:50',
            'pendidikan' => 'nullable|string|max:50',

            /*
            |--------------------------------------------------------------------------
            | KONTAK & ALAMAT
            |--------------------------------------------------------------------------
            */

            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',

            /*
            |--------------------------------------------------------------------------
            | DATA KELUARGA
            |--------------------------------------------------------------------------
            */

            'nama_suami' => 'nullable|string|max:255',
            'pekerjaan_suami' => 'nullable|string|max:100',
            'nama_ibu_kandung' => 'nullable|string|max:255',
            'kontak_darurat' => 'nullable|string|max:20',

            /*
            |--------------------------------------------------------------------------
            | MEDIS DASAR
            |--------------------------------------------------------------------------
            */

            'gol_darah' => 'nullable|in:A,B,AB,O',
            'alergi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',

            /*
            |--------------------------------------------------------------------------
            | ADMINISTRASI
            |--------------------------------------------------------------------------
            */

            'no_bpjs' => 'nullable|string|max:30',
            'status_pasien' => 'nullable|in:Aktif,Nonaktif',

        ]);

        if ($validator->fails()) {

            // cek khusus NIK duplicate
            if ($validator->errors()->has('nik')) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'NIK sudah terdaftar, gunakan NIK lain');
            }

            // fallback error umum
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan input data');
        }

        Pasien::create($validator->validated());

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan');
    }

    /**
     * DETAIL PASIEN
     */
    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    /**
     * FORM EDIT
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validator = Validator::make($request->all(), [
            /*
            |--------------------------------------------------------------------------
            | IDENTITAS PASIEN
            |--------------------------------------------------------------------------
            */

            'nik' => 'nullable|digits:16|unique:pasien,nik,' . $pasien->id,
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable|string|max:50',
            'pendidikan' => 'nullable|string|max:50',

            /*
            |--------------------------------------------------------------------------
            | KONTAK & ALAMAT
            |--------------------------------------------------------------------------
            */

            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',

            /*
            |--------------------------------------------------------------------------
            | DATA KELUARGA
            |--------------------------------------------------------------------------
            */

            'nama_suami' => 'nullable|string|max:255',
            'pekerjaan_suami' => 'nullable|string|max:100',
            'nama_ibu_kandung' => 'nullable|string|max:255',
            'kontak_darurat' => 'nullable|string|max:20',

            /*
            |--------------------------------------------------------------------------
            | MEDIS DASAR
            |--------------------------------------------------------------------------
            */

            'gol_darah' => 'nullable|in:A,B,AB,O',
            'alergi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',

            /*
            |--------------------------------------------------------------------------
            | ADMINISTRASI
            |--------------------------------------------------------------------------
            */

            'no_bpjs' => 'nullable|string|max:30',
            'status_pasien' => 'nullable|in:Aktif,Nonaktif',

        ]);

        if ($validator->fails()) {

            if ($validator->errors()->has('nik')) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'NIK sudah digunakan pasien lain');
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data');
        }

        $pasien->update($validator->validated());

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui');
    }

    /**
     * DELETE (SOFT DELETE)
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()
            ->route('pasien.index')
            ->with('success', 'Data pasien berhasil dihapus');
    }
}