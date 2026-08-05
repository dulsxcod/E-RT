<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'NIK',
        'nama_lengkap',
        'no_hp',
        'alamat',
        'rt',
        'kelurahan',
        'kecamatan',
        'kota',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}