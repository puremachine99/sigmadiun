<?php
namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Potensi;
use App\Models\Kecamatan;

class PotensiController extends Controller
{
    public function index()
    {
        $potensis = Potensi::all();

        return view('potensi.index', compact('potensis'))->with('active', 'potensi');
    }
    public function show(Potensi $potensi)
    {
        $potensis = Potensi::all();
        $kecamatans = Kecamatan::all(); // include 'geojson'
        $umkms = Umkm::where('potensi_id', $potensi->id)
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['latitude', 'longitude', 'nama_usaha']);

        return view('potensi.show', compact('potensi', 'potensis', 'kecamatans', 'umkms'));
    }

}
