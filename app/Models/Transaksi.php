<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'id_user',
        'kode_transaksi',
        'no_hp',
        'alamat',
        'jam_booking',
        'tgl_booking',
        'bentuk_pembayaran',
        'status_transaksi',
        'biaya_tambahan',
        'total_diskon',
        'total_transaksi',
        'catatan'
    ];
}