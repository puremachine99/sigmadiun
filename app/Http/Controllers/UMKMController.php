<?php
namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Potensi;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with(['kecamatan', 'kelurahan', 'potensi'])->latest()->get();

        return view('umkm.index', compact('umkms'))->with('active', 'umkm');
    }
}
