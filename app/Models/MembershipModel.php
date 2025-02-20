<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipModel extends Model
{
    use HasFactory;

    protected $filable = [
        'name',
        'id_voucher',
        'no_telp'
    ];

    public function membership()
    {
        return $this->hasMany(MembershipModel::class);
    }
}
