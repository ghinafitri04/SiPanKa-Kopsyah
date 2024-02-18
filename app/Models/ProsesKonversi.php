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
        'rapat_anggota_pdf_data',
        'perubahan_akad_pdf_data',
        'perubahan_pad_gambar_data',
        'nama_notaris',
        'pengesahan_pad_pdf_data',
    ];
}


