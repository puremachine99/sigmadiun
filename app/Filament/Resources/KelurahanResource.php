<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use function Laravel\Prompts\text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\KelurahanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KelurahanResource\RelationManagers;

class KelurahanResource extends Resource
{
    public static function getPluralModelLabel(): string
    {
        return 'Daftar Kelurahan';
    }

    public static function getModelLabel(): string
    {
        return 'Daftar Kelurahan';
    }

    protected static ?string $navigationGroup = 'Data Geospasial';
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?int $navigationSort = 5;
    protected static ?string $model = Kelurahan::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->options(Kecamatan::pluck('nama', 'id'))
                    ->afterStateUpdated(fn(callable $set) => $set('kelurahan_id', null)),

                TextInput::make('nama')
                    ->label('Kelurahan')
                    ->required(),

                MarkdownEditor::make('description')
                    ->label('Deskripsi Kelurahan')
                    ->columnSpanFull()
                    ->maxLength(10000),
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
