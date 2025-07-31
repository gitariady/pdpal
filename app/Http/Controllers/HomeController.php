<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ItemPengeluaranBarang;
use App\Models\PengeluaranBarang;
use App\Models\PenerimaanBarang;
use App\Models\BerhentiBerlangganan;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Laporan;
use App\Models\Pelanggan;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //untuk menapilkan data dari model lain disini

        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalUsers = User::count();
        $totalProduk = Product::count();
        $laporan = Laporan ::count();
        $pelanggan = Pelanggan ::count();
        $penerimaanbarang = PenerimaanBarang ::count();
        $berhenti = BerhentiBerlangganan ::count();

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
        return view('home',compact(
            'laporan', 'produkTerlaris','totalUsers', 'totalProduk',
            'totalOrder', 'totalPendapatan', 'latestOrder', 'pelanggan', 'penerimaanbarang',
            'berhenti'
        ));
    }
}
