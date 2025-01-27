<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'amount', 'type', 'valid_from', 'valid_until'
    ];

    /**
     * Cek apakah diskon masih berlaku
     *
     * @return bool
     */
    public function isValid()
    {
        $currentDate = now();
        return $currentDate->between($this->valid_from, $this->valid_until);
    }

    /**
     * Hitung diskon pada harga produk
     *
     * @param float $price
     * @return float
     */
    public function applyDiscount(float $price)
    {
        if (!$this->isValid()) {
            return $price; // Jika diskon tidak valid, kembalikan harga tanpa perubahan
        }

        if ($this->type == 'percentage') {
            return $price - ($price * $this->amount / 100);
        }

        return $price - $this->amount; // Jika diskon tipe fixed
    }
}
