<?php

namespace App\Http\Controllers;

use App\Models\KinerjaPetugas;
use App\Models\PetugasPelayanan;
use App\Models\Laporan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class KinerjaPetugasController extends Controller
{
    public function index()
    {
        $petugaspelayanan = PetugasPelayanan::all();
        $laporan = Laporan::all();
        $kinerjapetugas = KinerjaPetugas::with(['petugasPelayanan', 'laporan'])->get();
        return view('kinerjapetugas.index', compact('petugaspelayanan', 'laporan'));
    }

    public function create()
    {
        $petugaspelayanan = PetugasPelayanan::all();
        $laporan = Laporan::all();
        return view('kinerjapetugas.create', compact('petugaspelayanan', 'laporan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'petugas_id'          => 'required|integer',
            'laporan_id'          => 'required|integer',
            'kegiatan_kerja'      => 'required|string',
            'ketepatan_waktu'     => 'required|integer|min:1|max:5',
            'kepuasan_masyarakat' => 'required|integer|min:1|max:5',
            'sikap_kerja'         => 'required|integer|min:1|max:5',
        ]);

        $validated['nilai_total'] = (
            $validated['ketepatan_waktu'] +
            $validated['kepuasan_masyarakat'] +
            $validated['sikap_kerja']
        ) / 3;

        KinerjaPetugas::create($validated);
        Alert::success('Success', 'Kinerja petugas berhasil ditambahkan.');

        return redirect()->route('kinerjapetugas.index')
                         ->with('success', 'Kinerja petugas berhasil ditambahkan.');
    }

    public function show(KinerjaPetugas $kinerjapetugas)
    {
        return view('kinerjapetugas.show', compact('kinerjapetugas'));
    }

    public function edit(KinerjaPetugas $kinerjapetuga)
    {
        $petugaspelayanan = PetugasPelayanan::all();
        $laporan = Laporan::all();
        return view('kinerjapetugas.edit', compact('kinerjapetuga', 'petugaspelayanan', 'laporan'));
    }

    public function update(Request $request, KinerjaPetugas $kinerjapetuga)
    {
        $validated = $request->validate([
            'petugas_id'          => 'required|integer',
            'laporan_id'          => 'required|integer',
            'kegiatan_kerja'      => 'required|string',
            'ketepatan_waktu'     => 'required|integer|min:1|max:5',
            'kepuasan_masyarakat' => 'required|integer|min:1|max:5',
            'sikap_kerja'         => 'required|integer|min:1|max:5',
        ]);

        $validated['nilai_total'] = (
            $validated['ketepatan_waktu'] +
            $validated['kepuasan_masyarakat'] +
            $validated['sikap_kerja']
        ) / 3;

        $kinerjapetuga->update($validated);
        Alert::success('Success', 'Kinerja petugas berhasil diperbarui.');

        return redirect()->route('kinerjapetugas.index')  ;
    }

    public function destroy(string $id)
    {
        KinerjaPetugas::destroy($id);
        toast('Kinerja petugas berhasil dihapus', 'success');
        return redirect()->route('kinerjapetugas.index');
    }
    public function cetakPdf()
    {
        $kinerjapetugas = KinerjaPetugas::all();
        $pdf = Pdf::loadView('kinerjapetugas.pdf', compact('kinerjapetugas'));
        return $pdf->stream('kinerjapetugas.pdf');
    }

    public function getkinerjapetugas(Request $request)
    {
        if ($request->ajax()) {
            $kinerjapetugas = KinerjaPetugas::with(['petugasPelayanan', 'laporan']);

            return DataTables::of($kinerjapetugas)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->petugasPelayanan->nama ?? '-';
                })
                ->addColumn('jenis_laporan', function ($row) {
                    return $row->laporan->jenis_laporan ?? '-';
                })
                ->addColumn('ketepatan_waktu', function ($row) {
                    return $row->ketepatan_waktu_label;
                })
                ->addColumn('kepuasan_masyarakat', function ($row) {
                    return $row->kepuasan_masyarakat_label;
                })
                ->addColumn('sikap_kerja', function ($row) {
                    return $row->sikap_kerja_label;
                })
                ->addColumn('nilai_total', function ($row) {
                    return $row->nilai_total . ' (' . $row->nilai_label . ')';
                })
                ->addColumn('action', function ($row) {
                    return view('partials._action', [
                        'model' => $row,
                        'url_show'   => route('kinerjapetugas.show', $row->id),
                        'url_edit'   => route('kinerjapetugas.edit', $row->id),
                        'url_destroy'=> route('kinerjapetugas.destroy', $row->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
