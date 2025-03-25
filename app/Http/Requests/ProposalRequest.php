<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk melakukan request ini.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Tentukan aturan validasi untuk request ini.
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'tahun_pengajuan' => 'required|date',
            'skema_pkm' => 'required|string',
            'pendanaan_pt' => 'nullable|string',
            'pendanaan_belmawa' => 'nullable|string',
            'pendanaan_lain' => 'nullable|string',
            'jumlah_anggota_tim' => 'required|integer',
            'file_proposal' => 'required|file|mimes:pdf|max:2048',
            'mahasiswa_ids' => 'required|array',
            'mahasiswa_ids.*' => 'exists:mahasiswas,id',
            'dosen_ids' => 'required|array',
            'dosen_ids.*' => 'exists:dosens,id',
        ];
    }

    /**
     * Custom pesan error jika dibutuhkan.
     */
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul proposal wajib diisi.',
            'file_proposal.required' => 'File proposal wajib diunggah.',
            'file_proposal.mimes' => 'File harus dalam format PDF.',
        ];
    }
}
