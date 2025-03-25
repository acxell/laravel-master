<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengumumanRequest;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Menampilkan daftar pengumuman.
     */
    public function index()
    {
        $pengumumans = Pengumuman::all();
        return view('pengumuman.view', compact('pengumumans'));
    }

    /**
     * Create Pengumuman
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Menyimpan pengumuman ke database.
     */
    public function store(PengumumanRequest $request)
    {
        $pengumuman = Pengumuman::create($request->all());
        return redirect()->route('pengumuman.index')
            ->with($pengumuman ? 'success' : 'failed', $pengumuman ? 'Pengumuman berhasil ditambahkan' : 'Pengumuman gagal ditambahkan');
    }

    /**
     * Menampilkan detail pengumuman tertentu.
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('pengumuman.detail', compact('pengumuman'));
    }

    /**
     *Edit Pengumuman
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update Pengumuman
     */
    public function update(PengumumanRequest $request, Pengumuman $pengumuman)
    {


        $pengumuman->update($request->all());

        return redirect()->route('pengumuman.index')
            ->with($pengumuman ? 'success' : 'failed', $pengumuman ? 'Pengumuman berhasil diperbarui' : 'Pengumuman gagal diperbarui');
    }

    /**
     * Mengubah status pengumuman (aktif atau berakhir).
     */
    public function toggleStatus(Request $request, $id)
    {

        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->status = $request->has('status') ? 'Aktif' : 'Berakhir';
        $pengumuman->save();

        return redirect()->back()->with('success', 'Status berhasil diubah');

    }

    /**
     * Delete Pengumuman
     */
    public function destroy(Request $pengumuman)
    {
        $deleted = $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with($deleted ? 'success' : 'failed', $deleted ? 'Pengumuman berhasil dihapus' : 'Pengumuman gagal dihapus');
    }
}
