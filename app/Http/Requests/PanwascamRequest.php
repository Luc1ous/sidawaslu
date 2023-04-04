<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanwascamRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jabatan' => 'required',
            'nik' => 'required',
            'no_tps' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nomor_sk' => 'required',
            'tanggal_sk' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'pengalaman_kepemiluan' => 'required',
            'catatan' => 'required',
            'image' => 'max:2048'
        ];
    }
}
