<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saldo extends Model
{
    use hasFactory;

    protected $fillable = [
        'jumlah',
        'keterangan',
    ];
}
