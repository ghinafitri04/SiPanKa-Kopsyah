<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class AdminKabupatenKota extends Model implements Authenticatable
{
    use HasFactory;


    protected $table = 'admin_kabupatenkota';
    protected $primaryKey = 'id_admin_kabupatenkota';
    public $timestamps = true;

    protected $fillable = [
        'id_kabupatenkota',
        'id_admin_provinsi',
        'username',
        'password',
        'password_text',
        'role',
    ];

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'id_kabupatenkota');
    }

    public function adminProvinsi()
    {
        return $this->belongsTo(AdminProvinsi::class, 'id_admin_provinsi');
    }
    public function isAdminKabupatenKota()
    {
        return $this->role === 'admin_kabupatenkota';
    }

    public function getAuthIdentifierName()
    {
        return 'id_admin_kabupatenkota';
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
