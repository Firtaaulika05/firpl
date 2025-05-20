@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 display-6 fw-bold border-bottom pb-2 text-uppercase text-dark">
        <i class="bi bi-box-seam-fill me-2 text-primary"></i> Daftar Barang
    </h1>

    <a href="{{ route('barangs.create') }}" class="btn btn-success mb-4 shadow-sm">
        <i class="bi bi-plus-circle"></i> Tambah Barang
    </a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark text-uppercase">
                <tr>
                    <th class="fw-bold">Kode</th>
                    <th class="fw-bold">Nama Barang</th>
                    <th class="fw-bold">Deskripsi</th>
                    <th class="fw-bold">Harga Satuan</th>
                    <th class="fw-bold">Jumlah</th>
                    <th class="fw-bold">Foto</th>
                    <th class="fw-bold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr>
                        <td class="fw-semibold">{{ $barang->kode }}</td>
                        <td class="fw-semibold">{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->deskripsi }}</td>
                        <td>Rp{{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
                        <td>{{ $barang->jumlah }}</td>
                        <td>
                            @if($barang->foto)
                                <img src="{{ asset('storage/' . $barang->foto) }}" width="80" class="img-thumbnail">
                            @else
                                <span class="text-muted fst-italic">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
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
</div>
@endsection
