@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Barang</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Barang</label>
                    <input type="text" name="kode" class="form-control" value="{{ $barang->kode }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ $barang->deskripsi }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga_satuan" class="form-label">Harga Satuan</label>
                        <input type="number" step="0.01" name="harga_satuan" class="form-control" value="{{ $barang->harga_satuan }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ $barang->jumlah }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Barang</label><br>
                    @if ($barang->foto)
                        <img src="{{ asset('storage/' . $barang->foto) }}" width="80" class="mb-2"><br>
                    @endif
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('barangs.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
