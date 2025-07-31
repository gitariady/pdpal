<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Konsultasi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PetugasPelayanan;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\konsultasiExport;
use Maatwebsite\Excel\Facades\Excel;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('konsultasi.index', compact('petugaspelayan'));
    }
    public function getkonsultasi(Request $request)
    {
        if ($request->ajax()) {
            $konsultasi = Konsultasi::with(['petugasPelayanan']); // Ganti 'tagihanperbaikan' dengan nama model AndaNoPelanggan::with('prosesPetugas')->get();
            return DataTables::of($konsultasi)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->petugasPelayanan->nama ?? '-';
                })
                ->addColumn('bukti_konsultasi', function ($row) {
                    if ($row->bukti_konsultasi && Storage::disk('public')->exists($row->bukti_konsultasi)) {
                        return '<img src="' . asset('storage/' . $row->bukti_konsultasi) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('ktp', function ($row) {
                    if ($row->ktp && Storage::disk('public')->exists($row->ktp)) {
                        return '<img src="' . asset('storage/' . $row->ktp) . '" width="80">';
                    }
                    return '-';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($konsultasi) {
                    return view('partials._action', [
                        'model' => $konsultasi,
                        'url_edit' => route('konsultasi.edit', $konsultasi->id),
                        'url_destroy' => route('konsultasi.destroy', $konsultasi->id)
                    ]);
                })->rawColumns(['bukti_konsultasi','ktp','action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('konsultasi.create', compact('petugaspelayan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'petugas_id' => 'required|integer',
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:35',
            'no_hp' => 'required|string|max:15',
            'bangunan' => 'required|string|max:35',
            'luas_bangunan' => 'required|string|max:35',
            'orang' => 'required|integer',
            'pertanyaan' => 'required|string',
            'keterangan' => 'required|string',
            'bukti_konsultasi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string|max:50',
        ]);

        if ($request->hasFile('ktp')) {
            $validated['ktp'] = $request->file('ktp')->store('uploads/ktp', 'public');
        }

        if ($request->hasFile('bukti_konsultasi')) {
            $validated['bukti_konsultasi'] = $request->file('bukti_konsultasi')->store('uploads/bukti', 'public');
        }

        Konsultasi::create($validated);

        Alert::success('Success', 'Berhasil menambahkan konsultasi');
        return redirect()->route('konsultasi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsultasi $konsultasi)
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('konsultasi.edit', compact('konsultasi', 'petugaspelayan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsultasi $konsultasi)
    {
        $validated = $request->validate([
            'petugas_id' => 'required|integer',
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:35',
            'no_hp' => 'required|string|max:15',
            'bangunan' => 'required|string|max:35',
            'luas_bangunan' => 'required|string|max:35',
            'orang' => 'required|integer',
            'pertanyaan' => 'required|string',
            'keterangan' => 'required|string',
            'bukti_konsultasi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string|max:50',
        ]);

        if ($request->hasFile('ktp')) {
            if ($konsultasi->ktp && Storage::disk('public')->exists($konsultasi->ktp)) {
                Storage::disk('public')->delete($konsultasi->ktp);
            }
            $validated['ktp'] = $request->file('ktp')->store('uploads/ktp', 'public');
        }

        if ($request->hasFile('bukti_konsultasi')) {
            if ($konsultasi->bukti_konsultasi && Storage::disk('public')->exists($konsultasi->bukti_konsultasi)) {
                Storage::disk('public')->delete($konsultasi->bukti_konsultasi);
            }
            $validated['bukti_konsultasi'] = $request->file('bukti_konsultasi')->store('uploads/bukti', 'public');
        }

        $konsultasi->update($validated);

        Alert::success('Success', 'Berhasil mengubah konsultasi');
        return redirect()->route('konsultasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konsultasi = Konsultasi::findOrFail($id);

        // Hapus file gambar jika ada
        if ($konsultasi->ktp && Storage::disk('public')->exists($konsultasi->ktp)) {
            Storage::disk('public')->delete($konsultasi->ktp);
        }

        if ($konsultasi->bukti_konsultasi && Storage::disk('public')->exists($konsultasi->bukti_konsultasi)) {
            Storage::disk('public')->delete($konsultasi->bukti_konsultasi);
        }

        // Hapus data dari database
        $konsultasi->delete();

        Alert::success('Success', 'Berhasil menghapus konsultasi');
        return redirect()->route('konsultasi.index');
    }

    public function cetakPdf()
    {
        $konsultasi = konsultasi::all();
        $pdf = Pdf::loadView('konsultasi.pdf', compact('konsultasi'));
        return $pdf->setPaper('a4', 'landscape')->stream('konsultasi.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new konsultasiExport, 'konsultasi.xlsx');
    }
}

