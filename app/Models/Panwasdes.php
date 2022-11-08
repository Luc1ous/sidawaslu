<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panwasdes extends Model
{
    use HasFactory;
    protected $table = 'panwasdes';
    protected $guarded = ['id'];
}
