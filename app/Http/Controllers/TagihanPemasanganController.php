<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\tagihanpemasangan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProsesPetugas;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\tagihanpemasanganExport;
use Maatwebsite\Excel\Facades\Excel;

class tagihanpemasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prosespetugas = ProsesPetugas::all();
        return view('tagihanpemasangan.index', compact('prosespetugas'));
    }


    // ...

    public function gettagihanpemasangan(Request $request)
    {
        if ($request->ajax()) {
            $tagihanpemasangan = tagihanpemasangan::with('prosesPetugas')->get(); // Ganti 'tagihanpemasangan' dengan nama model AndaNoPelanggan::with('prosesPetugas')->get();
            return DataTables::of($tagihanpemasangan)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->prosesPetugas->nama ?? '-';
                })
                ->addColumn('bukti_tagihan', function ($row) {
                    if ($row->bukti_tagihan && Storage::disk('public')->exists($row->bukti_tagihan)) {
                        return '<img src="' . asset('storage/' . $row->bukti_tagihan) . '" width="50">';
                    }
                    return '-';
                })
                ->addColumn('bukti_bayar', function ($row) {
                    if ($row->bukti_bayar && Storage::disk('public')->exists($row->bukti_bayar)) {
                        return '<img src="' . asset('storage/' . $row->bukti_bayar) . '" width="50">';
                    }
                    return '-';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($tagihanpemasangan) {
                    return view('partials._action', [
                        'model' => $tagihanpemasangan,
                        'url_edit' => route('tagihanpemasangan.edit', $tagihanpemasangan->id),
                        'url_destroy' => route('tagihanpemasangan.destroy', $tagihanpemasangan->id)
                    ]);
                })->rawColumns(['bukti_tagihan','bukti_bayar','action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prosespetugas = ProsesPetugas::all();
        return  view('tagihanpemasangan.create',compact('prosespetugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'bukti_tagihan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_bayar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => ['required', 'string', 'max:50'],
            'total' => ['required', 'integer'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);
        if ($request->hasFile('bukti_tagihan')) {
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/pemasangan', 'public');
        }if ($request->hasFile('bukti_bayar')) {
            $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('uploads/pemasangan', 'public');
        }

        tagihanpemasangan::create($validated);
        alert::success('Success', 'Berhasil menambahkan tagihan pemasangan');
        return redirect()->route('tagihanpemasangan.index');}

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
    public function edit(tagihanpemasangan $tagihanpemasangan)
    {
        $prosespetugas = ProsesPetugas::all();
        return view('tagihanpemasangan.edit', compact('tagihanpemasangan','prosespetugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tagihanpemasangan $tagihanpemasangan)
    {
$validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'bukti_tagihan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_bayar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => ['required', 'string', 'max:50'],
            'total' => ['required', 'integer'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);
        if ($request->hasFile('bukti_tagihan')) {
            if ($tagihanpemasangan->bukti_tagihan && Storage::disk('public')->exists($tagihanpemasangan->bukti_tagihan)) {
                Storage::disk('public')->delete($tagihanpemasangan->bukti_tagihan);
            }
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/pemasangan', 'public');
        }

        if ($request->hasFile('bukti_bayar')) {
            if ($tagihanpemasangan->bukti_bayar && Storage::disk('public')->exists($tagihanpemasangan->bukti_bayar)) {
                Storage::disk('public')->delete($tagihanpemasangan->bukti_bayar);
            }
            $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('uploads/pemasangan', 'public');
        }


        $tagihanpemasangan->update($validated);
        alert::success('Success', 'Berhasil mengubah tagihan pemasangan');
        return redirect()->route('tagihanpemasangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagihanpemasangan = tagihanpemasangan::findOrFail($id);
        // Hapus file gambar jika ada
        if ($tagihanpemasangan->bukti_tagihan && Storage::disk('public')->exists($tagihanpemasangan->bukti_tagihan)) {
            Storage::disk('public')->delete($tagihanpemasangan->bukti_tagihan);
        }
        $tagihanpemasangan->delete();
        toast( 'Berhasil menghapus tagihan pemasangan','success');
        return redirect()->route('tagihanpemasangan.index');
    }
        public function cetakPdf()
    {
        $tagihanpemasangan = tagihanpemasangan::all();
        $pdf = Pdf::loadView('tagihanpemasangan.pdf', compact('tagihanpemasangan'));
        return $pdf->stream('tagihanpemasangan.pdf');
    }

    // public function exportExcel()
    // {
    //     return Excel::download(new tagihanpemasanganExport, 'tagihanpemasangan.xlsx');
    // }
}
