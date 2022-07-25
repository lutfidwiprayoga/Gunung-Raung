<?php

namespace App\Http\Controllers\Wisatawan;

use App\Http\Controllers\Controller;
use App\Models\CetakPDF;
use App\Models\Pesanan;
use App\Models\Wisatawan;
use App\Models\WisatawanAnggota;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;

class TiketPDFController extends Controller
{
    public function cetakPDF($id)
    {
        $pesanan = Pesanan::find($id);
        $pdf = CetakPDF::find($id);
        $wisatawan = Wisatawan::where('id', $pesanan->ketua_id)->first();
        $null = Wisatawan::where('asal_kota', null)->where('provinsi', null)->get();
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        if ($wisatawan->asal_kota == null) {
            $data = array(
                'kode_pesanan' => $pesanan->kode_pesanan,
                'tanggal_pesan' => $pesanan->tanggal_pesan,
                'status_pemesanan' => $pesanan->status_pemesanan,
                'biaya_tiket' => $pesanan->biaya_tiket,
                'biaya_guide' => $pesanan->biaya_guide,
                'jumlah_tiket' => $pesanan->jumlah_tiket,
                'total_harga' => $pesanan->total_harga,
                'upload_bukti' => $pesanan->upload_bukti,
                'tanggal_naik' => $wisatawan->kuota->tanggal_pendakian,
                'tanggal_turun' => $wisatawan->tanggal_turun,
                'jenis_identitas' => $wisatawan->jenis_identitas,
                'nomor_identitas' => $wisatawan->nomor_identitas,
                'nama_guide' => $wisatawan->perjalanan->user->name,
                'paket_guide' => $wisatawan->perjalanan->nama_paket,
                'nama' => $wisatawan->nama,
                'email' => $wisatawan->email,
                'tanggal_lahir' => $wisatawan->tanggal_lahir,
                'jenis_kelamin' => $wisatawan->jenis_kelamin,
                'alamat' => $wisatawan->alamat,
                'no_hp' => $wisatawan->no_hp,
                'kebangsaan' => $wisatawan->kebangsaan->negara,
                'pekerjaan' => $wisatawan->pekerjaan,
                'foto_identitas' => $wisatawan->foto_identitas,
            );
        } else {
            $data = array(
                'kode_pesanan' => $pesanan->kode_pesanan,
                'tanggal_pesan' => $pesanan->tanggal_pesan,
                'status_pemesanan' => $pesanan->status_pemesanan,
                'biaya_tiket' => $pesanan->biaya_tiket,
                'biaya_guide' => $pesanan->biaya_guide,
                'jumlah_tiket' => $pesanan->jumlah_tiket,
                'total_harga' => $pesanan->total_harga,
                'upload_bukti' => $pesanan->upload_bukti,
                'tanggal_naik' => $wisatawan->kuota->tanggal_pendakian,
                'tanggal_turun' => $wisatawan->tanggal_turun,
                'jenis_identitas' => $wisatawan->jenis_identitas,
                'nomor_identitas' => $wisatawan->nomor_identitas,
                'nama_guide' => $wisatawan->perjalanan->user->name,
                'paket_guide' => $wisatawan->perjalanan->nama_paket,
                'nama' => $wisatawan->nama,
                'email' => $wisatawan->email,
                'tanggal_lahir' => $wisatawan->tanggal_lahir,
                'jenis_kelamin' => $wisatawan->jenis_kelamin,
                'asal_kota' => $wisatawan->city->name,
                'provinsi' => $wisatawan->province->name,
                'alamat' => $wisatawan->alamat,
                'no_hp' => $wisatawan->no_hp,
                'kebangsaan' => $wisatawan->kebangsaan->negara,
                'pekerjaan' => $wisatawan->pekerjaan,
                'foto_identitas' => $wisatawan->foto_identitas,
            );
        }
        $pdf = PDF::loadView('wisatawan.tiketpdf', compact('wisatawan', 'anggota', 'pdf', 'data', 'null', 'pesanan'))->setPaper('A4', 'potrait');
        return $pdf->download('TiketbookingRaung.pdf');
        // return $pdf->stream();
    }
}
