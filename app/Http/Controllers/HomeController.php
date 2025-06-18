<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Models\Umkm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalUmkm = 350; // dummy total UMKM
        $totalInvestor = 120; // dummy
        $totalInvestasi = 56000000000; // dummy dalam rupiah (56 Miliar)

        // uncomment ini , ntar bisa ngitung dari total umkm kwkw , jangan di hapus !
        // $potensis = Potensi::withCount('umkms')->get()->map(function ($item) use ($totalUmkm) {
        //     $item->persentase = $totalUmkm > 0 ? round(($item->umkms_count / $totalUmkm) * 100, 2) : 0;
        //     return $item;
        // });

        // Dummy data potensi
        $potensis = Potensi::all()->map(function ($item) {
            $item->persentase = rand(5, 25); // ubah range sesuai kebutuhan visualisasi
            return $item;
        });


        $berita = collect([
            ['judul' => 'UMKM Madiun Tembus Ekspor', 'tanggal' => '2025-06-15'],
            ['judul' => 'Investasi Baru di Sektor Teknologi', 'tanggal' => '2025-06-12'],
        ]);

        return view('beranda', compact('potensis', 'totalInvestor', 'totalInvestasi', 'berita'));
    }

}
