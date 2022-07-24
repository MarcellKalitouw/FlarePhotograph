<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailTransaksi extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id_produk',
        'id_transaksi',
        'id_varian',
        'id_user',
        'id_warna',
        'nama_produk',
        'harga',
        'total',
        'kode_verifikasi'
    ];
}