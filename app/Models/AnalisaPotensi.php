<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnalisaPotensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan_id',
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
        'luas_lahan' => 'decimal:2',
        'nilai_investasi' => 'decimal:2',
    ];


}
