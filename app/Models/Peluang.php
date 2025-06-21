<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peluang extends Model
{
    use HasFactory;

    protected $fillable = ['sektor_id', 'nama', 'deskripsi'];

    public function sektor()
    {
        return $this->belongsTo(Sektor::class);
    }
}
