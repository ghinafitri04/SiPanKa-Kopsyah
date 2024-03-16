<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilihanDps extends Model
{
    use HasFactory;

    protected $table = 'pemilihan_dps';
    public $timestamps = true;

    protected $fillable = [
        'id_koperasi',
        'nama_dps2',
        'id_dps',
        'tanggal_dipilih',
    ];

    protected $primaryKey = 'id'; // Atur primary key sesuai dengan kolom 'id'

    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi');
    }

    public function dps()
    {
        return $this->belongsTo(Dps::class, 'id_dps');
    }
}
