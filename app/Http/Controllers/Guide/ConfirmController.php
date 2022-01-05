<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Mail\Wisatawan\WisatawanMailAcc;
use App\Mail\Wisatawan\WisatawanMailDitolak;
use App\Mail\WisatawanMail;
use App\Mail\WisatawanMailDiterima;
use App\Models\Notifikasi;
use App\Models\Pesanan;
use App\Models\Wisatawan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfirmController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function terima($id)
    {
        $tanggal_now = Carbon::now();
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan->status_guide = 'Sukses';
        $tgl_exp = strtotime('+2 hours', strtotime($tanggal_now)); // jangka waktu +2 jam
        $pesanan->maksimal_pembayaran = date("Y-m-d H:i:s", $tgl_exp); //Tanggal Maksimal Pembayaran
        $pesanan->save();
        $notif = Notifikasi::find($id);
        $notif->read = true;
        $notif->save();
        $tanggal_pesan = Carbon::now()->format('Y-m-d H:i:s');
        $data = array(
            'kode_pesanan' => $pesanan->kode_pesanan,
            'tanggal_pesan' => date("l, d-m-Y, H:i:s", strtotime($pesanan->tanggal_pesan)),
            'nama' => $pesanan->wisatawan->nama,
            'email' => $pesanan->wisatawan->email,
            'no_hp' => $pesanan->wisatawan->no_hp,
            'jumlah_tiket' => $pesanan->jumlah_tiket,
            'tanggal_naik' => date('l, d-m-Y', strtotime($pesanan->wisatawan->tanggal_naik)),
            'tanggal_turun' => date('l, d-m-Y', strtotime($pesanan->wisatawan->tanggal_turun)),
            'nama_guide' => $pesanan->wisatawan->perjalanan->user->name,
            'maksimal_pembayaran' => $pesanan->maksimal_pembayaran,
            'total_harga' => $pesanan->total_harga,
        );
        Mail::to($pesanan->wisatawan->email)->send(new WisatawanMailAcc($data), function ($message) use ($tanggal_pesan) {
            $message->from('adminraung3344mdpl@gmail.com', 'Admin');
            $message->date($tanggal_pesan);
            $message->replyTo('adminraung3344mdpl@gmail.com', 'Admin');
            $message->subject('Booking Online Mt. Raung 3344 Mdpl');
        });
        return redirect()->route('guide.dashboard');
    }

    public function tolak($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan->status_guide = 'Gagal';
        $pesanan->save();
        $notif = Notifikasi::find($id);
        $notif->read = true;
        $notif->save();
        $tanggal_pesan = Carbon::now()->format('Y-m-d H:i:s');
        $data = array(
            'nama' => $pesanan->wisatawan->nama,
        );
        Mail::to($pesanan->wisatawan->email)->send(new WisatawanMailDitolak($data), function ($message) use ($tanggal_pesan) {
            $message->from('adminraung3344mdpl@gmail.com', 'Admin');
            $message->date($tanggal_pesan);
            $message->replyTo('adminraung3344mdpl@gmail.com', 'Admin');
            $message->subject('Booking Online Mt. Raung 3344 Mdpl');
        });
        return redirect()->route('guide.dashboard');
    }
}
