<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\AnalisaPotensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Kecamatan extends Model
{
    protected $fillable = [
        'nama',
        'color',
        'sektor_id',
        'peluang_id',
        'jumlah_penduduk',
        'geojson',
        'description',
        'is_analisa_active',
        'sumber_daya_alam',
        'sumber_daya_buatan',
        'alamat',
        'luas_lahan',
        'nilai_investasi',
        'status_lahan',
        'denah_lahan',
        'pelaku_usaha',
        'ketersediaan_utilitas',
        'keamanan',
        'sarana_prasarana',
        'rincian_proyek',
        'aspek_teknis',
        'aspek_pemasaran',
        'aspek_lokasi',
        'aspek_manajemen',
        'aspek_politik_ekonomi_sosial',
        'aspek_komersial',
    ];


    protected $casts = [
        'geojson' => 'array',
        'luas_lahan' => 'decimal:2',
        'nilai_investasi' => 'decimal:2',
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
    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function sektor()
    {
        return $this->belongsTo(Sektor::class);
    }

    public function peluang()
    {
        return $this->belongsTo(Peluang::class);
    }

}
