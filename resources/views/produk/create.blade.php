@extends('layouts.app')
@section('title', 'Tambah Produk')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Produk Baru</h4>
                </div>
                <div class="card-body">
                    <!-- Action mengarah ke URL proses penyimpanan -->
                    <form action="/produk" method="POST" enctype="multipart/form-data">

                        @csrf <!-- WAJIB ADA UNTUK KEAMANAN LARAVEL! -->

                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}">
                            @error('nama_produk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="text" name="harga" class="form-control" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stok Awal</label>
                            <!-- Nilai default 0 jika dibiarkan -->
                            <input type="number" name="stok" value="0" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Foto Produk (Opsional)</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">

                            <!-- Teks panduan untuk user -->
                            <div class="form-text">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal: 2MB.</div>

                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Simpan Data</button>
                        <a href="/produk" class="btn btn-secondary">Batal / Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
