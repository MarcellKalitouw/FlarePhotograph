<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Notifikasi extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'status_notifikasi',
        'keterangan',
        'id_transaksi',
        'from'
    ];
}