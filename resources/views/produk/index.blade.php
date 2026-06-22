@extends('layouts.app')
@section('title', 'Daftar Produk')

@section('content')
    <!-- Header Halaman dan Tombol Tambah -->
    @can('isAdmin')
        <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
            <h1 class="h3 mb-0">Daftar Produk Tersedia</h1>
            <a href="/produk/create" class="btn btn-primary">Tambah Produk Baru</a>
            <a href="/produk/cetak-pdf" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i> Ekspor PDF</a>
        </div>
    @endcan

    <!-- Grid Produk -->
    <div class="row">
        @if (session('done'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong><i class="fa-solid fa-check-circle"></i> Berhasil!</strong> {{ session('done') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Looping data produk menggunakan Card Bootstrap -->
        @foreach ($data_produk as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($item->gambar)
                        <!-- Jika ada gambar di database, panggil dari folder storage -->
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                            alt="{{ $item->nama_produk }}" style="height: 200px; object-fit: cover;">
                    @else
                        <!-- Jika tidak ada gambar, tampilkan gambar dummy (placeholder) -->
                        <img src="[https://via.placeholder.com/300x200?text=Tidak+Ada+Foto](https://via.placeholder.com/300x200?text=Tidak+Ada+Foto)"
                            class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <!-- Informasi Produk -->
                        <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>
                        <h6 class="card-subtitle mb-3 text-primary">Rp {{ number_format($item->harga, 0, ',', '.') }}</h6>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</p>

                        <!-- Kondisi Stok -->
                        @if ($item->stok > 0)
                            <p class="card-text text-success mb-2 fw-semibold">Stok: {{ $item->stok }} Tersedia</p>
                        @else
                            <p class="card-text text-danger mb-2 fw-semibold">Stok Habis</p>
                        @endif

                        @can('isAdmin')
                            <!-- Tombol Aksi Edit dan Hapus -->
                            <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">

                                <!-- Tombol Edit (Boleh menggunakan Link biasa karena method GET) -->
                                <a href="/produk/{{ $item->id }}/edit" class="btn btn-sm btn-outline-warning w-50 me-2">
                                    Ubah
                                </a>

                                <!-- Tombol Hapus (WAJIB menggunakan Form) -->
                                <!-- Atribut onsubmit memunculkan kotak dialog konfirmasi javascript -->
                                <form action="/produk/{{ $item->id }}" method="POST" class="w-50"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
