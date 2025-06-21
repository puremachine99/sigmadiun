<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sektor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SektorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SektorResource\RelationManagers;

class SektorResource extends Resource
{
    public static function getPluralModelLabel(): string
    {
        return 'Daftar Sektor';
    }

    public static function getModelLabel(): string
    {
        return 'Daftar Sektor';
    }
    protected static ?string $navigationGroup = 'Data Geospasial';
    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?int $navigationSort = 1;
    protected static ?string $model = Sektor::class;

    public static function form(Form $form): Form
    {
        return $form->schema([

            TextInput::make('nama')
                ->label('Nama Sektor')
                ->required()
                ->maxLength(255),
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
                TextColumn::make('sektor.nama')->label('Sektor')->searchable(),
                TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
                TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
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
            'index' => Pages\ListSektors::route('/'),
            'create' => Pages\CreateSektor::route('/create'),
            'edit' => Pages\EditSektor::route('/{record}/edit'),
        ];
    }
}
