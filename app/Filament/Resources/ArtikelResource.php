<?php
namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Artikel;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\KeyValue;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ArtikelResource\Pages;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?string $navigationLabel = 'Artikel';
    protected static ?int $navigationSort = 7;
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('judul')
                ->required()
                ->debounce(1000) // ⬅️ debounce update 0.5 detik
                ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),

            TextInput::make('slug')
                ->disabled()
                ->dehydrated(),

            FileUpload::make('thumbnail')
                ->image()
                ->directory('artikels'),

            Select::make('status')
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                ])
                ->required(),

            MarkdownEditor::make('konten')
                ->required()
                ->columnSpanFull(),

            Hidden::make('user_id')
                ->default(auth()->id()),
            KeyValue::make('meta')
                ->label('Metadata SEO')
                ->keyLabel('Meta Key')
                ->valueLabel('Meta Value')
                ->addButtonLabel('Tambah')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('judul')->searchable()->limit(50),
            TextColumn::make('status')->badge()->color(fn($state) => $state === 'published' ? 'success' : 'gray'),
            TextColumn::make('user.name')->label('Penulis'),
            TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
        ])->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit' => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }
}
