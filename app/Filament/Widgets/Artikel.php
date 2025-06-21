<?php
namespace App\Filament\Widgets;

use App\Models\Artikel as ArtikelModel;
use Filament\Widgets\Widget;

class Artikel extends Widget
{
    protected static string $view = 'filament.widgets.artikel';
    protected static ?int $sort = 2;
    public function getArticles()
    {
        return ArtikelModel::latest()->take(5)->get(); // Ambil 5 artikel terbaru
    }
}
