<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = ['id', 'pesanan_id', 'wisatawan_id', 'perjalanan_id', 'user_id', 'rating', 'review'];

    public function perjalanan()
    {
        return $this->belongsTo(Perjalanan::class, 'perjalanan_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    public function wisatawan()
    {
        return $this->belongsTo(Wisatawan::class, 'wisatawan_id', 'id');
    }
}
