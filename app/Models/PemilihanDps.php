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
        'id_dps',
    ];

    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi');
    }

    public function dps()
    {
        return $this->belongsTo(Dps::class, 'id_dps');
    }

    // Set primary key to an array to indicate a composite primary key
    protected $primaryKey = ['id_koperasi', 'id_dps'];

    // Indicates that the IDs are not auto-incrementing
    public $incrementing = false;
}
