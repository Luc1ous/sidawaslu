<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdHoc extends Model
{
    use HasFactory;
    protected $table = 'ad_hoc';
    protected $guarded = ['id'];

    public function scopeSearch($query, $value){
        return $query->where('nama', 'like', "%".$value."%")
                    ->orWhere('kecamatan', 'like', "%".$value."%")
                    ->orWhere('jenis_kelamin', 'like', "%".$value."%")
                    ->orWhere('pendidikan', 'like', "%".$value."%")
                    ->orWhere('tahun', 'like', "%".$value."%")
                    ->orWhere('keterangan', 'like', "%".$value."%");
    }
    
    public function scopeTahun($query, $value){
        return $query->where('tahun', $value);
    }

    public function scopeKet($query, $value){
        return $query->where('keterangan', $value);
    }
}
