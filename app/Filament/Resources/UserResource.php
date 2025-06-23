<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    // Menu di sidebar muncul untuk semua role
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->hasAnyRole(['super_admin', 'admin', 'author']);
    }

    // Bisa lihat daftar user
    public static function canViewAny(): bool
    {
        return auth()->user()?->hasAnyRole(['super_admin', 'admin', 'author']);
    }

    // Bisa lihat detail user
    public static function canView(Model $record): bool
    {
        return auth()->user()?->hasAnyRole(['super_admin', 'admin', 'author']);
    }

    // Hanya super_admin yang bisa edit user
    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->hasRole('super_admin');
    }

    // Hanya super_admin yang bisa hapus user
    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->hasRole('super_admin');
    }

    // Ini tambahan kalau kamu pakai tombol bulk delete
    public static function canDeleteAny(): bool
    {
        return auth()->user()?->hasRole('super_admin');
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Pengguna';
    }

    public static function getModelLabel(): string
    {
        return 'Daftar Pengguna';
    }

    protected static ?string $navigationGroup = 'Filament Shield';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?int $navigationSort = 8;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('username')->required(),
            Select::make('roles')
                ->label('Roles')
                ->multiple()
                ->preload()
                ->relationship('roles', 'name')
                ->options(function () {
                    $user = auth()->user();

                    // Default: semua role
                    $roles = \Spatie\Permission\Models\Role::all();

                    if ($user->hasRole('admin')) {
                        // Admin hanya boleh memilih role di bawahnya (admin dan author)
                        return $roles->whereIn('name', ['admin', 'author'])->pluck('name', 'id');
                    }

                    if ($user->hasRole('author')) {
                        // Author hanya boleh pilih author saja
                        return $roles->where('name', 'author')->pluck('name', 'id');
                    }

                    // Super admin bisa lihat semua
                    return $roles->pluck('name', 'id');
                }),
            TextInput::make('password')
                ->password()
                ->dehydrateStateUsing(fn($state) => \Hash::make($state))
                ->required(fn(string $context): bool => $context === 'create'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('roles.name')->label('Role'),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->visible(fn(User $record) => auth()->user()?->hasRole('super_admin')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn() => auth()->user()?->hasRole('super_admin')),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
