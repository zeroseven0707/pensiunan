<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensiunan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'no_pensiunan',
        'alamat',
        'no_telp',
    ];
}
