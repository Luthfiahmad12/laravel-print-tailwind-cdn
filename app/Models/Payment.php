<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'upload_id',
        'bukti_pembayaran'
    ];

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'upload_id');
    }
}
