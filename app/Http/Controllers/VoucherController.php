<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function editVoucher(Request $request): View
    {
        return view('Voucher.edit', [
            'user' => $request->user(),
        ]);
    }
}
