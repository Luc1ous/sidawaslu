<?php

namespace App\Imports;

use App\Models\AdHoc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdHocPanwasdesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AdHoc([
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
            'nomor_hp' => $row['nomor_hp'],
            'pengalaman_kepemiluan' => $row['pengalaman_kepemiluan'],
            'keterangan' => 'Panwasdes',
            'tahun' => $row['tahun'],
        ]);
    }
}
