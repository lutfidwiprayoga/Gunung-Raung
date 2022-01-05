<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfilController extends Controller
{
    public function __construct()
    {
        // $this->UserModel = new UserModel();
        $this->middleware(['auth', 'verified']);
    }

    public function edit()
    {
        if (Auth::user()->level == 'wisatawan') {
            $data = 'My Profil';
            $user = User::where('id', Auth::user()->id)->first();
            return view('wisatawan.editprofil', compact('data', 'user'));
        } else {
            $data = 'My Profil';
            $user = User::where('id', Auth::user()->id)->first();
            return view('auth.profil', compact('data', 'user'));
        }
    }

    public function update(Request $request)
    {
        request()->validate([
            'foto' => 'mimes:jpg,jpeg,png|max:1000',
        ], [
            'foto.mimes' => 'Format Harus JPG,JPEG,PNG !!',
            'foto.max' => 'Ukuran Foto Maksimal 1 MB !!',
        ]);

        $id_user = Auth::user()->id;
        $user = User::find($id_user);

        //jika user update foto
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto_profil/', $request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
            $user->save();
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_hp = $request->no_hp;
        $user->save();

        return redirect()->route('profil.edit')->with('success', 'Data Berhasil Di Update');
    }
}
