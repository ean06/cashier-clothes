<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount', 'valid_from', 'valid_until'
    ];

    // Menambahkan scope untuk validasi voucher yang masih berlaku
    public function scopeValid($query)
    {
        return $query->where('valid_from', '<=', now())
                    ->where('valid_until', '>=', now());
    }
}
