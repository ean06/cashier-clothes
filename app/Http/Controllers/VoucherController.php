<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{

    // VIEW
    public function editVoucher(Request $request): View
    {
        return view('Voucher.edit', [
            'user' => $request->user(),
        ]);
    }

    // UPDATE
    public function update(upadteVoucher $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
