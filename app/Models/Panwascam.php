<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panwascam extends Model
{
    use HasFactory;
    protected $table = 'panwascam';
    protected $guarded = ['id'];
}
