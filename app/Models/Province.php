<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $fillable = ['province_id', 'negara_id', 'name'];

    public function kotas()
    {
        return $this->hasMany(City::class);
    }
    public function wisatawans()
    {
        return $this->hasMany(Wisatawan::class);
    }

    public function negara()
    {
        return $this->belongsTo(Kebangsaan::class, 'country_id', 'id');
    }
}
