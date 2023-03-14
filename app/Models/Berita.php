<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'isi', 'gambar', 'slug', 'created_at', 'user_id'];
    public $timestamps = false;
}
