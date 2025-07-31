<?php

namespace App\Http\Controllers;

use App\Models\ItemPengeluaranBarang;
use App\Models\PengeluaranBarang;
use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PengeluaranBarangController extends Controller
{
    public function index()
    {
        return view('pengeluaran-barang.index');
    }
    public function store(Request $request)
    {
        if (empty($request->produk)) {
            toast()->error('Produk harus diisi');
            return redirect()->back();
        }
        $request->validate([
            'produk' => 'required',
            'bayar' => 'required|numeric|min:1'
        ], [
            'produk.required' => 'Produk harus diisi',
            'bayar.required' => 'Bayar harus diisi',
            'bayar.numeric' => 'Bayar harus berupa angka',
            'bayar.min' => 'Bayar minimal 1',
        ]);

        $produk = collect($request->produk);
        $bayar = $request->bayar;
        $total = $produk->sum('sub_total');
        $kembalian = intval($bayar) - intval($total);

        if ($bayar < $total) {
            toast()->error('Jumlah bayar kurang');
            return redirect()->back()->withInput([
                'produk' => $produk,
                'bayar' => $bayar,
                'total' => $total,
                'kembalian' => $kembalian,
            ]);
        }

        $data = PengeluaranBarang::create([
            'nomor_pengeluaran' => PengeluaranBarang::nomorPengeluaran(),
            'nama_petugas' => Auth::user()->name,
            'total_harga' => $total,
            'bayar' => $bayar,
            'kembalian' => $kembalian
        ]);
        foreach ($produk as $item) {
            ItemPengeluaranBarang::create([
                'nomor_pengeluaran' => $data->nomor_pengeluaran,
                'nama_produk' => $item['name'],
                'qty' => $item['qty'],
                'harga' => $item['harga_jual'],
                'sub_total' => $item['sub_total']
            ]);
            Product::where('id', $item['produk_id'])->decrement('stok', $item['qty']);
        }
        toast()->success('Success', 'Transaksi Tersimpan');
        return redirect()->route('pengeluaran-barang.index');
    }
    public function laporan()
    {
        $data = PengeluaranBarang::orderBy('created_at', 'desc')->get()->map(function ($item) {
            $item->tanggal_transaksi = Carbon::parse($item->created_at)->locale('id')->translatedFormat('l, d F Y');
            return $item;
        });
        return view('pengeluaran-barang.laporan', compact('data'));
    }
    public function Semualaporan()
    {
        $pengeluaranBarang = PengeluaranBarang::orderBy('created_at', 'desc')->get()->map(function ($item) {
            $item->tanggal_transaksi = Carbon::parse($item->created_at)->locale('id')->translatedFormat('l, d F Y');
            return $item;
        });
        $pdf = Pdf::loadView('pengeluaran-barang.semua', compact('pengeluaranBarang'))
            ->setPaper('A4', 'portrait');
        return $pdf->stream('laporan-semua-pengeluaran-barang.pdf');
    }

    public function detaillaporan(String $nomorPengeluaran)
    {
        $data = PengeluaranBarang::with('items')->where('nomor_pengeluaran', $nomorPengeluaran)->first();
        $data->tanggal_transaksi = Carbon::parse($data->created_at)->locale('id')->translatedFormat('l, d F Y');
        $data->total_harga = $data->items->sum('sub_total');
        return view('pengeluaran-barang.detail', compact('data'));
    }


    public function cetakInvoice(String $nomorPengeluaran)
    {
        $data = PengeluaranBarang::with('items')
            ->where('nomor_pengeluaran', $nomorPengeluaran)
            ->firstOrFail();

        // Tambahkan format tanggal & total harga
        $data->tanggal_transaksi = Carbon::parse($data->created_at)
            ->locale('id')
            ->translatedFormat('l, d F Y');
        $data->total_harga = $data->items->sum('sub_total');

        $pdf = Pdf::loadView('pengeluaran-barang.pdf', compact('data'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('pengeluaran-barang-' . $data->nomor_pengeluaran . '.pdf');
    }
}
