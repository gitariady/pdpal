<?php

namespace App\Http\Controllers;

use App\Models\ItemPenerimaanBarang;
use App\Models\ItemPengeluaranBarang;
use App\Models\PengeluaranBarang;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalProduk = Product::count();
        $jumlahItem = ItemPenerimaanBarang::count();

        $totalBeli = ItemPenerimaanBarang::sum('sub_total');
        $totalBeli = "Rp. " . number_format($totalBeli);


        $totalOrder = PengeluaranBarang::whereMonth('created_at', $bulanIni)
        ->whereYear('created_at', $tahunIni)
        ->count();
        $totalPendapatan = PengeluaranBarang::whereMonth('created_at', $bulanIni)
        ->whereYear('created_at', $tahunIni)
        ->sum('total_harga');
        $totalPendapatan = "Rp. " . number_format($totalPendapatan);

        $latestOrder = PengeluaranBarang::latest()->take(5)->get()->map(function ($item) {
            $item->tanggal_transaksi = Carbon::parse($item->created_at)->locale('id')->translatedFormat('l, d F Y');
            return $item;
        });
        $produkTerlaris = ItemPengeluaranBarang::select('nama_produk')
        ->selectRaw('SUM(qty) as total_terjual')
        ->whereMonth('created_at', $bulanIni)
        ->whereYear('created_at', $tahunIni)
        ->groupBy('nama_produk')
        ->orderBy('total_terjual')
        ->take(5)
        ->get();


        return view('admin.index', compact('produkTerlaris', 'totalBeli', 'totalProduk',
        'totalOrder', 'totalPendapatan', 'latestOrder')); // ✅ benar
    }
}
