<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Success', 'Berhasil menambahkan User');
        return redirect()->route('users.index');
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Success', 'Berhasil mengupdate User');
        return redirect()->route('users.index');
    }
    public function gantipassword(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed', // gunakan input password_confirmation
        ],[
            'old_password.required' => 'Password lama harus diisi.',
            'password.required' => 'Password baru dan konfirmasi password harus diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Password baru dan komfirmasi password tidak cocok .',

        ]);
        $user = User::find(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            toast()->error('Password lama tidak cocok');
            return redirect()->route('admin');
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Success', 'Berhasil mengganti password');

        // admin mungkin kembali ke daftar user, user biasa ke halaman profil
        return redirect()->route('admin');    // ubah sesuai kebutuhan
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        if(Auth::id() == $user->id){
            toast('Anda tidak dapat menghapus diri sendiri', 'error');
            return redirect()->route('users.index');
        }
        $user->delete();
        toast('Berhasil menghapus User', 'success');
        return redirect()->route('users.index');
    }
}
