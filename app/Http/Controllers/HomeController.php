<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Potensi;
use App\Models\Peluang;
use App\Models\Sektor;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $formatSingkat = function ($number, $precision = 1) {
            if ($number >= 1_000_000_000_000) {
                return number_format($number / 1_000_000_000_000, $precision, ',', '.') . ' T';
            }
            if ($number >= 1_000_000_000) {
                return number_format($number / 1_000_000_000, $precision, ',', '.') . ' M';
            }
            if ($number >= 1_000_000) {
                return number_format($number / 1_000_000, $precision, ',', '.') . ' Juta';
            }
            if ($number >= 1_000) {
                return number_format($number / 1_000, $precision, ',', '.') . ' Ribu';
            }
            return number_format($number, 0, ',', '.');
        };


        // Data makro sinkron dari DB (dipakai juga di widget Filament)
        $totalLahan = number_format(Kecamatan::sum('luas_lahan'), 0, ',', '.');
        $totalInvestasiDB = $formatSingkat(Kecamatan::sum('nilai_investasi'));
        $jumlahPenduduk = number_format(Kecamatan::sum('jumlah_penduduk'), 0, ',', '.');
        $jumlahPotensi = Potensi::count();
        $jumlahPeluang = Peluang::count();
        $jumlahSektor = Sektor::count();
        $totalInvestasiInvestor = $formatSingkat(\App\Models\Investor::sum('nilai_investasi'));
        $jumlahInvestor = \App\Models\Investor::count();

        // Dummy data potensi untuk chart/visualisasi
        $potensis = Potensi::all()->map(function ($item) {
            $item->persentase = rand(5, 25);
            return $item;
        });

        // Dummy data berita
        $berita = collect([
            ['judul' => 'UMKM Madiun Tembus Ekspor', 'tanggal' => '2025-06-15'],
            ['judul' => 'Investasi Baru di Sektor Teknologi', 'tanggal' => '2025-06-12'],
        ]);

        return view('beranda', compact(
            'potensis',
            'berita',
            'totalLahan',
            'totalInvestasiDB',
            'jumlahPenduduk',
            'jumlahPotensi',
            'jumlahPeluang',
            'jumlahSektor',
            'totalInvestasiInvestor',
            'jumlahInvestor'
        ));
    }
}
