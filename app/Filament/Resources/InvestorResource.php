<?php
namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\Investor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\InvestorResource\Pages;

class InvestorResource extends Resource
{
    protected static ?string $model = Investor::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Investasi';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form->schema([

            Grid::make(2)->schema([
                TextInput::make('nama')
                    ->required(),

                Textarea::make('alamat'),

                Select::make('kecamatan_id')
                    ->relationship('kecamatan', 'nama')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live(), // Wajib agar memicu re-render field yang tergantung

                Select::make('kelurahan_id')
                    ->label('Kelurahan')
                    ->options(function (Get $get) {
                        $kecamatanId = $get('kecamatan_id');
                        if (!$kecamatanId) {
                            return [];
                        }

                        return \App\Models\Kelurahan::where('kecamatan_id', $kecamatanId)->pluck('nama', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(fn(Get $get) => !$get('kecamatan_id')),

                Select::make('sektor_id')
                    ->label('Sektor')
                    ->relationship('sektor', 'nama')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live(),

                Select::make('potensis')
                    ->label('Potensi')
                    ->multiple()
                    ->preload()
                    ->options(
                        fn(Get $get) =>
                        \App\Models\Potensi::where('sektor_id', $get('sektor_id'))
                            ->pluck('nama', 'id')
                    )
                    ->disabled(fn(Get $get) => $get('sektor_id') === null),

                Select::make('peluangs')
                    ->label('Peluang')
                    ->multiple()
                    ->preload()
                    ->options(
                        fn(Get $get) =>
                        \App\Models\Peluang::where('sektor_id', $get('sektor_id'))
                            ->pluck('nama', 'id')
                    )
                    ->disabled(fn(Get $get) => $get('sektor_id') === null),

                TextInput::make('luas_lahan')
                    ->numeric()
                    ->suffix('Ha'),

                TextInput::make('nilai_investasi')
                    ->numeric()
                    ->prefix('Rp'),

                TextInput::make('latitude')
                    ->numeric()
                    ->step(0.0000001)
                    ->placeholder('-7.xxxxxx'),

                TextInput::make('longitude')
                    ->numeric()
                    ->step(0.0000001)
                    ->placeholder('111.xxxxxx'),

                Textarea::make('deskripsi')->label('Deskripsi Singkat'),
            ]),

            Grid::make(2)->schema([
                Textarea::make('sumber_daya_alam')->label('Potensi Sumber Daya Alam'),
                Textarea::make('sumber_daya_buatan')->label('Potensi Sumber Daya Buatan'),
                TextInput::make('status_lahan')->label('Status Lahan'),
                TextInput::make('denah_lahan')->label('Denah Lahan (Opsional)'),
                TextInput::make('pelaku_usaha')->label('Pelaku Usaha'),
                Textarea::make('ketersediaan_utilitas')->label('Ketersediaan Listrik, Air, dan Gas'),
                TextInput::make('keamanan')->label('Keamanan'),
                Textarea::make('sarana_prasarana')->label('Ketersediaan Sarana Transportasi'),
                Textarea::make('rincian_proyek')->label('Rincian Informasi Terkait Projek Investasi'),
                Textarea::make('aspek_teknis')->label('Aspek Teknis / Sasaran Pemasaran'),
                Textarea::make('aspek_pemasaran')->label('Aspek Pemasaran'),
                Textarea::make('aspek_lokasi')->label('Aspek Lokasi'),
                Textarea::make('aspek_manajemen')->label('Aspek Manajemen'),
                Textarea::make('aspek_politik_ekonomi_sosial')->label('Aspek Politik, Ekonomi, Sosial'),
                Textarea::make('aspek_komersial')->label('Aspek Komersial'),
            ])->columnSpanFull(),

        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('kecamatan.nama')->label('Kecamatan'),
                TextColumn::make('nilai_investasi')->money('IDR'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvestors::route('/'),
            'create' => Pages\CreateInvestor::route('/create'),
            'edit' => Pages\EditInvestor::route('/{record}/edit'),
        ];
    }
}
