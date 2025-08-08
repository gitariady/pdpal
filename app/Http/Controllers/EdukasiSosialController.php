<?php

namespace App\Http\Controllers;

use App\Exports\EdukasiSosialExport;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\EdukasiSosial;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PetugasPelayanan;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class EdukasiSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('edukasisosial.index', compact('petugaspelayan'));
    }

    // ...

    public function getEdukasiSosial(Request $request)
    {
        if ($request->ajax()) {
            $edukasisosial = EdukasiSosial::with('petugasPelayanan')->get();

            return DataTables::of($edukasisosial)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->petugasPelayanan->nama ?? '-';
                })
                ->addColumn('bukti_kegiatan', function ($row) {
                    if ($row->bukti_kegiatan && Storage::disk('public')->exists($row->bukti_kegiatan)) {
                        return '<img src="' . asset('storage/' . $row->bukti_kegiatan) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('absensi', function ($row) {
                    if ($row->absensi && Storage::disk('public')->exists($row->absensi)) {
                        return '<img src="' . asset('storage/' . $row->absensi) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('action', function ($row) {
                    return view('partials._action', [
                        'model' => $row,
                        'url_edit' => route('edukasisosial.edit', $row->id),
                        'url_destroy' => route('edukasisosial.destroy', $row->id)
                    ]);
                })
                ->rawColumns(['bukti_kegiatan','absensi', 'action']) // <--- supaya HTML tidak di-escape
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('edukasisosial.create', compact('petugaspelayan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'petugas_id' => ['required', 'integer'],
            'nama_kegiatan' => ['required', 'string'],
            'tempat' => ['required', 'string', 'max:50'],
            'materi' => ['required', 'string'],
            'point' => ['required', 'string'],
            'orang' => ['required', 'integer'],
            'tanggapan' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'absensi' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2120',
            'bukti_kegiatan' => 'nullable|image|mimes:jpg,jpeg,png|max:2120',
        ]);

        if ($request->hasFile('bukti_kegiatan')) {
            $validated['bukti_kegiatan'] = $request->file('bukti_kegiatan')->store('uploads/edukasisosial', 'public');
        }

        if ($request->hasFile('absensi')) {
            $validated['absensi'] = $request->file('absensi')->store('uploads/edukasisosial', 'public');
        }

        EdukasiSosial::create($validated);

        alert::success('Success', 'Berhasil menambahkan edukasi sosial');
        return redirect()->route('edukasisosial.index');
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
    public function edit(EdukasiSosial $edukasisosial)
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('edukasisosial.edit', compact('edukasisosial', 'petugaspelayan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EdukasiSosial $edukasisosial)
    {
        $validated = $request->validate([
            'petugas_id' => ['required', 'integer'],
            'nama_kegiatan' => ['required', 'string'],
            'tempat' => ['required', 'string', 'max:50'],
            'materi' => ['required', 'string'],
            'point' => ['required', 'string'],
            'orang' => ['required', 'integer'],
            'tanggapan' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'absensi' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2120',
            'bukti_kegiatan' => 'nullable|image|mimes:jpg,jpeg,png|max:2120',
        ]);

        // Jika ada upload baru
        if ($request->hasFile('bukti_kegiatan')) {

            // Hapus file lama kalau ada
            if ($edukasisosial->bukti_kegiatan && Storage::disk('public')->exists($edukasisosial->bukti_kegiatan)) {
                Storage::disk('public')->delete($edukasisosial->bukti_kegiatan);
            }

            // Simpan file baru
            $validated['bukti_kegiatan'] = $request->file('bukti_kegiatan')->store('uploads/edukasisosial', 'public');
        }

        if ($request->hasFile('absensi')) {
            // Hapus file lama kalau ada
            if ($edukasisosial->absensi && Storage::disk('public')->exists($edukasisosial->absensi)) {
                Storage::disk('public')->delete($edukasisosial->absensi);
            }

            // Simpan file baru
            $validated['absensi'] = $request->file('absensi')->store('uploads/edukasisosial', 'public');
        }

        $edukasisosial->update($validated);

        alert::success('Success', 'Berhasil mengubah edukasi sosial');
        return redirect()->route('edukasisosial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $edukasisosial = EdukasiSosial::findOrFail($id);

        // Hapus file gambar jika ada
        if ($edukasisosial->bukti_kegiatan && Storage::disk('public')->exists($edukasisosial->bukti_kegiatan)) {
            Storage::disk('public')->delete($edukasisosial->bukti_kegiatan);
        }

        // Hapus file absensi jika ada
        if ($edukasisosial->absensi && Storage::disk('public')->exists($edukasisosial->absensi)) {
            Storage::disk('public')->delete($edukasisosial->absensi);
        }

        $edukasisosial->delete();

        Alert::toast( 'Berhasil menghapus edukasi sosial','success');
        return redirect()->route('edukasisosial.index');
    }

    public function cetakPdf()
    {
        $edukasisosial = EdukasiSosial::all();
        $pdf = Pdf::loadView('edukasisosial.pdf', compact('edukasisosial'));
        return $pdf->setPaper('a4', 'landscape')->stream('edukasisosial.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new EdukasiSosialExport, 'edukasisosial.xlsx');
    }
}

