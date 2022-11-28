<?php

namespace App\Imports;

use App\Models\AdHoc;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdHocPanwascamImport implements ToModel, WithHeadingRow
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
            'jabatan' => $row['jabatan'],
            'nik' => $row['nik'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => Date::excelToDateTimeObject($row['tanggal_lahir']),
            'nomor_sk' => $row['nomor_sk'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama'],
            'disabilitas' => $row['disabilitas'],
            'pendidikan' => $row['pendidikan'],
            'pekerjaan' => $row['pekerjaan'],
            'alamat' => $row['alamat'],
            'nomor_hp' => $row['nomor_hp'],
            'pengalaman_kepemiluan' => $row['pengalaman_kepemiluan'],
            'keterangan' => 'Panwascam',
            'tahun' => $row['tahun'],
        ]);
    }
}
