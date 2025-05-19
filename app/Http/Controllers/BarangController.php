<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode' => 'required|unique:barangs,kode',
            'nama_barang' => 'required',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Simpan foto
        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto-barang', 'public');
        }

        // Simpan ke database
        Barang::create([
            'kode' => $request->kode,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'harga_satuan' => $request->harga_satuan,
            'jumlah' => $request->jumlah,
            'foto' => $foto
        ]);

        return redirect('/barangs')->with('success', 'Barang berhasil ditambahkan!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.edit', compact('barang'));
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
    
        $request->validate([
            'kode' => 'required|unique:barangs,kode,' . $barang->id,
            'nama_barang' => 'required',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Kalau ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama (optional, kalau kamu simpan di storage)
            if ($barang->foto && \Storage::exists('public/' . $barang->foto)) {
                \Storage::delete('public/' . $barang->foto);
            }
    
            $barang->foto = $request->file('foto')->store('foto-barang', 'public');
        }
    
        $barang->kode = $request->kode;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga_satuan = $request->harga_satuan;
        $barang->jumlah = $request->jumlah;
        $barang->save();
    
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diupdate!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
    
        // Hapus foto dari storage kalau ada
        if ($barang->foto && \Storage::exists('public/' . $barang->foto)) {
            \Storage::delete('public/' . $barang->foto);
        }
    
        // Hapus data dari database
        $barang->delete();
    
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus!');
    }
    
}
