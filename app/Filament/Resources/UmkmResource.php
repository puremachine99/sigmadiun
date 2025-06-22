<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Umkm;
use Filament\Tables;
use App\Models\Potensi;
use Filament\Forms\Form;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\Grid;
use Humaidem\FilamentMapPicker\Fields\OSMMap;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Dotswan\MapPicker\Fields\MapPicker;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UmkmResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UmkmResource\RelationManagers;

class UmkmResource extends Resource
{
    public static function getPluralModelLabel(): string
    {
        return 'UMKM';
    }

    public static function getModelLabel(): string
    {
        return 'UMKM';
    }

    protected static ?string $navigationGroup = 'Data Geospasial';
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?int $navigationSort = 6;
    protected static ?string $model = Umkm::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('nama_usaha')
                        ->label('Nama Usaha')
                        ->required(),

                    TextInput::make('alamat')
                        ->label('Alamat Lengkap')
                        ->required(),

                    Select::make('kecamatan_id')
                        ->label('Kecamatan')
                        ->options(Kecamatan::pluck('nama', 'id'))
                        ->reactive()
                        ->required()
                        ->afterStateUpdated(fn(callable $set) => $set('kelurahan_id', null)),

                    Select::make('kelurahan_id')
                        ->label('Kelurahan')
                        ->required()
                        ->reactive()
                        ->placeholder('Pilih kecamatan terlebih dahulu')
                        ->disabled(fn(callable $get) => !$get('kecamatan_id'))
                        ->options(function (callable $get) {
                            $kecamatanId = $get('kecamatan_id');
                            if (!$kecamatanId)
                                return [];
                            return Kelurahan::where('kecamatan_id', $kecamatanId)->pluck('nama', 'id');
                        }),

                    // OSMMap::make('lokasi')
                    //     ->label('Tentukan Lokasi Usaha')
                    //     ->showMarker()
                    //     ->draggable()
                    //     ->mapHeight('300px')
                    //     ->defaultCoordinates([-7.6295, 111.5231]) // Madiun center
                    //     ->tilesUrl('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
                    //     ->extraControl([
                    //         'zoomDelta' => 1,
                    //         'zoomSnap' => 0.25,
                    //         'wheelPxPerZoomLevel' => 60
                    //     ])
                    //     ->required(), // mboh ! emg ank anj

                    Select::make('potensi_id')
                        ->label('Sektor Usaha')
                        ->options(Potensi::pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->placeholder('Pilih sektor usaha'),

                    TextInput::make('kontak')
                        ->label('Kontak WA/HP')
                        ->tel()
                        ->required(),
                ]),

                Hidden::make('latitude'),
                Hidden::make('longitude'),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_usaha')
                    ->label('Nama Usaha')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50)
                    ->wrap()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Kecamatan')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('kelurahan.nama')
                    ->label('Kelurahan')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('potensi.name')
                    ->label('Sektor Usaha')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('kontak')
                    ->label('Kontak')
                    ->copyable(),

                Tables\Columns\TextColumn::make('latitude')
                    ->label('Lat')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('longitude')
                    ->label('Lng')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // (opsional) tambahkan filter berdasarkan kecamatan, sektor, dll.
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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
