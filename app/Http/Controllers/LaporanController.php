<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['store']);
    }
    public function index()
    {
        return view('laporan.index');
    }

    public function search(Request $request)
    {
        $query = Laporan::query();

        if ($request->search != '') {
            $query->where('id', 'like', "%{$request->search}%")
                  ->orWhere('nama', 'like', "%{$request->search}%");
        }

        $laporan = $query->limit($request->limit ?? 5)->get(['id', 'nama']);
        return response()->json($laporan);
    }






    public function getDetail($id)
    {
        $laporan = Laporan::find($id);
        if (!$laporan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return $laporan;
    }


    public function show($id)
    {
        $data = Laporan::find($id);

        if (!$data) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'id'                => $data->id,
            'jenis_laporan'     => $data->jenis_laporan ?? '-',
            'status_pelaporan'  => $data->status_pelaporan ?? '-',
            'nama'              => $data->nama ?? '-',
            'no_hp'             => $data->no_hp ?? '-',
            'alamat'            => $data->alamat ?? '-',
            'ktp'               => $data->ktp ? asset('storage/' . $data->ktp) : null,
            'keterangan'        => $data->keterangan ?? '-',
            'created_at'        => $data->created_at ?? '-'
        ]);
    }

    public function getlaporan(Request $request)
    {
        if ($request->ajax()) {
            $laporan = Laporan::all();
            return DataTables::of($laporan)
                ->addIndexColumn()
                ->addColumn('ktp', function ($row) {
                    if ($row->ktp && Storage::disk('public')->exists($row->ktp)) {
                        return '<img src="' . asset('storage/' . $row->ktp) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('action', function ($laporan) {
                    return view('partials.laporan', [
                        'model' => $laporan,
                        'url_show' => route('laporan.show', $laporan->id),
                        'url_edit' => route('laporan.edit', $laporan->id),
                        'url_destroy' => route('laporan.destroy', $laporan->id)
                    ]);
                })
                ->rawColumns(['ktp', 'action'])
                ->make(true);
        }
    }

    public function create()
    {
        // return view('laporan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_laporan' => 'required|string|max:35',
            'status_pelaporan' => 'required|string|max:35',
            'nama' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'required|string',
        ]);

        // $validated['kode_proses'] = Laporan::nomorLp();

        if ($request->hasFile('ktp')) {
            $validated['ktp'] = $request->file('ktp')->store('uploads/laporan', 'public');
        }

        Laporan::create($validated);

        Alert::success('Success', ' Laporan Berhasil Kami Terima');
        return redirect()->back()->with('success', 'Laporan Berhasil Dikirim ');
    }

    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'jenis_laporan' => 'required|string|max:35',
            'status_pelaporan' => 'required|string|max:35',
            'nama' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'required|string',
        ]);

        if ($request->hasFile('ktp')) {
            if ($laporan->ktp && Storage::disk('public')->exists($laporan->ktp)) {
                Storage::disk('public')->delete($laporan->ktp);
            }
            $validated['ktp'] = $request->file('ktp')->store('uploads/laporan', 'public');
        }

        $laporan->update($validated);

        Alert::success('Success', 'Berhasil mengubah laporan');
        return redirect()->route('laporan.index');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        if ($laporan->ktp && Storage::disk('public')->exists($laporan->ktp)) {
            Storage::disk('public')->delete($laporan->ktp);
        }
        $laporan->delete();

        toast('Berhasil menghapus laporan', 'success');
        return redirect()->route('laporan.index');
    }

    public function cetakPdf()
    {
        $laporan = Laporan::all();
        $pdf = Pdf::loadview('laporan._laporan', compact('laporan'));
        return $pdf->setPaper('a4', 'landscape')->stream('laporan.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
