<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_role',
        'username',
        'password',
        'nama_instansi',
        'region',
    ];

    // Relasi dengan model Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
