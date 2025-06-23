<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    protected $fillable = [
        'nama',
        'description',
    ];

    public function umkms()
    {
        return $this->hasMany(Umkm::class);
    }

    public function sektor()
    {
        return $this->belongsTo(Sektor::class);
    }

}
