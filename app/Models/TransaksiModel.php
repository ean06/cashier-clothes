<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code', 'amount', 'status', 'user_id',
    ];

    // Relasi dengan User (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
