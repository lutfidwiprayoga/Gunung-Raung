<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    use HasFactory;
    protected $table = 'kuotas';
    protected $fillable = ['periode_id', 'tanggal_pendakian', 'kuota'];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
}
