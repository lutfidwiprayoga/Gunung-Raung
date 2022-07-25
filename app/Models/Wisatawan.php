<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    use HasFactory;
    protected $table = 'wisatawans';
    protected $fillable = [
        'kebangsaan_id', 'tanggal_id', 'tanggal_turun', 'jenis_identitas', 'nomor_identitas', 'nama', 'email',
        'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp', 'pekerjaan', 'asal_kota', 'provinsi',
        'foto_identitas', 'user_id', 'perjalanan_id',
    ];

    public function perjalanan()
    {
        return $this->belongsTo(Perjalanan::class, 'perjalanan_id', 'id');
    }
    public function kuota()
    {
        return $this->belongsTo(Kuota::class, 'tanggal_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'ketua_id', 'id');
    }
    public function wisatawananggotas()
    {
        return $this->hasMany(WisatawanAnggota::class);
    }
    public function kebangsaan()
    {
        return $this->belongsTo(Kebangsaan::class, 'kebangsaan_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'asal_kota', 'id');
    }
    public function cetakpdfs()
    {
        return $this->hasMany(CetakPDF::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
