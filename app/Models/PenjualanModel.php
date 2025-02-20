<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];

    // Relasi dengan Sale
    public function sales()
    {
        return $this->hasMany(PenjualanModel::class);
    }
}
