<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Potensi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PotensiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PotensiResource\RelationManagers;

class PotensiResource extends Resource
{
    public static function getPluralModelLabel(): string
    {
        return 'Daftar Potensi';
    }

    public static function getModelLabel(): string
    {
        return 'Daftar Potensi';
    }
    protected static ?string $navigationGroup = 'Data Geospasial';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?int $navigationSort = 2;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $model = Potensi::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->required()
                ->maxLength(255),
            Select::make('sektor_id')
                ->label('Sektor')
                ->relationship('sektor', 'nama')
                ->searchable()
                ->preload()
                ->nullable(),
            Textarea::make('description')
                ->label('Deskripsi')
                ->rows(5)
                ->required()
                ->maxLength(300),


        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('sektor.nama')
                    ->label('Sektor')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')->limit(25),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPotensis::route('/'),
            'create' => Pages\CreatePotensi::route('/create'),
            'edit' => Pages\EditPotensi::route('/{record}/edit'),
        ];
    }
}
