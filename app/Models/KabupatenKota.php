<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;

    protected $table = 'kabupatenkota';
    protected $primaryKey = 'id_kabupatenkota';
    public $timestamps = true;

    protected $fillable = [
        'nama_kabupatenkota',
    ];
}
