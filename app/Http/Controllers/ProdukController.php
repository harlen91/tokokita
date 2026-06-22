<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProdukController extends Controller
{
    public function cetakPdf()
    {
        // Mengambil semua data produk
        $produk = Produk::all();

        // Me-load tampilan blade (yang akan kita buat) dan mengirimkan data produk
        $pdf = Pdf::loadView('produk.pdf', compact('produk'));

        // Memberi instruksi ke browser untuk langsung mengunduh file
        // return $pdf->download('Laporan-Inventaris-TokoKita.pdf');

        // Opsional: Jika ingin PDF dibuka di browser (preview) tanpa langsung didownload, gunakan:
        return $pdf->stream('Laporan-Inventaris-TokoKita.pdf');
    }

    public function index()
    {
        $data_produk = Produk::all();
        return view('produk.index', compact('data_produk'));
    }
    public function create()
    {
        return view('produk.create');
    }

    // Method untuk memproses data dari Form dan menyimpannya (Request $request menangkap inputan)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|mimes:jpeg,png,jpg|max:2048' // Max 2048 KB (2MB)
        ], [
            'nama_produk.required' => 'Nama Produk Harus Diisi!',
            'harga.required' => 'Harga Produk Harus Diisi!',
            'harga.numeric' => 'Harga Produk Harus Berupa Angka!',
            'gambar.required' => 'Foto Produk Harus Diunggah!',
            'gambar.mimes' => 'Format gambar yang diizinkan: JPG, JPEG, PNG',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.'
        ]);
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk_images', 'public');
            $validatedData['gambar'] = $path;
        }
        Produk::create($validatedData);
        return redirect('/produk')->with('done', 'Data Berhasil Disimpan!');
    }
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    // Method untuk menyimpan perubahan data ke database
    public function update(Request $request, $id)
    {

        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok
        ]);

        return redirect('/produk');
    }
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect('/produk');
    }

}
