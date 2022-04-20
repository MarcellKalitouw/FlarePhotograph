<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransfer extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'atas_nama',
        'no_rek',
        'nama_bank'
    ];
}