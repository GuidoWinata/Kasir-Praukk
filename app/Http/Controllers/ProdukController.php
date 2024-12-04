<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {   
        $produk = Produk::where('tempat_id', tempatID())->get();
        return view('pages.produk.produk', compact(['produk']));
    }

    public function add()
    {  
        $kategori = Kategori::where('tempat_id', tempatID())->get();
        return view('pages.produk.add', compact(['kategori']));
    }

    public function update($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::where('tempat_id', tempatID())->get();
        return view('pages.produk.edit', [
            "produk" => $produk,
            "kategori" => $kategori
        ]);
    }

    public function doUpdate(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'string|max : 255',
            'kategori' => 'numeric',
            'harga'    => 'numeric|min: 0',
            'stok'     => 'integer|min: 0',
            'image'    => 'image|mimes: jpeg,png,jpg',
        ]);    

        $produk = Produk::findOrFail($id); 

        $path = $produk->image_path; 
        if ($request->hasFile('image')) {
            if ($produk->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($produk->image_path)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($produk->image_path);
            }
            $path = $request->file('image')->store('images', 'public');
        }

        $produk->update([
            'NamaProduk' => $request->nama,
            'Price' => $request->harga,
            'Stok' => $request->stok,
            'image_path' => $path,
            'Harga' => null,
            'kategori_id' => $request->kategori
        ]);

        if($produk) {
            return redirect()->route('produk')->with('success', 'Berhasil meng-edit data');
        } else {
            return redirect()->back()->with('error', 'Gagal meng-edit data');
        }
    }

    public function doCreate(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max : 255',
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
            'kategori_id' => $request->kategori,
            'tempat_id' => tempatID()
        ]);

        if($produk){
            return redirect()->route('produk')->with('success', 'Produk Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Produk Gagal Ditambahkan');
        }
    }

    public function delete($id)
    {
        $produk = Produk::find($id);

        if($produk){
            $produk->delete();
            return redirect()->route('produk')->with('success', 'Berhasil menghapus data');
        } else {
            return redirect()->back()->with('error', 'Produk Gagal Dihapus');
        }
    }
}
