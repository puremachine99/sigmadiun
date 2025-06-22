<?php

namespace App\Filament\Resources;

use App\Models\Kecamatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Get;
use Filament\Support\RawJs;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\KecamatanResource\Pages;

class KecamatanResource extends Resource
{
    protected static ?string $model = Kecamatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Data Geospasial';
    protected static ?int $navigationSort = 4;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getPluralModelLabel(): string
    {
        return 'Daftar Kecamatan';
    }

    public static function getModelLabel(): string
    {
        return 'Daftar Kecamatan';
    }

    public static function eagerLoadRelations(): array
    {
        return ['analisaPotensi'];
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->required()
                ->maxLength(255),

            ColorPicker::make('color')
                ->label('Warna Peta')
                ->default('#2196f3'),

            Select::make('sektor_id')
                ->label('Sektor Potensi')
                ->relationship('sektor', 'nama')
                ->searchable()
                ->preload()
                ->placeholder('Pilih sektor (opsional)')
                ->nullable(),

            Select::make('peluang_id')
                ->label('Peluang Spesifik')
                ->relationship('peluang', 'nama')
                ->searchable()
                ->preload()
                ->placeholder('Pilih peluang (opsional)')
                ->nullable(),

            TextInput::make('jumlah_penduduk')
                ->label('Jumlah Penduduk')
                ->numeric()
                ->default(0)
                ->suffix('jiwa'),

            Textarea::make('geojson')
                ->label('Denah Lahan (GeoJSON)')
                ->rows(10)
                ->required(),

            MarkdownEditor::make('description')
                ->label('Deskripsi Kecamatan')
                ->columnSpanFull()
                ->maxLength(10000),

            Checkbox::make('is_analisa_active')
                ->label('Aktifkan Analisa Potensi')
                ->live()
                ->columnSpanFull(),

            Group::make([
                Textarea::make('sumber_daya_alam')
                    ->label('Potensi Sumber Daya Alam'),

                Textarea::make('sumber_daya_buatan')
                    ->label('Potensi Sumber Daya Buatan'),

                TextInput::make('alamat')
                    ->label('Alamat'),

                TextInput::make('luas_lahan')
                    ->label('Luas Lahan')
                    ->suffix('Ha')
                    ->numeric(),


                TextInput::make('nilai_investasi')
                    ->label('Nilai Investasi')
                    ->prefix('Rp')
                    ->mask(RawJs::make(<<<'JS'
                    $input.replace(/\D/g, '')
                          .replace(/\B(?=(\d{3})+(?!\d))/g, '.')
                JS))
                    ->stripCharacters(['.'])
                    ->numeric(),

                TextInput::make('denah_lahan')
                    ->label('Denah Lahan (Opsional)'),

                TextInput::make('status_lahan')
                    ->label('Status Lahan'),

                TextInput::make('pelaku_usaha')
                    ->label('Pelaku Usaha'),

                Textarea::make('ketersediaan_utilitas')
                    ->label('Ketersediaan Listrik, Air, dan Gas'),

                TextInput::make('keamanan')
                    ->label('Keamanan'),

                Textarea::make('sarana_prasarana')
                    ->label('Ketersediaan Sarana Transportasi'),

                Textarea::make('sarana_pokok_kepariwisataan')
                    ->label('Sarana Pokok Kepariwisataan'),

                Textarea::make('rincian_proyek')
                    ->label('Rincian Informasi Terkait Projek Investasi'),

                Textarea::make('aspek_teknis')
                    ->label('Aspek Teknis / Sasaran Pemasaran'),

                Textarea::make('aspek_pemasaran')
                    ->label('Aspek Pemasaran'),

                Textarea::make('aspek_lokasi')
                    ->label('Aspek Lokasi'),

                Textarea::make('aspek_manajemen')
                    ->label('Aspek Manajemen'),

                Textarea::make('aspek_politik_ekonomi_sosial')
                    ->label('Aspek Politik, Ekonomi, dan Sosial'),

                Textarea::make('aspek_komersial')
                    ->label('Aspek Komersial'),
            ])
                ->visible(fn(Get $get) => $get('is_analisa_active'))
                ->columns(2)
                ->columnSpanFull(),
        ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('color')->label('Warna')->sortable(),
                TextColumn::make('luas_lahan')->label('Luas')
                    ->suffix(' Ha')
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->sortable(),
                TextColumn::make('nilai_investasi')
                    ->label('Nilai Investasi')
                    ->prefix('Rp ')
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->sortable(),
                TextColumn::make('jumlah_penduduk')->label('Penduduk')->sortable()->searchable(),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKecamatans::route('/'),
            'create' => Pages\CreateKecamatan::route('/create'),
            'edit' => Pages\EditKecamatan::route('/{record}/edit'),
        ];
    }
}
