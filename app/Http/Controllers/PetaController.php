<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all()->map(function ($kec) {
            $geojson = is_string($kec->geojson) ? json_decode($kec->geojson, true) : $kec->geojson;

            if (isset($geojson['features'])) {
                foreach ($geojson['features'] as &$feature) {
                    $feature['properties']['luas'] = $kec->luas_wilayah;
                    $feature['properties']['district'] = $kec->nama; // Nama kecamatan
                }
            }

            $kec->geojson = $geojson;
            return $kec;
        });

        return view('peta.index', compact('kecamatans'));
    }



}
