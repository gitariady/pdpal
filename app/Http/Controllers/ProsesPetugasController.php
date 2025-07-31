<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\prosespetugas;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\petugaspelayanan;
use App\Models\kendaraan;
use App\Models\laporan;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\prosespetugasExport;
use Maatwebsite\Excel\Facades\Excel;

class ProsesPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugaspelayanan = PetugasPelayanan::all();
        $kendaraan = Kendaraan::all();
        $laporan = laporan::all();
        $prosespetugas = ProsesPetugas::with(['petugasPelayanan', 'laporan', 'kendaraan'])->get();
        return view('prosespetugas.index', compact('petugaspelayanan', 'kendaraan', 'laporan'));
    }
    public function search(Request $request)
    {
        $search = $request->get('search', '');
        $proses = ProsesPetugas::query()
            ->when($search, fn($q) => $q->where('id', 'like', "%$search%"))
            ->limit(5)
            ->get(['id']);

        return response()->json(
            $proses->map(fn($item) => ['id' => $item->id, 'text' => 'Proses ID ' . $item->id])
        );
    }

    public function getDetail($id)
    {
        $proses = ProsesPetugas::with('petugaspelayanan', 'laporan')->find($id);
        if (!$proses) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return $proses; // Untuk test
    }



    public function show($id)
    {
        $data = ProsesPetugas::find($id);

        if (!$data) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'id'          => $data->id,
            'petugas_id'    => $data->petugas_id ?? '-',
            'laporan_id'    => $data->laporan_id ?? '-',
            'kendaraan_id'  => $data->kendaraan_id ?? '-',
            'awal'          => $data->awal ?? '-',
            'akhir'         => $data->akhir ?? '-',
            'kendala'       => $data->kendala ?? '-',
            'solusi'        => $data->solusi ?? '-',
            'status_proses' => $data->status_proses ?? '-',
            'bukti'         => $data->bukti ? asset('storage/' . $data->bukti) : null,
            'keterangan'    => $data->keterangan ?? '-'
        ]);
    }

    public function getprosespetugas(Request $request)
    {
        if ($request->ajax()) {
            $prosespetugas = prosespetugas::with(['petugasPelayanan', 'Laporan', 'kendaraan']);
            return DataTables::of($prosespetugas)
                ->addIndexColumn()
                ->addColumn('nama_petugas', function ($row) {
                    return $row->petugasPelayanan->nama ?? '-';
                })
                ->addColumn('jenis_laporan', function ($row) {
                    return $row->laporan->jenis_laporan ?? '-';
                })
                ->addColumn('jenis_kendaraan', function ($row) {
                    return $row->kendaraan->nama ?? '-';
                })

                ->addColumn('bukti', function ($row) {
                    if ($row->bukti && Storage::disk('public')->exists($row->bukti)) {
                        return '<img src="' . asset('storage/' . $row->bukti) . '" width="80">';
                    }
                    return '-';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($prosespetugas) {
                    return view('partials.prosespetugas', [
                        'model' => $prosespetugas,
                        'url_show' => route('prosespetugas.show', $prosespetugas->id),
                        'url_edit' => route('prosespetugas.edit', $prosespetugas->id),
                        'url_destroy' => route('prosespetugas.destroy', $prosespetugas->id)
                    ]);
                })->rawColumns(['bukti', 'action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugaspelayanan = PetugasPelayanan::all();
        $kendaraan = Kendaraan::all();
        $laporan = laporan::all();
        return view('prosespetugas.create', compact('petugaspelayanan', 'kendaraan', 'laporan'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'petugas_id' => ['required', 'integer',],
            'laporan_id' => ['required', 'integer'],
            'kendaraan_id' => ['required', 'integer'],
            'awal' => ['required', 'date'],
            'akhir' => ['required', 'date'],
            'kendala' => ['required', 'string'],
            'solusi' => ['required', 'string'],
            'status_proses' => ['required', 'string', 'max:50'],
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => ['required', 'string'],
        ]);
        // ⬇️ Generate nomor otomatis
        // $validated['kode_proses'] = prosespetugas::nomorPk();

        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('uploads/proses', 'public');
        }

        prosespetugas::create($validated);

        alert::success('Success', 'Berhasil menambahkan Proses Kegiatan Petugas');
        return redirect()->route('prosespetugas.index');
    }

    /**
     * Display the specified resource.
     */



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prosespetugas $prosespetuga)
    {
        return view('prosespetugas.edit', [
            'prosespetuga' => $prosespetuga,
            'petugaspelayan' => PetugasPelayanan::all(),
            'laporan' => laporan::all(),
            'kendaraan' => Kendaraan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prosespetugas $prosespetuga)
    {
        $validated = $request->validate([
            'petugas_id' => ['required', 'integer',],
            'laporan_id' => ['required', 'integer'],
            'kendaraan_id' => ['required', 'integer'],
            'awal' => ['required', 'date'],
            'akhir' => ['required', 'date'],
            'kendala' => ['required', 'string'],
            'solusi' => ['required', 'string'],
            'status_proses' => ['required', 'string', 'max:50'],
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => ['required', 'string'],
        ]);

        if ($request->hasFile('bukti')) {
            if ($prosespetuga->bukti && Storage::disk('public')->exists($prosespetuga->bukti)) {
                Storage::disk('public')->delete($prosespetuga->bukti);
            }
            $validated['bukti'] = $request->file('bukti')->store('uploads/proses', 'public');
        }

        $prosespetuga->update($validated);

        alert::success('Success', 'Berhasil mengubah proses Kegiatan');
        return redirect()->route('prosespetugas.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prosespetugas = prosespetugas::findOrFail($id);
        // Hapus file gambar jika ada
        if ($prosespetugas->ktp && Storage::disk('public')->exists($prosespetugas->ktp)) {
            Storage::disk('public')->delete($prosespetugas->ktp);
        }
        $prosespetugas->delete();
        toast('Berhasil menghapus prosespetugas', 'success');
        return redirect()->route('prosespetugas.index');
    }
    public function cetakPdf()
    {
        $prosespetugas = prosespetugas::all();
        $pdf = Pdf::loadView('prosespetugas.pdf', compact('prosespetugas'));
        return $pdf->stream('prosespetugas..pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new prosespetugasExport, 'prosespetugas.xlsx');
    }
}
