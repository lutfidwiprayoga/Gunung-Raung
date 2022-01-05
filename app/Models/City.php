<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = ['province_id', 'city_id', 'name'];

    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function wisatawans()
    {
        return $this->hasMany(Wisatawan::class);
    }
}
