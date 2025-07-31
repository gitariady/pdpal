<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|unique:product,name,' . $id,
            'harga_jual' => 'required|numeric|min:0',
            'harga_beli' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategori,id',
            'stok' => 'required|numeric|min:0',
            'stok_min' => 'required|numeric|min:0',
        ], [
            'name.required' => 'Nama product harus diisi',
            'nama.unique' => 'Nama product sudah ada',
            'harga_jual.required' => 'Harga jual product harus diisi',
            'harga_jual.numeric' => 'Harga jual product harus berupa angka',
            'harga_beli.required' => 'Harga beli product harus diisi',
            'harga_beli.numeric' => 'Harga beli product harus berupa angka',
            'stok.required' => 'Stok product harus diisi',
            'stok.numeric' => 'Stok product harus berupa angka',
            'stok_min.required' => 'Stok minimal product harus diisi',
            'stok_min.numeric' => 'Stok minimal product harus berupa angka',
            // 'is_active.required' => 'Status product harus diisi',
            // 'is_active.boolean' => 'Status product harus berupa boolean',
        ]);
        $newRequest =   [
            // 'sku'
            'id' => $id,
            'name' => $request->name,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'stok_min' => $request->stok_min,
            'is_active' => $request->is_active ? true : false,
        ];
        if(!$id){
            $newRequest['sku'] = Product::nomorSku();
        }
        product::updateOrCreate(
            ['id' => $id],
            $newRequest
        );
        alert()->success('Success', 'Berhasil menambahkan product');
        return redirect()->route('master-data.product.index');
    }
    public function destroy(string $id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        toast()->success('Data berhasil dihapus');
        return redirect()->route('master-data.product.index');
    }
    public function getData()
    {
        $search = request()->query('search');
        $query = Product::query();
        $produk = $query->where('name', 'like', '%' . $search . '%')->get();
        return response()->json($produk);
    }
    public function cekStok()
    {
        $id = request()->query('id');
        $stok = Product::find($id)->stok;
        return response()->json($stok);
    }
    public function cekHarga()
    {
        $id = request()->query('id');
        $harga = Product::find($id)->harga_jual;
        return response()->json($harga);
    }

}
