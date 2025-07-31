<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Bangunan;
use RealRashid\SweetAlert\Facades\Alert;

class BangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bangunan.index');
    }


    // ...

    public function getbangunan(Request $request)
    {
        if ($request->ajax()) {
            $bangunan = bangunan::all();
            return DataTables::of($bangunan)
                ->addIndexColumn()
                ->addColumn('action', function ($bangunan) {
                    return view('partials._action',[
                        'model' => $bangunan,
                        'url_edit' => route('bangunan.edit', $bangunan->id),
                        'url_destroy' => route('bangunan.destroy', $bangunan->id)
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
        return  view('bangunan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bangunan = $request->validate([
            'nama_bangunan' => 'required',
            'biaya' => 'required',
        ]);

        bangunan::create($bangunan);

        alert::success('Success', 'Berhasil menambahkan bangunan');
        return redirect()->route('bangunan.index');
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
    public function edit(bangunan $bangunan)
    {
        return view('bangunan.edit', compact('bangunan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bangunan $bangunan)
    {
        $request->validate([
            'nama_bangunan' => 'required',
            'biaya' => 'required',
        ]);

        $bangunan->update($request->all());

        alert::success('Success', 'Berhasil mengubah bangunan');
        return redirect()->route('bangunan.index')->with('success', 'bangunan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        bangunan::destroy($id);
        toast('Berhasil menghapus data bangunan','success');
        return redirect()->route('bangunan.index');
    }

}
