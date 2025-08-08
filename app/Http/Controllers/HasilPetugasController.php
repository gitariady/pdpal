<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\hasilpetugas;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProsesPetugas;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\hasilpetugasExport;
use Maatwebsite\Excel\Facades\Excel;

class hasilpetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prosespetugas = ProsesPetugas::all();
        return view('hasilpetugas.index', compact('prosespetugas'));
    }


    // ...

    public function gethasilpetugas(Request $request)
    {
        if ($request->ajax()) {
            $hasilpetugas = hasilpetugas::with('prosesPetugas')->get();
            return DataTables::of($hasilpetugas)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->prosesPetugas->nama ?? '-';
                })
                ->addColumn('foto_hasil', function ($row) {
                    if ($row->foto_hasil && Storage::disk('public')->exists($row->foto_hasil)) {
                        return '<img src="' . asset('storage/' . $row->foto_hasil) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('action', function ($hasilpetugas) {
                    return view('partials._action', [
                        'model' => $hasilpetugas,
                        'url_edit' => route('hasilpetugas.edit', $hasilpetugas->id),
                        'url_destroy' => route('hasilpetugas.destroy', $hasilpetugas->id)
                    ]);
                })->rawColumns(['foto_hasil','action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prosespetugas = ProsesPetugas::all();
        return  view('hasilpetugas.create',compact('prosespetugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'jenis_layanan' => ['required', 'string', 'max:50'],
            'foto_hasil' =>'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tindak_lanjut' => ['required', 'string'],
            'masalah_ditemukan' => ['required', 'string'],
            'kesimpulan' => ['required', 'string'],
            'status_hasil' => ['required', 'string', 'max:50'],
        ]);
        if ($request->hasFile('foto_hasil')) {
            $validated['foto_hasil'] = $request->file('foto_hasil')->store('uploads/hasil', 'public');
        }

        hasilpetugas::create($validated);
        alert::success('Success', 'Berhasil menambahkan hasil Kegiatan petugas');
        return redirect()->route('hasilpetugas.index')->with('success', 'hasilpetugas berhasil ditambahkan');
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
    public function edit(hasilpetugas $hasilpetuga)
    {
        return view('hasilpetugas.edit', [
            'hasilpetuga' => $hasilpetuga,
            'prosespetugas' => ProsesPetugas::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hasilpetugas $hasilpetuga)
    {
        $validated = $request->validate([
            'proses_petugas_id' => ['required', 'integer'],
            'jenis_layanan' => ['required', 'string', 'max:50'],
            'foto_hasil' =>'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tindak_lanjut' => ['required', 'string'],
            'masalah_ditemukan' => ['required', 'string'],
            'kesimpulan' => ['required', 'string'],
            'status_hasil' => ['required', 'string', 'max:50'],
        ]);
        if ($request->hasFile('foto_hasil')) {
            if ($hasilpetuga->foto_hasil && Storage::disk('public')->exists($hasilpetuga->foto_hasil)) {
                Storage::disk('public')->delete($hasilpetuga->foto_hasil);
            }
            $validated['foto_hasil'] = $request->file('foto_hasil')->store('uploads/hasil', 'public');
        }

        $hasilpetuga->update($validated);
        alert::success('Success', 'Berhasil mengubah hasil Kegiatan petugas');
        return redirect()->route('hasilpetugas.index');}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hasilpetugas = hasilpetugas::findOrFail($id);
        // Hapus file gambar jika ada
        if ($hasilpetugas->foto_hasil && Storage::disk('public')->exists($hasilpetugas->foto_hasil)) {
            Storage::disk('public')->delete($hasilpetugas->foto_hasil);
        }
        $hasilpetugas->delete();
        toast('Berhasil menghapus hasil Kegiatan petugas','success');
        return redirect()->route('hasilpetugas.index');}

        public function cetakPdf()
    {
        $hasilpetugas = hasilpetugas::all();
        $pdf = Pdf::loadView('hasilpetugas.pdf', compact('hasilpetugas'));
        return $pdf->stream('hasilpetugas.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new hasilpetugasExport, 'hasilpetugas.xlsx');
    }
}
