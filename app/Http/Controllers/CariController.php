<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Wisatawan;
use Illuminate\Http\Request;

class CariController extends Controller
{

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table pegawai sesuai pencarian data
        $pesanan = Pesanan::where('kode_pesanan', 'like', "%" . $cari . "%")->get();
        return view('frontend.checkout', compact('pesanan'));
    }
}
