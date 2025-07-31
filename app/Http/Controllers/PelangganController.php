<?php

namespace App\Http\Controllers;

use App\Exports\PelangganExport;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pelanggan.index');
    }
    public function search(Request $request)
    {
        $search = $request->get('search', '');
        $proses = pelanggan::query()
            ->when($search, fn($q) => $q->where('id', 'like', "%$search%"))
            ->limit(5)
            ->get(['id']);

        return response()->json(
            $proses->map(fn($item) => ['id' => $item->id, 'text' => ' ID ' . $item->id])
        );
    }

    public function getDetail($id)
{
    $proses = pelanggan::with( 'pelanggan')->find($id);
    if (!$proses) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
    return $proses; // Untuk test
}



    public function show($id)
    {
        $data = pelanggan::find($id);

        if (!$data) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'id'                => $data->id,
            'pdpal_id'         => $data->pdpal_id ?? '-',
            'pdam_id'         => $data->pdam_id ?? '-',
            'nama'              => $data->nama ?? '-',
            'ktp'               => $data->ktp ? asset('storage/' . $data->ktp) : null,
            'bangunan'          => $data->bangunan ?? '-',
            'kecamatan'          => $data->kecamatan ?? '-',
            'kelurahan'          => $data->kelurahan ?? '-',
            'alamat'            => $data->alamat ?? '-',
            'waktu'              => $data->waktu ?? '-',
            'status'             => $data->status ?? '-',
            'keterangan'        => $data->keterangan ?? '-',
        ]);
    }
    public function getpelanggan(Request $request)
    {
        if ($request->ajax()) {
            $pelanggan = pelanggan::all();
            return DataTables::of($pelanggan)
                ->addIndexColumn()
                ->addColumn('ktp', function ($row) {
                    if ($row->ktp && Storage::disk('public')->exists($row->ktp)) {
                        return '<img src="' . asset('storage/' . $row->ktp) . '" width="80">';
                    }
                    return '-';
                })
                ->addColumn('action', function ($pelanggan) {
                    return view('partials.pelanggan', [
                        'model' => $pelanggan,
                        'url_show' => route('pelanggan.show', $pelanggan->id),
                        'url_edit' => route('pelanggan.edit', $pelanggan->id),
                        'url_destroy' => route('pelanggan.destroy', $pelanggan->id)
                    ]);
                })
                ->rawColumns(['ktp', 'action']) // agar <img> dan tombol HTML tidak di-escape
                ->make(true);
        }
    }
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pdpal_id' => ['required', 'integer', ],
            'pdam_id' => ['required', 'integer', ],
            'nama' => ['required', 'string', 'max:50'],
            'ktp' => 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048',
            'bangunan' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'waktu' => ['required', 'date'],
            'status' => ['required', 'string', 'max:35'],
            'keterangan' => ['required', 'string'],
        ]);
        if ($request->hasFile('ktp')) {
            $validated['ktp'] = $request->file('ktp')->store('uploads/pelanggan', 'public');
        }
        pelanggan::create($validated);
        alert::success('Success', 'Berhasil menambahkan pelanggan');
        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'pdpal_id' => ['required', 'integer', ],
            'pdam_id' => ['required', 'integer', ],
            'nama' => ['required', 'string', 'max:50'],
            'ktp' => 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048',
            'bangunan' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'waktu' => ['required', 'date'],
            'status' => ['required', 'string', 'max:35'],
            'keterangan' => ['required', 'string'],
        ]);
        $pelanggan = pelanggan::findOrFail($id);
        if ($request->hasFile('ktp')) {
            $validated['ktp'] = $request->file('ktp')->store('uploads/pelanggan', 'public');
            if ($pelanggan->ktp && Storage::disk('public')->exists($pelanggan->ktp)) {
                Storage::disk('public')->delete($pelanggan->ktp);
            }
        }
        $pelanggan->update($validated);
        alert::success('Success', 'Berhasil mengubah pelanggan');
        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->delete();
        alert::success('Success', 'Berhasil menghapus pelanggan');
        return redirect()->route('pelanggan.index');
    }
    public function exportExcel()
    {
        return Excel::download(new PelangganExport, 'laporan-pelanggan.xlsx');
    }
    public function cetakPdf()
    {
        $pelanggan = Pelanggan::all();
        $pdf = PDF::loadview('pelanggan.pdf', compact('pelanggan'));
        return $pdf->setPaper('a4', 'landscape')->stream('pelanggan.pdf');
    }
}

