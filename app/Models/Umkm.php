<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_usaha',
        'alamat',
        'kecamatan_id',
        'kelurahan_id',
        'potensi_id',
        'kontak',
        'latitude',
        'longitude',
    ];

    public function potensi()
    {
        return $this->belongsTo(Potensi::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

}
