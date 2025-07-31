<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\tagihanperbaikan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProsesPetugas;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\tagihanperbaikanExport;
use Maatwebsite\Excel\Facades\Excel;

class tagihanperbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prosesPetugas = ProsesPetugas::all();
        return view('tagihanperbaikan.index', compact('prosesPetugas'));
    }


    // ...

    public function gettagihanperbaikan(Request $request)
    {
        if ($request->ajax()) {
            $tagihanperbaikan = tagihanperbaikan::with(['prosesPetugas']); // Ganti 'tagihanperbaikan' dengan nama model AndaNoPelanggan::with('prosesPetugas')->get();
            return DataTables::of($tagihanperbaikan)
                ->addIndexColumn()
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
                ->addColumn('action', function ($tagihanperbaikan) {
                    return view('partials._action', [
                        'model' => $tagihanperbaikan,
                        'url_edit' => route('tagihanperbaikan.edit', $tagihanperbaikan->id),
                        'url_destroy' => route('tagihanperbaikan.destroy', $tagihanperbaikan->id)
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
        return  view('tagihanperbaikan.create',[
            'prosesPetugas' => ProsesPetugas::all()]);
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
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/penyedotan', 'public');
        }if ($request->hasFile('bukti_bayar')) {
            $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('uploads/penyedotan', 'public');
        }

        tagihanperbaikan::create($validated);
        alert::success('Success', 'Berhasil menambahkan tagihan perbaikan');
        return redirect()->route('tagihanperbaikan.index');}

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
    public function edit(tagihanperbaikan $tagihanperbaikan)
    {
        return view('tagihanperbaikan.edit', [
            'tagihanperbaikan' => $tagihanperbaikan,
            'prosesPetugas' => ProsesPetugas::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tagihanperbaikan $tagihanperbaikan)
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
            if ($tagihanperbaikan->bukti_tagihan && Storage::disk('public')->exists($tagihanperbaikan->bukti_tagihan)) {
                Storage::disk('public')->delete($tagihanperbaikan->bukti_tagihan);
            }
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/penyedotan', 'public');
        }if ($request->hasFile('bukti_bayar')) {
            if ($tagihanperbaikan->bukti_bayar && Storage::disk('public')->exists($tagihanperbaikan->bukti_bayar)) {
                Storage::disk('public')->delete($tagihanperbaikan->bukti_bayar);
            }
            $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('uploads/penyedotan', 'public');
        }


        $tagihanperbaikan->update($validated);
        alert::success('Success', 'Berhasil mengubah tagihan perbaikan');
        return redirect()->route('tagihanperbaikan.index')->with('success', 'tagihanperbaikan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagihanperbaikan = tagihanperbaikan::findOrFail($id);
        // Hapus file gambar jika ada
        if ($tagihanperbaikan->bukti_tagihan && Storage::disk('public')->exists($tagihanperbaikan->bukti_tagihan)) {
            Storage::disk('public')->delete($tagihanperbaikan->bukti_tagihan);
        }
        $tagihanperbaikan->delete();
        toast('Berhasil menghapus tagihan perbaikan', 'success');
        return redirect()->route('tagihanperbaikan.index')->with('success', 'tagihanperbaikan berhasil dihapus');
    }
        public function cetakPdf()
    {
        $tagihanperbaikan = tagihanperbaikan::all();
        $pdf = Pdf::loadView('tagihanperbaikan.pdf', compact('tagihanperbaikan'));
        return $pdf->stream('tagihanperbaikan.pdf');
    }

    // public function exportExcel()
    // {
    //     return Excel::download(new tagihanperbaikanExport, 'tagihanperbaikan.xlsx');
    // }
}
