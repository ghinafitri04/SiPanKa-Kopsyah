<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesKonversi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_proses_konversi'; // Menyesuaikan dengan nama kolom kunci utama Anda

    protected $table = 'proses_konversi';

    protected $fillable = [
        'id_koperasi',
        'rapat_anggota',
        'perubahan_pad',
        'nama_notaris',
        'bukti_notaris',
        'pengesahan_pad',
        'tanggal',
    ];

    // Define relationship with the Koperasi model
    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi');
    }
}
