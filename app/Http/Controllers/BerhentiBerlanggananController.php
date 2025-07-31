<?php

namespace App\Http\Controllers;

use App\Models\Berhentiberlangganan;
use App\Models\PetugasPelayanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class BerhentiBerlanggananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugaspelayanan = PetugasPelayanan::all();
        return view('berhentiberlangganan.index', compact('petugaspelayanan'));
    }

    /**
     * DataTables JSON
     */
    public function getBerhentiberlangganan(Request $request)
    {
        if ($request->ajax()) {
            $berhentiberlangganan = Berhentiberlangganan::with('petugasPelayanan')->latest();

            return DataTables::of($berhentiberlangganan)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->petugasPelayanan->nama ?? '-';
                })
                ->addColumn('bukti_berhenti', function ($row) {
                    return $this->renderImage($row->bukti_berhenti);
                })
                ->addColumn('bukti_pdam', function ($row) {
                    return $this->renderImage($row->bukti_pdam);
                })
                ->addColumn('ktp', function ($row) {
                    return $this->renderImage($row->ktp);
                })
                ->addColumn('action', function ($row) {
                    return view('partials._action', [
                        'model' => $row,
                        'url_edit' => route('berhentiberlangganan.edit', $row->id),
                        'url_destroy' => route('berhentiberlangganan.destroy', $row->id),
                    ]);
                })
                ->rawColumns(['bukti_berhenti', 'bukti_pdam', 'ktp', 'action'])
                ->make(true);
        }
    }

    /**
     * Helper untuk render gambar.
     */
    private function renderImage($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return '<img src="' . asset('storage/' . $path) . '" width="80">';
        }
        return '-';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('berhentiberlangganan.create', compact('petugaspelayan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'petugas_id'     => ['required', 'exists:petugas_pelayanan,id'],
            'bukti_berhenti' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'bukti_pdam'     => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'ktp'            => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'keterangan'     => ['required', 'string', 'max:255'],
        ]);

        // Upload files
        $validated['bukti_berhenti'] = $request->file('bukti_berhenti')->store('uploads/berhenti', 'public');
        $validated['bukti_pdam'] = $request->file('bukti_pdam')->store('uploads/berhenti', 'public');
        $validated['ktp'] = $request->file('ktp')->store('uploads/berhenti', 'public');

        Berhentiberlangganan::create($validated);

        Alert::success('Success', 'Berhasil menambahkan Berhenti Berlangganan');
        return redirect()->route('berhentiberlangganan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berhentiberlangganan $berhentiberlangganan)
    {
        $petugaspelayan = PetugasPelayanan::all();
        return view('berhentiberlangganan.edit', compact('berhentiberlangganan', 'petugaspelayan'));
    }

    public function update(Request $request, Berhentiberlangganan $berhentiberlangganan)
    {
        $validated = $request->validate([
            'petugas_id'     => ['required', 'exists:petugas_pelayanan,id'],
            'bukti_berhenti' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'bukti_pdam'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'ktp'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'keterangan'     => ['required', 'string', 'max:255'],
        ]);
        // Update file jika ada
        foreach (['bukti_berhenti', 'bukti_pdam', 'ktp'] as $field) {
            if ($request->hasFile($field)) {
                if ($berhentiberlangganan->$field && Storage::disk('public')->exists($berhentiberlangganan->$field)) {
                    Storage::disk('public')->delete($berhentiberlangganan->$field);
                }
                $validated[$field] = $request->file($field)->store('uploads/berhenti', 'public');
            }
        }
        $berhentiberlangganan->update($validated);

        Alert::success('Success', 'Berhasil mengubah Berhenti Berlangganan');
        return redirect()->route('berhentiberlangganan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berhentiberlangganan $berhentiberlangganan)
    {
        foreach (['bukti_berhenti', 'bukti_pdam', 'ktp'] as $field) {
            if ($berhentiberlangganan->$field && Storage::disk('public')->exists($berhentiberlangganan->$field)) {
                Storage::disk('public')->delete($berhentiberlangganan->$field);
            }
        }

        $berhentiberlangganan->delete();
        Alert::success('Success', 'Berhasil menghapus data');
        return redirect()->route('berhentiberlangganan.index');
    }
    public function cetakPdf()
    {
        $berhentiberlangganan = Berhentiberlangganan::all();
        $pdf = Pdf::loadView('berhentiberlangganan.pdf', compact('berhentiberlangganan'));
        return $pdf->setPaper('a4', 'landscape')->stream('berhentiberlangganan.pdf');
    }
}
