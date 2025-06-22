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
        // ========== ROLE ==========
        $superadmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $author = Role::firstOrCreate(['name' => 'author', 'guard_name' => 'web']);

        // ========== PERMISSION: USER ==========
        $userPermissions = [
            'view users',
            'view_any users',
            'create users',
            'update users',
            'delete users',
            'delete_any users',
        ];

        foreach ($userPermissions as $perm) {
            $permission = Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
            $superadmin->givePermissionTo($permission); // Full access
        }

        // Admin hanya boleh lihat user
        $adminPermissions = [
            'view users',
            'view_any users',
        ];
        foreach ($adminPermissions as $perm) {
            $permission = Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
            $admin->givePermissionTo($permission);
        }

        // Author juga boleh lihat user (untuk referensi misalnya di artikel)
        foreach ($adminPermissions as $perm) {
            $permission = Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
            $author->givePermissionTo($permission);
        }

        // ========== PERMISSION: ARTIKEL ==========
        $artikelPermissions = [
            'view artikels',
            'view_any artikels',
            'create artikels',
            'update artikels',
            'delete artikels',
            'delete_any artikels',
        ];

        foreach ($artikelPermissions as $perm) {
            $permission = Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
            $superadmin->givePermissionTo($permission);
            $admin->givePermissionTo($permission); // admin bisa full akses artikel
            $author->givePermissionTo($permission); // author juga bisa full akses artikel
        }

        // ========== SUPERADMIN USER ==========
        $user = User::firstOrCreate(
            ['email' => 'support@smartid.com'],
            [
                'name' => 'smartid',
                'email' => 'support@smartid.com',
                'password' => Hash::make('smartid2025!!'),
            ]
        );
        $user->assignRole('super_admin');

        // ========== ADMIN USER ==========
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@smartid.com'],
            [
                'name' => 'Admin Dummy',
                'email' => 'admin@smartid.com',
                'password' => Hash::make('smartid2025!!'),
            ]
        );
        $adminUser->assignRole('admin');

        // ========== AUTHOR USER ==========
        $authorUser = User::firstOrCreate(
            ['email' => 'author@smartid.com'],
            [
                'name' => 'Author Dummy',
                'email' => 'author@smartid.com',
                'password' => Hash::make('smartid2025!!'),
            ]
        );
        $authorUser->assignRole('author');


        $user->assignRole('super_admin');
    }
}
