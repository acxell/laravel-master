<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengumumanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'judul_pengumuman' => 'required|string',
            'link_pengumuman' => 'required|string',
            'tanggal_pengumuman' => 'required|date',
            'status' => 'required',
        ];
    }
}
