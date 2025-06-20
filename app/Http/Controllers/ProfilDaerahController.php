<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilDaerahController extends Controller
{
    public function index()
    {
        $deskripsi = <<<TEXT
                    Kabupaten Madiun adalah sebuah kabupaten di Provinsi Jawa Timur, Indonesia. Kabupaten ini berbatasan dengan Kabupaten Bojonegoro di utara, Kabupaten Nganjuk di timur, Kabupaten Ponorogo di selatan, serta Kabupaten Magetan, dan Kabupaten Ngawi di barat.

                    Kabupaten Madiun adalah sebuah kabupaten di Provinsi Jawa Timur dengan luas wilayah 1.010,86 km². Secara geografis, kabupaten ini terletak di 7°12' - 7°48'30" Lintang Selatan dan 111°25'45" - 111°51' Bujur Timur. Kabupaten Madiun berbatasan dengan Kabupaten Bojonegoro di utara, Kabupaten Nganjuk di timur, Kabupaten Ponorogo di selatan, serta Kabupaten Magetan dan Ngawi di barat. Ibu kota kabupaten ini adalah Kecamatan Mejayan, sesuai dengan Peraturan Pemerintah Nomor 52 Tahun 2010. Jumlah Kecamatan: 15 kecamatan, terdiri dari 198 desa dan 8 kelurahan.
                    TEXT;


        return view('profil.index', [
            'deskripsi' => $deskripsi,
            'active' => 'profil',
        ]);
    }

}