<?php

namespace App\Imports;

use App\Models\Panwasdes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PanwasdesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Panwasdes([
            'nama' => $row['nama'],
            'kecamatan' => $row['kecamatan'],
            'kelurahan' => $row['kelurahan'],
            'jabatan' => $row['jabatan'],
            'ttl' => $row['ttl'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama'],
            'disabilitas' => $row['disabilitas'],
            'pekerjaan' => $row['pekerjaan'],
            'alamat' => $row['alamat'],
            'no_hp' => $row['no_hp'],
            'tahun' => $row['tahun'],
        ]);
    }
}
