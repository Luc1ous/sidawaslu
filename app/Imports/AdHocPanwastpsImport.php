<?php

namespace App\Imports;

use App\Models\AdHoc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdHocPanwastpsImport implements ToModel, WithHeadingRow
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
            'no_tps' => $row['tps'],
            'ttl' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama'],
            'disabilitas' => $row['disabilitas'],
            'nomor_hp' => $row['nomor_hp'],
	        'pendidikan' => $row['pendidikan'],
            'pengalaman_kepemiluan' => $row['pengalaman_kepemiluan'],
            'keterangan' => 'Pengawas TPS',
            'tahun' => $row['tahun'],
        ]);
    }
}
