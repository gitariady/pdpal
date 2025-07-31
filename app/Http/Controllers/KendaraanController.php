<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\kendaraan;
use RealRashid\SweetAlert\Facades\Alert;

class kendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kendaraan.index');
    }


    // ...

    public function getkendaraan(Request $request)
    {
        if ($request->ajax()) {
            $kendaraan = kendaraan::all();
            return DataTables::of($kendaraan)
                ->addIndexColumn()
                ->addColumn('action', function ($kendaraan) {
                    return view('partials._action', [
                        'model' => $kendaraan,
                        'url_edit' => route('kendaraan.edit', $kendaraan->id),
                        'url_destroy' => route('kendaraan.destroy', $kendaraan->id)
                    ]);
                })->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kendaraan = $request->validate([
            'nama' => 'required', 'string',
            'kegunaan' => 'required', 'string',
        ]);

        kendaraan::create($kendaraan);

        alert::success('Success', 'Berhasil menambahkan kendaraan');
        return redirect()->route('kendaraan.index');}

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
    public function edit(kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kendaraan $kendaraan)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:55'],
            'kegunaan' => ['required', 'string', 'max:55'],
        ]);

        $kendaraan->update($request->all());

        alert::success('Success', 'Berhasil mengubah kendaraan');
        return redirect()->route('kendaraan.index')->with('success', 'kendaraan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kendaraan::destroy($id);
        alert::success('Success', 'Berhasil menghapus kendaraan');
        return redirect()->route('kendaraan.index');
    }
    //     public function exportPdf()
    // {
    //     $kendaraan = kendaraan::all();

    //     $pdf = Pdf::loadView('kendaraan.kendaraan', compact('kendaraan'));

    //     return $pdf->stream('kendaraan-kendaraan.pdf');
    // }

    // public function exportExcel()
    // {
    //     return Excel::download(new kendaraanExport, 'kendaraan.xlsx');
    // }
}
