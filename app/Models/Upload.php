<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $table = 'uploads';
    protected $fillable = [
        'user_id',
        'document',
        'type',
        'lembar_pembimbing',
        'ttd_dospem',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
