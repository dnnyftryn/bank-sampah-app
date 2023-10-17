<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class AdminController extends Controller
{
    public function index(){
        $barang = Barang::all();

        return view('admin.index', compact('barang'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function edit($id)
    {
        $barang = Barang::findOrfail($id);
        return view('admin.edit', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang'   => 'required',
            'nama_barang'   => 'required',
            'jumlah'        => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'kode_barang.required'  => 'Kode Barang tidak boleh kosong',
            'nama_barang.required'  => 'Nama Barang tidak boleh kosong',
            'jumlah.required'       => 'Jumlah Barang tidak boleh kosong',
            'image.required'        => 'Gambar Barang tidak boleh kosong',
        ]);

        $barang = new Barang;
        $barang->kode_barang    = $request->kode_barang;
        $barang->nama_barang    = $request->nama_barang;
        $barang->jumlah         = $request->jumlah;
        $barang->image          = $request->file('image')->store('barang-images');
        $barang->save();

        return redirect()->route('admin.index');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrfail($id);
        $barang->kode_barang    = $request->kode_barang;
        $barang->nama_barang    = $request->nama_barang;
        $barang->jumlah         = $request->jumlah;
        $barang->image          = $request->file('image')->store('barang-images');
        $barang->save();

        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        Barang::find($id)->delete();

        return redirect()->route('admin.index');
    }
}
