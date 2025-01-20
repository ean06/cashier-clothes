<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountController extends Controller
{
    // Menampilkan daftar diskon
    public function index()
    {
        $discounts = DiscountController::all();
        return view('discounts.index', compact('discounts'));
    }

    // Menampilkan form untuk membuat diskon
    public function create()
    {
        return view('discounts.create');
    }

    // Menyimpan diskon baru
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:discounts',
            'percentage' => 'required|integer|min:1|max:100',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
        ]);

        DiscountController::create($request->all());

        return redirect()->route('discounts.index')
            ->with('success', 'Discount created successfully.');
    }

    // Menampilkan form untuk mengedit diskon
    public function edit($id)
    {
        $discount = DiscountController::findOrFail($id);
        return view('discounts.edit', compact('discount'));
    }

    // Menyimpan perubahan diskon
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:discounts,code,' . $id,
            'percentage' => 'required|integer|min:1|max:100',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:valid_from',
        ]);

        $discount = DiscountController::findOrFail($id);
        $discount->update($request->all());

        return redirect()->route('discounts.index')
            ->with('success', 'Discount updated successfully.');
    }

    // Menghapus diskon
    public function destroy($id)
    {
        $discount = DiscountController::findOrFail($id);
        $discount->delete();

        return redirect()->route('discounts.index')
            ->with('success', 'Discount deleted successfully.');
    }
}
