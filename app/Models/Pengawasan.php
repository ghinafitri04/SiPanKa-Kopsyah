<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengawasan extends Model
{
    use HasFactory;

    protected $table = 'pengawasan';

    protected $fillable = [
        'id_admin_provinsi',
        'id_dps',
        'id_koperasi',
        'hasil',
        'status',
        'permasalahan',
        'saran',
        'tanggal_pengawasan',
    ];
    protected $primaryKey = 'id';

    // Relasi dengan admin_provinsi
    public function adminProvinsi()
    {
        return $this->belongsTo(AdminProvinsi::class, 'id_admin_provinsi');
    }

    // Relasi dengan dps
    public function dps()
    {
        return $this->belongsTo(Dps::class, 'id_dps');
    }

    // Relasi dengan koperasi
    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi');
    }
}
