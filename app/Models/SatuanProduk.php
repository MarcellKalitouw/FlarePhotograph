<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SatuanProduk extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'id_p',
        'id_satuan'
    ];
}
