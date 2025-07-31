<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }
    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'nama' => 'required|unique:kategori,nama,'.$id,
           'deskripsi' => 'required|max:155',
        ],[
        'nama.required' => 'Nama kategori harus diisi',
        'nama.unique' => 'Nama kategori sudah ada',
        'deskripsi.required' => 'Deskripsi kategori harus diisi',
        'deskripsi.max' => 'Deskripsi kategori maksimal 255 karakter',
        ]);
        Kategori::updateOrCreate(
            ['id' => $id],
            [
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'deskripsi' => $request->deskripsi
            ]);
            alert()->success('Success', 'Berhasil menambahkan kategori');
            return redirect()->route('master-data.kategori.index');

    }
    public function destroy(string $id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    toast()->success('Data berhasil dihapus');
    return redirect()->route('master-data.kategori.index');
}

}
