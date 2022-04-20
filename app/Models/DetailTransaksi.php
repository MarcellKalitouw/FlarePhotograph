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
        'nama_produk',
        'id_transaksi',
        'harga',
        'total',
        'kode_verifikasi'
    ];
}
