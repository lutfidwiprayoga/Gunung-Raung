<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periodes';
    protected $fillable = ['bulan'];

    public function kuota()
    {
        return $this->hasMany(Kuota::class);
    }
}
