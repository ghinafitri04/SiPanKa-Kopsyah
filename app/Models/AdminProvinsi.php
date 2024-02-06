<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProvinsi extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'admin_provinsi';
    protected $primaryKey = 'id_admin_provinsi';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'password',
        'password_text',
        'role',
    ];

    // Implementasi metode dari antarmuka Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id_admin_provinsi';
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
    public function isAdminProvinsi()
    {
        return $this->role === 'admin_provinsi';
    }
}
