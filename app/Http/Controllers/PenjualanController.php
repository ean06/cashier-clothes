<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    // Menampilkan seluruh data penjualan
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    // Menampilkan form untuk membuat penjualan baru
    public function create()
    {
        return view('penjualan.create');
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Penjualan::create([
            'produk' => $request->produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit penjualan
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.edit', compact('penjualan'));
    }

    // Memperbarui data penjualan
    public function update(Request $request, $id)
    {
        $request->validate([
            'produk' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update([
            'produk' => $request->produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil diperbarui!');
    }

    // Menghapus data penjualan
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus!');
    }
}
