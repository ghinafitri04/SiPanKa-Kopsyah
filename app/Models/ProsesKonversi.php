<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class ProsesKonversi extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'proses_konversi';
    protected $primaryKey = 'id_proses_konversi';
    public $timestamps = true;

    protected $fillable = [
        'id_koperasi',
        'rapat_anggota',
        'perubahan_pad',
        'nama_notaris',
        'pengesahan_pad',
        'Tanggal',
    ];

    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi');
    }

    // Metode untuk autentikasi
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // Jika Anda tidak menggunakan "remember me" token
    }

    public function setRememberToken($value)
    {
        // Jika Anda tidak menggunakan "remember me" token
    }

    public function getRememberTokenName()
    {
        return null; // Jika Anda tidak menggunakan "remember me" token
    }
}
