<?php

namespace App\Filament\Resources\PeluangResource\Pages;

use App\Filament\Resources\PeluangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeluangs extends ListRecords
{
    protected static string $resource = PeluangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
