<?php

namespace App\Filament\Resources\PeluangResource\Pages;

use App\Filament\Resources\PeluangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeluang extends EditRecord
{
    protected static string $resource = PeluangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
