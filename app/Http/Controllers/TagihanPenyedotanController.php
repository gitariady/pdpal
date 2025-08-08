<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\tagihanpenyedotan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProsesPetugas;
use App\Models\Bangunan;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\tagihanpenyedotanExport;
use Maatwebsite\Excel\Facades\Excel;

class tagihanpenyedotanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bangunan = Bangunan::all();
        $prosesPetugas = ProsesPetugas::all();
        return view('tagihanpenyedotan.index', compact('bangunan', 'prosesPetugas'));
    }


    // ...

    public function gettagihanpenyedotan(Request $request)
    {
        if ($request->ajax()) {
            $tagihanpenyedotan = tagihanpenyedotan::with(['prosesPetugas', 'bangunan']); // Ganti 'tagihanpenyedotan' dengan nama model AndaNoPelanggan::with('prosesPetugas')->get();
            return DataTables::of($tagihanpenyedotan)
                ->addIndexColumn()
                ->addColumn('nama_bangunan', function ($row) {
                    return $row->bangunan->nama_bangunan ?? '-';
                })
                ->addColumn('bukti_tagihan', function ($row) {
                    if ($row->bukti_tagihan && Storage::disk('public')->exists($row->bukti_tagihan)) {
                        return '<img src="' . asset('storage/' . $row->bukti_tagihan) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('bukti_bayar', function ($row) {
                    if ($row->bukti_bayar && Storage::disk('public')->exists($row->bukti_bayar)) {
                        return '<img src="' . asset('storage/' . $row->bukti_bayar) . '" width="80">';
                    }
                    return '-';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($tagihanpenyedotan) {
                    return view('partials._action', [
                        'model' => $tagihanpenyedotan,
                        'url_edit' => route('tagihanpenyedotan.edit', $tagihanpenyedotan->id),
                        'url_destroy' => route('tagihanpenyedotan.destroy', $tagihanpenyedotan->id)
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
        $prosesPetugas = ProsesPetugas::all();
        $bangunan = Bangunan::all();
        return  view('tagihanpenyedotan.create',compact('prosesPetugas','bangunan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'bangunan_id' => ['required', 'integer'],
            'bukti_tagihan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_bayar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => ['required', 'string', 'max:50'],
            'total' => ['required', 'integer'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);
        if ($request->hasFile('bukti_tagihan')) {
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/penyedotan', 'public');
        } if ($request->hasFile('bukti_bayar')) {
            $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('uploads/penyedotan', 'public');
        }

        tagihanpenyedotan::create($validated);
        alert::success('Success', 'Berhasil menambahkan tagihan penyedotan');
        return redirect()->route('tagihanpenyedotan.index');}

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
    public function edit(tagihanpenyedotan $tagihanpenyedotan)
    {
        return view('tagihanpenyedotan.edit', [
            'tagihanpenyedotan' => $tagihanpenyedotan,
            'bangunan' => Bangunan::all(),
            'prosesPetugas' => ProsesPetugas::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tagihanpenyedotan $tagihanpenyedotan)
    {
        $validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'bangunan_id' => ['required', 'integer'],
            'bukti_tagihan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_bayar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => ['required', 'string', 'max:50'],
            'total' => ['required', 'integer'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);
        if ($request->hasFile('bukti_tagihan')) {
            if ($tagihanpenyedotan->bukti_tagihan && Storage::disk('public')->exists($tagihanpenyedotan->bukti_tagihan)) {
                Storage::disk('public')->delete($tagihanpenyedotan->bukti_tagihan);
            }
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/penyedotan', 'public');
        }if ($request->hasFile('bukti_bayar')) {
            if ($tagihanpenyedotan->bukti_bayar && Storage::disk('public')->exists($tagihanpenyedotan->bukti_bayar)) {
                Storage::disk('public')->delete($tagihanpenyedotan->bukti_bayar);
            }
            $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('uploads/penyedotan', 'public');
        }


        $tagihanpenyedotan->update($validated);
        alert::success('Success', 'Berhasil mengubah tagihan penyedotan');
        return redirect()->route('tagihanpenyedotan.index')->with('success', 'tagihanpenyedotan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagihanpenyedotan = tagihanpenyedotan::findOrFail($id);
        // Hapus file gambar jika ada
        if ($tagihanpenyedotan->bukti_tagihan && Storage::disk('public')->exists($tagihanpenyedotan->bukti_tagihan)) {
            Storage::disk('public')->delete($tagihanpenyedotan->bukti_tagihan);
        }
        $tagihanpenyedotan->delete();
        toast('Berhasil menghapus tagihan penyedotan','success');
        return redirect()->route('tagihanpenyedotan.index');
    }
        public function cetakPdf()
    {
        $tagihanpenyedotan = tagihanpenyedotan::all();
        $pdf = Pdf::loadView('tagihanpenyedotan.pdf', compact('tagihanpenyedotan'));
        return $pdf->stream('tagihanpenyedotan.pdf');
    }

    // public function exportExcel()
    // {
    //     return Excel::download(new tagihanpenyedotanExport, 'tagihanpenyedotan.xlsx');
    // }
}
