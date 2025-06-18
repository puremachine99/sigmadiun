<?php

namespace App\Filament\Resources\PotensiResource\Pages;

use App\Filament\Resources\PotensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPotensis extends ListRecords
{
    protected static string $resource = PotensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
