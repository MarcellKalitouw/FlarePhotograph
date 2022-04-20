<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'deskripsi',
        'kegiatan',
        'status',
        'gambar',
        'studio',
        'harga'
    ];
}