<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatPembayaran extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'id_transaksi',
        'id_user',
        'status',
        'total_bayar',
        'total_lunas',
        'bukti_transfer',
        'transfer_di',
        'atasnama_pengirim',
        'bank_pengirim',
        'tgl_transfer',
        'catatan',
        'kode_transaksi'
    ];
}