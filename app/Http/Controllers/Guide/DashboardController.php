<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $perjalanan = Perjalanan::where('user_id', Auth::user()->id)->get();
        $notifikasi = Notifikasi::whereIn('perjalanan_id', Auth::user()->perjalanans->pluck('id')->toArray())->get();
        $perjalanantercapai = Notifikasi::join('pesanans', 'notifikasis.pesanan_id', '=', 'pesanans.id')
            ->whereIn('perjalanan_id', Auth::user()->perjalanans->pluck('id')->toArray())
            ->where('pesanans.status_guide', '=', 'Sukses')
            ->where('read', '=', true)
            ->get();
        return view('guide.dashboard', compact('perjalanan', 'notifikasi', 'perjalanantercapai'));
    }
}
