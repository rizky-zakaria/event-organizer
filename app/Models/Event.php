<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'penyelenggara',
        'banner',
        'logo',
        'waktu',
        'desa',
        'kecamatan',
        'kota',
        'provinsi',
        'longitude',
        'latitude',
        'kategori',
        'tempat',
        'petugas_id',
        'status'
    ];

    public $timestamps = False;
}
