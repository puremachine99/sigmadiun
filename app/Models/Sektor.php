<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sektor extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    public function peluangs()
    {
        return $this->hasMany(Peluang::class);
    }
}
