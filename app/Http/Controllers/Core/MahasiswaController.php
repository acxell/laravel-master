<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.view', ['mahasiswas' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|string|max:10',
            'nama' => 'required|string',
            'email' => 'required|email|unique:mahasiswas',
            'no_hp' => 'required|integer|max:15',
            'jurusan' => 'required',
            'prodi' => 'required',
            'alamat' => 'required|string',
            'status' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create($validateData);

        if ($mahasiswa) {
            return redirect()->route('mahasiswa.view')->with('success', 'Mahasiswa Telah Ditambahkan');
        } else {
            return redirect()->route('mahasiswa.view')->with('failed', 'Mahasiswa Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.detail', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
            'nim' => 'required|string|max:10',
            'nama' => 'required|string',
            'email' => 'required|email|unique:mahasiswas',
            'no_hp' => 'required|integer|max:15',
            'jurusan' => 'required',
            'prodi' => 'required',
            'alamat' => 'required|string',
            'status' => 'required',
        ]);

        $mahasiswa->update($validateData);

        if ($mahasiswa) {
            return redirect()->route('mahasiswa.view')->with('success', 'Mahasiswa Berhasil Diubah');
        } else {
            return redirect()->route('mahasiswa.view')->with('failed', 'Mahasiswa Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        if ($mahasiswa) {
            return redirect()->route('mahasiswa.view')->with('success', 'Mahasiswa Telah Dihapus');
        } else {
            return redirect()->route('mahasiswa.view')->with('failed', 'Mahasiswa Gagal Dihapus');
        }
    }
}
