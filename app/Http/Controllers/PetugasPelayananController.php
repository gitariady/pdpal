<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\petugaspelayanan;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\petugaspelayananExport;
use Maatwebsite\Excel\Facades\Excel;

class PetugasPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('petugaspelayanan.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search', '');
        $petugas = PetugasPelayanan::query()
            ->when($search, fn($q) => $q->where('nama', 'like', "%$search%"))
            ->limit(4)
            ->get(['id', 'nama as text']);
        return response()->json($petugas);
    }

    // ...

    public function getpetugaspelayanan(Request $request)
    {
        if ($request->ajax()) {
            $petugaspelayanan = petugaspelayanan::all();
            return DataTables::of($petugaspelayanan)
                ->addIndexColumn()
                ->addColumn('action', function ($petugaspelayanan) {
                    return view('partials._action', [
                        'model' => $petugaspelayanan,
                        'url_edit' => route('petugaspelayanan.edit', $petugaspelayanan->id),
                        'url_destroy' => route('petugaspelayanan.destroy', $petugaspelayanan->id)
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
        return  view('petugaspelayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $petugaspelayanan = $request->validate([
            'nip' => 'required|string|max:45',
            'nama' => 'required|string|max:45',
            'jabatan' => 'required|string|max:45',
            'bidang' => 'required|string|max:45',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|max:35|email',
            'alamat' => 'required|string',
        ]);

        petugaspelayanan::create($petugaspelayanan);

        alert::success('Success', 'Berhasil menambahkan petugaspelayanan');
        return redirect()->route('petugaspelayanan.index')->with('success', 'petugaspelayanan berhasil ditambahkan');
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
    public function edit(petugaspelayanan $petugaspelayanan)
    {
        return view('petugaspelayanan.edit', compact('petugaspelayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, petugaspelayanan $petugaspelayanan)
    {
        $request->validate([
            'nip' => 'required|string|max:45',
            'nama' => 'required|string|max:45',
            'jabatan' => 'required|string|max:45',
            'bidang' => 'required|string|max:45',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|max:35|email',
            'alamat' => 'required|string',
        ]);

        $petugaspelayanan->update($request->all());

        alert::success('Success', 'Berhasil mengubah petugaspelayanan');
        return redirect()->route('petugaspelayanan.index')->with('success', 'petugaspelayanan berhasil diubah');
    }

    // public function getData()
    // {
    //     $search = request()->query('search');
    //     $query = petugaspelayanan::query();
    //     $petugaspelayanan = $query->where('nama', 'like', '%' . $search . '%')->get();
    //     return response()->json($petugaspelayanan);
    // }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        petugaspelayanan::destroy($id);
        toast('Berhasil menghapus petugaspelayanan','success');
        return redirect()->route('petugaspelayanan.index')->with('success', 'petugaspelayanan berhasil dihapus');
    }

    //     public function exportPdf()
    // {
    //     $petugaspelayanan = petugaspelayanan::all();

    //     $pdf = Pdf::loadView('petugaspelayanan.petugaspelayanan', compact('petugaspelayanan'));

    //     return $pdf->stream('petugaspelayanan-petugaspelayanan.pdf');
    // }

    // public function exportExcel()
    // {
    //     return Excel::download(new petugaspelayananExport, 'petugaspelayanan.xlsx');
    // }
}
