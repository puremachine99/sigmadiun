<?php

// app/Models/Investor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'kecamatan_id',
        'kelurahan_id',
        'sektor_id',
        'luas_lahan',
        'nilai_investasi',
        'latitude',
        'longitude',
        'deskripsi',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
    public function sektor()
    {
        return $this->belongsTo(Sektor::class);
    }

    public function potensis()
    {
        return $this->belongsToMany(Potensi::class, 'investor_potensi');
    }
    public function peluangs()
    {
        return $this->belongsToMany(Peluang::class, 'investor_peluang');
    }
}
