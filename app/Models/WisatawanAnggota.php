<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisatawanAnggota extends Model
{
    use HasFactory;
    protected $table = 'wisatawan_anggotas';
    protected $fillable = [
        'ketua_id', 'kebangsaan_id', 'jenis_identitas', 'nomor_identitas', 'nama',
        'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp',
    ];
    public function ketua()
    {
        return $this->belongsTo(Wisatawan::class, 'ketua_id', 'id');
    }
    public function kebangsaan()
    {
        return $this->belongsTo(Kebangsaan::class, 'kebangsaan_id', 'id');
    }
}
