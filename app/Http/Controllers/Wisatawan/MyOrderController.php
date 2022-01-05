<?php

namespace App\Http\Controllers\Wisatawan;

use App\Http\Controllers\Controller;
use App\Models\CetakPDF;
use App\Models\Kebangsaan;
use App\Models\Notifikasi;
use App\Models\Pesanan;
use App\Models\Rating;
use App\Models\User;
use App\Models\Wisatawan;
use App\Models\WisatawanAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class MyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notif1 = Notifikasi::where('user_id', Auth::user()->id)
            ->join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->where('pesanans.status_pemesanan', '=', 'Pengajuan')
            ->where('pesanans.status_guide', '=', 'Sukses')
            ->orderBy('tanggal_pesan', 'desc')
            ->get();
        $notif2 = Notifikasi::where('user_id', Auth::user()->id)
            ->join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->where('pesanans.status_pemesanan', '=', 'Disetujui')
            ->where('pesanans.status_guide', '=', 'Sukses')
            ->orderBy('tanggal_pesan', 'desc')
            ->get();
        $notif3 = Notifikasi::where('user_id', Auth::user()->id)
            ->join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->where('pesanans.status_pemesanan', '=', 'Selesai')
            ->orderBy('tanggal_pesan', 'desc')
            ->get();
        $rating = Rating::where('review', null)->get();
        $notif4 = Notifikasi::where('user_id', Auth::user()->id)
            ->join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->where('pesanans.status_pemesanan', '=', 'Ditolak')
            ->orderBy('tanggal_pesan', 'desc')
            ->get();
        return view('wisatawan.myorder.index', compact('notif1', 'notif2', 'notif3', 'notif4', 'rating'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan->status_pemesanan = 'Selesai';
        $pesanan->save();
        return redirect()->route('myorder.index');
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
        $rating = Rating::where('id', $id)->first();
        $rating->rating = $request->input('rating');
        $rating->review = $request->review;
        $rating->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
