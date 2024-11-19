<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {   
        $produk = Produk::all();
        return view('pages.produk.produk', compact(['produk']));
    }

    public function add()
    {  
        $kategori = Kategori::all();
        return view('pages.produk.add', compact(['kategori']));
    }

    public function doCreate(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max : 255',
            'kategori' => 'required',
            'harga'    => 'required|numeric|min: 0',
            'stok'     => 'required|integer|min: 0',
            'image'    => 'required|image|mimes: jpeg,png,jpg',
        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }

        $produk = Produk::create([
            'NamaProduk'  => $request->nama,
            'Price'       => $request->harga,
            'Stok'        => $request->stok,
            'image_path'  => $path,
            'Harga'       => null,
            'kategori_id' => $request->kategori
        ]);

        if($produk){
            return redirect()->route('produk')->with('success', 'Produk Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Produk Gagal Ditambahkan');
        }
    }
}
