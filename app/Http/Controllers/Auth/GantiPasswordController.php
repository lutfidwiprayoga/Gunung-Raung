<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GantiPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        return view('auth.passwords.gantipassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {

        $current_password = auth()->user()->password;
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password Lama Harus Diisi',
            'password.required'         => 'Masukkan Password Baru',
            'password.min'              => 'Password Minimal 8 Karakter',
            'password.confirmed'        => 'Konfirmasi Ulang Password Baru',
        ]);

        if (Hash::check($request->input('current_password'), $current_password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Berhasil Diganti');
        } else {
            return redirect()->back()->with('error', 'Password Lama tidak Sesuai');
        }
    }
}
