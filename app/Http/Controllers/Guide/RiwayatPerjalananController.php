<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Perjalanan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatPerjalananController extends Controller
{
    public function index()
    {
        // $notif = Notifikasi::whereIn('perjalanan_id', Auth::user()->perjalanans->pluck('id')->toArray())
        //     ->get();
        // $notif = Notifikasi::join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
        //     ->where('pesanans.status_pemesanan', '=', 'Disetujui')
        //     ->where('read', '=', true)
        //     ->get();
        $notif = Notifikasi::join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->whereIn('perjalanan_id', Auth::user()->perjalanans->pluck('id')->toArray())
            ->where('pesanans.status_guide', '=', 'Sukses')
            ->where('read', '=', true)
            ->get();
        $notif1 = Notifikasi::join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->whereIn('perjalanan_id', Auth::user()->perjalanans->pluck('id')->toArray())
            ->where('pesanans.status_pemesanan', '=', 'Disetujui')
            ->where('pesanans.status_guide', '=', 'Sukses')
            ->where('read', '=', true)
            ->get();
        return view('guide.riwayatperjalanan', compact('notif', 'notif1'));
    }
}
