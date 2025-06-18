<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Kecamatan extends Model
{
    protected $fillable = ['nama', 'geojson', 'color','jumlah_penduduk']; 


    protected $casts = [
        'geojson' => 'array',
    ];
    protected function geojson(): Attribute
    {
        return Attribute::make(
            get: fn($value) => is_string($value) ? json_decode($value, true) : $value,
        );
    }
    protected static function booted()
    {
        // generate slug saat bikin kecamatan baru :D
        static::creating(function ($model) {
            $model->slug = Str::slug($model->nama);
        });
    }
}
