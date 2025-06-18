<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KelurahanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KelurahanResource\RelationManagers;

class KelurahanResource extends Resource
{
    public static function getPluralModelLabel(): string
    {
        return 'Kelurahan';
    }

    public static function getModelLabel(): string
    {
        return 'Kelurahan';
    }

    protected static ?string $model = Kelurahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->options(Kecamatan::pluck('nama', 'id'))
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) => $set('kelurahan_id', null)),

                Select::make('kelurahan_id')
                    ->label('Kelurahan')
                    ->options(function (callable $get) {
                        return Kelurahan::where('kecamatan_id', $get('kecamatan_id'))->pluck('nama', 'id');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')->label('Kecamatan')->sortable(),
            ])
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
            'index' => Pages\ListKelurahans::route('/'),
            'create' => Pages\CreateKelurahan::route('/create'),
            'edit' => Pages\EditKelurahan::route('/{record}/edit'),
        ];
    }
}
