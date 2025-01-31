<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Transaksi extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksi = Transaksi::all(); // Mengambil semua transaksi
        return view('transaksi.index', compact('transaksi')); // Menampilkan daftar transaksi di view
    }

    // Menampilkan form untuk membuat transaksi baru
    public function create()
    {
        return view('transaksi.create');
    }

    // Menyimpan transaksi baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

         // Menyimpan data transaksi ke database
        Transaksi::create([
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    // Menampilkan detail transaksi
    public function show($id)
    {
         $transaksi = Transaksi::findOrFail($id); // Menampilkan transaksi berdasarkan ID
        return view('transaksi.show', compact('transaksi'));
    }

     // Menampilkan form untuk mengedit transaksi
    public function edit($id)
    {
         $transaksi = Transaksi::findOrFail($id); // Mengambil data transaksi untuk di-edit
        return view('transaksi.edit', compact('transaksi'));
    }

    // Memperbarui data transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
