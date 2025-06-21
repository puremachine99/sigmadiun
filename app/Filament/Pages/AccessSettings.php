<?php
namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class AccessSettings extends Page
{

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static ?string $navigationGroup = 'Privilege';
    protected static ?string $navigationLabel = 'Hak Akses Pengguna';
    protected static ?int $navigationSort = 9;
    protected static string $view = 'filament.pages.access-settings';

    public $users;

    public function mount(): void
    {
        $this->users = User::with('roles')->get();
    }

    public function updateUserRole($userId, $newRole)
    {
        $user = User::findOrFail($userId);

        // Cegah superadmin diganti
        if ($user->hasRole('superadmin')) {
            Notification::make()
                ->title("Role superadmin tidak bisa diubah.")
                ->danger()
                ->send();
            return;
        }

        $user->syncRoles([$newRole]);
        $this->mount(); // refresh tampilan

        Notification::make()
            ->title("Role user berhasil diperbarui.")
            ->success()
            ->send();
    }
}
