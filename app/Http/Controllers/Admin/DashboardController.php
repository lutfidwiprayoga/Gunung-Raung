<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_guide = User::where('level', 'guide')->get();
        $tiket = Tiket::get();
        $riwayat = Notifikasi::where('read', '=', true)
            ->join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->orderBy('pesanans.tanggal_pesan', 'asc')
            ->get();
        return view('admin.home', compact('total_guide', 'riwayat', 'tiket'));
    }
}
