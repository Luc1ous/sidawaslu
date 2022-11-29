<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdHoc extends Model
{
    use HasFactory;
    protected $table = 'ad_hoc';
    protected $guarded = ['id'];
}