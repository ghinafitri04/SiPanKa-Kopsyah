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
        'id_kabupatenkota',
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

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, 'id_kabupatenkota');
    }

    public function adminKabupatenKota()
    {
        return $this->belongsTo(AdminKabupatenKota::class, 'id_admin_kabupatenkota');
    }
    public function isKoperasi()
    {
        return $this->role === 'koperasi';
    }
}
