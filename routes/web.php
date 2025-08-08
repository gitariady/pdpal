<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    HomeController,
    UserController,
    LaporanController,
    BangunanController,
    PetugasPelayananController,
    ProsesPetugasController,
    HasilPetugasController,
    KinerjaPetugasController,
    KendaraanController,
    EdukasiSosialController,
    KonsultasiController,
    BerhentiBerlanggananController,
    TagihanPerbaikanController,
    TagihanPenyedotanController,
    TagihanPemasanganController,
    TagihanNoPelangganController,
    AdminController,
    DashboardController,
    KategoriController,
    PenerimaanBarangController,
    PengeluaranBarangController,
    ProductController,
    PelangganController,
    KritikSaranController,
    CustomerServisController
};
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// ---------------------------------------------
// TEST EMAIL
// ---------------------------------------------
// Route::get('/test-email', function () {
//     Mail::raw('Ini adalah email percobaan dari Laravel 12 dengan Gmail SMTP.', function ($message) {
//         $message->to('gitariady07@gmail.com')
//             ->subject('Tes Email Laravel 12');
//     });
//     return 'Email test sudah dikirim, cek inbox/spam Gmail.';
// });

// ---------------------------------------------
// WELCOME PAGE
// ---------------------------------------------
Route::get('/', function () {
    return view('welcome');
});
/// ROUTE UNTUK KRITIK & SARAN TANPA LOGIN
Route::post('/kritiksaran', [KritikSaranController::class, 'store'])->name('kritiksaran.store');
Route::get('/prosespetugas/search', [ProsesPetugasController::class, 'search'])->name('prosespetugas.search');
Route::get('/prosespetugas/{id}/detail', [ProsesPetugasController::class, 'getDetail'])->name('prosespetugas.detail');
Route::get('/pelanggan/search', [PelangganController::class, 'search'])->name('pelanggan.search');
Route::get('/pelanggan/{id}/detail', [PelangganController::class, 'getDetail'])->name('pelanggan.detail');


Route::resource('kritiksaran', KritikSaranController::class);
Route::get('/laporan/search', [LaporanController::class, 'search'])->name('laporan.search');
Route::get('/laporan/{id}/detail', [LaporanController::class, 'getDetail'])->name('laporan.detail');
Route::resource('laporan', LaporanController::class);
Auth::routes();
// ---------------------------------------------
// AUTH
// ---------------------------------------------
// Auth::routes(['verify' => true]);

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth'])->group(function () {
    // HOME & DASHBOARD
    // ---------------------------
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // ---------------------------
    Route::put('/users/{user}/ganti-password', [UserController::class, 'gantipassword'])->name('users.ganti-password');

    Route::middleware(['ceklevel:admin,petugas,supervisor'])->group(function () {
        // Kritik Saran
        Route::get('get-kritiksaran', [KritikSaranController::class, 'getkritiksaran'])->name('get.kritiksaran');


        Route::get('get-laporan', [LaporanController::class, 'getlaporan'])->name('get.laporan');
        Route::get('cetak-laporan', [LaporanController::class, 'cetakPdf'])->name('cetak.laporan');
        Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('laporan.exportExcel');
        Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');

        Route::resource('customerservis', CustomerServisController::class);
        Route::get('get-customerservis', [CustomerServisController::class, 'getcustomerservis'])->name('get.customerservis');
        Route::get('/get-servis-by-type', [CustomerServisController::class, 'getServisByType'])->name('get.servis.by.type');
        Route::get('cetak-customerservis', [CustomerServisController::class, 'cetakPdf'])->name('cetak.customerservis');
        Route::get('/customerservis/export/excel', [CustomerServisController::class, 'exportExcel'])->name('customerservis.exportExcel');
    });
    // ---------------------------
    // MENU PETUGAS (khusus petugas & supervisor)
    // ---------------------------
    Route::middleware(['ceklevel:petugas,supervisor'])->group(function () {
        // Proses Petugas
        Route::resource('prosespetugas', ProsesPetugasController::class);
        Route::get('get-prosespetugas', [ProsesPetugasController::class, 'getprosespetugas'])->name('get.prosespetugas');
        Route::post('/prosespetugas', [ProsesPetugasController::class, 'store'])->name('prosespetugas.store');
        Route::get('cetak-prosespetugas', [ProsesPetugasController::class, 'cetakPdf'])->name('cetak.prosespetugas');
        Route::get('/prosespetugas/export/excel', [ProsesPetugasController::class, 'exportExcel'])->name('prosespetugas.exportExcel');
        Route::get('/proses-petugas/{id}', [ProsesPetugasController::class, 'show'])->name('proses-petugas.show');


        // Hasil Petugas
        Route::resource('hasilpetugas', HasilPetugasController::class);
        Route::get('get-hasilpetugas', [HasilPetugasController::class, 'gethasilpetugas'])->name('get.hasilpetugas');
        Route::get('cetak-hasilpetugas', [HasilPetugasController::class, 'cetakPdf'])->name('cetak.hasilpetugas');
        Route::get('/hasilpetugas/export/excel', [HasilPetugasController::class, 'exportExcel'])->name('hasilpetugas.exportExcel');
    });

    // ---------------------------------------------
    // ROUTES KHUSUS LOGIN (HANYA ADMIN & SUPERVISOR)
    // ---------------------------------------------
    Route::middleware(['ceklevel:admin,supervisor'])->group(function () {

        // ---------------------------
        // GET DATA (AJAX)
        // ---------------------------
        Route::prefix('get-data')->as('get-data.')->group(function () {
            Route::get('/produk', [ProductController::class, 'getData'])->name('produk');
            Route::get('cek-stok-product', [ProductController::class, 'cekStok'])->name('cek-stok');
            Route::get('cek-harga-produk', [ProductController::class, 'cekHarga'])->name('cek-harga');
        });
        // MASTER DATA
        Route::prefix('master-data')->as('master-data.')->group(function () {
            Route::prefix('kategori')->as('kategori.')->controller(KategoriController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            });

            Route::prefix('product')->as('product.')->controller(ProductController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            });
        });
        // PENERIMAAN & PENGELUARAN BARANG
        Route::prefix('penerimaan-barang')->as('penerimaan-barang.')->controller(PenerimaanBarangController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });

        Route::prefix('pengeluaran-barang')->as('pengeluaran-barang.')->controller(PengeluaranBarangController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // LAPORAN BARANG
        Route::prefix('laporan')->as('laporan.')->group(function () {
            Route::prefix('penerimaan-barang')->as('penerimaan-barang.')->controller(PenerimaanBarangController::class)->group(function () {
                Route::get('/laporan', 'laporan')->name('laporan');
                Route::get('/laporan/{nomor_penerimaan}/detail', 'detaillaporan')->name('detail-laporan');
                Route::get('penerimaan-barang.cetak/{nomor_penerimaan}', 'cetakPenerimaan')->name('penerimaan-barang.cetak');
                Route::get('/semua', 'Semualaporan')->name('semua');
            });

            Route::prefix('pengeluaran-barang')->as('pengeluaran-barang.')->controller(PengeluaranBarangController::class)->group(function () {
                Route::get('/laporan', 'laporan')->name('laporan');
                Route::get('/laporan/{nomor_pengeluaran}/detail', 'detaillaporan')->name('detail-laporan');
                Route::get('cetak.pengeluaran-barang/{nomor_pengeluaran}', 'cetakInvoice')->name('cetak.pengeluaran-barang');
                Route::get('/semua', 'Semualaporan')->name('semua');
            });
        });

        // ---------------------------
        // MENU ADMIN (khusus admin & supervisor)
        // ---------------------------
        Route::middleware(['ceklevel:admin,supervisor'])->group(function () {
            // Admin Dashboard
            Route::get('/admin', [AdminController::class, 'index'])->name('admin');
            // Kinerja Petugas
            Route::resource('kinerjapetugas', KinerjaPetugasController::class);
            Route::get('get-kinerjapetugas', [KinerjaPetugasController::class, 'getkinerjapetugas'])->name('get.kinerjapetugas');
            Route::get('cetak-kinerjapetugas', [KinerjaPetugasController::class, 'cetakPdf'])->name('cetak.kinerjapetugas');
            Route::get('/kinerjapetugas/export/excel', [KinerjaPetugasController::class, 'exportExcel'])->name('kinerjapetugas.exportExcel');

            // Edukasi Sosial
            Route::resource('edukasisosial', EdukasiSosialController::class);
            Route::get('get-edukasisosial', [EdukasiSosialController::class, 'getedukasisosial'])->name('get.edukasisosial');
            Route::get('cetak-edukasisosial', [EdukasiSosialController::class, 'cetakPdf'])->name('cetak.edukasisosial');
            Route::get('/edukasisosial/export/excel', [EdukasiSosialController::class, 'exportExcel'])->name('edukasisosial.exportExcel');

            // Konsultasi
            Route::resource('konsultasi', KonsultasiController::class);
            Route::get('get-konsultasi', [KonsultasiController::class, 'getkonsultasi'])->name('get.konsultasi');
            Route::get('cetak-konsultasi', [KonsultasiController::class, 'cetakPdf'])->name('cetak.konsultasi');
            Route::get('/konsultasi/export/excel', [KonsultasiController::class, 'exportExcel'])->name('konsultasi.exportExcel');

            // Berhenti Berlangganan
            Route::resource('berhentiberlangganan', BerhentiBerlanggananController::class);
            Route::get('get-berhentiberlangganan', [BerhentiBerlanggananController::class, 'getBerhentiberlangganan'])->name('get.berhentiberlangganan');
            Route::get('cetak-berhentiberlangganan', [BerhentiBerlanggananController::class, 'cetakPdf'])->name('cetak.berhentiberlangganan');

            // Tagihan
            Route::resource('tagihanperbaikan', TagihanPerbaikanController::class);
            Route::get('get-tagihanperbaikan', [TagihanPerbaikanController::class, 'gettagihanperbaikan'])->name('get.tagihanperbaikan');
            Route::get('cetak-tagihanperbaikan', [TagihanPerbaikanController::class, 'cetakPdf'])->name('cetak.tagihanperbaikan');

            Route::resource('tagihanpenyedotan', TagihanPenyedotanController::class);
            Route::get('get-tagihanpenyedotan', [TagihanPenyedotanController::class, 'gettagihanpenyedotan'])->name('get.tagihanpenyedotan');
            Route::get('cetak-tagihanpenyedotan', [TagihanPenyedotanController::class, 'cetakPdf'])->name('cetak.tagihanpenyedotan');

            Route::resource('tagihanpemasangan', TagihanPemasanganController::class);
            Route::get('get-tagihanpemasangan', [TagihanPemasanganController::class, 'gettagihanpemasangan'])->name('get.tagihanpemasangan');
            Route::get('cetak-tagihanpemasangan', [TagihanPemasanganController::class, 'cetakPdf'])->name('cetak.tagihanpemasangan');

            Route::resource('tagihannopelanggan', TagihanNoPelangganController::class);
            Route::get('/tagihan-no-pelanggan/{id}', [TagihanNoPelangganController::class, 'show'])->name('tagihannopelanggan.show');
            Route::get('get-tagihannopelanggan', [TagihanNoPelangganController::class, 'gettagihannopelanggan'])->name('get.tagihannopelanggan');
            Route::get('cetak-tagihannopelanggan', [TagihanNoPelangganController::class, 'cetakPdf'])->name('cetak.tagihannopelanggan');
            Route::get('/tagihannopelanggan/export/excel', [TagihanNoPelangganController::class, 'exportExcel'])->name('tagihannopelanggan.exportExcel');
        });

        // ---------------------------
        // SUPERVISOR (akses semua route)
        // ---------------------------
        // Supervisor sudah otomatis dapat akses karena dimasukkan di group admin & petugas
        // Jika ada route khusus supervisor, bisa dibuat di sini.


        Route::middleware(['ceklevel:supervisor'])->group(function () {
            // Admin Dashboard
            // USERS
            Route::resource('users', UserController::class);

            // Pelanggan
            Route::resource('pelanggan', PelangganController::class);
            Route::get('get-pelanggan', [PelangganController::class, 'getpelanggan'])->name('get.pelanggan');
            Route::get('/laporan/pelanggan/export-excel', [PelangganController::class, 'exportExcel'])->name('pelanggan.export.excel');
            Route::get('cetak-pelanggan', [PelangganController::class, 'cetakPdf'])->name('cetak.pelanggan');
            Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
            // Bangunan
            Route::resource('bangunan', BangunanController::class);
            Route::get('get-bangunan', [BangunanController::class, 'getbangunan'])->name('get.bangunan');

            // Kendaraan
            Route::resource('kendaraan', KendaraanController::class);
            Route::get('get-kendaraan', [KendaraanController::class, 'getkendaraan'])->name('get.kendaraan');

            // Petugas Pelayanan
            Route::resource('petugaspelayanan', PetugasPelayananController::class);
            Route::get('/petugaspelayanan/search', [PetugasPelayananController::class, 'search'])->name('petugaspelayanan.search');
            Route::get('get-petugaspelayanan', [PetugasPelayananController::class, 'getpetugaspelayanan'])->name('get.petugaspelayanan');
        });
    });
});
