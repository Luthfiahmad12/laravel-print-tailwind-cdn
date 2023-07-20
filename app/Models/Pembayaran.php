<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'upload_id',
        'bukti_pembayaran'
    ];
}
