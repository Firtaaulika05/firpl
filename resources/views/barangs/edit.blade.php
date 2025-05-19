@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>

    <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label>Kode</label>
            <input type="text" name="kode" value="{{ $barang->kode }}" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $barang->deskripsi }}</textarea>
        </div>

        <div class="form-group mb-2">
            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan" value="{{ $barang->harga_satuan }}" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ $barang->jumlah }}" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Foto Sekarang</label><br>
            @if($barang->foto)
                <img src="{{ asset('storage/' . $barang->foto) }}" width="100">
            @else
                Tidak ada foto
            @endif
        </div>

        <div class="form-group mb-3">
            <label>Ganti Foto (opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
