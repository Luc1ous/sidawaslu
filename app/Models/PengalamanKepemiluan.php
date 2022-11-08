<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKepemiluan extends Model
{
    use HasFactory;
    protected $table = 'pengalaman_kepemiluan';
    protected $fillable = ['pengalaman'];
}
