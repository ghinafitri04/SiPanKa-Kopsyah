<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Dps extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'dps';
    protected $primaryKey = 'id_dps';
    public $timestamps = true;

    protected $fillable = [
        'id_admin_kabupatenkota',
        'username',
        'password',
        'password_text',
        'nama_lengkap',
        'kontak',
        'alamat',
        'sertifikat',
        'role',
    ];

    // Relationships
    public function adminKabupatenKota()
    {
        return $this->belongsTo(AdminKabupatenKota::class, 'id_admin_kabupatenkota');
    }
    public function isDps()
    {
        return $this->role === 'dps';
    }

    public function getAuthIdentifierName()
    {
        return 'id_dps';
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
