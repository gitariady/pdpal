<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\tagihannopelanggan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProsesPetugas;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\tagihannopelangganExport;
use Maatwebsite\Excel\Facades\Excel;

class TagihanNoPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prosespetugas = ProsesPetugas::all();
        return view('tagihannopelanggan.index', compact('prosespetugas'));
    }


    // ...

    public function gettagihannopelanggan(Request $request)
    {
        if ($request->ajax()) {
            $tagihannopelanggan = tagihannopelanggan::with('prosesPetugas')->get(); // Ganti 'tagihannopelanggan' dengan nama model AndaNoPelanggan::with('prosesPetugas')->get();
            return DataTables::of($tagihannopelanggan)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->prosesPetugas->nama ?? '-';
                })
                ->addColumn('bukti_tagihan', function ($row) {
                    if ($row->bukti_tagihan && Storage::disk('public')->exists($row->bukti_tagihan)) {
                        return '<img src="' . asset('storage/' . $row->bukti_tagihan) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('action', function ($tagihannopelanggan) {
                    return view('partials._action', [
                        'model' => $tagihannopelanggan,
                        // 'url_show' => route('tagihannopelanggan.show', $tagihannopelanggan->id),
                        'url_edit' => route('tagihannopelanggan.edit', $tagihannopelanggan->id),
                        'url_destroy' => route('tagihannopelanggan.destroy', $tagihannopelanggan->id)
                    ]);
                })->rawColumns(['bukti_tagihan', 'action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('tagihannopelanggan.create', ['prosespetugas' => prosespetugas::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'bukti_tagihan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => ['required', 'string', 'max:30'],
            'total' => ['required', 'integer'],
            'keterangan' => ['required', 'string'],
        ]);
        if ($request->hasFile('bukti_tagihan')) {
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/nopelanggan', 'public');
        }

        tagihannopelanggan::create($validated);
        alert::success('Success', 'Berhasil menambahkan tagihan non pelanggan');
        return redirect()->route('tagihannopelanggan.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tagihannopelanggan = tagihannopelanggan::with('prosespetugas')
            ->findOrFail($id);

        return view('tagihannopelanggan.show', compact('tagihannopelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tagihannopelanggan $tagihannopelanggan)
    {
        return view('tagihannopelanggan.edit', [
            'tagihannopelanggan' => $tagihannopelanggan,
            'prosespetugas' => ProsesPetugas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tagihannopelanggan $tagihannopelanggan)
    {
        $validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'bukti_tagihan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => ['required', 'string', 'max:30'],
            'total' => ['required', 'integer'],
            'keterangan' => ['required', 'string'],
        ]);
        if ($request->hasFile('bukti_tagihan')) {
            if ($tagihannopelanggan->bukti_tagihan && Storage::disk('public')->exists($tagihannopelanggan->bukti_tagihan)) {
                Storage::disk('public')->delete($tagihannopelanggan->bukti_tagihan);
            }
            $validated['bukti_tagihan'] = $request->file('bukti_tagihan')->store('uploads/nopelanggan', 'public');
        }

        $tagihannopelanggan->update($validated);
        alert::success('Success', 'Berhasil mengubah tagihan non pelanggan');
        return redirect()->route('tagihannopelanggan.index')->with('success', 'tagihannopelanggan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagihannopelanggan = tagihannopelanggan::findOrFail($id);
        // Hapus file gambar jika ada
        if ($tagihannopelanggan->bukti_tagihan && Storage::disk('public')->exists($tagihannopelanggan->bukti_tagihan)) {
            Storage::disk('public')->delete($tagihannopelanggan->bukti_tagihan);
        }
        $tagihannopelanggan->delete();
        toast('Berhasil menghapus tagihan non pelanggan', 'success');
        return redirect()->route('tagihannopelanggan.index')->with('success', 'tagihannopelanggan berhasil dihapus');
    }
    public function cetakPdf()
    {
        $tagihannopelanggan = tagihannopelanggan::all();
        $pdf = Pdf::loadView('tagihannopelanggan.pdf', compact('tagihannopelanggan'));
        return $pdf->stream('tagihannopelanggan.pdf');
    }

    // public function exportExcel()
    // {
    //     return Excel::download(new TagihanNoPelanggaanExport, 'tagihannopelanggan.xlsx');
    // }
}
