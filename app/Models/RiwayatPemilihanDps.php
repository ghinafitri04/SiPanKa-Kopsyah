<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPemilihanDps extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pemilihan_dps';
    public $timestamps = true;

    protected $fillable = [
        'id_pemilihan_dps',
        'id_koperasi',
        'id_dps',
        'nama_dps2',
        'tanggal_pemilihan',
    ];

    protected $primaryKey = 'id_riwayat'; // Atur primary key sesuai dengan kolom 'id'

    // Relasi dengan model PemilihanDps
    public function pemilihanDps()
    {
        return $this->belongsTo(PemilihanDps::class, 'id_pemilihan_dps');
    }

    // Relasi dengan model Koperasi
    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi');
    }

    // Relasi dengan model Dps
    public function dps()
    {
        return $this->belongsTo(Dps::class, 'id_dps');
    }
}
