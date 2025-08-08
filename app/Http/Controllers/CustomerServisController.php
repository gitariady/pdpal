<?php

namespace App\Http\Controllers;

use App\Exports\CustomerServisExport;
use yajra\DataTables\Facades\DataTables;
use App\Models\CustomerServis;
use App\Models\Pelanggan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class CustomerServisController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        $customerservis = CustomerServis::with('pelanggan')->select('customer_servis.*');
        return view('customerservis.index', compact('pelanggans'));
    }
    public function getServisByType(Request $request)
    {
        $type = $request->get('type');

        // Mapping type ke model
        $modelMap = [
            'TagihanPerbaikan'      => \App\Models\TagihanPerbaikan::class,
            'TagihanPemasangan'     => \App\Models\TagihanPemasangan::class,
            'BerhentiBerlangganan'  => \App\Models\BerhentiBerlangganan::class,
        ];

        if (!array_key_exists($type, $modelMap)) {
            return response()->json(['data' => []], 400);
        }

        $modelClass = $modelMap[$type];
        $data = $modelClass::select('id')->get(); // ambil id, bisa tambahkan kolom lain jika ada

        return response()->json(['data' => $data]);
    }



    public function getcustomerservis(Request $request)
    {
        if ($request->ajax()) {
            $customerservis = CustomerServis::with('pelanggan')->select('customer_servis.*');

            return datatables()->of($customerservis)
                ->addIndexColumn()
                ->addColumn('pelanggan_nama', function ($row) {
                    return $row->pelanggan->nama ?? '-';
                })
                ->addColumn('action', function ($row) {
                    return view('partials._3action', [
                        'model' => $row,
                        'url_show' => route('customerservis.show', $row->id),
                        'url_edit' => route('customerservis.edit', $row->id),
                        'url_destroy' => route('customerservis.destroy', $row->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('customerservis.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id'    => 'required|integer',
            'servisable_id'   => 'required|integer',
            'servisable_type' => 'required|in:TagihanPerbaikan,TagihanPemasangan,BerhentiBerlangganan',
            'catatan'         => 'nullable|string',
        ]);

        CustomerServis::create($validated);

        Alert::success('Data Customer Servis berhasil ditambahkan');

        return redirect()->route('customerservis.index');
    }

    public function show($id)
    {
        $customerservis = CustomerServis::findOrFail($id);
        $pelanggans = Pelanggan::all(); // eager load pelanggan
        return view('customerservis.show', compact('customerservis','pelanggans'));
    }


    public function edit($id)
    {
        $customerservis = CustomerServis::findOrFail($id);
        $pelanggans = Pelanggan::all();
        return view('customerservis.edit', compact('customerservis', 'pelanggans'));
    }


    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'pelanggan_id'    => 'required|integer',
        'servisable_id'   => 'required|integer',
        'servisable_type' => 'required|in:TagihanPerbaikan,TagihanPemasangan,BerhentiBerlangganan',
        'catatan'         => 'nullable|string',
    ]);

    $customerservis = CustomerServis::findOrFail($id);
    $customerservis->update($validated);

    Alert::success('Data Customer Servis berhasil diperbarui');

    return redirect()->route('customerservis.index');
}


    public function destroy(string $id)
    {
        if (!in_array(Auth::user()->level, ['admin'])) {
            abort(403, 'Tidak diizinkan masuk halaman ini.');
        }
        CustomerServis::destroy($id); // Pastikan C besar
        Alert::toast('Data Customer Servis berhasil dihapus', 'error');

        return redirect()->route('customerservis.index');
    }
    public function cetakPdf()
    {
        $customerservis = CustomerServis::all();
        $pdf = PDF::loadView('customerservis.pdf', compact('customerservis'));
        return $pdf->setPaper('a4', 'landscape')->stream('customerservis.pdf');
    }
    public function exportExcel()
    {
        return Excel::download(new CustomerServisExport, 'customerservis.xlsx');
    }
}

