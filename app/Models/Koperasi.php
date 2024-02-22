<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Koperasi extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'koperasi';
    protected $primaryKey = 'id_koperasi';
    public $timestamps = true;

    protected $fillable = [
        'id_admin_kabupatenkota',
        'username',
        'password',
        'password_text',
        'nama_admin_koperasi',
        'kecamatan',
        'kelurahan',
        'alamat',
        'no_telp',
        'nama_koperasi',
        'no_badan_hukum',
        'tanggal_badan_hukum',
        'logo',
        'role',
    ];

    public function adminKabupatenKota()
    {
        return $this->belongsTo(AdminKabupatenKota::class, 'id_admin_kabupatenkota');
    }
    public function isKoperasi()
    {
        return $this->role === 'koperasi';
    }
    public function getAuthIdentifierName()
    {
        return 'id_koperasi';
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
