<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function umkms()
    {
        return $this->hasMany(Umkm::class);
    }

}
