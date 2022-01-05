<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebangsaan extends Model
{
    use HasFactory;
    protected $table = 'kebangsaans';
    protected $fillable = ['tiket_id', 'country_id', 'negara', 'code'];

    public function provinsis()
    {
        return $this->hasMany(Province::class);
    }
    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'tiket_id', 'id');
    }
    public function wisatawans()
    {
        return $this->hasMany(Wisatawan::class);
    }
    public function wisatawananggotas()
    {
        return $this->hasMany(WisatawanAnggota::class, 'kebangsaan_id', 'id');
    }
}
