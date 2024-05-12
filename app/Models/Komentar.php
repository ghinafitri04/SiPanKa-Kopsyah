<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentars';

    protected $primaryKey = 'id_komentar';

    protected $fillable = [
        'id_pengawasan',
        'username',
        'komentar',
        'created_at',
    ];

    public function pengawasan()
    {
        return $this->belongsTo(Pengawasan::class, 'id_pengawasan');
    }
}
