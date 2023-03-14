<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'wa', 'telpon', 'email', 'facebook', 'twiter', 'instagram', 'status', 'telegram'
    ];
}
