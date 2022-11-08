<?php

namespace App\Imports;

use App\Models\Panwastps;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PanwastpsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Panwastps([
            'nama' => $row['nama'],
            'kecamatan' => $row['kecamatan'],
            'kelurahan' => $row['kelurahan'],
            'tps' => $row['tps'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama'],
            'disabilitas' => $row['disabilitas'],
            'no_hp' => $row['no_hp'],
            'tahun' => $row['tahun'],
        ]);
    }
}
