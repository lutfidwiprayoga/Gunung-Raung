<?php

namespace App\Http\Controllers\Wisatawan;

use App\Http\Controllers\Controller;
use App\Models\Kebangsaan;
use App\Models\Pesanan;
use App\Models\Wisatawan;
use App\Models\WisatawanAnggota;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendakianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProses($id)
    {
        $pesanan = Pesanan::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        return view('wisatawan.myorder.proses.show', compact('pesanan', 'wisatawan', 'anggota'));
    }

    public function showMendaki($id)
    {
        $pesanan = Pesanan::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        return view('wisatawan.myorder.mendaki.show', compact('pesanan', 'wisatawan', 'anggota'));
    }

    public function editMendaki($id)
    {
        $kebangsaan = Kebangsaan::get();
        $pesanan = Pesanan::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        return view('wisatawan.myorder.mendaki.update', compact('pesanan', 'wisatawan', 'anggota', 'kebangsaan'));
    }

    public function updateMendaki(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        request()->validate([
            'nama' => 'required',
            'jenis_identitas' => 'required',
            'nomor_identitas' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $anggota = WisatawanAnggota::find($id);
        $anggota->nama = $request->nama;
        $anggota->jenis_identitas = $request->jenis_identitas;
        $anggota->nomor_identitas = $request->nomor_identitas;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->alamat = $request->alamat;
        $anggota->no_hp = $request->no_hp;
        $anggota->save();
        Alert::success('Update Data Anggota Berhasil');
        return redirect()->back();
    }

    public function showSelesai($id)
    {
        $pesanan = Pesanan::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        return view('wisatawan.myorder.selesai.show', compact('pesanan', 'wisatawan', 'anggota'));
    }

    public function showDibatalkan($id)
    {
        $pesanan = Pesanan::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        return view('wisatawan.myorder.dibatalkan.show', compact('pesanan', 'wisatawan', 'anggota'));
    }
}
