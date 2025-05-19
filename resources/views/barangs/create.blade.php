@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Barang</h2>
    <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="harga_satuan" class="form-label">Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
