<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    // use HasFactory;
    protected $fillable = [
        'jenis_kelamin', 'umur', 'perokok', 'nominal_investasi', 'lama_investasi'
    ];
}
