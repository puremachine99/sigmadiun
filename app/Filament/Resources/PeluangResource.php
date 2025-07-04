<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Peluang;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PeluangResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeluangResource\RelationManagers;

class PeluangResource extends Resource
{
    public static function getPluralModelLabel(): string
    {
        return 'Daftar Peluang';
    }

    public static function getModelLabel(): string
    {
        return 'Daftar Peluang';
    }
    protected static ?string $navigationGroup = 'Data Geospasial';
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?int $navigationSort = 3;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $model = Peluang::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->label('Nama Peluang')
                ->required()
                ->maxLength(255),
            Select::make('sektor_id')
                ->label('Sektor')
                ->relationship('sektor', 'nama')
                ->searchable()
                ->preload()
                ->nullable(),
            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->maxLength(1000),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('sektor.nama')
                    ->label('Sektor')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')->limit(25),
            ])->defaultSort('nama')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeluangs::route('/'),
            'create' => Pages\CreatePeluang::route('/create'),
            'edit' => Pages\EditPeluang::route('/{record}/edit'),
        ];
    }
}
