<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = [
        'ketua_id', 'kode_pesanan', 'tanggal_pesan', 'maksimal_pembayaran', 'status_guide', 'status_pemesanan', 'jumlah_tiket', 'biaya_tiket', 'biaya_guide',
        'total_harga', 'upload_bukti'
    ];

    public function notifikasis()
    {
        return $this->hasMany(Notifikasi::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function wisatawan()
    {
        return $this->belongsTo(Wisatawan::class, 'ketua_id', 'id');
    }

    public function cetakpdfs()
    {
        return $this->hasMany(CetakPDF::class);
    }
}
