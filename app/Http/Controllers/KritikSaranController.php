<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class KritikSaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store']);
    }



    public function index()
    {
        $kritiksaran = \App\Models\KritikSaran::all();
        return view('kritiksaran.index', compact('kritiksaran'));
    }

    public function getkritiksaran(Request $request)
    {
        if ($request->ajax()) {
            $kritiksaran = \App\Models\KritikSaran::all();
            return DataTables::of($kritiksaran)
                ->addIndexColumn()
                ->addColumn('action', function ($kritiksaran) {
                    return view('partials._action', [
                        'model' => $kritiksaran,
                        'url_edit' => route('kritiksaran.edit', $kritiksaran->id),
                        'url_destroy' => route('kritiksaran.destroy', $kritiksaran->id)
                    ]);
                })->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        // return view('kritiksaran.create'); // buat file resources/views/kritiksaran/create.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        KritikSaran::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        Alert::success('Terima Kasih', 'Kritik dan Saran Anda telah kami terima');

        return redirect()->back()->with('success', 'Terima kasih! Kritik dan Saran Anda telah kami terima.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // destroy data from database
        KritikSaran::destroy($id);
        toast('Kritik dan Saran berhasil dihapus', 'success');
        return redirect()->back();
    }
}
