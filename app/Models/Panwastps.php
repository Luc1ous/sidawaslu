<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panwastps extends Model
{
    use HasFactory;
    protected $table = 'panwastps';
    protected $guarded = ['id'];
}
