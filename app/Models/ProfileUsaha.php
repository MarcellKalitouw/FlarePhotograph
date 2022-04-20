<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileUsaha extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'nama_usaha',
        'gambar_usaha',
        'deskripsi_usaha',
        'alamat_lengkap',
        'long',
        'lat'
    ];
    
}