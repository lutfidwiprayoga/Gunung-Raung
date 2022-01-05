<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CetakPDF;
use App\Models\Pesanan;
use App\Models\Wisatawan;
use App\Models\WisatawanAnggota;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class TiketPDFController extends Controller
{
    public function cetakPDF($id)
    {
        $pdf = CetakPDF::find($id);
        $wisatawan = Wisatawan::find($id);
        $anggota = WisatawanAnggota::where('ketua_id', $wisatawan->id)->get();
        $pdf = PDF::loadView('wisatawan.tiketpdf', compact('wisatawan', 'anggota', 'pdf'))->setPaper('A4', 'potrait');
        return $pdf->download('tiket.pdf');
    }
}
