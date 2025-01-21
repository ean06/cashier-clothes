<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    // Menampilkan daftar voucher
    public function index()
    {
        $vouchers = Voucher::all();
        return view('vouchers.index', compact('vouchers'));
    }

    // Menampilkan form untuk membuat voucher
    public function create()
    {
        return view('vouchers.create');
    }

    // Menyimpan voucher baru
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:vouchers',
            'percentage' => 'required|integer|min:1|max:100',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
        ]);

        Voucher::create($request->all());

        return redirect()->route('vouchers.index')
            ->with('success', 'Voucher created successfully.');
    }

    // Menampilkan form untuk mengedit voucher
    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);
        return view('vouchers.edit', compact('voucher'));
    }

    // Menyimpan perubahan voucher
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:vouchers,code,' . $id,
            'percentage' => 'required|integer|min:1|max:100',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
        ]);

        $voucher = Voucher::findOrFail($id);
        $voucher->update($request->all());

        return redirect()->route('vouchers.index')
            ->with('success', 'Voucher updated successfully.');
    }

    // Menghapus voucher
    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return redirect()->route('vouchers.index')
            ->with('success', 'Voucher deleted successfully.');
    }

}
