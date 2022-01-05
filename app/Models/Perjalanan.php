<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    use HasFactory;
    protected $table = 'perjalanans';
    protected $fillable = ['user_id', 'nama_paket', 'jadwal_mulai', 'jadwal_selesai', 'harga_perjalanan', 'include'];

    public function wisatawans()
    {
        return $this->hasMany(Wisatawan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function notifikasis()
    {
        return $this->hasMany(Notifikasi::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
