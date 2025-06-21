<?php

namespace App\Filament\Widgets;
use App\Models\Sektor;
use App\Models\Peluang;
use App\Models\Potensi;
use App\Models\Kecamatan;
use App\Models\AnalisaPotensi;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistikInvestasiOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected static ?string $title = 'Statistik Investasi';

    protected function getStats(): array
    {
        return [
            Stat::make(
                'Total Luas Lahan',
                number_format(Kecamatan::sum('luas_lahan'), 0, ',', '.') . ' Ha'
            )
                ->description('Akumulasi dari seluruh proyek')
                ->descriptionIcon('heroicon-m-map')
                ->color('primary'),

            Stat::make(
                'Total Nilai Investasi',
                'Rp ' . number_format(Kecamatan::sum('nilai_investasi'), 0, ',', '.')
            )
                ->description('Total nilai investasi aktif')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make(
                'Jumlah Penduduk',
                number_format(Kecamatan::sum('jumlah_penduduk'), 0, ',', '.')
            )
                ->description('Total penduduk dari seluruh kecamatan')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make(
                'Jumlah Potensi',
                Potensi::count()
            )
                ->description('Dari seluruh wilayah')
                ->descriptionIcon('heroicon-m-light-bulb')
                ->color('info'),

            Stat::make(
                'Jumlah Peluang',
                Peluang::count()
            )
                ->description('Peluang terbuka saat ini')
                ->descriptionIcon('heroicon-m-rocket-launch')
                ->color('warning'),

            Stat::make(
                'Jumlah Sektor',
                Sektor::count()
            )
                ->description('Sektor yang terdata')
                ->descriptionIcon('heroicon-m-cube')
                ->color('secondary'),
        ];
    }

}
