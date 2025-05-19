@extends('layouts.app') {{-- Kalau belum punya layouts, hapus baris ini dan @section sampai @endsection --}}

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    <a href="{{ route('barangs.create') }}" class="btn btn-success mb-3">Tambah Barang</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
                <tr>
                    <td>{{ $barang->kode }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>Rp{{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
                    <td>{{ $barang->jumlah }}</td>
                    <td>
                        @if($barang->foto)
                            <img src="{{ asset('storage/' . $barang->foto) }}" width="80">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
