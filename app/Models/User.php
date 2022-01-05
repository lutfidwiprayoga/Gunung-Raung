<?php

namespace App\Models;

use App\Http\Controllers\PesananController;
use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'level',
        'jenis_kelamin',
        'no_hp',
        'foto',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function perjalanans()
    {
        return $this->hasMany(Perjalanan::class);
    }
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
    public function wisatawans()
    {
        return $this->hasOne(Wisatawan::class);
    }
    public function notifikasis()
    {
        return $this->hasMany(Notifikasi::class);
    }
}
