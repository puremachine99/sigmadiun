<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Role
        $superadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        // Buat Permission dasar (bisa ditambah nanti)
        $manageUsers = Permission::firstOrCreate(['name' => 'manage users']);

        // Assign permission ke role
        $superadmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(['manage users']);

        // Buat akun superadmin
        $user = User::firstOrCreate(
            ['email' => 'support@smartid.com'],
            [
                'name' => 'smartid',
                'email' => 'support@smartid.com',
                'password' => Hash::make('smartid2025!!'),
            ]
        );

        $user->assignRole('superadmin');
    }
}
