<?php

namespace App\Filament\Resources\PotensiResource\Pages;

use App\Filament\Resources\PotensiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPotensi extends EditRecord
{
    protected static string $resource = PotensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
