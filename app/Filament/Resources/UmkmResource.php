<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Umkm;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
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

    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            if (strlen($state) > 5) {
                                $url = 'https://nominatim.openstreetmap.org/search?' . http_build_query([
                                    'q' => $state,
                                    'format' => 'json',
                                    'limit' => 1,
                                    'addressdetails' => 1,
                                ]);

                                try {
                                    $response = Http::withHeaders([
                                        'User-Agent' => 'Laravel-Geocoder'
                                    ])->get($url);

                                    if ($response->successful() && count($response->json()) > 0) {
                                        $location = $response->json()[0];
                                        $set('latitude', $location['lat']);
                                        $set('longitude', $location['lon']);
                                    }
                                } catch (\Throwable $e) {
                                    // Log::error($e); // optional logging
                                }
                            }
                        })
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
                        ->options(function (callable $get) {
                            return Kelurahan::where('kecamatan_id', $get('kecamatan_id'))
                                ->pluck('nama', 'id');
                        }),

                    Select::make('sektor')
                        ->label('Sektor Usaha')
                        ->options([
                            'kuliner' => 'Kuliner 🍜',
                            'pertanian' => 'Pertanian 🌾',
                            'kerajinan' => 'Kerajinan 🧵',
                            'jasa' => 'Jasa 💼',
                            'perdagangan' => 'Perdagangan 🛒',
                        ])
                        ->required(),

                    TextInput::make('kontak')
                        ->label('Kontak WA/HP')
                        ->tel()
                        ->required(),
                ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
