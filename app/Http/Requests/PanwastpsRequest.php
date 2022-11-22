<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanwastpsRequest extends FormRequest
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
            'tps' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
        ];
    }
}