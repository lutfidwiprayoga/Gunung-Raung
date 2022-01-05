<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CetakPDF;
use App\Models\Notifikasi;
use App\Models\Pesanan;
use App\Models\Wisatawan;
use App\Models\WisatawanAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WisatawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $pesanan = Pesanan::latest()->where('status_pemesanan', 'Disetujui')->where('status_pemesanan', 'Selesai')->orderBy('tanggal_pesan', 'asc')->when(
            request()->cari,
            function ($pesanan) {
                $pesanan = $pesanan->where('nama', 'like', '%' . request()->cari . '%');
            }
        )->paginate(10);
        $riwayat1 = Notifikasi::where('read', '=', true)
            ->join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->where('pesanans.status_pemesanan', '=', 'Disetujui')
            ->orderBy('pesanans.tanggal_pesan', 'desc')
            ->get();
        $riwayat2 = Notifikasi::where('read', '=', true)
            ->join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->where('pesanans.status_pemesanan', '=', 'Selesai')
            ->orderBy('pesanans.tanggal_pesan', 'desc')
            ->get();
        return view('admin.riwayat_wisatawan.index', compact('pesanan', 'riwayat1', 'riwayat2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanan::find($id);
        $pdf = CetakPDF::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        return view('admin.riwayat_wisatawan.detail', compact('wisatawan', 'anggota', 'pesanan', 'pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Hapus Foto
        $pesanan = Pesanan::find($id);
        $wisatawan = Wisatawan::find($id);
        if ($wisatawan->foto_identitas <> "") {
            unlink(public_path('foto_wisatawan') . '/' . $wisatawan->foto_identitas);
        }
        $pesanan->delete();
        return redirect()->route('admin.riwayatwisatawan.index')->with('success', 'Data berhasil dihapus!');
    }
}
