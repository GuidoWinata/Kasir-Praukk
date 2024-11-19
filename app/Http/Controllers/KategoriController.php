<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('pages.kategori.kategori', [
            'data' => $kategori
        ]);
    }

    public function update($id)
    {
        $kategori = Kategori::find($id);
        return view('pages.kategori.update', [
            'data' => $kategori
        ]);
    }

    public function add()
    {
        return view('pages.kategori.add');
    }

    public function doUpdate(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $kategori = Kategori::find($id);
        $kategori->update([
            'nama' => $request->nama
        ]);

        if($kategori){
            return redirect()->route('kategori')->with('success', 'Berhasil Edit Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Edit Data');
        }
    }
    
    public function doCreate(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $kategori = Kategori::create([
            "nama" => $request->nama
        ]);

        if($kategori)
        {
            return redirect()->route('kategori')->with('success', 'Berhasil membuat Data');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat Data');
        }
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        if($kategori)
        {
            return redirect()->route('kategori')->with('success', 'Berhasil Hapus Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Hapus Data');
        }
    }
}
